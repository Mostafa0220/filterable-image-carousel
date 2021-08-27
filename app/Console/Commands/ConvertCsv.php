<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

use Validator;
use SoapBox\Formatter\Formatter;
use Illuminate\Support\Facades\Storage;
class ConvertCsv extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'convert:csv';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Convert CSV file into Json & XML files';

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
        //$csvUrl=$this->argument('url');
        $csvUrl = $this->ask('What is the csv full url?');

        $validator =Validator::make([
            'csvUrl' => $csvUrl
        ], [
            'csvUrl' => 'required|url'
        ]);
        if ($validator->fails()) {
            $this->error('The csv url format is invalid.!');
        }
        else{
            $csvString = file_get_contents($csvUrl);

            $formatter = Formatter::make($csvString, Formatter::CSV)->toJson();
            Storage::disk('local')->put('public/items.json', $formatter);
            //xml file
            $formatter = Formatter::make($csvString, Formatter::CSV)->toXml();
            Storage::disk('local')->put('public/items.xml', $formatter);

            $this->info('2 files created!');
          }

    }
}
