<?php

namespace App\Http\Controllers;

use App\Agenda;
use Illuminate\Http\Request;

class AgendaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $agenda = Agenda::all();
        return $agenda;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            "idCliente" => "required",
            "asunto" => "max:300",
            "estado" => "required|max:1",
        ];
        $validator = \Validator::make($request->all(), $rules);
        $respuesta = array();
        if ($validator->fails()){
            $respuesta = [
                    "created" => "false",
                    "message" => "Error al guardar los datos de la agenda",
                    "errors" => $validator->errors()->all()
                ];
        }else{
            $estado =strtoupper($request['estado']);
            if( $estado == 'P' || $estado == 'R' ||$estado == 'C' ||$estado == 'N' ) {
                $respuesta = [
                    "created" => "true",
                    "message" => "datos almacenados correctamente",
                    "data" => Agenda::create($request->all())
                ];
            }else {
                $respuesta = [
                    "created" => "false",
                    "message" => "Error al guardar los datos de la agenda, estado '{$request['estado']}' no valido"
                ];
            }
        }
        return $respuesta;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Agenda  $agenda
     * @return \Illuminate\Http\Response
     */
    public function show(Agenda $agenda)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Agenda  $agenda
     * @return \Illuminate\Http\Response
     */
    public function edit(Agenda $agenda)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Agenda  $agenda
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Agenda $agenda)
    {
        $rules = [
            "idCliente" => "required",
            "asunto" => "max:300",
            "estado" => "required|max:1",
        ];
        $validator = \Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            $respuesta = [
                "created" => "false",
                "message" => "Error al guardar los datos de la agenda",
                "errors" => $validator->errors()->all()
            ];
        }else{
            $agendaArray = Agenda::findOrFail($agenda)->first();
            $respuesta = array();
            if ($agendaArray != null) {
                $estado = strtoupper($request['estado']);
                if( $estado == 'P' || $estado == 'R' ||$estado == 'C' ||$estado == 'N' ) {
                    if (strtoupper($agendaArray['estado']) == 'P') {
                        $respuesta = ["message" => "Datos actualizados correctamente"];
                        $agendaArray->fill($request->all())->save();
                    } else {
                        $respuesta = ["message" => "error al actualizar los datos, el estado de la agenda es Programada y en este estado no se puede realizar el cambio"];
                    }
                }else {
                    $respuesta = [
                        "created" => "false",
                        "message" => "Error al guardar los datos de la agenda, estado '{$request['estado']}' no valido"
                    ];
                }
            } else {
                $respuesta = ["message" => "error al actualizar los datos", "array" => $request->all()];
            }
        }
        return $respuesta;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Agenda  $agenda
     * @return \Illuminate\Http\Response
     */
    public function destroy(Agenda $agenda)
    {
        //
    }
}
