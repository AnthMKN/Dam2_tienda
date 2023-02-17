<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SessionController extends Controller
{
    public function index()
    {
        
    }
    public function create()
    {
       
    }
    public function store($id)
    {
        session_start();

        session(['pedido' => $id]);
    }
    public function show($id)
    {

    }
    public function edit($id)
    {
        
    }
    public function update($id)
    {
        session(['pedido' => $id]);

        return redirect("home");
    }
    public function destroy($id)
    {
        session()->forget('pedido');
        
        return redirect("home");
    }

}
