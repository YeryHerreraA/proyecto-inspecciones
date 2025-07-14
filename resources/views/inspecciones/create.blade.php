<!DOCTYPE html>
<html>
<head>
    <title>Nueva Inspección</title>
</head>
<body>
    <h1>Registrar nueva inspección</h1>

    <form action="{{ route('inspecciones.store') }}" method="POST">
        @csrf
        <label>Área:</label><br>
        <input type="text" name="area" required><br><br>

        <label>Fecha:</label><br>
        <input type="date" name="fecha" required><br><br>

        <label>Tipo:</label><br>
        <input type="text" name="tipo" placeholder="Ventilación, Geomecánica, etc." required><br><br>

        <label>Observaciones:</label><br>
        <textarea name="observaciones"></textarea><br><br>

        <button type="submit">Guardar</button>
    </form>

    <a href="{{ route('inspecciones.index') }}">Volver al listado</a>
</body>
</html>
