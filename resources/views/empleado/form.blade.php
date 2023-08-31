@if (count($errors) > 0)
    <div class="alert alert-danger" role="alert">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
@csrf
<div class="form-group">
    <label for="Nombre" class="form-label">Nombre:</label>
    <input class="form-control" type="text" name="Nombre" id="Nombre"
        value="{{ isset($empleado->Nombre) ? $empleado->Nombre : old('Nombre') }}">
</div>
<div class="form-group">
    <label class="form-label" for="Apellido">Apellido:</label>
    <input class="form-control" type="text" name="Apellido" id="Apellido"
        value="{{ isset($empleado->Apellido) ? $empleado->Apellido : old('Apellido') }}">
</div>
<div class="form-group">
    <label class="form-label" for="Correo">Correo:</label>
    <input class="form-control" type="email" name="Correo" id="Correo"
        value="{{ isset($empleado->Correo) ? $empleado->Correo : old('Correo') }}">
</div>
<div class="form-group">
    <label class="form-label" for="Foto">Foto:</label>
    @if (isset($empleado->Foto))
        <img class="img-thumbnail img-fluid" src="{{ asset('storage') . '/' . $empleado->Foto }}" alt=""
            width="100px"><br><br>
    @endif
    <input class="form-control" type="file" name="Foto" id="Foto">
</div>
<br>
<a class="btn btn-primary" href="{{ url('empleado') }}">Regresar</a>
<input class="btn btn-success" type="submit" value="{{ $accion }} empleado">
