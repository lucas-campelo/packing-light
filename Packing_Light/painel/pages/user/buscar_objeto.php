<?php 

  session_start();

  require_once("../../../lib/back.php");
  if($_SESSION["check"]==0){
      include_once("../../../../login/lib/admin/check.php"); 
  }else{
      include_once("../../../../login/lib/admin/check_admin.php"); 
  }

  $connect = mysqli_connect("localhost", "root", '', 'objetos');
  $listar = mysqli_query($connect, "SELECT nome FROM busca_objetos"); 

  ?>


<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>PackingLight</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="../../../../rotalight/painel/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../../../rotalight/painel/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="../../../../rotalight/painel/bower_components/Ionicons/css/ionicons.min.css">
  <!-- fullCalendar -->
  <link rel="stylesheet" href="../../../../rotalight/painel/bower_components/fullcalendar/dist/fullcalendar.min.css">
  <link rel="stylesheet" href="../../../../rotalight/painel/bower_components/fullcalendar/dist/fullcalendar.print.min.css" media="print">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../../../rotalight/painel/dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="../../../../rotalight/painel/dist/css/skins/_all-skins.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  <script>
    function formatar(mascara, documento){
        var i = documento.value.length;
        var saida = mascara.substring(1,2);
        var texto = mascara.substring(i)
  
        if (texto.substring(0,1) != saida){
            documento.value += texto.substring(0,1);
        }
  
    }
  </script>
</head>
<body class="hold-transition skin-blue fixed sidebar-mini">
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="../../../index.php" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>P</b>LI</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Packing</b>Light</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          
          <!-- Menu do usuário -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <!--<img src="dist/img/user2-160x160.jpg" class="user-image" alt="User Image">-->
              <i class="fa fa-user-circle-o" aria-hidden="true"></i>
              <span class="hidden-xs"><?php if($_SESSION["check"] == 0) {echo $_SESSION["usuario"][0]; }else{echo $_SESSION["admin"][0]; }?></span>           
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="../login/painel/dist/img/PackingLight.png" class="img-square" alt="User Image">
                
                <p>
                    <?php
                        setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
                        date_default_timezone_set('America/Fortaleza');
                        echo strftime('%A, %d de %B de %Y', strtotime('today'));
                    ?>
                </p>
              </li>
              <!-- Menu Body -->
              
              <!-- Menu funcionalidades-->
              <li class="user-footer">
                <div class="pull-left">
                  <?php if($_SESSION["check"] == 0) { ?>
                  <a href="../login/painel/pages/admin/alterar_usuario.php" class="btn btn-default btn-flat">Editar dados</a>
                  <?php }else{ ?>
                  <a href="../login/painel/pages/admin/alterar_admin.php" class="btn btn-default btn-flat">Editar dados</a>
                  <?php } ?>                
                </div>
                <div class="pull-right">
                    <a href="../login/lib/logout.php" class="btn btn-default btn-flat">Sair</a>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
          <li>
            <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
          </li>
        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      
      <!-- /.search form -->
      <!-- MENU DE NAVEGAÇÃO PRINCIPAL -->
      <ul class="sidebar-menu" data-widget="tree">
<!--         <li class="header">NAVEGAÇÃO PRINCIPAL</li>
 -->        
        <!--FUNCIONALIDADES DO USUÁRIO-->        
        <li class="active treeview">
          <a href="#">
            <i class="fa fa-user"></i> <span>Menu do usuário</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
          </ul>
        </li>
        <li>
          <a href="#">
              <i class="fa fa-map-maker">
              </i>
            <span>Buscar Objeto</span>
          </a>
        </li>
        <li>
          <a href="cadastrar_objeto.php">
              <i class="fa fa-map-maker">
              </i>
            <span>Cadastrar Objeto</span>
          </a>
        </li>

      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">

      <ol class="breadcrumb">
        <?php if($_SESSION["check"] == 0) { ?>
        <li><a href="../login/painel/pages/admin/main.php"><i class="fa fa-home"></i> Home</a></li>
        <?php }else{ ?>
        <li><a href="../login/painel/pages/admin/main_admin.php"><i class="fa fa-home"></i> Home</a></li>
        <?php } ?>


      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
    
   
  <div class="register-box"  style="width: 700px">
    <!-- <div class="register-box">-->
    <div class="register-box-body">
      <p class="login-box-msg" style="font-size: large">Buscar carga já calculada</p>

      <!-- Formulário PackingLight. -->
      <form action="../../../lib/buscaObjeto.php" method="post">

        <div style="text-align: center;" class="form-group has-feedback">  
        <label style="position: absolute;" for="l_palt">Largura do pallet</label>
          <input style="position: relative; margin-left: 200px;" id = "l_palt" type = "number" name = "l_palt" value = "130" required ></br>
          <!-- <span class="glyphicon glyphicon-user form-control-feedback"></span> ícones-->
        </div>
        <div class="form-group has-feedback" style="text-align: center;">
          <label style="position: absolute;" for="c_palt">Comprimento do pallet</label>
          <input style="position: relative; margin-left: 200px;" id = "c_palt" type = "number" name = "c_palt" value = "130" required></br>
        </div></br>
        <div class="form-group has-feedback" style="text-align: center;">
          <label for = "setect_obj" style="position: absolute" >Selecione um produto</label>
          <select required name = "nome_obj" id = "setect_obj" style="position: relative; margin-left: 180px;">
            <option name ="nome_obj" value=''></option>
            <?php while ($row = mysqli_fetch_assoc($listar)) { ?><option value='<?php echo $row['nome'];?>'><?php echo $row['nome']."    ";?></option><?php } ?>
          </select>
        </div>
        <div class="row">
          <div class="col-xs-8">
            <div class="checkbox icheck">
              
            </div>
          </div>
          <!-- /.col -->
          <div class="col-xs-4" style=" width: 20%;float:right;">
            <button type="submit" name="calcula" class="btn btn-primary btn-block btn-flat">Calcular</button>
          </div>
          <!-- /.col -->
        </div>

      </form>    

      
    </div>
  </div>
  <!-- /.form-box -->
<!--</div>-->
    <!-- COLOCAR FORM CADASTRO-->    
      
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Versão</b> 1.0
    </div>
    <strong>Copyright &copy; 2018.</strong> Todos Os Direitos Reservados
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Create the tabs -->
    <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
      
    </ul>
    <!-- Tab panes -->
    <div class="tab-content">
      <!-- Home tab content -->
      <div class="tab-pane" id="control-sidebar-home-tab">
        <h3 class="control-sidebar-heading">Recent Activity</h3>
        <ul class="control-sidebar-menu">
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-birthday-cake bg-red"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Langdon's Birthday</h4>

                <p>Will be 23 on April 24th</p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-user bg-yellow"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Frodo Updated His Profile</h4>

                <p>New phone +1(800)555-1234</p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-envelope-o bg-light-blue"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Nora Joined Mailing List</h4>

                <p>nora@example.com</p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-file-code-o bg-green"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Cron Job 254 Executed</h4>

                <p>Execution time 5 seconds</p>
              </div>
            </a>
          </li>
        </ul>
        <!-- /.control-sidebar-menu -->

        <h3 class="control-sidebar-heading">Tasks Progress</h3>
        <ul class="control-sidebar-menu">
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Custom Template Design
                <span class="label label-danger pull-right">70%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-danger" style="width: 70%"></div>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Update Resume
                <span class="label label-success pull-right">95%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-success" style="width: 95%"></div>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Laravel Integration
                <span class="label label-warning pull-right">50%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-warning" style="width: 50%"></div>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Back End Framework
                <span class="label label-primary pull-right">68%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-primary" style="width: 68%"></div>
              </div>
            </a>
          </li>
        </ul>
        <!-- /.control-sidebar-menu -->

      </div>
      <!-- /.tab-pane -->
      <!-- Stats tab content -->
      <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div>
      <!-- /.tab-pane -->
      <!-- Settings tab content -->
      <div class="tab-pane" id="control-sidebar-settings-tab">
        <form method="post">
          <h3 class="control-sidebar-heading">General Settings</h3>

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Report panel usage
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
              Some information about this general settings option
            </p>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Allow mail redirect
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
              Other sets of options are available
            </p>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Expose author name in posts
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
              Allow the user to show his name in blog posts
            </p>
          </div>
          <!-- /.form-group -->

          <h3 class="control-sidebar-heading">Chat Settings</h3>

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Show me as online
              <input type="checkbox" class="pull-right" checked>
            </label>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Turn off notifications
              <input type="checkbox" class="pull-right">
            </label>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Delete chat history
              <a href="javascript:void(0)" class="text-red pull-right"><i class="fa fa-trash-o"></i></a>
            </label>
          </div>
          <!-- /.form-group -->
        </form>
      </div>
      <!-- /.tab-pane -->
    </div>
  </aside>
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="painel/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="painel/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="painel/bower_components/jquery-ui/jquery-ui.min.js"></script>
<!-- Slimscroll -->
<script src="painel/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="painel/bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="painel/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="painel/dist/js/demo.js"></script>
<!-- fullCalendar -->
<script src="painel/bower_components/moment/moment.js"></script>
<script src="painel/bower_components/fullcalendar/dist/fullcalendar.min.js"></script>
<!-- Page specific script -->
</body>
</html>