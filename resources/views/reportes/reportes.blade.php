<!DOCTYPE html>
<html>
<head>
    <title>Reporte del Día</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 10px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h1>Reporte del Día - {{ now()->format('Y-m-d') }}</h1>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Clave Rastreo</th>
                <th>Número de Evento</th>
                <th>Descripción de Evento</th>
                <th>Localización de Evento</th>
                <th>Fecha</th>
                <th>Estatus del Paquete</th>
            </tr>
        </thead>
        <tbody>
            @foreach($eventosDelDia as $evento)
                <tr>
                    <td>{{ $evento['id'] }}</td>
                    <td>{{ $evento['clave_rastreo'] }}</td>
                    <td>{{ $evento['numero_evento'] }}</td>
                    <td>{{ $evento['descripcion_evento'] }}</td>
                    <td>{{ $evento['localizacion_evento'] }}</td>
                    <td>{{ $evento['created_at'] }}</td>
                    <td>{{ $evento['estatus_paquete'] }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

</body>
</html>
