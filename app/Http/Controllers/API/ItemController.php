<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;
use Validator;
use Illuminate\Support\Facades\Storage;

class ItemController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $query = $request->query();

        $contents = Storage::get('public/items.json');
        $filtered=$collection =collect(json_decode($contents, true));
        if($request->has('name')){
            $filtered = $filtered->where('name',$query['name']);
        }
        if($request->has('pvp')){
            $filtered = $filtered->where('pvp','>=',$query['pvp']);
        }

        $filtered->all();



        return response($filtered, 200, ['Content-Type' => 'application/xml']);


    }

}
