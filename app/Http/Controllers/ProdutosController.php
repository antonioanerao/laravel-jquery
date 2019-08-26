<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProdutosRequest;
use Illuminate\Http\Request;
use App\Produto;
use Illuminate\Support\Facades\Response;
use App\Post;
use Symfony\Component\HttpFoundation\Session\Session;

/**
 * @property Produto produto
 * @property Post post
 */
class ProdutosController extends Controller
{
    public function __construct(Produto $produto, Post $post)
    {
        $this->middleware('auth');
        $this->produto = $produto;
        $this->post = $post;
    }

    public function index()
    {

    }

    public function create()
    {
        $produtos = $this->produto->orderBy('id', 'desc')->get();
        $posts = $this->post->orderBy('id', 'desc')->get();
        return view('create', compact('produtos', 'posts'));
    }

    public function storeProduto(Request $request)
    {
        return Response::json(Produto::create($request->all(), 200));
    }
}
