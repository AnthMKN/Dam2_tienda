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
    public function store(Request $request)
    {
        session_start();

        session(['pedido' => $request->]);
    }
    public function show($id)
    {
       
    }
    public function edit($id)
    {
        
    }
    public function update(Request $request, $id)
    {
        session(['pedido' => $pedido->id]);
    }
    public function destroy($id)
    {
        session()->forget(['pedido']);
    }

}
