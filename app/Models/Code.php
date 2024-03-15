<?php

namespace App\Models;

use App\Models\User;
use App\Models\Presensi;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Code extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function createdBy()
    {
        return $this->belongsTo(User::class, 'id_coder');
    }

    public function usedBy()
    {
        return $this->belongsTo(User::class, 'id_code_user');
    }

    public function presensi()
    {
        return $this->hasOne(Presensi::class, 'id_code');
    }
}
