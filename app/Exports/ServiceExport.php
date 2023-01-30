<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;

class ServiceExport implements FromCollection
{

    public function __construct(public $data)
    {
        //
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return $this->data;
    }
}
