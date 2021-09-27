$(document).ready(function (){
    $("#telephone").mask("(00) 0 0000 0009")
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
    
    const base_url    = $('#base_url').val()
    const sponsor     = $('#sponsor').val()
    const name        = $('#name').val()
    const email       = $('#email').val()
    const password    = $('#password').val()
    const telephone   = $('#telephone').val()
    const r_password  = $('#r_password').val()       

    $('#r_password').on('blur', function(){
        alert('ok')
    })

    $('#form').on('submit',function(e){
        e.preventDefault()
        
        if(sponsor == ''){
            alert('Você precisa ser convidado para concluir seu cadastro','info')
            return false
        }

        if(name == '' || email == '' || telephone == '' || password == '' || r_password == '' ){
            alert('Preencha todos os compos!','error')
        }else{
            $.ajax({
                url: base_url +'Register/send',
                type: 'POST',
                dataType: 'json',
                data: new FormData(this),
                processData: false,
                contentType: false,
                cache: false,
                async: false,
                beforeSend : function(){
                    $(".register-box-msg").html("Registrando...")
                    $("#btnRegister").attr("disabled", true)
                    
               },

                success: function(data){
                  setTimeout(function(){
                    if(data.status == 'success'){
                        alert(data.msg_text,data.type,data.title)
                        $(".register-box-msg").html("")
                        setTimeout(function(){
                            alert('Uma senha temporária foi enviada para seu email!','success','Importante!')
                            setTimeout(function(){
                                window.location.href = base_url+'login'
                            },3000)
                        },1000)

                    }else if(data.status == 'exists'){
                        alert(data.msg_text,data.msg_type,data.msg_title)

                        $(".register-box-msg").html("Registre uma nova conta")
                        $("#btnRegister").attr("disabled", false);

                    }else if(data.status == 'invalidemail'){
                        alert(data.msg_text,data.msg_type,data.msg_title)

                        $(".register-box-msg").html("Registre uma nova conta")
                        $("#btnRegister").attr("disabled", false);

                    }else if(data.status == 'invalidsponsor'){
                        alert(data.msg_text,data.msg_type,data.msg_title)

                        $(".register-box-msg").html("Registre uma nova conta")
                        $("#btnRegister").attr("disabled", false);

                    }else{
                        alert(data.msg_text,data.msg_type,data.msg_title)

                        $(".register-box-msg").html("Registre uma nova conta")
                        $("#btnRegister").attr("disabled", false);
                    }
                  },1500)
                }
            })
        }

    })
    
    
})