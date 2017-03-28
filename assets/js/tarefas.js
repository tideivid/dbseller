  $(document).ready(function() {

  $( "#lista1, #lista2, #lista3" ).sortable({//Atualiza listas arrastando os itens
      revert :false,
      connectWith: ".sortable",
      stop         : function(event,ui){

        for(var l1 = 0;l1<$('#lista1').find('.dados').length;l1++){
            var id = $('#lista1').find('.id').eq(l1).html();
            $.ajax({
              method: "GET",
              url: "controlers/tarefas.php",
              data: "op=status&id="+id+"&status=1"
            });

        }
        for(var l1 = 0;l1<$('#lista2').find('.dados').length;l1++){
            var id = $('#lista2').find('.id').eq(l1).html();
            $.ajax({
              method: "GET",
              url: "controlers/tarefas.php",
              data: "op=status&id="+id+"&status=2"
            });

        }
        for(var l1 = 0;l1<$('#lista3').find('.dados').length;l1++){
            var id = $('#lista3').find('.id').eq(l1).html();
            $.ajax({
              method: "GET",
              url: "controlers/tarefas.php",
              data: "op=status&id="+id+"&status=3"
            });

        }
        
      }
  }).disableSelection();

    function listar_tarefas(){//Listar todas as tarefas

        $('#lista1, #lista2, #lista3').empty(); 
        $.post('controlers/tarefas.php', { op: "listar"}, function(data){
           var l1   = '';
           var l2   = '';
           var l3   = '';
           var hj   = new Date($.now()).toJSON().slice(0, 10).split("-").reverse().join("/");
           var wr   = '';
           $.each(JSON.parse(data), function(){
              switch(this.status){
                  case '1':
                    l1 += '<li class="tarefa '+wr+'" data-toggle="modal" data-target="#modal_editar">'
                    +this.titulo+'<ul class="dados"><li class="id">'+this.id+'</li><li class="titulo">'+this.titulo+'</li><li class="prazo">'+this.prazo+'</li><li class="descricao">'+this.descricao+'</li><li class="status">'+this.status+'</li><li class="usuario">'+this.usuario+'</li></ul></li>';
                    break;
                  case '2':
                    l2 += '<li class="tarefa '+wr+'" data-toggle="modal" data-target="#modal_editar">'
                    +this.titulo+'<ul class="dados"><li class="id">'+this.id+'</li><li class="titulo">'+this.titulo+'</li><li class="prazo">'+this.prazo+'</li><li class="descricao">'+this.descricao+'</li><li class="status">'+this.status+'</li><li class="usuario">'+this.usuario+'</li></ul></li>';
                    break;
                  case '3':
                    l3 += '<li class="tarefa '+wr+'" data-toggle="modal" data-target="#modal_editar">'
                    +this.titulo+'<ul class="dados"><li class="id">'+this.id+'</li><li class="titulo">'+this.titulo+'</li><li class="prazo">'+this.prazo+'</li><li class="descricao">'+this.descricao+'</li><li class="status">'+this.status+'</li><li class="usuario">'+this.usuario+'</li></ul></li>';
                    break;
              }
            });
          $("#lista1").html(l1);
          $("#lista2").html(l2);
          $("#lista3").html(l3);
        });
    }

    listar_tarefas();

    $('#submit_cadastrar').click(function(){//Cadastro de tarefas

        $('.erro').remove();
        var msg       = '';
        var valid     = true;
        var titulo    = $('#titulo');  
        var prazo     = $('#prazo');
        var descricao = $('#descricao');

        if(titulo.val() == ""){
          msg   = 'O titulo é obrigatório';
          $('<p class="erro">'+msg+'</p>').insertAfter(titulo);
          valid = false;
        }

        if(prazo.val() == ""){
          msg   = 'O prazo é obrigatório';
          $('<p class="erro">'+msg+'</p>').insertAfter(prazo);
          valid = false;
        }

        if(descricao.val() == ""){
          msg   = 'A descricao é obrigatória';
          $('<p class="erro">'+msg+'</p>').insertAfter(descricao);
          valid = false;
        }

        if(valid == true){
          $.post('controlers/tarefas.php', $('#cadastrar').serialize(), function(data){
            
            var d = $.parseJSON(data);
            
            if(d.sucesso == true){
              listar_tarefas();
            }
          });
        }else{
          return false;
        }


    });

    $('#submit_editar').click(function(){//Edição de tarefas

        $('.erro').remove();
        var msg       = '';
        var valid     = true;
        var titulo    = $('#titulo');  
        var prazo     = $('#prazo');
        var descricao = $('#descricao');

        if(titulo.val() == ""){
          msg   = 'O titulo é obrigatório';
          $('<p class="erro">'+msg+'</p>').insertAfter(titulo);
          valid = false;
        }

        if(prazo.val() == ""){
          msg   = 'O prazo é obrigatório';
          $('<p class="erro">'+msg+'</p>').insertAfter(prazo);
          valid = false;
        }

        if(descricao.val() == ""){
          msg   = 'A descricao é obrigatória';
          $('<p class="erro">'+msg+'</p>').insertAfter(descricao);
          valid = false;
        }
        
        if(valid == true){

          $.post('controlers/tarefas.php', $('#editar').serialize(), function(data){

            var d = $.parseJSON(data);
            console.log(d);
            if(d.sucesso == true){
              var msg = 'Tarefa editada com sucesso';
              $('#modal_msg').find('.linha').html(msg);
              $( ".modal_msg" ).trigger( "click" );
              listar_tarefas();            
            }else{
              var msg = 'Tarefa não editada';
              $('#modal_msg').find('.linha').html(msg);
              $( ".modal_msg" ).trigger( "click" );
            }
          });
        }else{
          return false;
        }

    });

    $('#submit_excluir').click(function(){//Exclusão de tarefas
        var id = $('#editar .id').val();
        $.ajax({
          method: "GET",
          url: "controlers/tarefas.php",
          data: "op=excluir&id="+id,
          success: function(data){
          var d = $.parseJSON(data);
          
          if(d.sucesso == true){
            var msg = 'Tarefa excluida com sucesso';
            $('#modal_msg').find('.linha').html(msg);
            $( ".modal_msg" ).trigger( "click" );
            listar_tarefas();            
          }else{
            var msg = 'Tarefa não excluida';
            $('#modal_msg').find('.linha').html(msg);
            $( ".modal_msg" ).trigger( "click" );
          }
              
          }
        });
    });


    $(document).on('click','.tarefa',function(e){//Carrega dados na modal de edição
        var dados = this;
        var id = $(dados).find('.dados .id').text();
        var usuario = $(dados).find('.dados .usuario').text();
        var titulo = $(dados).find('.dados .titulo').text();
        var prazo = $(dados).find('.dados .prazo').text();
        var descricao = $(dados).find('.dados .descricao').text();

        $('#editar .id').val(id);
        $('#editar .titulo').val(titulo);
        $('#editar .usuario').val(usuario);
        $('#editar .prazo').val(prazo);
        $('#editar .descricao').text(descricao);
        
    });

});