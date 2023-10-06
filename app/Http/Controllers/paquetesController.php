<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\paquete;
use App\models\Evento;
use App\models\EventoPredeterminado;
use Illuminate\Support\Facades\DB;
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
        $productos = paquete::all();
        $responsev = ['producto' => $productos];
        return view('admin.pri.paquetes.paquetes', $responsev);
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
            'correo_recibe' => 'required|email',
            'nombre_recibe' => 'required|max:255',
            'domicilio_recibe' => 'required|max:255',
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
            'correo_recibe.required' =>
                'SE REQUIERE EL CORREO ELECTRÓNICO DEL DESTINATARIO',
            'correo_recibe.email' => 'EL CORREO ELECTRÓNICO DEBE SER VÁLIDO',
            'nombre_recibe.required' =>
                'SE REQUIERE EL NOMBRE DEL DESTINATARIO',
            'nombre_recibe.max' =>
                'EL NOMBRE DEL DESTINATARIO EXCEDE EL LÍMITE DE CARACTERES',
            'domicilio_recibe.required' =>
                'SE REQUIERE EL DOMICILIO DEL DESTINATARIO',
            'domicilio_recibe.max' =>
                'EL DOMICILIO DEL DESTINATARIO EXCEDE EL LÍMITE DE CARACTERES',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            $errors = $validator->errors();
            return redirect()
                ->back()
                ->with('ERROR', $errors);
        }
        try {
            DB::beginTransaction();

            $clave_rastreo = $this->generadorClaves($request->descripcion);
            $paq = new paquete();
            $paq->descripcion = $request->descripcion;
            $paq->clave_rastreo = $clave_rastreo;
            $paq->largo_cm = $request->largo_cm;
            $paq->ancho_cm = $request->ancho_cm;
            $paq->altura_cm = $request->altura_cm;
            $paq->estatus = 'A';
            // Completa la información para la columna "ciudad"
            $paq->ciudad = $request->MunSal . ',' . $request->estSal;

            // Completa la información para las nuevas columnas
            $paq->correo_recibe = $request->correo_recibe;
            $paq->nombre_recibe = $request->nombre_recibe;
            $paq->domicilio_recibe = $request->domicilio_recibe;
            $paq->save();

            $paqueteID = $paq->id;

            // Crear un nuevo evento asociado al paquete
            $evento = new Evento();
            $evento->idpaquete = $paqueteID;
            $evento->numero_evento = 1; // Por defecto 1
            $evento->unixtime = time(); // Tiempo actual UNIX
            $evento->descripcion_evento = EventoPredeterminado::find(
                1
            )->nombre_evento; // Obtener la descripción del evento con ID 1
            // Si es posible, obtener la localización desde la petición
            $evento->localizacion_evento = $request->server('REMOTE_ADDR');
            $evento->save();

            // Confirmar la transacción
            DB::commit();
            return redirect()
                ->back()
                ->with('success', 'Se creo el registro exitosamente');
        } catch (\Exception $e) {
            // Si algo falla, hacer un rollback de la transacción
            DB::rollback();
            return redirect()
                ->back()
                ->with('ERROR', $e);
        }
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
        // Eliminar espacios en blanco y obtener los primeros 3 caracteres en mayúsculas
        $primerosTresCaracteres = strtoupper(
            substr(str_replace(' ', '', $inputString), 0, 3)
        );

        // Obtener el unixtime actual
        $unixtimeActual = time();

        // Concatenar los primeros 3 caracteres con el unixtime
        $codigoGenerado = $primerosTresCaracteres . $unixtimeActual;

        return $codigoGenerado;
    }
}
