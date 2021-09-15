$(document).ready(function() {
    function ajax(){
        var valor_comanda = parseFloat($('#valor_comanda').val())
        var comanda = valor_comanda.toLocaleString('pt-BR', {style: 'currency', currency: 'BRL'})
        var base_url = $('#base_url').val(); 
        var bairro = $('#bairro').val(); 

        $.ajax({
            url: base_url + 'Bairros/consultaBairro',
            type: "post",
            data: {"nome_bairro": bairro},//new FormData(this), 
            //processData: false,
            //contentType: false,
            cache: false,
            async: false,

            success: function(data){
                var result = JSON.parse(data)
                console.log(result)

                if(result.status > 0){
                    var valor_frete = parseFloat(result.status)
                    $('#input_valor_frete').val(valor_frete)
                    
                    var total_comanda = valor_comanda + valor_frete

                    var valor_frete = valor_frete.toLocaleString('pt-BR', {style: 'currency', currency: 'BRL'})
                    var total_comanda = total_comanda.toLocaleString('pt-BR', {style: 'currency', currency: 'BRL'})

                    $('#msg').html("<div class='alert alert-success text-center my-2'>Entregamos no seu Bairro :).</div>")
                    $('#valor_frete').html('Taxa entrega: '+ valor_frete)
                    $('#total_comanda').html(total_comanda)
                    $('#resumo_comanda').html("Total do seu pedido: "+total_comanda)
                   

                }else{
                    $('#total_comanda').html(comanda)
                    $('#valor_frete').html("")
                    $('#resumo_comanda').html("")
                    $('#FormFinalizarPedido').addClass('d-none')
                    $('#FormFinalizarPedido input').val("")
                    $('#msg').html("<div class='alert alert-danger text-center'>Por enquanto ainda não entregamos no seu Bairro.</div>")
                    
                    setTimeout(function(){
                        $('#msg').html("<div class='alert alert-success text-center'>Tente um novo endereço</div>")                    
                        $('#FormFinalizarPedido').removeClass('d-none')
                    },3000)
                }
            }
        })
    }
    $("input[name='cep']" ).blur(function(){       
        ajax()
    })
    $("input[name='rua']" ).blur(function(){       
        ajax()
    })
    $("input[name='bairro']" ).blur(function(){       
        ajax()
    })
})