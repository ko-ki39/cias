<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class CommentMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($name, $article, $email, $detail)
    {
        //
        $this->name = $name;
        $this->article = $article;
        $this->email = $email;
        $this->detail = $detail;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->to($this->email) //送信先アドレス
            ->subject('コメントが来ました。') //件名
            ->view('mail.comment_mail') //本文
            ->with(['name' => $this->name, 'article' => $this->article, 'detail' => $this->detail]); //本文に送る値
    }
}
