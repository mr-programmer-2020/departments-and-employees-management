<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\HTTP\Requests\DepartmentRequest;
use App\Models\Department; 
use App\Models\Employee; 
use DB;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    
        //SELECT `departments`.`department_name`, MAX(`employees`.`salary`)
// FROM `employee_department`
// INNER JOIN employees
// ON `employee_department`.`employee_id` = `employees`.`id`
// INNER JOIN departments
// ON `employee_department`.`department_id` = `departments`.`id`
// GROUP BY `departments`.`department_name`
// ORDER BY MAX(`employees`.`salary`) DESC


        $results = DB::table('employee_department')
        ->select(DB::raw("`departments`.`department_name`, `departments`.`id`,
        MAX(`employees`.`salary`) as 'max_salary', 
        COUNT(`employees`.`id`) as 'count'"))
        ->join('employees', 'employee_department.employee_id', '=', 'employees.id')
        ->join('departments', 'employee_department.department_id', '=', 'departments.id')
        ->groupBy(['departments.department_name','departments.id'])
        ->orderByDesc('max_salary')
        ->get();


        return view('department.index',[
            'results'=>$results
        ]);
    }

    /**(select DeptId, max(salary) from Employee group by DeptId)
     * Show the form for creating a new resource. 
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('department.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DepartmentRequest $request)
    {
        Department::create([
            'department_name' => $request->department_name
        ]);

        return redirect()->route('departments.create');
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
        $department = Department::findOrFail($id); 
        return view('department.edit')->with('department',$department);
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
        $department = Department::findOrFail($id);
        
        $department->department_name = $request->department_name;
        $department->save();

        return redirect()->route('departments.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        Department::findOrFail($id)->delete(); 
        
        return redirect()->route('departments.index');
    }
}
