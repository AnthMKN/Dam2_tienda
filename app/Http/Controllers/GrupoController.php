<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreGrupoRequest;
use App\Models\Grupo;
use Illuminate\Http\Request;

class GrupoController extends Controller
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
        $valores = [];
        if (strlen(old("importe")) == 0) {
            $valores["importe"] = 10;
        }else{
            $valores["importe"] = old("importe");
         }
        if (strlen(old("fechasorteo")) == 0) {
            $valores["fechasorteo"] = date("Y-m-d");
        }else{
            $valores["fechasorteo"] = old("fechasorteo");
        }
        if (strlen(old("fechaentregaregalos")) == 0) {
            $valores["fechaentregaregalos"] =  date("Y-m-d");
        } else {
            $valores["fechaentregaregalos"] = old("fechaentregaregalos");
        }
        return view("grupos.crear", ["valores" => $valores]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreGrupoRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreGrupoRequest $request)
    {
        //
        $grupo = Grupo::create([
            "name" => $request->name,
            "importe" => $request->importe,
            "fechasorteo" => $request->fechasorteo,
            "fechaentregaregalos" => $request->fechaentregaregalos,
            "comentario" => $request->comentario,
            "codigoacceso" => fake()->bothify('?????????'),
            "propietario_id" => auth()->user()->id,
            "estado" => 0,
        ]);

        $grupo->participantes()->attach(auth()->user()->id);
        return redirect("home");
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
        return view("grupos.mostrar", ["grupo" => Grupo::find($id)]);
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
        $grupo = Grupo::find($id);
        return view("grupos.editar",["grupo" => $grupo]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreGrupoRequest $request, $id)
    {
        //
        $grupo = Grupo::find($id);

        $grupo->name = $request->name;
        $grupo->importe = $request->importe;
        $grupo->fechasorteo = $request->fechasorteo;
        $grupo->fechaentregaregalos = $request->fechaentregaregalos;
        $grupo->comentario = $request->comentario;
        $grupo->save();

        return redirect("home");
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
        $grupo = Grupo::find($id);
        $grupo->delete();
        return redirect("home");
    }
}
