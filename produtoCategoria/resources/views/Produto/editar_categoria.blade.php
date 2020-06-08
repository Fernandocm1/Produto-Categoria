@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h1>Editar Categoria</h1>
                    </div>

                    <div class="card-body">
                        <form action="{{route('categoria-alterar', ['id' => $categoria->id])}}" method="post">
                            @csrf
                            <div class="form-group col-md-10">
                                <label for="categoria">Nome Categoria</label>
                                <input type="text" class="form-control" id="categoria" name="categoria" value="{{$categoria->nome_categoria}}">
                            </div>
                            <button type="submit" class="btn btn-primary">Salvar</button>
                          </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
