$(document).ready(function() {

    function listar_usuarios(){//Listar todas os usuarios

        $('#lista_usuarios tbody').empty(); 
        $.post('controlers/usuarios.php', { op: "listar"}, function(data){
           var l1 = '';

           $.each(JSON.parse(data), function(){
            var tipo = '';
            if(this.tipo == '1'){
                tipo = 'Normal';
            }else{
                tipo = 'Administrador';
            }
              l1 += '<tr class="usuario" data-toggle="modal" data-target="#modal_editar_usuario"><td>'+this.id+'</td><td>'+this.nome+'</td><td>'+this.email+'</td><td>'+tipo+'<ul class="dados"><li class="id">'+this.id+'</li><li class="nome">'+this.nome+'</li><li class="email">'+this.email+'</li><li class="tipo">'+this.tipo+'</li></ul></td></tr>';
            });
          $("#lista_usuarios tbody").html(l1);
        });
    }

    listar_usuarios();

    function select_usuarios(){
          $.post('controlers/usuarios.php', { op: "listar"}, function(data){
           var l1 = '';

           $.each(JSON.parse(data), function(){
              l1 += '<option value="'+this.id+'">'+this.nome+'</option>';
            });
          $("select.usuario").html(l1);
        });
    }

    select_usuarios();

    $('#submit_cadastro_usuario').click(function(){//Cadastro de usuario
        $('.erro').remove();
        var msg       = '';
        var valid     = true;
        var nome      = $('#nome');  
        var email     = $('#email');
        var senha     = $('#senha');

        var v_email   = new RegExp(/^[+a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/i);

        if(nome.val() == ""){
          msg   = 'O nome é obrigatório';
          $('<p class="erro">'+msg+'</p>').insertAfter(nome);
          valid = false;
        }

        if(email.val() == ""){
          msg   = 'O email é obrigatório';
          $('<p class="erro">'+msg+'</p>').insertAfter(email);
          valid = false;
        }else{
            if(!v_email.test(email.val())){
                msg   = 'O email é inválido';
                $('<p class="erro">'+msg+'</p>').insertAfter(email);
                valid = false;
            }
        }

        if(senha.val() == ""){
          msg   = 'A senha é obrigatória';
          $('<p class="erro">'+msg+'</p>').insertAfter(senha);
          valid = false;
        }
        
        if(valid == true){
          $.post('controlers/usuarios.php', $('#cadastro_usuario').serialize(), function(data){
            
             var d = $.parseJSON(data);
            
            if(d.sucesso == true){
              var msg = 'Usuário cadastrado com sucesso';
              $('#modal_msg').find('.linha').html(msg);
              $( ".modal_msg" ).trigger( "click" );
              listar_usuarios();          
            }else{
              var msg = 'Erro ao cadastrar usuário.';
              $('#modal_msg').find('.linha').html(msg);
              $( ".modal_msg" ).trigger( "click" );
            }
          });
      }else{
        return false;
      }
    });

    $('#submit_editar_usuario').click(function(){//Edição de tarefas
        $('.erro').remove();
        var msg       = '';
        var valid     = true;
        var nome      = $('#nome');  
        var email     = $('#email');
        var senha     = $('#senha');

        var v_email   = /^\b[A-Z0-9._%-]+@[A-Z0-9.-]+\.[A-Z]{2,4}\b$/i;

        if(nome.val() == ""){
          msg   = 'O nome é obrigatório';
          $('<p class="erro">'+msg+'</p>').insertAfter(nome);
          valid = false;
        }

        if(email.val() == ""){
          msg   = 'O email é obrigatório';
          $('<p class="erro">'+msg+'</p>').insertAfter(email);
          valid = false;
        }else{
            if(!v_email.test(email)){
                msg   = 'O email é inválido';
                $('<p class="erro">'+msg+'</p>').insertAfter(email);
                valid = false;
            }
        }
        if(valid == true){
          $.post('controlers/usuarios.php', $('#editar_usuario').serialize(), function(data){

             var d = $.parseJSON(data);
            
            if(d.sucesso == true){
              var msg = 'Usuário editado com sucesso';
              $('#modal_msg').find('.linha').html(msg);
              $( ".modal_msg" ).trigger( "click" );
              listar_usuarios();            
            }else{
              var msg = 'Usuário não editado';
              $('#modal_msg').find('.linha').html(msg);
              $( ".modal_msg" ).trigger( "click" );
            }
          });
        }else{
          return false;
        }
    });

    $('#submit_excluir_usuario').click(function(){//Exclusão de usuarios
        var id = $('#editar_usuario .id').val();
        $.ajax({
          method: "GET",
          url: "controlers/usuarios.php",
          data: "op=excluir&id="+id,
          success: function(data){
          var d = $.parseJSON(data);
          
          if(d.sucesso == true){
            var msg = 'Usuário excluido com sucesso';
            $('#modal_msg').find('.linha').html(msg);
            $( ".modal_msg" ).trigger( "click" );
            listar_usuarios();            
          }else{
            var msg = 'Usuário não excluido';
            $('#modal_msg').find('.linha').html(msg);
            $( ".modal_msg" ).trigger( "click" );
          }
              
          }
        });
    });

    $(document).on('click','.usuario',function(e){//Carrega dados na modal de edição
        var dados = this;
        var id = $(dados).find('.dados .id').text();
        var nome = $(dados).find('.dados .nome').text();
        var email = $(dados).find('.dados .email').text();
        var tipo = $(dados).find('.dados .tipo').text();

        $('#editar_usuario .id').val(id);
        $('#editar_usuario .nome').val(nome);
        $('#editar_usuario .email').val(email);
        $('#editar_usuario .tipo').val(tipo);
       
    });

});
