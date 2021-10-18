<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
// use Illuminate\Database\Eloquent\SoftDeletes;

class Death extends Model
{
    use HasFactory;
    // use SoftDeletes;

    protected $table = 'dies'; 
    protected $dates = ['tanggal_meninggal'];

    protected $fillable = [
        'residents_id', 'tanggal_meninggal', 'sebab'
    ];

    public function residents()
    {
        return $this->belongsTo(Resident::class, 'residents_id', 'id');
    }
}
