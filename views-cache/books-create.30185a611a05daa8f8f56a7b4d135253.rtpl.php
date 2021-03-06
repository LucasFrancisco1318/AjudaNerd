<?php if(!class_exists('Rain\Tpl')){exit;}?><!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Cadastro de Livro
        </h1>
        <ol class="breadcrumb">
            <li><a href="/admin"><i class="fas fa-tachometer-alt"></i> Home</a></li>
            <li><a href="/admin/books">Livros</a></li>
            <li class="active"><a href="/admin/users/create">Cadastrar</a></li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">

        <div class="row">
            <div class="col-md-12">
                <div class="box box-success">
                    <div class="box-header with-border">
                        <h3 class="box-title">Novo Livro</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form role="form" action="/admin/books/create" method="post">
                        <div class="box-body">
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fas fa-align-right"></i>
                                    </div>
                                    <input type="text" class="form-control" placeholder="Titulo do Livro">
                                </div>
                                <!-- /.input group -->
                            </div>
                            <!-- /.form group -->

                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fas fa-indent"></i>
                                        <lable>Categoria</lable>
                                    </div>
                                    <select class="form-control">
                                        <option name="inadmin" value="0">Usuário</option>
                                        <option name="inadmin" value="1">Administrador</option>
                                        <option name="inadmin" value="2">Supervisor</option>
                                        <option name="inadmin" value="3">Monitoração</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fas fa-user-circle"></i>
                                        <lable>Autor</lable>
                                    </div>
                                    <select class="form-control">
                                        <option name="inadmin" value="0">Usuário</option>
                                        <option name="inadmin" value="1">Administrador</option>
                                        <option name="inadmin" value="2">Supervisor</option>
                                        <option name="inadmin" value="3">Monitoração</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fas fa-pencil-alt"></i>
                                        <lable>Escritor</lable>
                                    </div>
                                    <select class="form-control">
                                        <option name="inadmin" value="0">Usuário</option>
                                        <option name="inadmin" value="1">Administrador</option>
                                        <option name="inadmin" value="2">Supervisor</option>
                                        <option name="inadmin" value="3">Monitoração</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputFile">Capa do Livro</label>
                                <input type="file" id="exampleInputFile">
                            </div>

                            <div class="form-group">
                                <label for="exampleInputFile">Livro</label>
                                <input type="file" id="exampleInputFile1">
                            </div>

                            
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" name="idfreepaid" value="2"> Pago
                                </label>
                            </div>
                            
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fas fa-pencil-alt"></i>
                                        <lable>PRO</lable>
                                    </div>
                                    <select class="form-control">
                                        <option name="inadmin" value="1">Gratuito</option>
                                        <option name="inadmin" value="2">Pago</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputFile">Descrição</label>
                                <div class="box-body pad">
                                    <form>
                                    <textarea class="textarea" placeholder="Escrever a descrição do livro"
                                              style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                                    </form>
                                </div>
                            </div>



                        </div>
                        <!-- /.box-body -->
                        <div class="box-footer">
                            <button type="submit" class="btn btn-success">Cadastrar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->