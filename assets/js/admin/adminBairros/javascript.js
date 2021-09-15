function meu_callback2(conteudo) {
    if (!("erro" in conteudo)) {
        console.log('conteudo é: '+ conteudo)
        //Atualiza os campos com os valores.
        if(conteudo.bairro.length > 0){
            document.getElementById('bairro').value = (conteudo.bairro);
            $('#nome_bairro').html(conteudo.bairro)
            $('#alert').html('<span class="text-success"><i class="fas fa-check-circle"></i> Cep validado com sucesso!</span>')
            $('#cadastrar').prop("disabled", false)
            $('#ceperror').addClass('d-none')
        }else{            
            $('#alert').html('<span class="text-danger"><i class="fas fa-exclamation-triangle"></i> Nome do bairro não encontrado!</span>')
        }
    } //end if.
    else {
        //CEP não Encontrado.
        $('#nome_bairro').html('')
        $('#alert').html('<span class="text-danger"><i class="fas fa-times-circle"></i> Cep inválido!</span>')
        $('#cadastrar').prop("disabled", true)
        limpa_formulário_cep();
        //alert("CEP não encontrado.");
        $('#alert').removeClass('d-none')
    }
}

function pesquisacep2(valor) {

    //Nova variável "cep" somente com dígitos.
    var cep = valor.replace(/\D/g, '');

    //Verifica se campo cep possui valor informado.
    if (cep != "") {

        //Expressão regular para validar o CEP.
        var validacep = /^[0-9]{8}$/;

        //Valida o formato do CEP.
        if (validacep.test(cep)) {

            //Preenche os campos com "..." enquanto consulta webservice.
            document.getElementById('bairro').value = "...";

            //Cria um elemento javascript.
            var script = document.createElement('script');

            //Sincroniza com o callback.
            script.src = 'https://viacep.com.br/ws/' + cep + '/json/?callback=meu_callback2';

            //Insere script no documento e carrega o conteúdo.
            document.body.appendChild(script);

            
           
        } //end if.
        else {
            //cep é inválido.
            limpa_formulário_cep();
            //alert("Formato de CEP inválido.");
            //window.location = window.location;
        }
    } //end if.
    else {
        //cep sem valor, limpa formulário.
        limpa_formulário_cep();
    }
};

function SomenteNumbers(input) {
    input.value = input.value.replace(/([^\d.])+/gim, ''); //apenas números e ponto 
}

$(document).ready(function(e){
    function fetch(){
        var base_url = $('#base_url').val(); 
        $.ajax({
            url: base_url +"Bairros/getBairros",
            type:"post",
            dataType: "json",
            success: function(data){
                var tbody = ""

                for (var key in data){
                    tbody += "<tr class='bloco'>"
                    tbody += "<td>"+data[key]['nome_bairro']+"</td>"
                    tbody += "<td>"+reais(data[key]['frete'])+"</td>"
                    tbody += `<td>
                                <a href="#" class="btn btn-sm btn-outline-danger" id="del" value="${data[key]['id']}" name="${data[key]['nome_bairro']}"
                                data-toggle="tooltip" data-placement="top" title="Apagar"><i class="fas fa-trash-alt"></i></a>

                                <a href="#" class="btn btn-sm btn-outline-primary" id="edit" value="${data[key]['id']}"
                                data-toggle="tooltip" data-placement="top" title="Editar"><i class="far fa-edit"></i></a>
                                </td>`
                    tbody += "<tr>"
                }
                $('#tbody').html(tbody)

               
            }
        })
    }
    fetch()

    //del
    $(document).on("click", "#del",function(e){
        e.preventDefault()

        var base_url = $('#base_url').val();
        var del_id = $(this).attr("value")
        var bairro = $(this).attr("name")
        if(del_id == ""){
            alert("Id requerido")
        }else{
            var resultado = confirm("Deseja excluir o bairro " + bairro + " ?");
            if (resultado == true) {
               $.ajax({
                   url: base_url + "Bairros/delete" ,
                   type: "post",
                   dataType: "json",
                   data: {del_id: del_id},

                   success: function(data){
                       fetch()
                       $('#msg_del').html(`
                       <div class="alert alert-success alert-dismissible fade show" role="alert">
                       <i class="fas fa-check-circle"></i> Bairro excluído com sucesso!
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                       `)
                   }
               })
            }
        }
    })
    //del


    $('input[name="valor_frete"]').click(function(){
        $('#msg').html('<span class="text-danger"><i class="fas fa-exclamation-circle"></i> Use ponto. Ex: 1.50</span>')
    })

    //CADASTRO DE NOVOS BAIRROS
    $('#cadastraBairro').submit(function(e) { 
        e.preventDefault();
        var base_url = $('#base_url').val(); 
        $.ajax({
            url: base_url + 'Bairros/Cadastro',
            type: "post",
            data: new FormData(this), 
            processData: false,
            contentType: false,
            cache: false,
            async: false,

            success: function(data){
                var result = JSON.parse(data)
                console.log(result)

                if(result.status == 'success'){
                    $('#alert').html('<p class="alert alert-success"><i class="fas fa-check-circle"></i> Bairro inserido com sucesso!</p>')
                    $('#sair').removeClass('d-none')
                    $('#nome_bairro').html("")
                    setTimeout(function(){
                        $('#cep').focus()
                        $('#cadastraBairro input').val('')
                        $('#alert').html('<p class="alert alert-success"><i class="fas fa-check-circle"></i> Continue cadastrando</p>')
                    },2500)

                    fetch()

                }else{
                    $('#alert').html('<p class="alert alert-danger"><i class="fas fa-times-circle"></i> Bairro inválido, ou já cadastrado.</p>')
                    setTimeout(function(){
                        $('#nome_bairro').html("")
                        $('#cep').focus()
                        $('#cadastraBairro input').val('')
                        $('#alert').html('<p class="alert alert-success"><i class="fas fa-check-circle"></i> Continue cadastrando</p>')
                    },2500)
                }
            }
        })
        
        

    })

    //carrega modal com os dados
    $(document).on("click", "#edit", function(e){
        e.preventDefault()


        var edit_id = $(this).attr('value')
        var base_url = $('#base_url').val();

        if(edit_id == ""){
            alert('Id requerido')
        }else{
            $.ajax({
                url: base_url + "Bairros/getBairro",
                type: "post",
                dataType: "json",
                data:{edit_id: edit_id},

                success: function(data){
                    console.log(data)
                    if(data.status ==  'success'){
                        $('#editModal').modal('show')
                        $('#alert_edit').html('')
                        $('#edit_modal_id').val(data.post.id)
                        $('#edit_frete').val(data.post.frete)
                        $('#edit_nome_bairro_titulo').html(data.post.nome_bairro)
                        $('#edit_nome_bairro').html('<small>Bairro </small><br><h3>'+data.post.nome_bairro+'</h3>')
                    }else{
                        console.log('houve um erro!')

                    }
                }
            })
        }
    })
    //carrega modal com os dados

    //atualiza os dados
    $(document).on("click","#update", function(e){
        e.preventDefault()

        var base_url = $('#base_url').val();

        var edit_id = $("#edit_modal_id").val()
        var edit_frete = $("#edit_frete").val()

        if(edit_id == "" || edit_frete == ""){
            alert('Camos requeridos')
        }else{
            $.ajax({
                url: base_url + "Bairros/Update",
                type:"post",
                dataType: "json",
                data:{
                    edit_id: edit_id,
                    edit_frete: edit_frete,
                },

                success: function(data){
                    fetch()
                    if(data.status == "success"){
                        $('#alert_edit').html('<p class="alert alert-success"><i class="fas fa-check-circle"></i> Taxa atualizada com sucesso!</p>')
                        setTimeout(function(){
                            $('#editModal').modal('hide')
                        },2000)
                    }else{
                        $('#alert_edit').html('<p class="alert alert-danger">Ops...Houve um erro! </p>')
                        setTimeout(function(){
                            $('#editModal').modal('hide')
                        },2000)
                    }
                }
            })
        }

    })
    //atualiza os dados

    //função para formatar valor em BRL
    function reais(valor){
        var valor = parseFloat(valor)
        var result = valor.toLocaleString('pt-BR', {style: 'currency', currency: 'BRL'})
        return result
    }
    //função para formatar valor em BRL
    
})