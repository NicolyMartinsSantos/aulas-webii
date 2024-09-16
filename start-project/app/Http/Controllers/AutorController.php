<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Autores;

class AutorController extends Controller
{

    private $regras = [
        'name' => 'required|max:20|min:3|unique:eixos',
        'description' => 'required|max:300|min:10',
    ];

    private $msgs = [
        "required" => "O preenchimento do campo [:attribute] é obrigatório!",
        "max" => "O campo [:attribute] possui tamanho máximo de [:max] caracteres!",
        "min" => "O campo [:attribute] possui tamanho mínimo de [:min] caracteres!",
        "unique" => "Já existe um endereço cadastrado com esse [:attribute]!"
    ];

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $autores = Autores::all(); // Obtém todos os autores
        return view('autor.index',  compact('autores')); // Passa a lista de autores para a view
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('autor.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //$request->validate($this->regras,$this->msgs);
        $autor = new Autores();
        $autor->nome = $request->nome;
        $autor->apelido = $request->apelido;
        $autor->nacionalidade = $request->nacionalidade;
        $autor->data_nascimento = $request->data_nascimento;
        $autor->email = $request->email;
        $autor->save();
        return redirect()->route('autor.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $autor = Autores::find($id);

        if ($autor) {
            return view('autor.show', compact('autor'));
        }

        return redirect()->route('autor.index')->with('error', 'Autor não encontrado.');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $autor = Autores::find($id);

        if ($autor) {
            return view('autor.edit', compact('autor'));
        }

        return redirect()->route('autor.index')->with('error', 'Autor não encontrado.');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nome' => 'required|string|max:255',

        ]);

        $autor = Autores::find($id);

        if ($autor) {
            $autor->update([
                'nome' => $request->nome,
            ]);

            return redirect()->route('autor.index')->with('success', 'Autor atualizado com sucesso!');
        }

        return redirect()->route('autor.index')->with('error', 'Autor não encontrado.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $autor = Autores::find($id);

        if ($autor) {
            $autor->delete();
            return redirect()->route('autor.index')->with('success', 'Autor deletado com sucesso!');
        }

        return redirect()->route('autor.index')->with('error', 'Autor não encontrado.');
    }
}