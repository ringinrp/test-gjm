<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Schedule extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'slug',
    ];

    public function poliklinik(){
        return $this->belongsTo(Poliklink::class);
    }

    public function owner(){
        return $this->belongsTo(User::class, 'patient_id', 'id');
    }
}
