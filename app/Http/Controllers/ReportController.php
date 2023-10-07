<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Evento;
use Carbon\Carbon;
use Dompdf\Dompdf;
use Dompdf\Options;

class ReportController extends Controller
{
    public function generarReporteDelDia()
    {
        // Obtén la fecha actual en formato UNIX timestamp para el inicio y fin del día
        $inicioDia = Carbon::now()->startOfDay()->timestamp;
        $finDia = Carbon::now()->endOfDay()->timestamp;

        $eventosDelDia = Evento::with('paquete') // Cargar la relación con Paquete
            ->whereBetween('unixtime', [$inicioDia, $finDia])
            ->get()
            ->map(function ($evento) {
                $estatusPaquete =
                    $evento->paquete->estatus === 'A' ? 'Activo' : 'Finalizado';

                return [
                    'id' => $evento->id,
                    'clave_rastreo' => $evento->paquete->clave_rastreo,
                    'numero_evento' => $evento->numero_evento,
                    'descripcion_evento' => $evento->descripcion_evento,
                    'localizacion_evento' => $evento->localizacion_evento,
                    'created_at' => $evento->created_at,
                    'estatus_paquete' => $estatusPaquete, // Agregar el estatus del paquete
                ];
            });
        $html = view('reportes.reportes', compact('eventosDelDia'));

        // $pdf = PDF::loadView('reportes.reportes', $eventosDelDia);

        // Configura las opciones de Dompdf
        $options = new Options();
        $options->set('isHtml5ParserEnabled', true);
        $options->set('isPhpEnabled', true);

        // Crea una instancia de Dompdf
        $dompdf = new Dompdf($options);

        // Carga el HTML en Dompdf
        $dompdf->loadHtml($html);

        // Establece el tamaño y orientación del papel
        $dompdf->setPaper('A4', 'portrait');

        // Renderiza el PDF
        $dompdf->render();

        // Descarga el PDF con un nombre específico
        return $dompdf->stream(
            'reporte_del_dia_' . now()->format('Y-m-d') . '.pdf'
        );
    }
}
