<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
class Contacts extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $items = Contact::paginate(2);
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
            'telefono' => ['required', 'regex:/^[0-9]{4}-[0-9]{7}$/'], // Regla formato
            'correo' => 'required|email',
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
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
