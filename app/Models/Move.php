<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
// use Illuminate\Database\Eloquent\SoftDeletes;

class Move extends Model
{
    use HasFactory;
    // use SoftDeletes;

    protected $dates = ['tanggal_pindah'];

    protected $fillable = [
        'residents_id', 'tanggal_pindah', 'alasan',
    ];

    public function residents()
    {
        return $this->belongsTo(Resident::class, 'residents_id', 'id');
    }
}
