<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\models\department;
use DataTables;
class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $id = Auth::user()->id;        
        $departments  = department::all();
      //  $employes = Employee::where(['manger_id'=>$id])->get();

        
        return view('Employees.Employee' ,compact('departments'));
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

    {        //

        $validated = $request->validate([
            'first_name'=>'required' , 
            'last_name'=>'required' , 
            'salary'=>'required' , 
            'image'=>'required|image|mimes:jpeg,png,jpg,gif'
        ]);

        $imageName = time().'.'.$request->image->extension();
        $request->image->move(public_path('images'), $imageName);

        $employee = new Employee();
        $employee->first_name = $request->first_name;
        $employee->last_name = $request->last_name;
        $employee->salary = $request->salary;
        $employee->image = 'images/'.$imageName;
        $employee->Department_Id = $request->DepartmentId;
        $employee->manger_id = Auth::user()->id;
    
    //    return json_encode($employee);
       $employee->save();
       return response()->json(['success'=>'Successfully added']);
     
    }


    public function displaydt(Request $request){
        
        $id = Auth::user()->id;   
        $name = Auth::user()->first_name;  
      //  return $name;
       // return $name; 
        $employes = Employee::where(['manger_id'=>$id]);
      //  return (json_encode($employes));
        if ($request->ajax())
        {
              
            return DataTables::of($employes)->addIndexColumn()->addColumn('action', function($row){
                $btn = "
                <a class='modal-effect btn btn-sm btn-info' data-effect='effect-scale'
                                                data-id='".$row->id."'
                                                data-first_name='".$row->first_name."'
                                                data-last_name='".$row->last_name."'
                                                data-salary='".$row->salary."'
                                                data-image='".$row->image."'
                                                 data-department='".$row->DepartmentId."'
                                               
                                                
                                                
                                                data-toggle='modal'
                                                href='#exampleModal2' title='edit'><i class='las la-pen'></i></a>
                                        
                                                 
                                                <a class='modal-effect btn btn-sm btn-danger' 
                                                data-effect='effect-scale'
                                                data-id='".$row->id."'
                                                data-first_name='".$row->first_name."'
                                                data-last_name='".$row->last_name."'
                                                
                                                data-sn =''
                                                data-toggle='modal'
                                                href='#modaldemo9' title='delete'><i class='las la-trash'></i></a>  
 ";
                return $btn;

        })->addColumn('mangername',$name)->addColumn('department',function($row){
            return ''.$row->Departments->name;
        })->addColumn('fullname' , function ($row){
            return ''.$row->first_name.' '.$row->last_name;
        })->rawColumns(['department','fullname','action','mangername'])->make(true);
        }
       
    }

    /**
     * Display the specified resource.
     */

    public function show(Employee $employee)
    {

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
    public function update(Request $request)
    {

        $validated = $request->validate([
            'first_name'=>'required' , 
            'last_name'=>'required' , 
            'salary'=>'required' , 
            'image'=>'required|image|mimes:jpeg,png,jpg,gif'
        ]);
      $employee = Employee::findOrFail($request->input('id'));
      $employee->update([
        'first_name' => $request->input('first_name') , 
        'last_name' => $request->input('last_name') , 
        'salary' => $request->input('salary') , 
        'image' => $request->input('image') , 
        
      ]);

      
      return response()->json(['success'=>'Successfully updated']);
    

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        //

        $id = $request->input('id');
        Employee::find($id)->delete();
        return response()->json(['success'=>'Successfully Deleted']);
    }
}
