<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use Illuminate\Support\Facades\Storage;
use JetBrains\PhpStorm\ExpectedValues;

class RestApiTest extends TestCase
{
    /**
     * Testing Json file is exists in storage path.
     *
     * @return void
     */
    public function testJsonFileExists(){
        // Assert the file is exists...
        Storage::disk('local')->assertExists('public/items.json');
    }
    /**
     * Testing First Rest API to filterable by name and pvp. Serving a filtered response with status 200.
     *
     * @return void
     */
    public function testRestApi1()
    {


        $response = $this->get('/api/items?name=Suit&pvp=500');

        $response->assertStatus(200);

    }
    /**
     * Testing Second Rest API to list all items without filter paramters. Serving a response with status 200.
     *
     * @return void
     */
    public function testRestApi2()
    {

        $response = $this->get('/api/items');

        $response->assertStatus(200);
    }
    /**
     * Testing Third Rest API to list all items filterable by name only. Serving a filtered response with status 200.
     *
     * @return void
     */
    public function testRestApi3()
    {
        $response = $this->get('/api/items?name=Suit');

        $response->assertStatus(200);
    }


}
