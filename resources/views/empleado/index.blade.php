@extends('layouts.app')

@section('content')
    <div class="container">
        <a class="btn btn-success" href="{{ url('empleado/create') }}">Crear nuevo empleado</a>
        <br>
        @if (Session::has('mensaje'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <p>{{ Session::get('mensaje') }}</p>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <table>
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nombre </th>
                    <th>Apellido</th>
                    <th>Correo</th>
                    <th>Foto</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($empleados as $empleado)
                    <tr>
                        <td>{{ $empleado->id }}</td>
                        <td>{{ $empleado->Nombre }}</td>
                        <td>{{ $empleado->Apellido }}</td>
                        <td>{{ $empleado->Correo }}</td>
                        <td>
                            <img class="img-thumbnail img-fluid" src="{{ asset('storage') . '/' . $empleado->Foto }}"
                                alt="Foto del empleado" width="100px"><br><br>
                        </td>
                        <td>
                            <a class="btn btn-warning" href="{{ url('/empleado/' . $empleado->id . '/edit') }}">Editar</a>

                            <form class="d-inline" action="{{ url('/empleado/' . $empleado->id) }}" method="post">
                                @csrf
                                {{ method_field('DELETE') }}
                                <input class="btn btn-danger" type="submit" value="Borrar"
                                    onclick="return confirm('Estas seguro?')">
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {!! $empleados->links() !!}
    </div>
@endsection
