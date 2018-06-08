<?php if(!class_exists('Rain\Tpl')){exit;}?><!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Lista de Usuário
        </h1>
        <ol class="breadcrumb">
            <li><a href="/admin"><i class="fas fa-tachometer-alt"></i> Home</a></li>
            <li><a href="/admin/users">Usuários</a></li>
            <li class="active"><a href="/admin/users/<?php echo htmlspecialchars( $user["iduser"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">Editar</a></li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">

        <div class="row">
            <div class="col-md-12">
                <div class="box box-primary">
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form role="form" action="/admin/users/<?php echo htmlspecialchars( $user["iduser"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" method="post">
                        <div class="box-body">
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fas fa-align-right"></i>
                                    </div>
                                    <input type="text" id="person" name="person" class="form-control" placeholder="Nome Completo" value="<?php echo htmlspecialchars( $user["person"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
                                </div>
                                <!-- /.input group -->
                            </div>
                            <!-- /.form group -->

                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fas fa-align-right"></i>
                                    </div>
                                    <p class="form-control"><?php echo htmlspecialchars( $user["user"], ENT_COMPAT, 'UTF-8', FALSE ); ?></p>
                                </div>
                                <!-- /.input group -->
                            </div>

                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fas fa-briefcase"></i>
                                    </div>
                                    <input type="text" id="profession" name="profession" class="form-control" placeholder="Profição" value="<?php echo htmlspecialchars( $user["profession"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
                                </div>
                                <!-- /.input group -->
                            </div>

                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fas fa-envelope"></i>
                                    </div>
                                    <input type="email" id="email" name="email" class="form-control" placeholder="E-mail" value="<?php echo htmlspecialchars( $user["email"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fas fa-phone"></i>
                                    </div>
                                    <input placeholder="Telefone" id="nrphone" name="nrphone" type="text" class="form-control" data-inputmask='"mask": "(99)99999-9999"' data-mask value="<?php echo htmlspecialchars( $user["nrphone"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fas fa-user"></i>
                                    </div>
                                    <input type="text" id="login" name="login" class="form-control" placeholder="Login" value="<?php echo htmlspecialchars( $user["login"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
                                </div>
                            </div>

                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" name="inadmin" value="1" <?php if( $user["inadmin"] == 1 ){ ?>checked<?php } ?>> Acesso de Administrador
                                </label>
                            </div>

                            <div class="form-group">
                                <label>Foto de Perfil</label>
                                <div class="box box-widget">
                                    <div class="box-body">
                                        <img class="photo" id="image-preview" src="<?php echo htmlspecialchars( $user["imgprofile"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" alt="Photo">
                                    </div>
                                </div>
                            </div>

                        </div>
                        <!-- /.box-body -->
                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary">Salvar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->