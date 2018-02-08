<?php
namespace App\Console\Commands;

use Illuminate\Console\Command;

class GenerateContentSlug extends Command
{

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'content:generate-slug';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate Content Slug';

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
     * @return mixed
     */
    public function handle()
    {
        $contents = \App\Models\Repositories\ContentRepository::getAll([], true, -1, -1);

        foreach ($contents as $content) {
            $content->save();
        }
        
        echo "Done";
    }
}
