$(document).ready(function() {

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

    $('#logar').click(function(e){
        e.preventDefault()
        var email = $('#email').val()
        var password = $('#password').val()

        if(email == "" || password == ""){
            Command: toastr["error"]("Preencha todos os campos")

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
                "timeOut": "3000",
                "extendedTimeOut": "1000",
                "showEasing": "swing",
                "hideEasing": "linear",
                "showMethod": "fadeIn",
                "hideMethod": "fadeOut"
            }
            if(email == ""){$('#email').focus()}
            else if(password == ""){$('#password').focus()}
            
        }else{
            $.ajax({
                url: "Login/authentication",
                type: "post",
                dataType: "json",
                data:{
                    email: email,
                    password: password
                },
                cache: false,
                async: false,

                beforeSend : function(){
                    $(".login-box-msg").html("Autenticando...");
                    $("#logar").attr("disabled", true);
                    
               },
    
                success: function(data){
                    setTimeout(function(){
                        if(data.status == 'admin'){
                            alert('Autenticação realizada com sucesso!')

                            setTimeout(function(){
                                window.location.href = 'admin/home'
                            },2000)
        
                        }else if(data.status == 'user'){
                            alert('Autenticação realizada com sucesso!')

                            setTimeout(function(){
                                window.location.href = 'dash/home'
                            },2000)
        
        
                        }else if(data.status == 'erro'){
                            $(".login-box-msg").html("Faça login para iniciar sua sessão");
                            $("#logar").attr("disabled", false);

                            alert('Email ou password inválidos!','error')
                        }                        
                    },1000)
                }
            })
        }
        
    })
});