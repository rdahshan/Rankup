<?php

namespace App\Http\Controllers;

use App\Models\Device;
use App\Models\Participant;
use App\Models\Slot;
use Illuminate\Http\Request;

class ParticipantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $participants = Participant::with('slot.device')->get();
        return view('admin.participants.index',['participants'=>$participants]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $devices = Device::all();
        return view('admin.participants.create',['devices'=>$devices]);
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
            'name'=>"required|string|min:4",
            "university_id"=>"required|string",
            "email"=>"required|email",
            "phone"=>"required|string",
            "slot_id"=>"required|exists:slots,id"
        ]);

        Participant::create($request->all());
        return redirect()->route('admin.participants.index')->with('success','Participant created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $participant = Participant::with('slot.device')->findOrFail($id);
        return view('admin.participants.show',['participant'=>$participant]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $devices = Device::all();
        $participant = Participant::findOrFail($id);
        return view('admin.participants.edit',['participant'=>$participant,'devices'=>$devices]);
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
        $request->validate([
            'name'=>"required|string|min:4",
            "university_id"=>"required|string",
            "email"=>"required|email",
            "phone"=>"required|string",
        ]);

        $participant = Participant::findOrFail($id);
        $participant->update($request->all());
        return redirect()->route('admin.participants.index')->with('success','Participant updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $participant = Participant::findOrFail($id);
        $participant->delete();
        return redirect()->route('admin.participants.index')->with('success','Participant deleted successfully.');
    }
}
