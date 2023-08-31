<?php

namespace App\Http\Controllers;

use App\Models\Empleado;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EmpleadoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $datos['empleados'] = Empleado::paginate(1);
        return view('empleado.index', $datos);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('empleado.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $datosEmpleado = request()->except('_token');
        $validacion = [
            'Nombre' => 'required|string|max:100',
            'Apellido' => 'required|string|max:100',
            'Correo' => 'required|email',
            'Foto' => 'required|max:10000|mimes:jpeg,png,jpg',
        ];
        $mensaje = [
            'required' => 'El :attribute es requerido',
            'Foto.required' => 'La foto es requerida',
        ];
        $this->validate($request, $validacion, $mensaje);
        if ($request->hasFile('Foto'))
            $datosEmpleado['Foto'] = $request->file('Foto')->store('uploads', 'public');
        Empleado::insert($datosEmpleado);
        return redirect('empleado')->with('mensaje', 'Empleado creado con exito');
    }

    /**
     * Display the specified resource.
     */
    public function show(Empleado $empleado)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $empleado = Empleado::findOrFail($id);
        return view('empleado.edit', compact('empleado'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Metodo para manejar un PATCH a empleado/{id_empleado}
        $datosEmpleado = Request()->except(['_token', '_method']);
        $validacion = [
            'Nombre' => 'required|string|max:100',
            'Apellido' => 'required|string|max:100',
            'Correo' => 'required|email',
        ];
        $mensaje = [
            'required' => 'El :attribute es requerido',
        ];
        if ($request->hasFile('Foto')) {
            $validacion['Foto'] = ['required|max:10000|mimes:jpeg,png,jpg'];
            $mensaje['Foto.required'] = ['La foto es requerida'];
        }
        $this->validate($request, $validacion, $mensaje);

        if ($request->hasFile('Foto')) {
            $empleado = Empleado::findOrFail($id);
            Storage::delete('public/' . $empleado->Foto);
            $datosEmpleado['Foto'] = $request->file('Foto')->store('uploads', 'public');
        }
        Empleado::where('id', '=', $id)->update($datosEmpleado);
        $empleado = Empleado::findOrFail($id);
        return redirect('empleado')->with('mensaje', 'Empleado actualizado exitosamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $empleado = Empleado::findOrFail($id);
        Storage::delete('public/' . $empleado->Foto);
        Empleado::destroy($id);
        return redirect('empleado')->with('mensaje', 'Empleado borrado exitosamente');
    }
}
