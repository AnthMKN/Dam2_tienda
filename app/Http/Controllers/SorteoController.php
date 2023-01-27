<?php

namespace App\Http\Controllers;

use App\Models\Grupo;
use Error;
use Exception;
use Illuminate\Http\Request;
use function PHPUnit\Framework\isNull;

class SorteoController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function sortear(Request $request, $grupoid)
    {
        $this->sorteo($grupoid);
        return back();
    }

    public function anularsorteo(Request $request, $grupoid)
    {
        $grupo = Grupo::find($grupoid);
        $grupo->estado = 0;
        $grupo->save();
        foreach ($grupo->participantes as $amigo) {
            $grupo->participantes()->updateExistingPivot($amigo->id, ['amigo_id' => null]);
        }
        return back();
    }

    public function sorteo($grupoid)
    {
        $grupo = Grupo::find($grupoid);
        $listaamigos = [];
        if ($grupo->participantes->count() > 2) {
            foreach ($grupo->participantes as $amigo) {
                $listaamigos[] = $amigo->id;
            }

            $listainvisibles = $listaamigos;
            $asignados = [];
            $i = 0;
            while ($i < count($listaamigos)) {
// array_rand devuelve una **key** aleatoria
                $amiguito = array_rand($listainvisibles);

// Revisa que no le haya tocado él mismo
                if ($listainvisibles[$amiguito] != $listaamigos[$i]) {
                    $i++;
                    $asignados[] = $listainvisibles[$amiguito];
                    unset($listainvisibles[$amiguito]);
                } else {
// Caso especial en el que al último le toca él mismo, empieza de nuevo el proceso
                    if ($i == count($listaamigos) - 1) {
                        $i=0;
                        $asignados = [];
                        $listainvisibles = $listaamigos;
                    }
                }
            }

            for ($i = 0; $i < count($listaamigos); $i++) {
                $grupo->participantes()->updateExistingPivot($listaamigos[$i], ['amigo_id' => $asignados[$i]]);
            }
            $grupo->estado = 1;
            $grupo->fechasorteoreal = now();
            $grupo->save();
        } else {
            session(['status' => "Debe haber al menos 3 amigos en el grupo"]);
        }
    }

}
