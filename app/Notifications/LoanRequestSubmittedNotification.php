<?php

namespace App\Notifications;

use App\Models\LoanRequest;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class LoanRequestSubmittedNotification extends Notification implements ShouldQueue
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
            ->subject('Loan Request Submitted - ' . $this->loanRequest->group->name)
            ->greeting('Hello ' . $notifiable->name . ',')
            ->line('Your loan request has been successfully submitted to ' . $this->loanRequest->group->name . '.')
            ->lineBreak()
            ->line('Request Details:')
            ->line('• Amount Requested: RWF ' . number_format($this->loanRequest->requested_amount, 2))
            ->line('• Duration: ' . $this->loanRequest->requested_duration_months . ' months')
            ->line('• Reason: ' . $this->loanRequest->reason)
            ->line('• Status: Pending Review')
            ->lineBreak()
            ->line('Your group admin will review your request and notify you of the decision.')
            ->action('View Request', route('member.loan-requests'))
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
            'loan_request_id' => $this->loanRequest->id,
            'group_name' => $this->loanRequest->group->name,
            'amount' => $this->loanRequest->requested_amount,
        ];
            //
        ];
    }
}
