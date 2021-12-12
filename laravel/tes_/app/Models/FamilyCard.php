<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
// use Illuminate\Database\Eloquent\SoftDeletes;

class FamilyCard extends Model
{
    use HasFactory;
    // use SoftDeletes;

    protected $fillable = [
        'no_kk', 'kepala_keluarga', 'kabupaten', 'provinsi'
    ];

    public function residents()
    {
        return $this->belongsTo(Resident::class, 'kepala_keluarga', 'id');
    }

    public function members()
    {
        return $this->hasMany(Member::class, 'familyCards_id', 'id');
    }

    public function borns()
    {
        return $this->hasMany(Born::class, 'familyCards_id', 'id');
    }
}
