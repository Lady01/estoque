<?php

namespace estoque\Http\Controllers;

//use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use estoque\Produto;
use Request;
use estoque\Http\Requests\ProdutosRequest;

class ProdutoController extends Controller
{
    public function lista()
    {
        $produtos = Produto::all();
        return view('produto.listagem')->with('produtos', $produtos);
    }
    public function mostra($id)
    {
       //$id = Request::input('id', '0');
       $produto = Produto::find($id);
       if(empty($produto)) {
            return "Esse produto não existe";
        }

        return view('produto.detalhes')->with('p', $produto);
    }
    public function novo()
    {
        return view('produto.formulario');
    }
    public function adiciona(ProdutosRequest $request){
        Produto::create($request->all());
        return redirect()
        ->action('ProdutoController@lista')
        ->withInput(Request::only('nome'));
}
    public function listaJson()
    {
        $produtos = DB::select('select * from produtos');
        return response()->json($produtos);
    }
    public function remove($id){
        $produto = Produto::find($id);
        $produto->delete();
        return redirect()
        ->action('ProdutoController@lista');
}
public function edicao($id)
{
       //$id = Request::input('id', '0');
       $produto = Produto::find($id);
        if(empty($produto)) {
        return "Esse produto não existe";
}

return view('produto.edicao1')->with('produto', $produto);
}
public function edita()
{
    $id =request::input('id');
    $p = Produto::find($id);
    $p->nome = request::input('nome');
    $p->valor = request::input('valor');
    $p->descricao = request::input('descricao');
    $p->quantidade = request::input('quantidade');
    $p->save();
    #return $p;
return redirect()
->action('ProdutoController@lista')
->with('success','Item updated successfully');

}


}
?>
