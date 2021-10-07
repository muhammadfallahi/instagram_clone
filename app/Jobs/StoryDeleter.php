<?php

namespace App\Jobs;

use App\Models\Archive;
use App\Models\Story;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Database\Console\DbCommand;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\DB;

class StoryDeleter implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $story;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(Story $story)
    {
        $this->story = $story;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
       Archive::create([
           'archiveable_id' => $this->story->id,
           'archiveable_type' => 'app\models\story',
       ]);
    
        $this->story->delete();
    }
}
