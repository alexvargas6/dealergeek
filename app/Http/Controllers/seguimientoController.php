<?php

namespace App\Http\Controllers;
use App\models\paquete;
use App\models\Evento;
use App\models\EventoPredeterminado;
use Illuminate\Http\Request;

class seguimientoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('componente.seguimiento');
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
        $eventosPredeterminados = [1, 2, 3, 4];
        if ($request->id === null) {
            return redirect()
                ->back()
                ->with('ERROR', 'No se encontró la clave de rastreo');
        }

        $paquete = Paquete::where('clave_rastreo', $request->id)->first();
        if ($paquete == null) {
            return redirect()
                ->back()
                ->with('ERROR', 'No se encontró la clave de rastreo');
        }

        $eventosPred = EventoPredeterminado::whereIn(
            'id',
            $eventosPredeterminados
        )->get();
        if ($eventosPred->isEmpty()) {
            return redirect()
                ->back()
                ->with('ERROR', 'No se encontraron eventos predeterminados');
        }

        $evento = Evento::where('idpaquete', $paquete->id)
            ->orderBy('unixtime', 'desc')
            ->get();

        if ($evento == null) {
            return redirect()
                ->back()
                ->with('ERROR', 'No se encontraron eventos para este paquete');
        }

        return view('componente.seguimiento', [
            'paquete' => $paquete,
            'evento' => $evento,
            'eventosPred' => $eventosPred,
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $eventosPredeterminados = [1, 2, 3, 4];
        if ($id === null) {
            return redirect()->route('principal'); // Redirecciona a la ruta con nombre "principal"
        }
        $paquete = Paquete::where('clave_rastreo', $id)->first();
        if ($paquete == null) {
            return redirect()->route('principal');
        }

        $eventosPred = EventoPredeterminado::whereIn(
            'id',
            $eventosPredeterminados
        )->get();
        if ($eventosPred->isEmpty()) {
            return redirect()->route('principal');
        }

        $evento = Evento::where('idpaquete', $paquete->id)
            ->orderBy('unixtime', 'desc')
            ->get();

        if ($evento == null) {
            return redirect()->route('principal');
        }
        $paquete = Paquete::where('clave_rastreo', $id)->first();
        return view('componente.seguimiento', [
            'paquete' => $paquete,
            'evento' => $evento,
            'eventosPred' => $eventosPred,
        ]);
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

    public function ultimoEvento($id)
    {
        $eventosPredeterminados = [1, 2, 3, 4];
        $eventosPred = EventoPredeterminado::whereIn(
            'id',
            $eventosPredeterminados
        )->get();

        $ultimoEvento = Evento::where('idpaquete', $id)
            ->orderBy('unixtime', 'desc')
            ->select('numero_evento')
            ->first();

        // Crear un array asociativo con los resultados
        $response = [
            'eventosPredeterminados' => $eventosPred,
            'ultimoEvento' => $ultimoEvento,
        ];

        return response()->json($response);
    }
}
