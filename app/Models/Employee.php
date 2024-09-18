<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\models\department;
class Employee extends Model
{
    use HasFactory;
    protected $fillable = [
        'first_name',
        'last_name' , 
        'salary' ,
        'image',
        'manger_id' , 
        'Department_Id'
    ];

    public function Departments():belongsTo
    {
        return $this->belongsTo(department::class ,'Department_Id' ,'id');
    }
}
