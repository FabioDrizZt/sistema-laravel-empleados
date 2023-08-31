@extends('layouts.app')

@section('content')
    <div class="container">
        <form action="{{ url('/empleado/' . $empleado->id) }}" method="post" enctype="multipart/form-data">
            {{ method_field('PUT') }}
            @include('empleado.form', ['accion' => 'Editar'])
        </form>
    </div>
@endsection
