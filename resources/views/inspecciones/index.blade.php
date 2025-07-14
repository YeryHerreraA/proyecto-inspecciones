<!DOCTYPE html>
<html>
<head>
    <title>Inspecciones</title>
</head>
<body>
    <h1>Listado de inspecciones</h1>

    <a href="{{ route('inspecciones.create') }}">+ Nueva inspección</a>

    <table border="1" cellpadding="5">
        <thead>
            <tr>
                <th>ID</th>
                <th>Área</th>
                <th>Fecha</th>
                <th>Tipo</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($inspecciones as $inspeccion)
            <tr>
                <td>{{ $inspeccion->id }}</td>
                <td>{{ $inspeccion->area }}</td>
                <td>{{ $inspeccion->fecha }}</td>
                <td>{{ $inspeccion->tipo }}</td>
                <td>
                    <a href="{{ route('inspecciones.show', $inspeccion->id) }}">Ver</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
