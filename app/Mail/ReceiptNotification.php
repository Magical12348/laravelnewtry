<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ReceiptNotification extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    public $user;
    public $course;
    public $payment;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($user, $course, $payment)
    {
        $this->user = $user;
        $this->course = $course;
        $this->payment = $payment;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.receipt', [
            'user_name' => $this->user->name,
            'course_name' => $this->course->title,
            'course_price' => number_format($this->payment->amount / 100),
            'payment_id' => $this->payment->id,
            'date' => now()->format('d/m/Y'),
        ]);
    }
}
