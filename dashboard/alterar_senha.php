<?php
session_start();  //A seção deve ser iniciada em todas as páginas
if (!isset($_SESSION['usuarioID'])) {   //Verifica se há seções
        session_destroy();            //Destroi a seção por segurança
        header("Location: ../login/"); exit; //Redireciona o visitante para login
}
?><!DOCTYPE html>
  <html>
    <head>
      <!--Import Google Icon Font-->
      <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <!--Import materialize.css-->
      <link type="text/css" rel="stylesheet" href="../css/materialize.min.css"  media="screen,projection"/>

      <link type="text/css" rel="stylesheet" href="../css/style.css"  />
      <title>Menus | Lá de Casa</title>

      <link rel="apple-touch-icon" sizes="57x57" href="../img/fav/apple-icon-57x57.png">
      <link rel="apple-touch-icon" sizes="60x60" href="../img/fav/apple-icon-60x60.png">
      <link rel="apple-touch-icon" sizes="72x72" href="../img/fav/apple-icon-72x72.png">
      <link rel="apple-touch-icon" sizes="76x76" href="../img/fav/apple-icon-76x76.png">
      <link rel="apple-touch-icon" sizes="114x114" href="../img/fav/apple-icon-114x114.png">
      <link rel="apple-touch-icon" sizes="120x120" href="../img/fav/apple-icon-120x120.png">
      <link rel="apple-touch-icon" sizes="144x144" href="../img/fav/apple-icon-144x144.png">
      <link rel="apple-touch-icon" sizes="152x152" href="../img/fav/apple-icon-152x152.png">
      <link rel="apple-touch-icon" sizes="180x180" href="../img/fav/apple-icon-180x180.png">
      <link rel="icon" type="image/png" sizes="192x192"  href="../img/fav/android-icon-192x192.png">
      <link rel="icon" type="image/png" sizes="32x32" href="../img/fav/favicon-32x32.png">
      <link rel="icon" type="image/png" sizes="96x96" href="../img/fav/favicon-96x96.png">
      <link rel="icon" type="image/png" sizes="16x16" href="../img/fav/favicon-16x16.png">
      <link rel="manifest" href="../img/fav/manifest.json">
      <meta name="msapplication-TileColor" content="#ffffff">
      <meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
      <meta name="theme-color" content="#F39C12">

      <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    </head>

    <body>

      <div class="tudo row">

          <div class="navbar-fixed">
            <nav id="navbar" class="navMenus">
              <div class="nav-wrapper">
                <a href="../" class="brand-logo">Lá de Casa</a>
                <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
                <ul class="right hide-on-med-and-down">
                  <li><a class="menuItem" href="../">Home</a></li>
                  <li><a class="menuItem" href="../#comofunciona">Como funciona</a></li>
                  <li><a class="menuItem" href="../#quemsomos">Quem Somos</a></li>
                  <li><a class="menuItem" href="../#ondeestamos">Onde estamos</a></li>
                  <li><a class="menuItem" href="../menus">Cardápios</a></li>
                  <li><a class="loginBtn btn" href="../login">Login</a></li>
                </ul>
                <ul class="side-nav" id="mobile-demo">
                  <li><a class="menuItem" href="../">Home</a></li>
                  <li><a class="menuItem" href="../#comofunciona">Como funciona</a></li>
                  <li><a class="menuItem" href="../#quemsomos">Quem Somos</a></li>
                  <li><a class="menuItem" href="../#ondeestamos">Onde estamos</a></li>
                  <li><a class="menuItem" href="../menus">Cardápios</a></li>
                  <li><a class="loginBtn btn" href="../login">Login</a></li>
                </ul>
              </div>
            </nav>
          </div>

        <div class="container">
          <div class="col l8 offset-l2 s12 menus boletao">

            

            <div class="tituloMenus tituloPagamentos col l7 s12">
              <h4>Alterar Senha</h4>
              <span>Digite sua senha atual e a senha que deseja passar a utilizar no site.</span>
            </div>

            <img src="../img/icones/fix.svg" class="col l4 offset-l1 s12 salvelocos">


            <div class="conteudoCadastro col l12 s12" style="text-align: left; margin-top: 30px !important;">
              <form id="formRecupera">
                <span class="spanCadastro">Senha Atual:</span>
                <input type="text" name="antiga" id="antiga" required>

                <span class="spanCadastro">Senha Nova:</span>
                <input type="text" name="nova" id="nova" required>

                <div class="chip red white-text" id="erro" style="display: none;">Esta não é a sua senha atual!</div>

                <div class="btnBottom row" align="center" >
                  <input style="margin-top: -30px !important;" id="recuperar" class="col l4 offset-l4" type="submit" name="enviar" value="Enviar">
                </div>
              </form>
            </div>
            
          </div>

          

          
        </div>
      </div>

      <!--Import jQuery before materialize.js-->
      <script type="text/javascript" src="../js/jquery.min.js"></script>
      <script type="text/javascript" src="../js/materialize.min.js"></script>
      <script type="text/javascript">
        $(document).ready(function(){
          $(".button-collapse").sideNav();
        });
      </script>
      <script type="text/javascript">

          $('#formAltera').submit(function(){
            var antiga=$('#antiga').val();]
            var nova=$('#nova').val();
            $.ajax({
              url:"../server/recuperar_senha.php",
              type:"post",
              data: "antiga="+antiga+"&nova="+nova,
                success: function (result){
                            //alert(result);
                            if(result==1){
                              $('#antiga').val("");
                              $('#nova').val("");            
                              alert('Sua senha foi alterada com successo!');
                            }
                            if(result==0){
                              $('#erro').show(100);
                            }
                        }
            });
            return false;
          });
      </script>
    </body>
  </html>