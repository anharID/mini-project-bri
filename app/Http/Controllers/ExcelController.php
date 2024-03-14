<?php

namespace App\Http\Controllers;

use App\Exports\DataExport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ExcelController extends Controller
{
    public function export_report()
    {
        // return Excel::download(new DataExport, 'data.xlsx');
        return (new DataExport)->download('report.xlsx');
    }
}
