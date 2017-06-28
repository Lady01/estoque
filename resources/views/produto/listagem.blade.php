@extends('layout/principal')
@section('conteudo')

@if(empty($produtos))
    <div>Você não tem nenhum produto cadastrado.</div>
@else
    <h1>Listagem de produtos</h1>
    <table>
        @foreach ($produtos as $p)
        <tr>
            <td>{{$p->nome}}</td>
            <td>{{$p->valor}}</td>
            <td>{{$p->descricao}}</td>
            <td>{{$p->quantidade}} </td>
            <td><a href="/produtos/mostra/{{$p->id}}">Visualizar</a></td>
            <td> <a href="{{action('ProdutoController@remove', $p->id)}}">
Excluir
</a> </td>
<td><a href="/produtos/edicao/{{$p->id}}">Editar</a></td>
        </tr>
        @endforeach
    </table>
@endif
@if(old('nome'))
<div class="alert alert-success">
<strong>Sucesso!</strong>
O produto {{ old('nome') }} foi adicionado.
</div>
@endif
@stop