<?php

namespace App\Exports;

use App\Models\PpdbSiswa;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class SiswaExport implements FromCollection, WithHeadings, WithMapping
{
    protected $kelas_id;

    public function __construct($kelas_id = null)
    {
        $this->kelas_id = $kelas_id;
    }

    public function collection()
    {
        return PpdbSiswa::with('kelas')
            ->when($this->kelas_id, function ($query) {
                $query->where('kelas_id', $this->kelas_id);
            })
            ->get();
    }

    public function headings(): array
    {
        return [
            'No',
            'Nama',
            'NISN',
            'Jenis Kelamin',
            'Asal Sekolah',
            'No HP',
            'Kelas',
            'Status PPDB',
            'Status Pembayaran',
        ];
    }

    public function map($row): array
    {
        static $no = 1;

        return [
            $no++,
            $row->nama_lengkap,
            $row->nisn,
            $row->jenis_kelamin == 'L' ? 'Laki-laki' : 'Perempuan',
            $row->asal_sekolah,
            $row->no_hp,
            $row->kelas->nama_kelas ?? '-',
            $row->status_ppdb,
            $row->status_pembayaran,
        ];
    }
}
