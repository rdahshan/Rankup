<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Slot;
use Illuminate\Http\Request;

class SlotController extends Controller
{
    public function get_slots_by_device($id){
        $slots = Slot::where('device_id',$id)->get();
        return response()->json($slots);
    }
}
