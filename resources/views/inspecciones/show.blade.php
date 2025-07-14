<!DOCTYPE html>
<html>
<head>
    <title>Inspección #{{ $inspeccion->id }}</title>
</head>
<body>
    <h1>Detalle de Inspección</h1>

    <p><strong>Área:</strong> {{ $inspeccion->area }}</p>
    <p><strong>Fecha:</strong> {{ $inspeccion->fecha }}</p>
    <p><strong>Tipo:</strong> {{ $inspeccion->tipo }}</p>
    <p><strong>Observaciones:</strong> {{ $inspeccion->observaciones }}</p>

    <hr>

    <h2>Agregar condición o acto subestándar</h2>

    <form action="{{ route('condiciones.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="inspeccion_id" value="{{ $inspeccion->id }}">

        <label>Tipo:</label><br>
        <select name="tipo" required>
            <option value="Acto">Acto</option>
            <option value="Condición">Condición</option>
        </select><br><br>

        <label>Categoría:</label><br>
        <input type="text" name="categoria" placeholder="Ej: Ventilación, Sostenimiento..." required><br><br>

        <label>Descripción:</label><br>
        <textarea name="descripcion" required></textarea><br><br>

        <label>Criticidad:</label><br>
        <select name="criticidad" required>
            <option value="Bajo">Bajo</option>
            <option value="Medio">Medio</option>
            <option value="Alto">Alto</option>
            <option value="Crítico">Crítico</option>
        </select><br><br>

        <label>Evidencia (foto):</label><br>
        <input type="file" name="evidencia"><br><br>

        <button type="submit">Guardar condición</button>
    </form>

    <hr>

    <h2>Condiciones registradas</h2>
    <ul>
        @foreach ($inspeccion->condiciones as $condicion)
            <li>
                <strong>{{ $condicion->tipo }} - {{ $condicion->categoria }} ({{ $condicion->criticidad }})</strong><br>
                {{ $condicion->descripcion }}<br>
                @if($condicion->evidencia)
                    <img src="{{ asset('storage/' . $condicion->evidencia) }}" width="200">
                @endif
            </li>
            <hr>
        @endforeach
    </ul>

    <a href="{{ route('inspecciones.index') }}">← Volver al listado</a>
</body>
</html>
