<?php

namespace App\Models;

use App\Models\Presensi;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Kelas extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $table = 'classes';

    public function presensi()
    {
        return $this->hasMany(Presensi::class);
    }
}
