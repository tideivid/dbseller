        <!-- Sidebar -->
        <div id="sidebar-wrapper">
            <ul class="sidebar-nav">
                <li class="sidebar-brand">
                </li>
                <li>
                    <a href="<?php echo URL;?>tarefas">Tarefas</a>
                </li>
                    <?php
                        if($_SESSION['login']['tipo'] == '2'){
                    ?>
                <li>
                    <a href="<?php echo URL;?>usuarios">Usuários</a>
                </li> 
                 <?php
                        }
                    ?>
                <li>
                    <a href="<?php echo URL;?>sair">Sair</a>
                </li>
            </ul>
        </div>
        <!-- /#sidebar-wrapper -->
        <a href="#menu-toggle" class="btn btn-default" id="menu-toggle">Menu</a>