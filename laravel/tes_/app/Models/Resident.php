<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Resident extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $dates = ['tanggal_lahir'];

    protected $fillable = [
        'nik', 'name', 'tempat_lahir', 'tanggal_lahir', 'desa', 'no_kk', 'gender', 'rt', 'rw',
        'religion', 'status_perkawinan', 'pekerjaan', 'status'
    ];
    
    public function familyCard()
    {
        return $this->hasOne(FamilyCard::class, 'no_kk', 'no_kk');
    }

    public function member()
    {
        return $this->belongsTo(Member::class, 'id', 'residents_id');
    }

    public function come()
    {
        return $this->hasMany(Come::class, 'id', 'pelapor');
    }
}
