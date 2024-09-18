<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\Task;
use App\Models\Employee;
class Employee_Task extends Model
{
    
    use HasFactory;

    protected $fillable = [
        'Employee_Id' , 
        'Task_Id' 
    ];
    public function GetTask(): BelongsTo
    {
        return $this->belongsTo(Task::class, 'Task_Id', 'id');
    }
    public function GetEmployee(): BelongsTo
    {
        return $this->belongsTo(Employee::class, 'Employee_Id', 'id');
    }
}
