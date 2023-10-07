<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Evento;
use App\Models\Paquete;
use Illuminate\Support\Facades\DB;
use App\Models\EventoPredeterminado;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Mail;
use App\Mail\DemoEmail;
class eventosController extends Controller
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
            'eventos' => 'required',
            'estSal' => 'required',
            'MunSal__' => 'required',
            'idPaquete' => 'required',
            'clave_rastreo' => 'required',
            'correo' => 'required',
        ];
        $messages = [
            'MunSal__.required' => 'SE REQUIERE EL MUNICIPIO',
            'estSal.required' => 'SE REQUIERE EL ESTADO',
            'eventos.required' => 'SE REQUIERE EL ESTATUS',
        ];
        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()) {
            $errors = $validator->errors();
            return redirect()
                ->back()
                ->with('ERROR', $errors);
        }

        try {
            if ($request->eventos == 00) {
                $errors = $validator->errors();
                return redirect()
                    ->back()
                    ->with('ERROR', 'Se requiere un estatus diferente');
            }
            DB::beginTransaction();
            $correo = new \stdClass();
            $evento = new Evento();
            $evento->numero_evento = $request->eventos;
            $evento->idpaquete = $request->idPaquete;
            $evento->localizacion_evento =
                $request->munSal__ . ', ' . $request->estSal;
            $evento->descripcion_evento = EventoPredeterminado::where(
                'id',
                $request->eventos
            )->first()->nombre_evento;

            // Obtener el unixtime actual
            $evento->unixtime = time();
            $correo->mensaje = 'Su pedido ha actualizado su estatus';
            if ($request->eventos == 4) {
                Paquete::where('id', $request->idPaquete)->update([
                    'estatus' => 'F',
                ]);
                $evento->localizacion_evento = $request->domicilio__;
                $correo->mensaje =
                    'Su pedido esta listo para recoger en: ' +
                    $request->domicilio__;
            }
            // Guardar el evento en la base de datos
            $evento->save();

            $correo->pedido = $request->clave_rastreo;
            // Construir la URL usando la ruta y clave de rastreo
            $url = URL::route('showSeguimiento', [
                'id' => $request->clave_rastreo,
            ]);
            $correo->link = $url;
            Mail::to($request->correo)->send(new DemoEmail($correo));
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()
                ->back()
                ->with('ERROR', $e);
        }
        return redirect()
            ->back()
            ->with('success', 'Se actualizo el estatus correctamente');
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
