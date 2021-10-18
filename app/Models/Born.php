<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
// use Illuminate\Database\Eloquent\SoftDeletes;

class Born extends Model
{
    use HasFactory;
    // use SoftDeletes;

    protected $dates = ['tanggal_lahir'];

    protected $fillable = [
        'residents_id', 'tanggal_lahir', 'familyCards_id'
    ];

    public function familyCard()
    {
        return $this->belongsTo(FamilyCard::class, 'familyCards_id', 'id');
    }

    public function residents()
    {
        return $this->belongsTo(Resident::class, 'residents_id', 'id');
    }
}
