<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Participant extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'university_id',
        'email',
        'phone',
        'slot_id'
    ];

    public function slot(){
        return $this->belongsTo(Slot::class);
    }
}
