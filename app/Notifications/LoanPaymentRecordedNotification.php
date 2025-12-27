<?php

namespace App\Notifications;

use App\Models\LoanPayment;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class LoanPaymentRecordedNotification extends Notification implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new notification instance.
     */
    public function __construct(public LoanPayment $payment)
    {
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
        $loan = $this->payment->loan;

        return (new MailMessage)
            ->subject('Loan Payment Recorded - ' . $loan->group->name)
            ->greeting('Hello ' . $notifiable->name . ',')
            ->line('A payment has been recorded for your loan.')
            ->lineBreak()
            ->line('Payment Details:')
            ->line('• Amount Paid: RWF ' . number_format($this->payment->amount_paid, 2))
            ->line('• Payment Date: ' . $this->payment->payment_date->format('M d, Y'))
            ->line('• Loan ID: #' . $loan->id)
            ->line('• Principal Paid: RWF ' . number_format($this->payment->principal_paid, 2))
            ->line('• Interest Paid: RWF ' . number_format($this->payment->interest_paid, 2))
            ->lineBreak()
            ->line('Updated Loan Balance:')
            ->line('• Remaining Balance: RWF ' . number_format($loan->remaining_balance, 2))
            ->line('• Total Paid: RWF ' . number_format($loan->total_principal_paid, 2))
            ->lineBreak()
            ->action('View Loan Details', route('member.dashboard'))
            ->line('Thank you for your timely payment!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            'loan_id' => $this->payment->loan_id,
            'payment_id' => $this->payment->id,
            'amount' => $this->payment->amount_paid,
            'date' => $this->payment->payment_date,
        ];
    }
}

