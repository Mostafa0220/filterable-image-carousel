<?php

namespace App\Http\Controllers;

use Validator;
use Illuminate\Validation\Rule;

use Illuminate\Http\Request;
use SoapBox\Formatter\Formatter;
use Illuminate\Support\Facades\Storage;


class ConvertController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function items()
    {

        //$jsonString = file_get_contents('http://localhost:8000/storage/items.json');
        $contents = Storage::get('public/items.json');

        $formatter = Formatter::make($contents, Formatter::JSON)->toXml();
        return response($formatter, 200, ['Content-Type' => 'application/xml']);


    }
    public function index(Request $request, $csvUrl)
    {


        $data = [
            'csvUrl' => $csvUrl
        ];


        $validator =Validator::make([
            'csvUrl' => $csvUrl
        ], [
            'csvUrl' => 'required|url'
        ]);
        /* $validator =Validator::make($data, [
            'csvUrl' => [
                'required',
                Rule::in(['json', 'xml']),
            ],
        ]); */
        if ($validator->fails()) {
            return response()->json(['success' => false, 'errors' => $validator->messages()], 422);
          }

        $csvString = file_get_contents($csvUrl);

        $formatter = Formatter::make($csvString, Formatter::CSV)->toJson();
        Storage::disk('local')->put('public/items.json', $formatter);
        //xml file
        $formatter = Formatter::make($csvString, Formatter::CSV)->toXml();
        Storage::disk('local')->put('public/items.xml', $formatter);

        return 1;
        if($toType=='json'){


            return $formatter;
        }
        else if($toType=='xml'){
            $formatter = Formatter::make($csvString, Formatter::CSV)->toXml();
            return response($formatter, 200, ['Content-Type' => 'application/xml']);

        }




        return json_decode($formatter);

    }




    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name' => 'required',
            'detail' => 'required',
        ]);

        $product->update($request->all());

        return redirect()->route('products.index')
                        ->with('success','Product updated successfully');
    }


}
