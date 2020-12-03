<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clientes=Cliente::all();
        return $clientes;
    }

    public function indexAll()
    {
        $clientes=Cliente::with('citas')->get();
        return $clientes;
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
        $input=$request->all();
        $input['password']=bcrypt($input['password']);

        $rules=[
            'nombre' => 'required',
            'email' => 'required',
            'password' => 'required'
        ];

        $messajes=[
            'nombre.required' => 'El nombre es obligatorio',
            'email.required' => 'El email es obligatorio',
            'password.required' => 'El password es obligatorio'
        ];

        $validator = Validator::make($input,$rules,$messajes);

        if ($validator->fails()) {
            return response()->json([$validator->errors()],400);
        }else{
            $cliente=Cliente::create($input);
            return $cliente;
        }
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if(Auth::attempt(['email'=> $credentials['email'], 'password' => $credentials['password']])){
            return response()->json(['message'=>'Correcto'],200);
        }else{
            return response()->json(['error'=>'No autenticado'],403);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function show(Cliente $cliente)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cliente  $cliente
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
     * @param  \App\Models\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cliente $cliente)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cliente $cliente)
    {
        //
    }
}
