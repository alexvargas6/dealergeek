<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\paquete;
use Validator;

class paquetesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.pri.paquetes.paquetes');
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
        $clave_rastreo = ''; // Declaración de variable y asignación de un valor de tipo cadena
        $rules = [
            'descripcion' => 'required|max:90',
            'largo_cm' => 'required|numeric|regex:/^\d+(\.\d{1,2})?$/',
            'ancho_cm' => 'required|numeric|regex:/^\d+(\.\d{1,2})?$/',
            'altura_cm' => 'required|numeric|regex:/^\d+(\.\d{1,2})?$/',
        ];

        $messages = [
            'descripcion.required' => 'SE REQUIERE LA DESCRIPCIÓN',
            'largo_cm.required' => 'SE REQUIERE EL LARGO (CM)',
            'ancho_cm.required' => 'SE REQUIERE EL ANCHO (CM)',
            'descripcion.max' =>
                'EXCEDISTE EL LIMITE DE CARACTERES DE LA DESCRIPCIÓN',
            'altura_cm.required' => 'SE REQUIERE LA ALTURA (CM)',
            'largo_cm.numeric' => 'EL LARGO DEBE SER UN VALOR NUMÉRICO',
            'ancho_cm.numeric' => 'EL ANCHO DEBE SER UN VALOR NUMÉRICO',
            'altura_cm.numeric' => 'LA ALTURA DEBE SER UN VALOR NUMÉRICO',
            'largo_cm.regex' =>
                'EL LARGO DEBE SER UN VALOR NUMÉRICO CON MÁXIMO 2 DECIMALES',
            'ancho_cm.regex' =>
                'EL ANCHO DEBE SER UN VALOR NUMÉRICO CON MÁXIMO 2 DECIMALES',
            'altura_cm.regex' =>
                'LA ALTURA DEBE SER UN VALOR NUMÉRICO CON MÁXIMO 2 DECIMALES',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            $errors = $validator->errors();
            return redirect()
                ->back()
                ->with('ERROR', $errors);
        }
        try {
            $clave_rastreo = $this->generadorClaves($request->descripcion);
            $paq = new paquete();
            $paq->descripcion = $request->descripcion;
            $paq->clave_rastreo = $clave_rastreo;
            $paq->largo_cm = $request->largo_cm;
            $paq->ancho_cm = $request->ancho_cm;
            $paq->altura_cm = $request->altura_cm;
            $paq->estatus = 'A';
            $paq->save();

            $paqueteID = $paq->id;
        } catch (\Exception $e) {
            return redirect()
                ->back()
                ->with('ERROR', $e);
        }
        return redirect()
            ->back()
            ->with('success', 'Se creo el registro exitosamente');
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

    private function generadorClaves($inputString)
    {
        // Eliminar espacios en blanco y obtener los primeros 3 caracteres
        $primerosTresCaracteres = substr(
            str_replace(' ', '', $inputString),
            0,
            3
        );

        // Obtener el unixtime actual
        $unixtimeActual = time();

        // Concatenar los primeros 3 caracteres con el unixtime
        $codigoGenerado = $primerosTresCaracteres . $unixtimeActual;

        return $codigoGenerado;
    }
}
