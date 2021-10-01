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

    
    $('#updateProfile').submit(function(e){
        e.preventDefault()
        
        var base_url  = $('#inputBaseUrl').val()

        $.ajax({
            url: base_url + "dash/User_data/updateProfile",
            type: 'post',
            data: {file: $('#file').val()},
            processData: false,
            contentType: false,
            cache: false,
            async: false,
            success: function(data){
                if(data.status == 'success'){
                    alert('Imagem de perfil atualizada com sucesso!')
                }else{
                    alert('Não foi possível alterar sua imagem de perfil', 'error')
                }
            },
            
        })
    })
   

})