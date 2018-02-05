<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class Diagnosis extends Mailable
{
        use Queueable, SerializesModels;

        protected $order;

        public function __construct($order)
        {
                $this->order = $order;
        }

        /**
        * Build the message.
        *
        * @return $this
        */
        public function build()
        {
                // return $this->markdown($this->tmpl);
        }
}
