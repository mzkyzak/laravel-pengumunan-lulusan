<?php

namespace App\Imports;

use App\Models\Siswa;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Carbon\Carbon;

class SiswaImport implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {
        $tanggalFix = null;
        if (isset($row['tgl_lahir'])) {
            try {
                if (is_numeric($row['tgl_lahir'])) {
                    $tanggalFix = \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row['tgl_lahir'])->format('Y-m-d');
                } else {
                    $tanggalFix = Carbon::parse($row['tgl_lahir'])->format('Y-m-d');
                }
            } catch (\Exception $e) {
                $tanggalFix = null;
            }
        }

        $statusInput = strtoupper(trim($row['status'] ?? 'TUNDA'));
        $statusAllowed = ['LULUS', 'TIDAK LULUS', 'TUNDA'];
        $finalStatus = in_array($statusInput, $statusAllowed) ? $statusInput : 'TUNDA';

        return new Siswa([
            'nisn'          => $row['nisn'],
            'nama'          => $row['nama_lengkap'],
            'tanggal_lahir' => $tanggalFix,
            'status'        => $finalStatus,
        ]);
    }
}