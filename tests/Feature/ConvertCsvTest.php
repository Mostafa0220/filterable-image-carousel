<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use Illuminate\Support\Facades\Storage;
use JetBrains\PhpStorm\ExpectedValues;

class ConvertCsvTest extends TestCase
{
    /**
     * Testing the console command covert:csv
     * Expects user answer question: what is the cs full url?
     * Expects user input a full url
     * Expects output "2 files created!"
     * Expects 2 stores at storage local disk
     * @return void
     */
    public function testConvertCsvCommand()
    {
        $this->artisan('convert:csv')
            ->expectsQuestion('What is the csv full url?', 'http://localhost:8000/csv/1.csv')
            ->expectsOutput('2 files created!')
            ->assertExitCode(0);
        // Assert the file was stored...
        Storage::disk('local')->assertExists('public/items.json');
        Storage::disk('local')->assertExists('public/items.xml');
    }
    /**
     * Testing the console command covert:csv
     * Expects user answer question: what is the cs full url?
     * Expects user input any value except a full url
     * Expects output "The csv url format is invalid.!"
     * @return void
     */
    public function testConvertCsvWithoutUrlCommand()
    {
        $this->artisan('convert:csv')
            ->expectsQuestion('What is the csv full url?', 'not a Url')
            ->expectsOutput('The csv url format is invalid.!')
            ->assertExitCode(0);
    }

}
