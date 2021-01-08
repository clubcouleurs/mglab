<?php

namespace App\Events;

use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class AvisCreated
{
    use Dispatchable, SerializesModels;

    public $avis ;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($avis)
    {
        $this->avis = $avis ;
    }
}
