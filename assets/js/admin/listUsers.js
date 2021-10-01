$(document).ready(function(){

    function alert(msg, type = 'success', title = null ){

        Command: toastr[type](msg,title)

        toastr.options = {
            "closeButton": true,
            "debug": false,
            "newestOnTop": false,
            "progressBar": true,
            "positionClass": "toast-top-right",
            "preventDuplicates": false,
            "onclick": null,
            "showDuration": "300",
            "hideDuration": "1000",
            "timeOut": "5000",
            "extendedTimeOut": "1000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
        }
    }

    var dataTable = $("#listUsers").DataTable({
        "responsive":   true,
        "lengthChange": true,
        "autoWidth":    false,
        "processing":   true,
        "serverSide":   true,
        "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"],
        "order":[],
        "language": {
            "lengthMenu": "Mostrando _MENU_ registros",
            "zeroRecords": "Nada encontrado",
            "info": "Mostrando pagina _PAGE_ de _PAGES_",
            "search": "Pesquisar",
            "infoEmpty": "Nenhum registro disponível",
            "infoFiltered": "(Filtrado de from _MAX_ registros total)",
            "paginate": {
                "next": "Próximo",
                "previous": "Anterior",
                "first": "Primeiro",
                "last": "Último"
            },
            
        },
        "ajax": {
            url: "List_users/getAllUsers",
            type: "POST",             
            
        },
        "columnDefs":[
            {
                "target": [1,3,3],
                "orderable": false
            },
            
        ],

    }).buttons().container().appendTo('#listUsers_wrapper .col-md-6:eq(0)');
   
    

    //blocked user
    $(this).on("click", "#blocked_id",function(e){
        e.preventDefault()

        var blocked_id = $(this).attr("value")

        if(blocked_id == ""){
            alert("Id requerido")
        }else{
            var resultado = confirm("Bloquear usuário?");
            if (resultado == true) {
               $.ajax({
                   url: "List_users/blockedUser" ,
                   type: "post",
                   dataType: "json",
                   data: {blocked_id: blocked_id},

                   success: function(data){
                    if(data.status == 'success'){
                        alert('Usuário bloqueado!')
                        $('#listUsers').DataTable().ajax.reload( null, false );
                    }else{
                     alert('Não foi possível desbloquear este usuário!','error')
                    }
                   }
               })
            }
        }
    })
    //blocked user

    //unlock user
    $(this).on("click", "#unlock_id",function(e){
        e.preventDefault()

        var unlock_id = $(this).attr("value")

        if(unlock_id == ""){
            alert("Id requerido")
        }else{
            var resultado = confirm("Desbloquear usuário?");
            if (resultado == true) {
               $.ajax({
                   url: "List_users/unlockUser" ,
                   type: "post",
                   dataType: "json",
                   data: {unlock_id: unlock_id},

                   success: function(data){
                       if(data.status == 'success'){
                           alert('Usuário desbloqueado!','success')
                           $('#listUsers').DataTable().ajax.reload( null, false );
                       }else{
                        alert('Não foi possível desbloquear este usuário!','error')
                       }
                   }
               })
            }
        }
    })
    //unlock user

    //active user
    $(this).on("click", "#active_id",function(e){
        e.preventDefault()

        var active_id = $(this).attr("value")

        if(active_id == ""){
            alert("Id requerido")
        }else{
            var resultado = confirm("Ativar usuário?");
            if (resultado == true) {
               $.ajax({
                   url: "List_users/activateUser" ,
                   type: "post",
                   dataType: "json",
                   data: {active_id: active_id},

                   success: function(data){
                       if(data.status == 'success'){
                           alert('Usuário ativado!','success')
                           $('#listUsers').DataTable().ajax.reload( null, false );
                       }else{
                        alert('Não foi possível ativar este usuário!','error')
                       }
                   }
               })
            }
        }
    })
    //active user

     //desable user
     $(this).on("click", "#desable_id",function(e){
        e.preventDefault()

        var desable_id = $(this).attr("value")

        if(desable_id == ""){
            alert("Id requerido")
        }else{
            var resultado = confirm("Desativar usuário?");
            if (resultado == true) {
               $.ajax({
                   url: "List_users/desableUser" ,
                   type: "post",
                   dataType: "json",
                   data: {desable_id: desable_id},

                   success: function(data){
                       if(data.status == 'success'){
                           alert('Usuário desativado!','success')
                           $('#listUsers').DataTable().ajax.reload( null, false );
                       }else{
                        alert('Não foi possível desativar este usuário!','error')
                       }
                   }
               })
            }
        }
    })
    //desable user
})
