<?php

namespace App\Http\Controllers;

use App\Models\Material;
use Illuminate\Http\Request;

class MaterialController extends Controller {

    private $path = "fotos/materiais";

    public function index() {
        $data = Material::orderBy('nome')->get();
        return view('material.index', compact('data'));
    }

    public function create() {
        return view('material.create');
        
    }

    public function store(Request $request) {
        $regras = [
           'nome' => 'required|max:100|min:10',
           'descricao' => 'required|max:1000|min:20',
           'foto' => 'required' 
        ];

        $msgs = [
            "required" => "O preenchimento do campo [:attribute] é obrigatório",
            "max" => "O campo [:attribute] possui tamanho máximo de [:max] caracteres!",
            "min" => "O campo [:attribute] possui tamanho mínimo de [:min] caracteres!",
        ];

        $request->validate($regras, $msgs);

        if($request->hasFile('foto')){
            $reg = new Material();
            $reg-> nome = $request->nome;
            $reg->descricao = $request->descricao;
            $reg->save();

            $id = $reg->id;
            $extensao_arq = $request->file('foto')->getClientOriginalExtension();
            $nome_arq = $id.'__'.time().'.'.$extensao_arq;
            $request->file('foto')->storeAs("public/$this->path", $nome_arq);
            $reg->foto = $this->path."/".$nome_arq;
            $reg->save();
        }

        return redirect() ->route('material.index');
    }

    public function show($id) {
        
    }

    public function edit($id) {
        //$dados = $regras::find($id);
    }

    public function update(Request $request, $id) {
        
    }

    public function destroy($id) {
        
    }
}
