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

    //altera dados pessoais
    $('#updateDada').on('submit', function(e){
        e.preventDefault()

        var base_url  = $('#inputBaseUrl').val()
        var telephone = $('#inputTelephone').val()
        var cpf       = $('#inputCpf').val()

        $.ajax({
            url: "User_data/updateData",
            type: 'post',
            dataType: 'json',
            data: {
                telephone: telephone,
                cpf:       cpf,
            },
            // processData: false,
            // contentType: false,
            cache: false,
            async: false,

            success: function(data){
                if(data.status == 'success'){
                    alert('Dados alterados com sucesso!')
                }else{
                    alert('Não foi possível alterar seus dados', 'error')
                }
            }
        })
    })

      //altera senha
      $('#updatePassword').on('submit', function(e){
        e.preventDefault()

        var base_url  = $('#inputBaseUrl').val()
        var password  = $('#inputPassword').val()
        var password2 = $('#inputPassword2').val()

        if(password == '' || password2 == ''){
            alert('Preencha todos os campos.','error')
           return false; 
        }

        if(password != password2){
            alert('Senhas não conferem! Digite novamente nos 2 campos.','error')
           return false; 
        }

        $.ajax({
            url: "User_data/updatePassword",
            type: 'post',
            dataType: 'json',
            data: {
                password: password2,
            },
            // processData: false,
            // contentType: false,
            cache: false,
            async: false,

            success: function(data){
                if(data.status == 'success'){
                    alert('Senha alterada com sucesso!')
                }else{
                    alert('Não foi possível alterar sua senha', 'error')
                }
            }
        })
    })
    
})