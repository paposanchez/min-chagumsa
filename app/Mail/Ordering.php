<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class Ordering extends Mailable
{
    use Queueable, SerializesModels;

    protected $tmpl;
    /**
     * Create a new message instance.
     * @param array|string $to 보내는사람 메일정보 ['address' => 'example@example.com', 'name' => 'Example'] | example@example.com
     * @param  string $subject 메일 제목
     * @param  array $message 메일 전송 내용 및 변수를 array로 설정함
     * @param string $view blade 파일명
     * @return void
     */
    public function __construct($to, $subject, $message, $view)
    {
        //
        $this->to($to);
        $this->subject($subject);
        foreach ($message as $key => $msg){
            $this->with($key, $msg);
        }

        $this->tmpl = $view;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown($this->tmpl);
    }
}
