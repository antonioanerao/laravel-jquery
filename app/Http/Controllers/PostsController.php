<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Produto;
use Illuminate\Http\Request;
use \App\Post;
use Illuminate\Support\Facades\Response;

/**
 * @property Post post
 */
class PostsController extends Controller
{
    public function __construct(Post $post)
    {
        $this->middleware('auth');
        $this->post = $post;
    }

    public function storePosts(PostRequest $request)
    {
        return Response::json(Post::create($request->all(), 200));
    }
}
