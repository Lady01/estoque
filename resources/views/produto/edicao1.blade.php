@extends('layout/principal')
@section('conteudo')
{{$produto}}
@if(empty($produto))

    <div>Nenhum produto encontrado.</div>
@else

    <form action="/produtos/edita" method="post">
        <input type="hidden"
        name="_token" value="{{{ csrf_token() }}}" />
        <input type="hidden" name="id" class="form-control" value="{{ $produto->id }}"/>
        <div class="form-group">
        <label>Nome</label>
        <input type="text" name="nome" class="form-control" value="{{ $produto->nome }}"/>
        </div>
        <div class="form-group">
        <label>Quantidade</label>
        <input type="number" name="quantidade" class="form-control" value="{{ $produto->quantidade}}"/>
        </div>
        <div class="form-group">
        <label>Valor</label>
        <input name="valor" type="text" class="form-control" value="{{ $produto->valor }}"/>
        </div>

        <div class="form-group">
        <label>Descricao</label>
        <input name="descricao" type="text" class="form-control" value="{{ $produto->descricao }}"/>
        </div>
        <button type="submit"
        class="btn btn-primary btn-block">Submit</button>
    </form>
@endif
@stop
