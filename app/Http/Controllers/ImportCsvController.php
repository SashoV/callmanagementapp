<?php

namespace App\Http\Controllers;

use App\Imports\CallImport;
use App\Http\Requests\ImportFileRequest;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ImportCsvController extends Controller
{

    public function index()
    {
        return view('fileImport');
    }


    public function csvImport(ImportFileRequest $request)
    {
        try {
            Excel::import(new CallImport, $request->csv_file);
            return redirect()->route('home')->withSuccess('File Imported!');
        } catch (\Throwable $th) {
            return redirect()->back()->withErrors(['internalError' => 'An error occurred, try again!']);
        }
    }
}
