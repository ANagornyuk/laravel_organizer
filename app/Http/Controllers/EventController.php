<?php

namespace App\Http\Controllers;

use App\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Storage;

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
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('events.event');
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
        $event = new \App\Event;
        $event -> title = request('title');
        $event -> url = request('url');
        $event -> ev_class = request('ev_class');
        $event -> start = date_format(date_create_from_format('Y-m-d?H:i', request('start')), 'U' )*1000;
        $event -> end = date_format(date_create_from_format('Y-m-d?H:i', request('end')), 'U' )*1000;
        $event -> user_id = Auth::id();
        $event ->save();
        return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {

        $user_id = Auth::id();
        $ev = DB::table('events')->where('user_id',$user_id)->get();
        $out = array();

        foreach ($ev as $eve)
        {
            $out[] = array(
                'id' => $eve->id,
                'title' => $eve->title,
                'url' => $eve->url,
                'class' => $eve->ev_class,
                'start' => $eve->start,
                'end' => $eve->end,
            );

        }
        Storage::disk('local')->put('events.json.php', json_encode(array('success' => 1, 'result' => $out)));


        return view('home');

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
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
