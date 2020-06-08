@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h1>Categoria</h1>
                </div>

                <div class="card-body">
                    {{-- @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif --}}
                    @if(count($categoria) > 0)
                        <table class="table table-ordered table-hover">
                            <thead>
                                <tr>
                                    <th>Código</th>
                                    <th>Nome da Categoria</th>
                                    <th>Ações</th>
                                </tr>
                            </thead>
                            @foreach($categoria as $cat)
                                <tbody>
                                    <tr>
                                        <td>{{$cat->id}}</td>
                                        <td>{{$cat->nome_categoria}}</td>
                                        <td>
                                            <a href="categoria/listar/{{$cat->id}}" class="btn btn-sn btn-primary">Produtos</a>
                                            <a href="categoria/editar/{{$cat->id}}" class="btn btn-sn btn-primary">Editar</a>
                                            <a href="categoria/apagar/{{$cat->id}}" class="btn btn-sn btn-danger">Apagar</a>
                                        </td>
                                    </tr>
                                </tbody>
                            @endforeach
                        </table>
                    @endif
                </div>
                <div class="card-footer">
                    <a href="{{route('nova-categoria')}}">
                        <button type="button" class="btn btn-sn btn-primary">Nova Categoria</button>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

     
<script type="text/javascript">
    
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': "{{ csrf_token() }}"
        }
    });
    
    
    function carregarCategorias() {
        $.getJSON('/categoria/listar', function(data) { 
            for(i=0;i<data.length;i++) {
                opcao = '<option value ="' + data[i].id + '">' + 
                    data[i].nome + '</option>';
                $('#categoriaProduto').append(opcao);
            }
        });
    }

    function listarProdutos2(produtos) {
        console.log('Valor: ', produtos);
        $.post("/categoria/listar", produtos, function(data) {           
        });
    }

    function listarProdutos(produtos) {
        console.log('Valor: ', produtos);
        $.ajax({
            type: "POST",
            url: "/categoria/listar",
            context: this,
            data: produtos,
            success: function(data) {
                console.log('Data: ',data);
            },
            error: function(error) {
                console.log('Este é o erro',error);
            }
        });
    }
    
</script>