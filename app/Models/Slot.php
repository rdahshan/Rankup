<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Slot extends Model
{
    use HasFactory;

    protected $fillable = [
        'slot_time',
        'device_id'
    ];

    public function device(){
        return $this->belongsTo(Device::class);
    }
}
