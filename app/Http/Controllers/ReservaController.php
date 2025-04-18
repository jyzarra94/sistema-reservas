<?php

namespace App\Http\Controllers;
use App\Models\Reserva;
use App\Models\Cliente;
use PDF;
use Illuminate\Http\Request;

class ReservaController extends Controller
{
    public function create($cliente)
    {
        $cliente = Cliente::find($cliente);

        return view('sistema-reservas.reservar', compact('cliente'));
    }

    public function store(Request $request, $cliente)
    {
        $cliente = Cliente::find($cliente);

        $validatedData = $request->validate([
            'fecha_visita' => 'required|date',
            'hora_visita' => 'required|date_format:H:i',
            'cantidad_personas' => 'required|min:1',
            'estado' => 'required|in:pendiente,reservada,cancelada'
        ]);

        $reserva = new Reserva;

        $reserva->fecha_visita = $validatedData['fecha_visita'];
        $reserva->hora_visita = $validatedData['hora_visita'];
        $reserva->cantidad_personas = $validatedData['cantidad_personas'];
        $reserva->estado = $validatedData['estado'];

        $reserva->cliente_id = $cliente->id;

        $reserva->save();

        return redirect()->route('reserva', $cliente)->with('reserva', $reserva)->with('success', 'Reserva creada con Éxito.');
    }

    public function show($reserva, $cliente)
    {
        $reserva = Reserva::find($reserva);

        $cliente = Cliente::find($cliente);

        return view('sistema-reservas.mostrar-reserva', compact('reserva', 'cliente'));
    }

    public function edit($reserva, $cliente)
    {
        $reserva = Reserva::find($reserva);

        $cliente = Cliente::find($cliente);

        return view('sistema-reservas.editar-reserva', compact('reserva', 'cliente'));
    }

    public function update(Request $request, $reserva, $cliente)
    {
        $reserva = Reserva::find($reserva);

        $cliente = Cliente::find($cliente);

        $validatedData = $request->validate([
            'fecha_visita' => 'required|date',
            'hora_visita' => 'required|date_format:H:i',
            'cantidad_personas' => 'required|min:1',
            'estado' => 'required|in:pendiente,reservada,cancelada'
        ]);

        $reserva->fecha_visita = $validatedData['fecha_visita'];
        $reserva->hora_visita = $validatedData['hora_visita'];
        $reserva->cantidad_personas = $validatedData['cantidad_personas'];
        $reserva->estado = $validatedData['estado'];

        $reserva->cliente_id = $cliente->id;

        $reserva->save();

        return redirect()->route('mostrar-reserva', ['cliente' => $cliente, 'reserva' => $reserva])->with('mostrar-reserva', $reserva)->with('success', 'Reserva actualizada con Éxito.');
    }

    public function aviso($reserva, $cliente)
    {
        $reserva = Reserva::find($reserva);

        $cliente = Cliente::find($cliente);

        return view('sistema-reservas.aviso-reserva', compact('reserva', 'cliente'));
    }

    public function destroy($reserva, $cliente)
    {
        $reserva = Reserva::find($reserva);

        $cliente = Cliente::find($cliente);

        $reserva->delete();

        return redirect()->route('reserva', ['reserva' => $reserva, 'cliente' => $cliente])->with('success', 'Reserva eliminada con Éxito.');
    }

    public function GenerarPDF($cliente)
    {
        $cliente = Cliente::find($cliente);

        $reservas = $cliente->reservas()->get();

        $pdf = PDF::loadView('sistema-reservas.pdf-reservas', ['cliente' => $cliente, 'reservas' => $reservas]);

        return $pdf->stream('lista_reservas_'.$cliente->id.'pdf');
    }

    public function counter()
    {
    	$totalClientes = Cliente::count();
    	$clientesSinReservas = Cliente::whereDoesntHave('reservas')->count();

    	$totalReservas = Reserva::count();
    	$reservasPendientes = Reserva::where('estado', 'pendiente')->count();
    	$reservasSolicitadas = Reserva::where('estado', 'reservada')->count();
    	$reservasCanceladas = Reserva::where('estado', 'cancelada')->count();

    	return view('sistema-reservas.contador', compact('totalClientes', 'clientesSinReservas', 'totalReservas', 'reservasPendientes', 'reservasSolicitadas', 'reservasCanceladas'));
    }
}
