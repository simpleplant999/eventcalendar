<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Event;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
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

        // return $request->all();
        // $object = (object) $request['events'];
        // return $request->all();
        foreach($request['events'] as $test){
            Event::create([
                'event_name' => $request['eventName'],
                'event_date' => $test
            ]);
        }
        // return Event::create([
        //     'event_name' => $request['eventName'],
        //     // 'event_date' => $request['events']
        // ]);

        // if ($events= $request->get('myArray')) {
        //     foreach($events as $event) {
        //         Event::create([
        //             'event_name' => $request['eventName'],
        //             'event_date' => $events['events']
        
        //         ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        //
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
}
