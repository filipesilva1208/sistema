<?php $this->load->view('cliente/Header')?>

<div class="card">
    <div class="card-header">
        <i class="fas fa-user"></i> Nome do usuário <?=$id_user?>
    </div>
    <div class="card-body">
        <form id="UpdateUser">
            <div class="form-row">
                <label class="col-md-3">
                    Nome
                    <input type="text" class="form-control" id="inputName" placeholder="Name" required
                        value="<?=$data_user[0]->name?>">
                </label>
                <label class="col-md-3">
                    Email
                    <input type="email" class="form-control" id="inputEmail" placeholder="email@email.com" required
                        value="<?=$data_user[0]->email?>">
                </label>
                <label class="col-md-3">
                    CPF
                    <input type="text" class="form-control" id="inputCpf" placeholder="111.111.111-11" required
                        value="<?=$data_user[0]->cpf?>">
                </label>
                <label class="col-md-3">
                    Telefone
                    <input type="text" class="form-control" id="inputTelephone" placeholder="(99) 9 9999 9999"
                        value="<?=$data_user[0]->telephone?>" required>
                </label>
                <label class="col-md-3">
                    Senha
                    <input type="password" class="form-control" id="inputPassword" placeholder="*********" required>
                </label>
                <label class="col-md-3">
                    patrocinador
                    <input type="text" class="form-control" disabled placeholder="Loren Ipsum" required value="<?=dataUser($data_user[0]->sponsor,'name')?>">
                </label>
                <label class="col-md-3">
                    Ativo
                    <input type="text" class="form-control" disabled placeholder="sim" required value="<?=$data_user[0]->active?>">
                </label>
                <label class="col-md-3">
                    Bloqueado
                    <input type="text" class="form-control" disabled placeholder="nao" required value="<?=$data_user[0]->blocked?>">
                </label>
                <label class="col-md-3">
                    Rede
                    <input type="text" class="form-control" disabled placeholder="..." required value="<?=getNetwork($id_user)?>">
                </label>
                <label class="col-md-3">
                    Registro
                    <input type="text" class="form-control date" disabled required value="<?=$data_user[0]->created_at?>">
                </label>
                <label class="col-md-3">
                    Atualizado
                    <input type="text" class="form-control" disabled required value="<?=$data_user[0]->updated_at?>">
                </label>
                <label class="col-md-3">
                    Ativado
                    <input type="text" class="form-control" disabled required value="<?=$data_user[0]->activate_at?>">
                </label>
                <label class="col">
                    <button type="submit" class="btn btn-primary">Salvar</button>
                </label>
            </div>
        </form>
    </div>
</div>

<?php $this->load->view('cliente/dash/Footer')?>