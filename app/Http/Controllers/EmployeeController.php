<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\EmployeeExport;
use Barryvdh\DomPDF\Facade\PDF;
use Illuminate\Http\Request;

// use exportexcel;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
        $data = Employee::all();
        
        view()->share ('data', $data);
        $pdf = PDF::loadview('tes');

        return $pdf-> download('data.pdf');
		
	}
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Employee $employee)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Employee $employee)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Employee $employee)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Employee $employee)
    {
        //
    }
    
    public function exportexcel(){
        return Excel::download(new EmployeeExport,'index.xlsx');
        
    }
}
