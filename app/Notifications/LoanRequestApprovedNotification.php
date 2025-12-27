<?php

namespace App\Notifications;

use App\Models\LoanRequest;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class LoanRequestApprovedNotification extends Notification implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new notification instance.
     */
    public function __construct(public LoanRequest $loanRequest)
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
        return (new MailMessage)
            ->subject('Loan Request APPROVED - ' . $this->loanRequest->group->name)
            ->greeting('Congratulations ' . $notifiable->name . '!')
            ->line('Great news! Your loan request has been approved by ' . $this->loanRequest->group->name . '.')
            ->lineBreak()
            ->line('Loan Details:')
            ->line('• Principal Amount: RWF ' . number_format($this->loanRequest->requested_amount, 2))
            ->line('• Loan Duration: ' . $this->loanRequest->requested_duration_months . ' months')
            ->line('• Monthly Interest Charge: RWF ' . number_format(($this->loanRequest->requested_amount * 0.05) / $this->loanRequest->requested_duration_months, 2))
            ->line('• Status: Active - Ready to use')
            ->lineBreak()
            ->line('Review Notes: ' . ($this->loanRequest->review_notes ?? 'None'))
            ->lineBreak()
            ->line('The loan is now active in your account. You can view it in your loans dashboard.')
            ->action('View Your Loans', route('member.dashboard'))
            ->line('Thank you for being part of ' . $this->loanRequest->group->name . '!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            'loan_request_id' => $this->loanRequest->id,
            'group_name' => $this->loanRequest->group->name,
            'amount' => $this->loanRequest->requested_amount,
            'status' => 'approved',
        ];
    }
}

