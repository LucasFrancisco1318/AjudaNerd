<?php if(!class_exists('Rain\Tpl')){exit;}?><!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Cadastro de Usuário
        </h1>
        <ol class="breadcrumb">
            <li><a href="/admin"><i class="fas fa-tachometer-alt"></i> Home</a></li>
            <li><a href="/admin/users">Usuários</a></li>
            <li class="active"><a href="/admin/users/create">Cadastrar</a></li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">

        <div class="row">
            <div class="col-md-12">
                <div class="box box-success">
                    <div class="box-header with-border">
                        <h3 class="box-title">Novo Usuário</h3>
                    </div>

                    <form role="form" action="/admin/users/create" method="post">
                        <div class="box-body">
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fas fa-align-right"></i>
                                    </div>
                                    <input type="text" id="person" name="person" class="form-control" placeholder="Nome Completo">
                                </div>
                                <!-- /.input group -->
                            </div>
                            <!-- /.form group -->

                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fas fa-align-right"></i>
                                    </div>
                                    <input type="text" id="user" name="user" class="form-control" placeholder="Usuário">
                                </div>
                                <!-- /.input group -->
                            </div>

                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fas fa-briefcase"></i>
                                    </div>
                                        <input type="text" id="profession" name="profession" class="form-control" placeholder="Profição">
                                </div>
                                <!-- /.input group -->
                            </div>

                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fas fa-envelope"></i>
                                    </div>
                                    <input type="email" id="email" name="email" class="form-control" placeholder="E-mail">
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fas fa-phone"></i>
                                    </div>
                                    <input placeholder="Telefone" id="nrphone" name="nrphone" type="text" class="form-control" data-inputmask='"mask": "(99)99999-9999"' data-mask>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fas fa-user"></i>
                                    </div>
                                    <input type="text" id="login" name="login" class="form-control" placeholder="Login">
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fas fa-key"></i>
                                    </div>
                                    <input type="password" id="password" name="password" class="form-control" placeholder="Senha">
                                </div>
                            </div>

                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" name="inadmin" value="1"> Acesso de Administrador
                                </label>
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