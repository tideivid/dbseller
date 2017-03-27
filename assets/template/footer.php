    <!-- jQuery Version 1.11.1 -->
    <script src="<?php echo URL;?>lib/js/jquery.js?p=<?php echo time();?>"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo URL;?>lib/js/bootstrap.min.js?p=<?php echo time();?>"></script>  
    <!-- DataTable Core JavaScript -->
    <script src="<?php echo URL;?>lib/js/dataTables.js?p=<?php echo time();?>"></script> 

    <!-- DatatimePiker Core JavaScript -->
    <script src="<?php echo URL;?>lib/js/datetimepiker.js?p=<?php echo time();?>"></script>

    <!-- JQUERY UI js-->
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js?p=<?php echo time();?>"></script>
    <!-- Custom js-->
    <script src="<?php echo URL;?>assets/js/util.js?p=<?php echo time();?>"></script>

    <?php 
        if(isset($_SESSION['login'])){?>
        <!-- Tarefas js-->
        <script src="<?php echo URL;?>assets/js/tarefas.js?p=<?php echo time();?>"></script>    
        <!-- Usuarios js-->
     	<script src="<?php echo URL;?>assets/js/usuarios.js?p=<?php echo time();?>"></script>

    <?php }?>

</body>

</html>