<?php

namespace App\Http\Controllers;

use App\Models\Group;
use App\Models\Subscription;
use Illuminate\Http\Request;

class GroupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('group.list', ['list' => Group::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('group.create');
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
            'name' => 'required',
        ]);

        $group = Group::create([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'tags' => $request->input('tags'),
            'admin_id' => auth()->id(),
        ]);

        $sub = Subscription::create([
            'user_id' => auth()->user()->id,
            'group_id' => $group->id,
        ]);

        return redirect(route('group.show', ['group' => $group]));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Group  $group
     * @return \Illuminate\Http\Response
     */
    public function show(Group $group)
    {
        return view('group.show', ['group' => $group]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Group  $group
     * @return \Illuminate\Http\Response
     */
    public function edit(Group $group)
    {
        return view('group.create', ['group' => $group]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Group  $group
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Group $group)
    {
        $request->validate([
            'name' => "required",
            'tags' => '',
            'description' => 'required'
        ]);

        $group->name = $request->input('name');
        $group->tags = ($request->input('tags') != null && $request->input('tags') != "") ? $request->input('tags') : $group->tags;
        $group->description = $request->input('description');

        $group->save();

        return redirect(route('group.show', ['group' => $group]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Group  $group
     * @return \Illuminate\Http\Response
     */
    public function destroy(Group $group)
    {
        //
    }
}
