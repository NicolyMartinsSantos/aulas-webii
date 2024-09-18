<?php

namespace App\Http\Controllers;
use App\Models\Livro;
use Illuminate\Http\Request;
use App\Models\Autores;
use Dompdf\Dompdf;


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

        if(isset($autor)){
            return view('autor.edit',compact(['autor']));
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
        'apelido' => 'nullable|string|max:255',
        'nacionalidade' => 'nullable|string|max:255',
    ]);

    $autor = Autores::find($id);

    if ($autor) {
        $autor->update([
            'nome' => $request->nome,
            'apelido' => $request->apelido,
            'nacionalidade' => $request->nacionalidade,
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

    public function graph()
    {
        //$autores = Autores::with('livros')->orderBy('nome')->get();
        //$data = [
          //  ["AUTOR", "NÚMERO DE LIVROS"]
        //];
        return "BAH, SOCORRO";
        //$cont = 1;
        //foreach ($autores as $item) 
        //{
          //  $data[$cont] = [
            //   $item->nome, count($item->livros)
            //];

           // $cont++;
       // }

        //dd($data);
        //$data = json_encode($data);

       // return view('autor.graph', compact(['data']));
    }

    public function report($id)
    {
        $livros = Livro::where('autores_id', $id)->get();

        $dompdf = new Dompdf();
        $dompdf->loadHtml(view('autor.report', compact('livros')));
        $dompdf->setPaper('A4', 'landscape');
        $dompdf->render();
        $dompdf->stream("relatorio-horas-turma.pdf", array("Attachment" => false));
    }
}