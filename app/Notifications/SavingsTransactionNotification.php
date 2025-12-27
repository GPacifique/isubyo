<?php

namespace App\Notifications;

use App\Models\Saving;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class SavingsTransactionNotification extends Notification implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new notification instance.
     */
    public function __construct(
        public Saving $saving,
        public string $transactionType,
        public float $amount
    ) {
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        $typeLabel = strtoupper($this->transactionType);
        $action = $this->transactionType === 'deposit' ? 'deposited to' : 'withdrawn from';

        return (new MailMessage)
            ->subject('Savings ' . $typeLabel . ' - ' . $this->saving->member->group->name)
            ->greeting('Hello ' . $notifiable->name . ',')
            ->line('A savings transaction has been recorded on your account.')
            ->lineBreak()
            ->line('Transaction Details:')
            ->line('• Transaction Type: ' . $typeLabel)
            ->line('• Amount: RWF ' . number_format($this->amount, 2))
            ->line('• Group: ' . $this->saving->member->group->name)
            ->line('• Date: ' . now()->format('M d, Y H:i'))
            ->lineBreak()
            ->line('Current Account Balance:')
            ->line('• Total Savings: RWF ' . number_format($this->saving->current_balance, 2))
            ->lineBreak()
            ->action('View Savings', route('member.dashboard'))
            ->line('Thank you for using ' . config('app.name') . '!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            'saving_id' => $this->saving->id,
            'transaction_type' => $this->transactionType,
            'amount' => $this->amount,
            'balance' => $this->saving->current_balance,
        ];
    }
}

