<?php $this->load->view('cliente/Header')?>

<div class="row">
    <div class="col-md-3">

        <!-- Profile Image -->
        <div class="card card-primary card-outline">
            <div class="card-body box-profile">
                <a class="card-link" data-toggle="modal" data-target="#updateProfile">
                    <div class="text-center">
                        <?=profile($data_user[0]->profile)?>
                    </div>
                </a>

                <h3 class="profile-username text-center"><?=pri_ult_nome($data_user[0]->name)?> <?=statusUserIcon()?>
                </h3>

                <p class="text-muted text-center">Software Engineer </p>

                <ul class="list-group list-group-unbordered mb-3">
                    <li class="list-group-item">
                        <b>Convidados</b> <a class="float-right"><?=getNetwork()?></a>
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
                    <li class="nav-item"><a class="nav-link active" href="#settings" data-toggle="tab">Dados
                            pessoais</a></li>
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
                                    <input disabled type="text" class="form-control" required id="inputName"
                                        name="inputName" placeholder="Name" value="<?=$data_user[0]->name?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                                <div class="col-sm-10">
                                    <input disabled type="email" class="form-control" required id="inputEmail"
                                        name="inputEmail" placeholder="Email" value="<?=$data_user[0]->email?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputName2" class="col-sm-2 col-form-label">CPF</label>
                                <div class="col-sm-10">
                                    <input disabled type="text" class="form-control" required id="inputCpf"
                                        name="inputCpf" placeholder="CPF" value="<?=$data_user[0]->cpf?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputSkills" class="col-sm-2 col-form-label">Telefone</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" required id="inputTelephone"
                                        name="inputTelephone" minlength="11" placeholder="(__)_ ____ ____"
                                        value="<?=$data_user[0]->telephone?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputSkills" class="col-sm-2 col-form-label">Perfil</label>
                                <div class="col-sm-10">
                                    <input type="file" class="form-control" id="inputProfile" name="inputProfile"
                                        size="10">
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
                                    <input type="password" class="form-control" id="inputPassword" required
                                        placeholder="*****">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputName" class="col-sm-2 col-form-label">Repita senha</label>
                                <div class="col-sm-10">
                                    <input type="password" class="form-control" id="inputPassword2" required
                                        placeholder="*****">
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

<!-- Modal -->
<div class="modal fade" id="updateProfile" data-backdrop="static" data-keyboard="false" tabindex="-1"
    aria-labelledby="updateProfileLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="updateProfileLabel">Imagem de perfil</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="updateProfile" enctype="multipart/form-data">
                <div class="modal-body">
                    <input class="form-control" type="file" name="file" id="file">
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Salvar</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php $this->load->view('cliente/dash/Footer')?>