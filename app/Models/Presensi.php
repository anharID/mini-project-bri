<?php

namespace App\Models;

use App\Models\Code;
use App\Models\Kelas;
use App\Models\Materi;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Presensi extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $table = 'presences';


    public function code()
    {
        return $this->belongsTo(Code::class, 'id_code');
    }

    public function kelas()
    {
        return $this->belongsTo(Kelas::class, 'id_class');
    }

    public function materi()
    {
        return $this->belongsTo(Materi::class, 'id_material');
    }
}
