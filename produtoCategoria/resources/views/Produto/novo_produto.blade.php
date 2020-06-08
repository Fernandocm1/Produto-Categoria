@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h1>Cadastro de Categorias</h1>
                    </div>

                    <div class="card-body">
                        <form action="{{route('cadastrar-produto')}}" method="post">
                            @csrf
                            <div class="form-group col-md-10">
                              <label for="produto">Nome Produto</label>
                              <input type="text" class="form-control" id="produto" name="produto">
                            </div>
                            <div class="form-group col-md-10">
                                <label for="preco">Preço</label>
                                <input type="text" class="form-control" id="preco" name="preco">
                              </div>
                              <div class="form-group col-md-10">
                                <label for="quantidade">Quantidade Estoque</label>
                                <input type="number" class="form-control" id="quantidade" name="quantidade">
                              </div>
                              <div class="form-group col-md-10">
                                <label for="categoriaProduto">Categoria do Produto</label>
                                <select class="form-control" id="categoriaProduto" name="categoriaProduto">
                                    @foreach ($categoria as $cat)
                                        <option value="{{$cat->id}}">{{$cat->nome_categoria}}</option>
                                    @endforeach
                                </select>
                              </div>
                            <button type="submit" class="btn btn-primary">Cadastrar</button>
                          </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
