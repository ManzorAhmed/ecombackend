<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Jobs\ImportCsvData;
use App\Models\CsvData;
use App\Services\CsvImportService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CsvController extends Controller
{
    protected $csvImportService;

    public function __construct(CsvImportService $csvImportService)
    {
        $this->csvImportService = $csvImportService;
    }

    public function index()
    {
        $csv = CsvData::all();
        return view('admin.csv.index', ['title' => 'Registered Article List', 'csv' => $csv]);
    }
    public function create()
    {
        return view('admin.csv.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'csv_file' => 'required|file|mimes:csv,xlsx,xls',
        ]);

        $filePath = $request->file('csv_file')->store('public/uploads/CSV');

        ImportCsvData::dispatch(storage_path('app/' . $filePath));
        Session::flash('success_message', 'CSV data import has been queued successfully.');

        return redirect()->back();

    }




}
