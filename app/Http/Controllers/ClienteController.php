<?php

namespace App\Http\Controllers;
use App\Models\Cliente;
use App\Models\Reserva;
use PDF;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    public function index(Request $request)
    {
        // Obtener el término de búsqueda
        $search = $request->input('search');

        // Consulta base para los clientes
        $query = Cliente::query();

        // Si hay un término de búsqueda, aplicar filtros
        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('nombre_completo', 'like', "%{$search}%")
                    ->orWhere('telefono', 'like', "%{$search}%")
                    ->orWhere('correo', 'like', "%{$search}%");
                });
        }

        // Paginar los resultados
        $clientes = $query->orderBy('id', 'asc')->paginate(3);

        // Pasar los resultados a la vista
        return view('sistema-reservas.vista', compact('clientes', 'search'));
    }

    public function create()
    {
        return view('sistema-reservas.crear');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre_completo' => 'required|unique:clientes',
            'telefono' => 'required|unique:clientes',
            'correo' => 'required|unique:clientes'
        ]);

        Cliente::create($request->all());

        return redirect()->route('vista')->with('success', 'Cliente creado con Éxito.');
    }

    public function show($cliente)
    {
       $cliente = Cliente::find($cliente);

       return view('sistema-reservas.mostrar', compact('cliente'));
    }

    public function edit($cliente)
    {
        $cliente = Cliente::find($cliente);

        return view('sistema-reservas.editar', compact('cliente'));
    }

    public function update(Request $request, $cliente)
    {
        $request->validate([
            'nombre_completo' => 'required',
            'telefono' => 'required',
            'correo' => 'required'
        ]);

        $cliente = Cliente::find($cliente);

        $cliente->update($request->all());
        return redirect()->route('mostrar', $cliente)->with('success', 'Cliente actualizado con Éxito.');
    }

    public function aviso($cliente)
    {
        $cliente = Cliente::find($cliente);

        return view('sistema-reservas.aviso', compact('cliente'));
    }

    public function destroy($cliente)
    {
       $cliente = Cliente::find($cliente);

       $cliente->delete();

       return redirect()->route('vista')->with('success', 'Cliente eliminado con Éxito.');
    }

    public function mostrarReservas($cliente)
    {
        $cliente = Cliente::find($cliente);

        $reservas = $cliente->reservas()->paginate(3);

        return view('sistema-reservas.reservas', compact('cliente', 'reservas'));
    }

    public function GenerarPDF()
    {
        $clientes = Cliente::all();

        $pdf = PDF::loadView('sistema-reservas.pdf', compact('clientes'));

        return $pdf->stream('lista_clientes.pdf');
    }
}
