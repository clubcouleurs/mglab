<?php

namespace App\Events;


use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class DataConceptionReceived
{
    use Dispatchable, SerializesModels;

    public $conception ;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($conception)
    {
        $this->conception = $conception ;
    }


}
