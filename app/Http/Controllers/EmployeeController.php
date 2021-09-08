<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\EmployeeRequest;
use App\Models\Employee;
use App\Models\Department; 

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       
        $employees = Employee::with('departments')->get();
        
        return view('employee.index')->with('employees', $employees);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $departments = Department::all();

        return view('employee.add')->with('departments',$departments);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EmployeeRequest $request)
    {
        

        $employee = Employee::create([
            'first_name'  => $request->first_name,
            'family_name' => $request->family_name,
            'middle_name' => $request->middle_name,
            'gender'      => $request->gender,
            'salary'      => $request->salary
        ]);

        $employee->departments()->attach($request->departments);  

        return redirect()->route('employees.create');    
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $employee = Employee::findOrFail($id); 
        return view('employee.edit')->with('employee',$employee)->with('departments',Department::all());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $employee = Employee::findOrFail($id);

        $employee->first_name   = $request->first_name;
        $employee->family_name  = $request->family_name;
        $employee->middle_name  = $request->middle_name;
        $employee->gender       = $request->gender;
        $employee->salary       = $request->salary;

        $employee->save();

        $employee->departments()->sync($request->departments);  

        return redirect()->route('employees.index');   
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Employee::findOrFail($id)->delete(); 
        
        return redirect()->route('employees.index');
    }
}
