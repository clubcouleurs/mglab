<?php

namespace App\Console\Commands;

use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;


class DeleteUnsedTmpImagesCron extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'DeleteUnsedTmpImages:cron';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Cette Cron commande supprimer toutes les images dans le dossier app/filepond/ 
qui datent de 48H';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $now = Carbon::now();
        $expDate = $now->subDays(2);
        Log::info('--------------- ###### Cleaning began ... --------------- ');            
        $directories = Storage::directories('tmp') ;
            foreach ($directories as $directory)
            {
                $dateDir = Carbon::createFromTimestamp(Storage::lastModified($directory));
                if ($dateDir <= $expDate)
                    {
                        Storage::deleteDirectory($directory);   
                        Log::info('Directory last modified at : '. $dateDir . ' deleted at :' . $now ); 
                    }
            }
        Log::info('--------------- ###### End of cleaning ###### --------------- ' );            

    }
}
