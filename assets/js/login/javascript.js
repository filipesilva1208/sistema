$(document).ready(function() {
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
                            Command: toastr["success"]("Autenticação realizada com sucesso!")
        
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
                                "timeOut": "2000",
                                "extendedTimeOut": "1000",
                                "showEasing": "swing",
                                "hideEasing": "linear",
                                "showMethod": "fadeIn",
                                "hideMethod": "fadeOut"
                            }
        
                            setTimeout(function(){
                                window.location.href = 'dash/home'
                            },2000)
        
                        }else if(data.status == 'user'){
                            Command: toastr["success"]("Autenticação realizada com sucesso!")
        
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
                                "timeOut": "2000",
                                "extendedTimeOut": "1000",
                                "showEasing": "swing",
                                "hideEasing": "linear",
                                "showMethod": "fadeIn",
                                "hideMethod": "fadeOut"
                            }
                            setTimeout(function(){
                                window.location.href = 'dash/home'
                            },2000)
        
        
                        }else if(data.status == 'erro'){
                            $(".login-box-msg").html("Faça login para iniciar sua sessão");
                            $("#logar").attr("disabled", false);
                            Command: toastr["error"]("Email ou password inválidos!")
        
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
                        }                        
                    },1000)
                }
            })
        }
        
    })
});