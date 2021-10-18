<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    use HasFactory;

    protected $fillable = [
        'familyCards_id', 'residents_id', 'hubungan'
    ];

    public function familyCard()
    {
        return $this->belongsTo(FamilyCard::class, 'id', 'familyCards_id');
    }

    public function residents()
    {
        return $this->belongsTo(Resident::class, 'residents_id', 'id');
    }
}
