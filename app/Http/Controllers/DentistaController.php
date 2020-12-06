<?php

namespace App\Http\Controllers;

use App\Models\Dentista;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class DentistaController extends Controller
{

    protected $guard = 'api-dentistas';

    //protected $table = 'dentistas';
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
            'email' => 'required|unique:App\Models\Dentista,email',
            'password' => 'required'
        ];

        $messages=[
            'nombre.required' => 'El nombre es obligatorio',
            'email.required' => 'El email es obligatorio',
            'password.required' => 'El password es obligatorio'
        ];

        $validator = Validator::make($input,$rules,$messages);

        if ($validator->fails()) {
            return response()->json([$validator->errors()],400);
        }else{
            $dentista=Dentista::create($input);
            return $dentista;
        }
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if(Auth::attempt(['email'=> $credentials['email'], 'password' => $credentials['password']])){
            $dentista = Auth::user();
            $token = $dentista->createToken('tokenClientes')->accessToken;

            $respuesta=[];
            $respuesta['name']= $dentista->nombre;
            $respuesta['token']= $token;
            
            return response()->json($respuesta,200);
        }else{
            return response()->json(['error'=>'No autenticado'],400);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Dentista  $dentista
     * @return \Illuminate\Http\Response
     */
    public function show(Dentista $dentista)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Dentista  $dentista
     * @return \Illuminate\Http\Response
     */
    public function edit(Dentista $dentista)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Dentista  $dentista
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Dentista $dentista)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Dentista  $dentista
     * @return \Illuminate\Http\Response
     */
    public function destroy(Dentista $dentista)
    {
        //
    }
}
