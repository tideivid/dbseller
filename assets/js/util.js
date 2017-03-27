  $(document).ready(function() {

  	$("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });

    $('#table_usuario').DataTable();
    $('#table_usuario_info, #table_usuario_length').remove();
    $(".form_datetime").datetimepicker({
        format: "dd/mm/yyyy",
         minView: 2, 
         autoclose: true,
         minDate: '0'
    });


    $('input').focus(function(){
      $('.erro').remove();
    });
    
    $('.reset').click(function(){
      $('form').each (function(){
        this.reset();
      });
    });

    $('#form_login').submit(function(){
        $('.erro').remove();
        var msg       = '';
        var valid     = true; 
        var email     = $('#username');
        var senha     = $('#password');
        var v_email   = /^\b[A-Z0-9._%-]+@[A-Z0-9.-]+\.[A-Z]{2,4}\b$/i;

        if(email.val() == ""){
          msg   = 'O email é obrigatório';
          $('<p class="erro">'+msg+'</p>').insertAfter(email);
          valid = false;
        }
        
        if(senha.val() == ""){
          msg   = 'A senha é obrigatória';
          $('<p class="erro">'+msg+'</p>').insertAfter(senha);
          valid = false;
        }

        if(valid == true){
          return true;
        }else{
          return false;
        }

    });

  //Modal
    function update() {
      var width = $(document).width();
      var height = $(document).height();
        $('.modal-fluid').css({
        width: width * 0.8,
        marginLeft: -(width * 0.4)
      });
      $('.modal-fluid .modal-body').css({
        maxHeight: (height * 0.8) - 136
      });
      $('.modal-fluid').each(function () {
      $(this).css({
        marginTop: -($(this).height() / 2),
      });
      });
    }
    $(document).resize(update);
    update();

});
