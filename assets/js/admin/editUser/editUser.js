$(document).ready(function(){
    $("input[name=inputTelephone]").mask("(00) 0 0000 0009")
    $("input[name=inputCpf]").mask("000.000.000-00")
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


    $('#UpdateUser').submit(function(e){
        e.preventDefault()             
        var base_url = $('#base_url').val()
        
        $.ajax({
            url: base_url + "admin/List_users/updateUser",
            type: "POST",
            dataType: "json",
            data: $(this).serialize(),

            success: function(data){
                if(data.status === 'success'){
                    alert('Alteração realizada com sucesso!')
                }else{
                    alert('Não foi possível alterar os dados deste usuário.','error')
                }
            }
        })
    })
})