<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Participation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EventController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'show']);

    }

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
        return view('event.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'group_id' => 'required|exists:groups,id',
            'name' => 'required',
            'date_start' => 'required|date',
        ]);

        $event = Event::create([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'date_start' => $request->input('date_start'),
            'group_id' => $request->input('group_id'),
        ]);


        return redirect(route('event.show', ['event' => $event]));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Event $event
     * @return \Illuminate\Http\Response
     */
    public function show(Event $event)
    {
        return view('event.show', ['event' => $event]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function edit(Event $event)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Event $event)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function destroy(Event $event)
    {
        //
    }


    public function participate(Request $request)
    {
        $request->validate(['event' => 'exists:events,id']);
        $event = Event::find($request->input('event'));

        $flag = $event->is_auth_participating();

        if ($flag != false) {
            $participation = Participation::where('user_id', $flag)->firstOrFail();
            $participation->delete();
        } else {
            $participation = Participation::create([
                'event_id' => $event->id,
                'user_id' => Auth::id()
            ]);
        }

        return redirect(route('event.show', ['event' => $event]));
    }
}
