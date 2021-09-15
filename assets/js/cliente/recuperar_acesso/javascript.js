 $(document).ready(function() {
     $('#Recuperar_acesso').submit(function(e) {   
        e.preventDefault();
        var base_url = $('#base_url').val(); 
        $('#btn_submit').attr('disabled', true) 
        console.log('chegou')
        $.ajax({
            url: base_url+'Recuperar_acesso/send',
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
                    console.log('Success')
                    $('#msg').html('<div id="msgerror" class="alert alert-success"><i class="fas fa-check-circle"></i> Nova senha encaminhada para seu email!<br> Verifique caixa de spam.</div>')
                    setTimeout(function(){ 
                        window.location.href = base_url + 'inicio';
                    }, 3000);

                } else if(result.status == 'erroemail') { 
                    console.log('Erro')
                    $('#msg').html('<div id="msgerror" class="alert alert-danger"><i class="fas fa-question-circle"></i> Email não encontrato</div>')
                    setTimeout(function(){ 
                        $('#msgerror').remove();
                        $('#btn_submit').attr('disabled', false) 
                    }, 3000);
                }else if(result.status == 'false') { 
                    console.log('Erro')
                    $('#msg').html('<div id="msgerror" class="alert alert-danger"><i class="fas fa-times-circle"></i> Erro ao enviar nova senha</div>')
                    setTimeout(function(){ 
                        $('#msgerror').remove();
                        $('#btn_submit').attr('disabled', false) 
                    }, 3000);
                }
            }
        });
    });
});