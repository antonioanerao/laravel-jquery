@extends('layouts.app')

@section('content')
    <script
        src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

    <script type="text/javascript">
        $(document).ready(function() {
            $("#success-alert-produto").hide();
            $("#success-alert-post").hide();
        });
    </script>

    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">Cadastrar Produto</div>

                    <div class="card-body">
                        <form  id="add-produto">
                            {{ csrf_field() }} {{ method_field('POST') }}
                            <div class="modal-body">

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="field-1" class="control-label">Nome Produto</label>
                                            <input type="text" required name="nome" class="form-control">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="field-1" class="control-label">Descrição Produto</label>
                                            <textarea type="text" required name="descricao" class="form-control"></textarea>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="field-1" class="control-label">Valor Produto</label>
                                            <input type="text" required name="price" class="form-control">
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary waves-effect waves-light">Cadastrar Produto</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">Produtos</div>
                    <div class="card-body">
                        <div class="alert alert-success" id="success-alert-produto">
                            <button type="button" class="close" data-dismiss="alert">x</button>
                            <strong>Sucesso</strong> Produto Adicionado
                        </div>

                        <div id="lista-produtos">
                            @foreach($produtos as $produto)
                                <b>Nome: </b> {{ $produto->nome }} <br>
                                <b>Preço: </b> {{ $produto->price }}
                                <hr>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="clearfix m-4"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">Publicar Post</div>

                    <div class="card-body">
                        <form  id="add-post">
                            {{ csrf_field() }} {{ method_field('POST') }}
                            <div class="modal-body">

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="field-1" class="control-label">Título</label>
                                            <input type="text" required name="titulo" class="form-control">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="field-1" class="control-label">Descrição</label>
                                            <textarea type="text" required name="descricao" class="form-control"></textarea>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary waves-effect waves-light">Publicar Post</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">Posts</div>
                    <div class="card-body">
                        <div class="alert alert-success" id="success-alert-post">
                            <button type="button" class="close" data-dismiss="alert">x</button>
                            <strong>Sucesso</strong> Post publicado.
                        </div>
                        <div id="lista-posts">
                            @foreach($posts as $post)
                                <b>Título: </b> {{ $post->titulo }} <br>
                                <b>Descrição: </b> {{ $post->descricao }}
                                <hr>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script type="text/javascript">
        $(document).ready(function () {
            $('#add-produto').on('submit', function(e){
                e.preventDefault();
                $.ajax({
                    type: "POST",
                    url: "store-produto",
                    data: $('#add-produto').serialize(),
                    success: function(response){
                        $('#add-produto')[0].reset();
                        $("#lista-produtos").load(" #lista-produtos");
                        $("#success-alert-produto").fadeTo(2000, 500).slideUp(500, function(){
                            $("#success-alert-produto").slideUp(500);
                        });
                    },
                    error: function(error){
                        console.log(error)
                        alert("Erro. Fale com o administrador do sistema");
                    }
                });
            });

            $('#add-post').on('submit', function(e){
                e.preventDefault();
                $.ajax({
                    type: "POST",
                    url: "store-posts",
                    data: $('#add-post').serialize(),
                    success: function(response){
                        $('#add-post')[0].reset();
                        $("#lista-posts").load(" #lista-posts");
                        $("#success-alert-post").fadeTo(2000, 500).slideUp(500, function(){
                            $("#success-alert-post").slideUp(500);
                        });
                    },
                    error: function(error){
                        console.log(error)
                        alert("Erro. Fale com o administrador do sistema");
                    }
                });
            });
        });
    </script>
@endsection
