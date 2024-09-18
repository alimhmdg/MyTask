<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\models\Employee;
class department extends Model
{
    use HasFactory;
    protected $fillable = [
        'id' , 
        'name' 
    ];
    
    public function Employers()
    {
        return $this->belongsToMany(Employee::class, 'Department_Id', 'id');
    }
}
