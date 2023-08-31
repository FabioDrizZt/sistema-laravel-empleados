Formulario de edición del empleado

<form action="{{ url('/empleado/' . $empleado->id) }}" method="post" enctype="multipart/form-data">
    {{ method_field('PUT') }}
    @include('empleado.form')
</form>
