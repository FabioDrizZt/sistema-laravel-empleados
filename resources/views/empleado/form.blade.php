@csrf
<label for="Nombre">Nombre:</label>
<input type="text" name="Nombre" id="Nombre" value="{{ isset($empleado->Nombre) ? $empleado->Nombre : '' }}">
<br>
<label for="Apellido">Apellido:</label>
<input type="text" name="Apellido" id="Apellido" value="{{ isset($empleado->Apellido) ? $empleado->Apellido : '' }}">
<br>
<label for="Correo">Correo:</label>
<input type="email" name="Correo" id="Correo" value="{{ isset($empleado->Correo) ? $empleado->Correo : '' }}">
<br>
<label for="Foto">Foto:</label>
@if (isset($empleado->Foto))
    <img src="{{ asset('storage') . '/' . $empleado->Foto }}" alt="" width="100px"><br><br>
@endif
<input type="file" name="Foto" id="Foto">
<br>
<input type="submit" value="Enviar">
