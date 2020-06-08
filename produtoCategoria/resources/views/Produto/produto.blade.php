@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h1>Produto</h1>
                </div>

                <div class="card-body">
                    {{-- @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif --}}
                    @if(count($produto) > 0)
                        <table class="table table-ordered table-hover">
                            <thead>
                                <tr>
                                    <th>Código</th>
                                    <th>Nome do Produto</th>
                                    <th>Preço</th>
                                    <th>Quantidade</th>
                                    <th>Ações</th>
                                </tr>
                            </thead>
                            @foreach($produto as $prod)
                                <tbody>
                                    <tr>
                                        <td>{{$prod->id}}</td>
                                        <td>{{$prod->nome}}</td>
                                        <td>{{$prod->preco}}</td>
                                        <td>{{$prod->quantidade_estoque}}</td>
                                        <td>
                                            <a href="{{route('produto-editar', ['id' => $prod->id])}}" class="btn btn-sn btn-primary">Editar</a>
                                            <a href="{{route('produto-apagar', ['id' => $prod->id])}}" class="btn btn-sn btn-danger">Apagar</a>
                                        </td>
                                    </tr>
                                </tbody>
                            @endforeach
                        </table>
                    @endif
                </div>
                <div class="card-footer">
                    <a href="{{route('novo-produto')}}">
                        <button type="button" class="btn btn-sn btn-primary">Novo Produto</button>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
