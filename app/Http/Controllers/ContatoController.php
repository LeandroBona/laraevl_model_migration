<?php

namespace App\Http\Controllers;

use App\Models\modelContato;
use Illuminate\Http\Request;

class ContatoController extends Controller
{
    public function mostrarFormulario()
    {
        return view('contato');
    }

    public function enviarFormulario(Request $request)
    {


        // Validação simples dos dados do formulário
        $validatedData = $request->validate([
            'nome' => 'required|string|max:30',
            'email' => 'required|email|max:100',
            'mensagem' => 'required|string', // Corrigido aqui
        ]);

        // Criação de um novo registro no banco de dados
        ModelContato::create($validatedData);

        return back()->with('success', 'Formulário enviado com sucesso!');
    }
}
