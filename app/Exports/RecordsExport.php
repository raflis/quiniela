<?php

namespace App\Exports;

use App\Models\Record;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class RecordsExport implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */

    protected $name, $lastname, $project, $start_date, $end_date;

    public function __construct($name, $lastname, $project, $start_date, $end_date)
    {
        $this->name = $name;
        $this->lastname = $lastname;
        $this->project = $project;
        $this->start_date = $start_date;
        $this->end_date = $end_date;
    }
    
    public function view(): View
    {
        return view('admin.records.excelrecord', [
            'records' => Record::orderBy('id','Desc')
                                ->project($this->project)
                                ->name($this->name)
                                ->lastname($this->lastname)
                                ->startdate($this->start_date)
                                ->enddate($this->end_date)
                                ->get()
        ]);
    }
}
