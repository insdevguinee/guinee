<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Personnel;

class Personel extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    // public function __construct(Personnel $personnel)
    // {
    //     $this->personnel = $personnel;
    // }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('dravrea@gmail.com','UBF')
            ->subject('Active Personnel')
            ->view('mails.newUser');
    }
}
