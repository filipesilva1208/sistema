<?php $this->load->view('cliente/Header')?>

<div class="row">
    <div class="col-md-3">

        <!-- Profile Image -->
        <div class="card card-primary card-outline">
            <div class="card-body box-profile">
                <div class="text-center">
                    <img class="profile-user-img img-fluid img-circle" src="<?=base_url()?>assets/img/user4-128x128.jpg"
                        alt="User profile picture">
                </div>

                <h3 class="profile-username text-center">Nina Mcintire <?=statusUserIcon()?></h3>

                <p class="text-muted text-center">Software Engineer </p>

                <ul class="list-group list-group-unbordered mb-3">
                    <li class="list-group-item">
                        <b>Followers</b> <a class="float-right">1,322</a>
                    </li>
                    <li class="list-group-item">
                        <b>Following</b> <a class="float-right">543</a>
                    </li>
                    <li class="list-group-item">
                        <b>Friends</b> <a class="float-right">13,287</a>
                    </li>
                </ul>

                <a href="#" class="btn btn-primary btn-block"><b>Follow</b></a>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->

      
    </div>
    <!-- /.col -->
    <div class="col-md-9">
        <div class="card">
            <div class="card-header p-2">
                <ul class="nav nav-pills">
                    <li class="nav-item"><a class="nav-link active" href="#settings" data-toggle="tab">Dados pessoais</a></li>
                    <li class="nav-item"><a class="nav-link " href="#password" data-toggle="tab">Segurança</a></li>
                </ul>
            </div><!-- /.card-header -->
            <div class="card-body">
                <div class="tab-content">
                    <div class="active tab-pane" id="settings">
                        <form class="form-horizontal" id="updateDada">
                            <input type="hidden" id="inputBaseUrl" value="<?=base_url()?>">
                            <div class="form-group row">
                                <label for="inputName" class="col-sm-2 col-form-label">Name</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" required id="inputName" placeholder="Name" value="<?=$data_user[0]->name?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                                <div class="col-sm-10">
                                    <input type="email" class="form-control" required id="inputEmail" placeholder="Email" value="<?=$data_user[0]->email?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputName2" class="col-sm-2 col-form-label">CPF</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" required id="inputCpf" placeholder="CPF" value="<?=$data_user[0]->cpf?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputSkills" class="col-sm-2 col-form-label">Telefone</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" required id="inputTelephone"  minlength="11" placeholder="(__)_ ____ ____" value="<?=$data_user[0]->telephone?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="offset-sm-2 col-sm-10">
                                    <button type="submit" class="btn btn-primary">Salvar</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <!-- /.tab-pane -->

                    <div class="tab-pane" id="password">
                        <form class="form-horizontal" id="updatePassword">
                            <div class="form-group row">
                                <label for="inputName" class="col-sm-2 col-form-label">Nova senha</label>
                                <div class="col-sm-10">
                                    <input type="password" class="form-control" id="inputPassword" required placeholder="*****">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputName" class="col-sm-2 col-form-label">Repita senha</label>
                                <div class="col-sm-10">
                                    <input type="password" class="form-control" id="inputPassword2" required placeholder="*****">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="offset-sm-2 col-sm-10">
                                    <button type="submit" class="btn btn-primary">Salvar</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <!-- /.tab-password -->
                </div>
                <!-- /.tab-content -->
            </div><!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
    <!-- /.col -->
</div>
<!-- /.row -->

<?php $this->load->view('cliente/dash/Footer')?>