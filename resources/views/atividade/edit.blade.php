@extends('template.main', ['menu' => "admin", 'submenu' => "Novo atividade"])
<!-- Preenche o conteúdo da seção "titulo" -->
@section('titulo') Atividades @endsection
<!-- Preenche o conteúdo da seção "conteudo" -->
@section('conteudo')
<form action="{{ route('atividade.update', $dados->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="row">
        <div class="col">
            <div class="form-floating mb-3">
                <input type="text" class="form-control @if($errors->has('nome')) is-invalid @endif" name="nome"
                    placeholder="nome" value="{{$dados->nome}}" />
                <label for="nome">Nome:</label>
            </div>
            <div class="form-floating mb-3">
                <input type="text" class="form-control @if($errors->has('descricao')) is-invalid @endif"
                    name="descricao" placeholder="descricao" value="{{$dados->descricao}}" />
                <label for="descricao">Descrição:</label>
            </div>
            <div class="form-floating mb-3">
                <input type="date" class="form-control @if($errors->has('data')) is-invalid @endif" name="data"
                    placeholder="data" value="{{$dados->data}}" />
                <label for="data">Data:</label>
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text bg-success text-white">Foto</span>
                <input class="form-control @if($errors->has('foto')) is-invalid @endif" type="file" name="foto" />
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <button type="submit" class="btn btn-success">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                    class="bi bi-check-circle-fill" viewBox="0 0 16 16">
                    <path
                        d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
                </svg>
                &nbsp; Confirmar
            </button>
            <a href="{{route('atividade.index')}}" class="btn btn-danger">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                    class="bi bi-arrow-left-circle-fill" viewBox="0 0 16 16">
                    <path
                        d="M8 0a8 8 0 1 0 0 16A8 8 0 0 0 8 0zm3.5 7.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5z" />
                </svg>
                &nbsp; Cancelar
            </a>
        </div>
    </div>
</form>


@endsection