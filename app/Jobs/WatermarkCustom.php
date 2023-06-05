<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Spatie\Image\Manipulations;
use Illuminate\Queue\SerializesModels;
use Spatie\Image\Image;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Google\Cloud\Vision\V1\ImageAnnotatorClient;

class WatermarkCustom implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    private $announcement_image_id, $name, $filepath;

    /**
     * Create a new job instance.
     */
    public function __construct($announcement_image_id, $file)
    {
        $this->announcement_image_id = $announcement_image_id;
        $this->filepath = dirname($file);
        $this->name = basename($file);
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        // $i = Image::find($this->announcement_image_id);

        // if (!$i) {

        //     return;
        // }
        
       
        $srcPath = storage_path() . '/app/public/' . $this->filepath . '/' . $this->name; 
        // $image = file_get_contents($srcPath);
        $dest = storage_path() . '/app/public/' . $this->filepath . '/logo' . $this->name; 


            
            $image = Image::load($srcPath);
            $image->watermark(base_path('resources/img/watermark.png'))
                ->watermarkPosition('bottom-right')
                ->watermarkOpacity(90)
                ->watermarkFit(Manipulations::FIT_STRETCH)
            ->save($dest);
      
    }
}
