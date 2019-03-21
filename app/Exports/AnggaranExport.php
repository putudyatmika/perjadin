<?php

namespace App\Exports;

use App\Anggaran;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Events\AfterSheet;

class AnggaranExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
     // set the headings
     public function headings(): array
     {
         return [
             'tahun_anggaran', 'mak', 'uraian', 'unitkerja', 'pagu', 'rencana_pagu'
         ];
     }
    public function collection()
    {
        return Anggaran::all();
    }
}
