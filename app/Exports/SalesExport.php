<?php

namespace App\Exports;

use App\Models\Admin\Sale;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class SalesExport implements FromView, ShouldAutoSize
{
    /**
    * @return \Illuminate\Support\Collection
    */

    protected $start_date, $end_date;

    public function __construct($start_date, $end_date)
    {
        $this->start_date = $start_date;
        $this->end_date = $end_date;
    }
    
    public function view(): View
    {
        return view('admin.records.excel.sale', [
            'records' => Sale::orderBy('transaction_date', 'Desc')
                                ->startdate($this->start_date)
                                ->enddate($this->end_date)
                                ->get()
        ]);
    }
}
