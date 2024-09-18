<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('users')->insert([
            //manger
            [
                'first_name' => "manger1" ,
                'last_name' => 'mang' ,
                'email' => 'manger@gmail.com' ,
                'password' => Hash::make('password'),
                'remember_token' => Str::random(10), 
                'email_verified_at' => now(),
                'role' => 'manger' 
            ] , 
            [
                'first_name' => "manger2" ,
                'last_name' => 'mang' ,
                'email' => 'manger2@gmail.com' ,
                'password' => Hash::make('password'),
                'remember_token' => Str::random(10), 
                'email_verified_at' => now(),
                'role' => 'manger' 
            ] ,[
                'first_name' => "manger3" ,
                'last_name' => 'mang' ,
                'email' => 'manger3@gmail.com' ,
                'password' => Hash::make('password'),
                'remember_token' => Str::random(10), 
                'email_verified_at' => now(),
                'role' => 'manger' 
            ] ,

             //employee
             [
                'first_name' => "employee1" ,
                'last_name' => 'emp' , 
                'email' => 'employee@gmail.com',
                'password' => Hash::make('password'), 
                'remember_token' => Str::random(10), 
                'email_verified_at' => now(),

                'role' => 'employee' 
            ]
        ]);
    }
}
