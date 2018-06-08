<?php if(!class_exists('Rain\Tpl')){exit;}?><div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Widgets
        </h1>
        <ol class="breadcrumb">
            <li><a href="/admin"><i class="fas fa-tachometer-alt"></i> Home</a></li>
            <li class="active">Perfil</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">

        <div class="row">
            <div class="col-md-3">

                <!-- Profile Image -->
                <div class="box box-primary">
                    <div class="box-body box-profile">
                        <img class="profile-user-img img-responsive img-circle" src=" <?php echo getUserPhoto(); ?>" alt="User profile picture">

                        <h3 class="profile-username text-center"><?php echo getUserName(); ?></h3>

                        <p class="text-muted text-center"><?php echo getUserProfession(); ?></p>

                        <ul class="list-group list-group-unbordered">
                            <li class="list-group-item">
                                <b>Seguindo</b> <a class="pull-right">1,322</a>
                            </li>
                            <li class="list-group-item">
                                <b>Seguidores</b> <a class="pull-right">543</a>
                            </li>
                            <li class="list-group-item">
                                <b>Publicações</b> <a class="pull-right">13,287</a>
                            </li>
                            <li class="list-group-item">
                                <b>Livros Publicados</b> <a class="pull-right">13,287</a>
                            </li>
                            <li class="list-group-item">
                                <b>Livros Baixados</b> <a class="pull-right">13,287</a>
                            </li>
                        </ul>

                        <a href="#" class="btn btn-primary btn-block"><b>Follow</b></a>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->



            </div>
            <!-- /.col -->
            <div class="col-md-9">
                <div class="nav-tabs-custom">
                    <ul class="nav nav-tabs">
                        <li class="active"><a href="#activity" data-toggle="tab">Livros Publicados</a></li>
                        <li><a href="#timeline" data-toggle="tab">Livros Baixados</a></li>
                    </ul>
                    <div class="tab-content">

                        <div class="active tab-pane" id="activity">

                            <div class="box-body">
                                <ul class="products-list product-list-in-box">
                                    <li class="item">
                                        <div class="product-img">
                                            <img src="/res/images-profile/standard-photo.jpg" alt="Product Image">
                                        </div>
                                        <div class="product-info">
                                            <a href="javascript:void(0)" class="product-title">Samsung TV
                                                <span class="label label-warning pull-right">$1800</span></a>
                                            <span class="product-description">
                          Samsung 32" 1080p 60Hz LED Smart HDTV.
                        </span>
                                        </div>
                                    </li>
                                    <!-- /.item -->
                                    <li class="item">
                                        <div class="product-img">
                                            <img src="/res/images-profile/standard-photo.jpg" alt="Product Image">
                                        </div>
                                        <div class="product-info">
                                            <a href="javascript:void(0)" class="product-title">Bicycle
                                                <span class="label label-info pull-right">$700</span></a>
                                            <span class="product-description">
                          26" Mongoose Dolomite Men's 7-speed, Navy Blue.
                        </span>
                                        </div>
                                    </li>

                                </ul>
                            </div>

                        </div>


                        <!-- /.tab-pane -->
                        <div class="tab-pane" id="timeline">

                            <div class="box-body">
                                <ul class="products-list product-list-in-box">
                                    <li class="item">
                                        <div class="product-img">
                                            <img src="/res/images-profile/standard-photo.jpg" alt="Product Image">
                                        </div>
                                        <div class="product-info">
                                            <a href="javascript:void(0)" class="product-title">Samsung TV
                                                <span class="label label-warning pull-right">$1800</span></a>
                                            <span class="product-description">
                          Samsung 32" 1080p 60Hz LED Smart HDTV.
                        </span>
                                        </div>
                                    </li>
                                    <!-- /.item -->
                                    <li class="item">
                                        <div class="product-img">
                                            <img src="/res/images-profile/standard-photo.jpg" alt="Product Image">
                                        </div>
                                        <div class="product-info">
                                            <a href="javascript:void(0)" class="product-title">Bicycle
                                                <span class="label label-info pull-right">$700</span></a>
                                            <span class="product-description">
                          26" Mongoose Dolomite Men's 7-speed, Navy Blue.
                        </span>
                                        </div>
                                    </li>

                                </ul>
                            </div>

                        </div>
                        <!-- /.tab-pane -->

                    </div>
                    </div>
                    <!-- /.tab-content -->
                </div>
                <!-- /.nav-tabs-custom -->

            </div>
            <!-- /.col -->

    </section>
    <!-- /.content -->

</div>