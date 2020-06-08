@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h1>Editar Produto</h1>
                    </div>
                    
                    <div class="card-body">
                        <form action="{{route('alterar-produto', ['id' => $produto->id])}}" method="post">
                            @csrf
                            <div class="form-group col-md-10">
                              <label for="produto">Nome Produto</label>
                            <input type="text" class="form-control" id="produto" name="produto" value="{{$produto->nome}}">
                            </div>
                            <div class="form-group col-md-10">
                                <label for="preco">Preço</label>
                                <input type="text" class="form-control" id="preco" name="preco" value="{{$produto->preco}}">
                              </div>
                              <div class="form-group col-md-10">
                                <label for="quantidade">Quantidade Estoque</label>
                                <input type="number" class="form-control" id="quantidade" name="quantidade" value="{{$produto->quantidade_estoque}}">
                              </div>
                              <div class="form-group col-md-10">
                                <label for="categoriaProduto">Categoria do Produto</label>
                                  <select class="form-control" id="categoriaProduto" name="categoriaProduto">
                                    @foreach ($categoria as $cat)
                                        <option value="{{$cat->id}}" 
                                        @if ($produto->categoria_id === $cat->id) 
                                            selected
                                        @endif
                                        >{{$cat->nome_categoria}}</option>
                                    @endforeach
                                </select>
                              </div>
                            <button type="submit" class="btn btn-primary">Salvar</button>
                          </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
