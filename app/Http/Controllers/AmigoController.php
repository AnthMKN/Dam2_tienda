<?php

namespace App\Http\Controllers;

use App\Models\Grupo;
use Illuminate\Http\Request;
use function PHPUnit\Framework\isNull;

class AmigoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view("grupos.unirse");
    }

    /**
     * Store a newly created resource in storage.
     *
     * Añade al usuario a un grupo si el código de acceso es correcto y no se ha sorteado todavía
     * Y previamente no estaba formando parte de él
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $id = auth()->user()->id;

        $grupo = Grupo::where("codigoacceso","=",$request->codigoacceso)->first();


        //Si el grupo no existe
        if (!($grupo)) {
            return redirect("home")->with(["status" => "No existe un grupo con ese codigo"]);
        }

        if ((!$grupo->participantes()->where('user_id', $id)->exists()) && ($grupo->estado == 0)){
            $grupo->participantes()->attach($id);
            return redirect("home");
        }
        return redirect("home")->with(["status" => "Problemas al unirse, probablemente ya estabas o el grupo ya se ha sorteado"]);


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
