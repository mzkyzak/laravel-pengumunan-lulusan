namespace App\Exports;

use App\Models\Siswa;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class SiswaExport implements FromCollection, WithHeadings, WithMapping
{
    public function collection()
    {
        return Siswa::all();
    }

    // Menentukan urutan kolom agar pas dengan SiswaImport
    public function map($siswa): array
    {
        return [
            $siswa->nisn,
            $siswa->nama,
            $siswa->tanggal_lahir,
            $siswa->status,
        ];
    }

    public function headings(): array
    {
        return [
            'nisn',          // Huruf kecil saja biar aman
            'nama_lengkap', 
            'tgl lahir',    // Sesuaikan dengan yang kamu pakai di Import
            'status',
        ];
    }
}