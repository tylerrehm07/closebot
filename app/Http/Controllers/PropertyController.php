<?php

namespace App\Http\Controllers;

use App\Property;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class PropertyController extends Controller
{
    public function __construct()
    {

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $properties = Property::with('events')->get();
      return view('properties.index')->with('properties', $properties);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $property = Property::where('id', $id)
          ->with('events')
          ->first();

        return view('properties.show')
                ->with('property', $property);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $property = Property::where('id', $id)
                    ->with('events')
                    ->first();
      return view('properties.edit')->with('property', $property);
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
      $property = Property::where('id', $id)->first();
      foreach($property->getFillable() as $attr){
        if(!empty($request->input('data.' . $attr))){
          $property->{$attr} = $request->input('data.' . $attr);
        }
      }

      $geo = $this->geocode($property);
      $property->latitude = $geo['lat'];
      $property->latitude = $geo['lng'];

      $property->save();
      return response(array('success' => true, 'message' => 'Property successfully updated.'), 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      //
    }

    /**
     * Mark complete the specified resource in storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function complete($id)
    {
      $property = Property::findOrFail($id);
      $property->completed = Carbon::now();
      $property->save();
      return response(array('success' => true, 'message' => 'Property marked completed.'), 200);
    }
}
