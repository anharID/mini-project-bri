<?php

namespace App\Exports;

use App\Models\Presensi;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class DataExport implements FromQuery, WithHeadings, WithMapping
{
    use Exportable;
    /**
     * @return \Illuminate\Support\Collection
     */
    public function query()
    {
        return Presensi::query();
    }

    public function headings(): array
    {
        return [
            'No Induk',
            'Nama Asisten',
            'Kelas',
            'Materi',
            'Jaga Sebagai',
            'Tanggal',
            'Waktu Mulai',
            'Tanggal Selesai',
            'Durasi'
        ];
    }

    public function map($presensi): array
    {
        return [
            $presensi->code->usedBy->id_number,
            $presensi->code->usedBy->name,
            $presensi->kelas->nama_kelas,
            $presensi->materi->materi,
            $presensi->teaching_role,
            $presensi->date,
            $presensi->start_time,
            $presensi->end_time,
            $presensi->duration
        ];
    }
}
