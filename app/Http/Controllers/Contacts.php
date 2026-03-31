<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
class Contacts extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {   $search = $request->input('search');
        $items = Contact::query()
        // Solo aplica el filtro si $search tiene un valor
        ->when($search, function ($query, $search) {
            return $query->where('cedula', 'LIKE', "%{$search}%")
                         ->orWhere('nombre', 'LIKE', "%{$search}%")
                         ->orWhere('apellido', 'LIKE', "%{$search}%");
        })
        ->paginate(2)
        ->withQueryString(); // Mantiene el parámetro ?search=... al cambiar de página

        return view('modules/contacts/index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('modules/contacts/create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {   
        // Verificación de Laravel (Server-side)
        $request->validate([
            'cedula' => 'required|unique:contacts,cedula', // Cédula única
            'nombre' => 'required|string|max:100',
            'apellido' => 'required|string|max:100',
            'edad' => 'required|integer|between:15,90', // Regla del taller
            'genero' => 'required|in:femenino,masculino,otros',
            'telefono' => ['required', 'regex:/^\d{4}-\d{7}( \| \d{4}-\d{7})?$/'], // Regla formato
            'correo' => ['required', 'regex:/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}( \| [a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,})?$/'],
            'estado_civil' => 'required|in:soltero,casado,divorciado,concubinato,viudo',
            'direccion' => 'required',
            'departamento' => 'required',
            'cargo' => 'required',
        ]);

        // Si la validación pasa, guardamos en la DB
        Contact::create($request->all());
        return redirect()->route('index')->with('success', 'Contacto agregado correctamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $contact = Contact::findOrFail($id);
        return view('modules/contacts/show', compact('contact'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $contact = Contact::findOrFail($id);
        return view('modules/contacts/edit', compact('contact'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
    
        $contact = Contact::findOrFail($id);
        // Verificación de Laravel (Server-side)
        $request->validate([
            'cedula' => 'required|unique:contacts,cedula,' . $contact->id, // Cédula única excepto el actual
            'nombre' => 'required|string|max:100',
            'apellido' => 'required|string|max:100',
            'edad' => 'required|integer|between:15,90', // Regla del taller
            'genero' => 'required|in:femenino,masculino,otros',
            'telefono' => ['required', 'regex:/^\d{4}-\d{7}( \| \d{4}-\d{7})?$/'], // Regla formato
            'correo' => ['required', 'regex:/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}( \| [a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,})?$/'],
            'estado_civil' => 'required|in:soltero,casado,divorciado,concubinato,viudo',
            'direccion' => 'required',
            'departamento' => 'required',
            'cargo' => 'required',
        ]);
        
        $contact->nombre = $request->nombre;
        $contact->apellido = $request->apellido;
        $contact->edad = $request->edad;
        $contact->genero = $request->genero;
        $contact->telefono = $request->telefono;
        $contact->correo = $request->correo;
        $contact->estado_civil = $request->estado_civil;
        $contact->direccion = $request->direccion;
        $contact->departamento = $request->departamento;
        $contact->cargo = $request->cargo;
        $contact->save();
        return  to_route('index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
       $contact = Contact::findOrFail($id);
       $contact->delete();
       return redirect()->route('index')->with('success', 'Contacto eliminado correctamente.');
    }
}
