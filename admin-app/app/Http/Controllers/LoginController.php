<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LoginController extends Controller
{
    public function index(){
        //1. Using raw sql queries
        //$users=DB::select('select * from users');
        //dd($users);
        //2. Query Builder
        //$users=DB::table('users')->select(['name','email'])->whereNotNull('email')->orderby('name')->get();
       // dd($users);
        //3. Eloquent ORM
            //$students=Student::all();
            //dd($students);
            //foreach($students as $student){
            //    echo $student->name."<br>";
            //}
            $student=new Student();
            $student->name="New";
            $student->email="email@email.com";
            $student->save();

        //return view('login');
    }
}
