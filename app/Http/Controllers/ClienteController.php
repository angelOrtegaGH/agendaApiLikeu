<?php

namespace App\Http\Controllers;

use App\Cliente;
use Dotenv\Validator;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\Print_;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cliente = Cliente::all();
        return  $cliente;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        //$clientes = Cliente::create($request->all());

        $rules = [
            "cedula" => "unique:clientes|required|max:15",
            "nombres" => "required|max:70",
            "fechaNacimiento" => "required"
        ];

        $validator = \Validator::make($request->all(), $rules);
        if ($validator->fails()){
            return [
                "created" => "Error al guardar los datos",
                "errors" => $validator->errors()->all()
            ];
        }else {
            return ["created" => "Datos almacenados correctamente" , $clientes = Cliente::create($request->all())];
        }


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function show(Cliente $cliente)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function edit(Cliente $cliente)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cliente $cliente)
    {
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cliente $cliente)
    {
        //
    }
}
