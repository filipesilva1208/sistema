<?php $this->load->view('cliente/Header')?>

<div class="card">
    <div class="card-header">
        <h3 class="card-title">Listando todos os usuários</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <table id="listUsers" class="table table-bordered table-striped text-center">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Email</th>
                    <th>Telefone</th>
                    <th><i class="fas fa-cog"></i></th>
                </tr>
            </thead>
            <tbody></tbody>
            <tfoot>
                <tr>
                    <th>Nome</th>
                    <th>Email</th>
                    <th>Telefone</th>
                    <th><i class="fas fa-cog"></i></th>
                </tr>
            </tfoot>
        </table>
    </div>
    <!-- /.card-body -->
</div>
<!-- /.card -->


<?php $this->load->view('cliente/dash/Footer')?>