<?php

namespace App\Http\Controllers;

use App\Models\department;
use App\Models\Employee;

use App\models\department_employees;

use Illuminate\Http\Request;
use DataTables;
class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('Departments.department');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function displaydt(Request $request){

        $departments = department::all();

        if ($request->ajax())
        {
              
            return DataTables::of($departments)->addIndexColumn()->addColumn('action', function($row){
                $btn = "
                <a class='modal-effect btn btn-sm btn-info' data-effect='effect-scale'
                                                data-id='".$row->id."'
                                                data-name='".$row->name."'
                                                
                                                data-toggle='modal'
                                                href='#exampleModal2' title='edit'><i class='las la-pen'></i></a>
                                        
                                                 
                                                <a class='modal-effect btn btn-sm btn-danger' 
                                                data-effect='effect-scale'
                                                data-id='".$row->id."'
                                                data-name='".$row->name."'
                                                
                                                data-sn =''
                                                data-toggle='modal'
                                                href='#modaldemo9' title='delete'><i class='las la-trash'></i></a>  
 ";
                return $btn;

        })->addColumn('NoEmployees' , function($row){
            $employers_count = Employee::where(['Department_Id'=>$row->id])->get()->count();
            return ''.$employers_count;
        })->addColumn('TotalSalary' , function($row){
         $employers_count = Employee::where(['Department_Id'=>$row->id])->sum('salary');
         return ''.$employers_count;
        
        })->rawColumns(['TotalSalary','NoEmployees' , 'action'])->make(true);
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
            'name' =>'required'
        ]);

        department::create([
            'name'=>$request->name,
        ]);

        return response()->json(['success'=>'Successfully added']);

        //
    }

    /**
     * Display the specified resource.
     */
    public function show(department $department)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(department $department)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        //
        $validated = $request->validate([
            'name' =>'required'
        ]);
        $department = department::findOrFail($request->input('id'));
        $department->update([
            'name'=>$request->name,
        ]);

        return response()->json(['success'=>'Successfully Updated']);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        
        $id = $request->input('id');
           
        $ch =  Employee::where(['Department_Id'=>$id])->first();
        
      //  return response()->json(['success'=>$ch]);
        if ($ch) {
            return response()->json(['success'=>'cant delete department have employees']);   
        }
        department::find($id)->delete();
        return response()->json(['success'=>'Successfully Deleted']);        //
    }
}
