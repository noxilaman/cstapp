<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class companyregister extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    protected $datarequest;

    public function __construct($data)
    {
        $this->datarequest = $data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.companiesregister')
        ->subject('[ChildSafe] มีสถานประกอบการมาสมัครใหม่')
        ->with('contactdata',$this->datarequest);
    }
}
