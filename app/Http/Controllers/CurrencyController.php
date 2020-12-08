<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Currency;

class CurrencyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // If the Content-Type and Accept headers are set to 'application/json', 
        // this will return a JSON structure. This will be cleaned up later.
        return Currency::all();
    }

    /**
     * Display a listing of the resource by pagination.
     *
     * @return \Illuminate\Http\Response
     */
    public function getcurrencies(Request $request)
    {
        // If the Content-Type and Accept headers are set to 'application/json', 
        // this will return a JSON structure. This will be cleaned up later.
        $page_size = $request->get('page_size');
        // $page = $request->get('page');
        return Currency::paginate($page_size);
    }
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($data)
    {
        return Currency::create([
            'ApiId' => $data['ApiId'],
            'Name' => $data['Name'],
            'NumCode' => $data['NumCode'],
            'CharCode' => $data['CharCode'],
            'Nominal' => $data['Nominal'],
            'Value' => $data['Value'],
            'Date' => $data['Date'],
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return Currency::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     public function show($id)
    {
        return Currency::find($id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $ApiId
     * @return \Illuminate\Http\Response
     */
     public function currencyHistory(Request $request,$ApiId)
    {
        $page_size = $request->get('page_size');
        $date_from = date($request->get('date_from'));
        $date_to = date($request->get('date_to'));
        // dd($date_from);
        return Currency::where('ApiId', '=', $ApiId)->whereBetween('Date', [$date_from, $date_to])->paginate($page_size);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     public function update(Request $request, $id)
    {
        $currency = Currency::findOrFail($id);
        $currency->update($request->all());

        return $currency;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $request, $id)
    {
        $currency = Currency::findOrFail($id);
        $currency->delete();

        return 204;
    }
}
