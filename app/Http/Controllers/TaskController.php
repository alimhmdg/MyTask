<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use App\Models\Employee;
use App\Models\Employee_Task;
use DataTables;
class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $id = Auth::user()->id;        
        $employees = Employee::where(['manger_id'=>$id])->get();
        return view('Tasks.task' , compact('employees'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function displaydt(Request $request){

        
        $data = [];
        $id = Auth::user()->id;  
       $tasks =  Employee_Task::all();
       foreach($tasks as $t){
        if($t->GetEmployee->manger_id==$id){
            array_push($data , $t);
        }
       }

       if ($request->ajax())
       {

        return DataTables::of($data)->addIndexColumn()
        ->addColumn('Employee',function($row){
            return ''.$row->GetEmployee->first_name.' '.$row->GetEmployee->last_name;
        }) ->addColumn('Task' , function ($row){
            return ''.$row->GetTask->name;  })->addColumn('status' , function ($row){
         return ''.$row->GetTask->status;
          })->rawColumns(['status','Task','Employee'])->make(true);
             
       }
      

       
    }
    public function create()
    {

        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       
        $validated = $request->validate([
            'name' => 'required' , 
            'EmployeeId'=>'required'
         ]);



         $task= Task::create([
            'name' =>$request->input('name') , 
            'status' => 'In-Progress' , 
         ]);

       

         Employee_Task::create([
            'Task_Id'=>$task->id , 
            'Employee_Id'=>$request->EmployeeId ,
         ]);

         return response()->json(['success'=>'Successfully added']);

       
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Task $task)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Task $task)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Task $task)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Task $task)
    {
        //
    }
}
