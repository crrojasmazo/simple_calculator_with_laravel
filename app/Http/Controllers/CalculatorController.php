<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CalculatorController extends Controller
{
    public function index()
    {
        $historial = DB::table('calculations')->orderBy('created_at', 'desc')->get();
        return view('calculator', ['historial' => $historial]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'numero1' => 'required|numeric',
            'numero2' => 'required|numeric',
            'operation' => 'required|in:+,-,*,/',
        ]);

        $numero1 = $request->input('numero1');
        $numero2 = $request->input('numero2');
        $operation = $request->input('operation');
        $resultado = 0;

        switch ($operation) {
            case '+':
                $resultado = $numero1 + $numero2;
                break;
            case '-':
                $resultado = $numero1 - $numero2;
                break;
            case '*':
                $resultado = $numero1 * $numero2;
                break;
            case '/':
                if ($numero2 == 0) {
                    return back()->withErrors(['numero2' => 'Division by zero is not allowed.'])->withInput();
                }
                $resultado = $numero1 / $numero2;
                break;
        }

        DB::table('calculations')->insert([
            'numero1' => $numero1,
            'numero2' => $numero2,
            'operation' => $operation,
            'resultado' => $resultado,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $historial = DB::table('calculations')->orderBy('created_at', 'desc')->get();

        return view('calculator', [
            'resultado' => $resultado,
            'historial' => $historial,
            'operation' => $operation // pass back so we can show it contextually if needed
        ]);
    }

    public function destroy($id)
    {
        DB::table('calculations')->where('id', $id)->delete();
        return redirect()->route('calculator.index');
    }
}
