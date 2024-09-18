<?php

namespace App\Http\Controllers;

use App\Models\department_employees;
use App\Models\Employee;
use App\Models\department;
use Illuminate\Http\Request;

class DepartmentEmployeesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    
    {

        $employees = employee::all();
        $departments = department::all();
        //

        return view('Departments.departmentEmployee' , compact(['employees' , 'departments']));
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
    public function show(department_employees $department_employees)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(department_employees $department_employees)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, department_employees $department_employees)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(department_employees $department_employees)
    {
        //
    }
}
