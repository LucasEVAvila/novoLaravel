<?php

namespace App\Http\Controllers;

use App\Models\SiteContato;
use Illuminate\Http\Request;

class ContatoController extends Controller
{
   public function contact()
    {
        $pageTitle = 'Entre em Contato';
        return view('pages.contact', compact('pageTitle'));
    }

    public function salvar(Request $request){
        // validação dos dados 
        $request->validate([
            'nome' => 'required|min:3|max:50',
            'email' => 'required|email',
            'mensagem' => 'required|max:2000'
        ]);

        // cria e salva o contanto no banco de dados
        SiteContato::create($request->all());

        // redirecionamento de volta para a página de contato
        // com uma mensagem de sucesso
        return redirect()->route('contact')->with('sucesso', 'Sua mensagem foi enviada!');

    }
}
