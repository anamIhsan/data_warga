<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
// use Illuminate\Database\Eloquent\SoftDeletes;

class Come extends Model
{
    use HasFactory;
    // use SoftDeletes;

    protected $dates = ['tanggal_datang'];

    protected $fillable = [
        'residents_id', 'tanggal_datang', 'pelapor'
    ];

    public function resident()
    {
        return $this->belongsTo(Resident::class, 'pelapor', 'id');
    }

    public function residents()
    {
        return $this->belongsTo(Resident::class, 'residents_id', 'id');
    }
}
