<?php

namespace App\Mail\Admin;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class InformUserprofile extends Mailable
{
    use Queueable;
    use SerializesModels;

    protected $user;

    protected $fileAttached;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($user, $fileAttached = null)
    {
        $this->user = $user;
        $this->fileAttached = $fileAttached;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $mail = $this->view('mails.inform-user-profile', [
            'user' => $this->user,
        ]);
        if ($this->fileAttached) {
            $mail->attach($this->fileAttached, [
                'as' => ''.$this->fileAttached->getClientOriginalName(),
            ]);
        }

        return $mail;
    }
}
