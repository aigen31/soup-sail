<?php

namespace App\Notifications\Users\Specialist;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class RequestWorkTask extends Notification
{
  use Queueable;

  protected $invoice;

  /**
   * Create a new notification instance.
   */
  public function __construct(array $invoice)
  {
    $this->invoice = $invoice;
  }


  /**
   * Get the notification's delivery channels.
   *
   * @return array<int, string>
   */
  public function via(object $notifiable): array
  {
    return ['database'];
  }

  /**
   * Get the mail representation of the notification.
   */
  public function toMail(object $notifiable): MailMessage
  {
    return (new MailMessage)
      ->line('The introduction to the notification.')
      ->action('Notification Action', url('/'))
      ->line('Thank you for using our application!');
  }

  /**
   * Get the array representation of the notification.
   *
   * @return array<string, mixed>
   */
  public function toDatabase(object $notifiable): array
  {
    return [
      'title' => 'You are invited',
      'message' => "You are invited to a new task \"{$this->invoice['taskName']}\"",
      'taskId' => $this->invoice['taskId'],
    ];
  }
}
