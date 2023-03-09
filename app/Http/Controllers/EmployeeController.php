<?php

namespace App\Http\Controllers;

use App\Http\Requests\EmployeeRequest;
use Illuminate\Support\Facades\Auth;
use App\Models\Employee;
use Illuminate\Http\Request;
use App\Models\Branch;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $employees=Employee::all();

        if(Auth::user()->role == 'Branch Manager')
        {
            $employees = Employee::where('branch_id',Auth::user()->branch_id)->get();
        }
        else{
            $employees = Employee::all();
        }

        // dd($employees);
        return view('employee.index')->with(['employees' => $employees]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('employee.create')->with(['branches' => Branch::all()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EmployeeRequest $request)
    {
        //
        if(Employee::create($request->except('_token'))){
            return redirect()->route('employee.index');
        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Employee $employee)
    {
        //
        return view('employee.view')->with(['employee' => $employee]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Employee $employee)
    {
        //
        return view('employee.edit')->with(['employee' => $employee, 'branches' => Branch::all()]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EmployeeRequest $request, Employee $employee)
    {
        //
        // DB::table('employees')->insert($request->except('_token'));

        // db method
        // DB::table('employees')->select('employees.*','branches.branch_name')
        //         ->join('branches','branches.id','=','employees.branch_id')
        //         ->where('employees.id','=',$id)
        //         ->get();

        // model method
        // Employee::select('employees.*','branches.branch_name')
        //             ->join('branches','branches.id','=','employees.branch_id')
        //             ->where('employees.id','=',$id)
        //             ->get();

        if($employee->update($request->all())){
            return redirect()->route('employee.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $employee=Employee::find($id);
        $employee->delete();
        return redirect()->route('employee.index');
    }
}
