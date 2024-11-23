<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\View\View;

class UserController extends Controller
{
    //
    public function tampil(): String
    {
        return "contoh";
    }
    public function show(String $id){
        $data = Task::find($id);
        return view('profil',['dataku'=>$data,'data2'=>10]);
    }
}
