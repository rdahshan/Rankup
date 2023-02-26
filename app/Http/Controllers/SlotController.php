<?php

namespace App\Http\Controllers;

use App\Models\Device;
use App\Models\Slot;
use Illuminate\Http\Request;

class SlotController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $slots = Slot::with('device')->get();
        return view('admin.slots.index',['slots'=>$slots]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $devices = Device::all();
        return view('admin.slots.create',['devices'=>$devices]);
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
            'slot_time'=>"required|string|min:3",
            'device_id'=>"required|integer|exists:devices,id"
        ]);

        Slot::create($request->all());
        return redirect()->route('admin.slots.index')->with('success','Slot created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $slot = Slot::findOrFail($id);
        return view('admin.slots.show',['slot'=>$slot]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $slot = Slot::findOrFail($id);
        $devices = Device::all();
        return view('admin.slots.edit',['slot'=>$slot,'devices'=>$devices]);
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
            'slot_time'=>"required|string|min:3",
            'device_id'=>"required|integer|exists:devices,id"
        ]);

        $slot = Slot::findOrFail($id);
        $slot->update($request->all());
        return redirect()->route('admin.slots.index')->with('success','Slot updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $slot = Slot::findOrFail($id);
        $slot->delete();
        return redirect()->route('admin.slots.index')->with('success','Slot deleted successfully.');
    }
}
