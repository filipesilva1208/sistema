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
  
    $('#Recuperar_acesso').submit(function(e) {   
       e.preventDefault();
       var base_url = $('#base_url').val(); 
       $('#btn_submit').attr('disabled', true) 

       $.ajax({
           url: base_url+'Forgotpass/send',
           type: "post",
           data: new FormData(this), 
           processData: false,
           contentType: false,
           cache: false,
           async: false,

           success: function(data) {
               var result = JSON.parse(data);
               console.log(result)
               if (result.status == 'success'){
                   alert('Nova senha encaminhada para seu email! Verifique caixa de spam.')
                   setTimeout(function(){ 
                       window.location.href = base_url + 'login';
                   }, 3000);

               } else if(result.status == 'erroemail') { 
                   alert('Email não encontrato','error')
                   setTimeout(function(){ 
                       $('#btn_submit').attr('disabled', false) 
                   }, 3000);
               }else if(result.status == 'false') { 
                   alert('Erro ao enviar nova senha','error')
                   setTimeout(function(){ 
                       $('#msgerror').remove();
                       $('#btn_submit').attr('disabled', false) 
                   }, 3000);
               }
           }
       });
   });
});