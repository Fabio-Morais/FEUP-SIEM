﻿<?php session_start(); ?>

<!DOCTYPE html>
<html lang="pt">

<head>
  <title>ExplicaFeup</title>
  <link rel="shortcut icon" type="image/x-icon" href="img/icon.png" />
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/pageLayout.css">
  <link rel="stylesheet" href="css/responsiveStyle.css">
  <!-- Add icon library -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <!-- font awesome -->
  <script src="https://kit.fontawesome.com/70d6b09e06.js" crossorigin="anonymous"></script>
    <!--JQUERY-->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <!--Google font-->
  <link rel="stylesheet"
    href="https://fonts.googleapis.com/css?family=Roboto|Roboto:700|Open+Sans:600|Open+Sans:700|Noto+Sans+JP:700|Bree+Serif">
  <!--Animations-->
  <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
  <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

</head>

<body>
  <header>
    <div class="topnav">
      <a class="logo" href="index.php">
        <img src="img/icon.png">
        <h5 id="explic">ExplicaFeup</h5>
      </a>
      <!--Versão mobile-->
      <div class="dropdown">
        <button class="dropbtn"><i class="fas fa-bars"></i></button>
        <div class="dropdown-content">
            <a href="about.php">Quem Somos</a>
            <a href="schedule.php">Horário</a>
            <a href="courses.php">Cursos</a>
            <a href="contacts.php">Contactos</a>
            <?php 
            if(isset($_SESSION['login']) && $_SESSION['login'] == TRUE){
              echo "<a id=\"elemnt\" href=\"dashboard/index.php\">Dashboard</a>";
            } else{
              echo "<a id=\"elemnt\" href=\"dashboard/login.php\">Dashboard</a>";
            }
            ?>
        </div>
      </div>
      <!--Versão desktop-->
      <?php 
          if(isset($_SESSION['login']) && $_SESSION['login'] == TRUE){
            echo "<a id=\"elemnt\" href=\"dashboard/index.php\">Dashboard</a>";
          } else{
            echo "<a id=\"elemnt\" href=\"dashboard/login.php\">Dashboard</a>";
          }
      ?>
      <a id="elemnt" href="contacts.php">Contactos</a>
      <a id="elemnt" href="courses.php">Cursos</a>
      <a id="elemnt" href="schedule.php">Horário</a>
      <a id="elemnt" class="active" href="about.php">Quem Somos</a>
    </div>
  </header>

  <!-- HEAD -->
  <div class="headSecu" id="about">
    <h1>Quem Somos</h1>
  </div>

  <!-- Sobre n]os -->
  <div class="section" id="secAbout">
    <div class="container">
      <div class="flex-wrap flex-around">
        <!--Slide Show-->
        <div class="flex-column" id="imgAbout" data-aos="flip-right" data-aos-delay="600" data-aos-once="true" data-aos-duration="1000">
          <div class="slideshow-container">
            <div class="mySlides fade">
              <img src="img/ex/feup.png">
              <div class="text">Instalações</div>
            </div>

            <div class="mySlides fade">
              <img src="img/ex/mi.jpg">
              <div class="text">Trabalho de equipa</div>
            </div>

            <div class="mySlides fade">
              <img src="img/ex/ex3.jpg">
              <div class="text">Trabalho de equipa</div>
            </div>

          </div>
          <div class="dots">
            <span class="dot"></span>
            <span class="dot"></span>
            <span class="dot"></span>
          </div>
        </div>
        <!--Caixa de texto-->
        <div id="textAbout">
          <h4 data-aos="fade-UP" data-aos-delay="100" data-aos-once="true">Sobre Nós</h4>
          <p data-aos="fade-UP" data-aos-delay="400" data-aos-once="true">O ExplicaFeup foi criado em 2020, no sentido de ajudar todas as pessoas a entrarem no mundo da
            programação.<br><br>
            Foi então criado pelo aluno Fábio Morais, no sentido de ajudar mais pessoas que tenham o gosto por estas
            areas de IT.<br><br>
            O nosso grande objetivo desde inicio é ensinar aos alunos a serem autônomos, guiando todos os alunos de
            forma individual, para não seres um estudante passivo.
          </p>
        </div>
      </div>
    </div>
  </div>

  <!-- Instructors -->
  <div class="section" id="secInstruct">
    <div class="container">
      <h2>Instrutores
        <div class="line2"></div>
      </h2>

      <div class="flex-wrap flex-around">
        <!--Instrutor 1-->
        <div id="instruct" data-aos="fade-up" data-aos-delay="100" data-aos-once="true">
          <div><img src="img/fabio.jpeg" id="imgInstruct"></div>
          <h4>Fábio Morais</h4>
          <p>Instrutor C/C++, Java e Machine Learning</p>
          <a href="https://www.linkedin.com/in/fabi0morais/" target="_blank" id="social2" class="fa fa-linkedin"></a>
          <a href="https://github.com/Fabio-Morais" target="_blank" id="social2" class="fa fa-github"></a>
        </div>
        <!--Instrutor 2-->
        <div id="instruct" data-aos="fade-up" data-aos-delay="600" data-aos-once="true">
          <div ><img src="img/fernando.jpg" id="imgInstruct"></div>
          <h4>Fernando Silva</h4>
          <p>Instrutor de Web Development e Python</p>
          <a href="https://www.linkedin.com/in/fernando-silva-778628161/" id="social2" class="fa fa-linkedin"></a>
          <a href="https://github.com/fernandojpsilva" id="social2" class="fa fa-github"></a>
        </div>
      </div>
    </div>
  </div>

  <!-- FOOTER -->
  <div class="footer">
    <h2>Contactos</h2>
    <div class="flex-nowrap flex-around" id="footerContainer">
      <!--Footer da ESQUERDA-->
      <div class="flex-column" id="informatContainer">
        <h3 class="footerTitle ">ExplicaFeup</h3>
        <p><b><i class="fas fa-map-marker-alt"></i> Morada: </b><a href="https://goo.gl/maps/HA1QhKSYkD59LjxJA"
            target="_blank" id="email"> R. Dr. Roberto Frias, <br>4200-465 Porto</a></p>
        <p><b><i class="fas fa-phone"></i> Telemóvel: </b>(+351) 926789452</p>
        <p><b><i class="fas fa-envelope-open-text"></i> Email: </b><a href="mailto:explicaFeup@example.com"
            id="email">explicaFeup@example.com </a></p>
      </div>
      <!--Footer do MEIO-->
      <div class="flex-column" id="informatContainer">
        <h3 class="footerTitle ">Horário</h3>
        <p>Segundas a sextas:</p>
        <p id="hours"><b><i class="fas fa-caret-right"></i> 10:00 - 18:00</b></p>
        <p>Sábados:</p>
        <p id="hours"><b><i class="fas fa-caret-right"></i> 10:00 - 13:00</b></p>
      </div>
      <!--Footer da direita-->
      <div class="flex-column" id="informatContainer">
        <h3 class="footerTitle ">Redes Sociais</h3>
        <div class="socialMedia">
          <a href="https://www.facebook.com/" id="social" target="_blank" class="fa fa-facebook"></a>
          <a href="https://www.instagram.com" id="social" target="_blank" class="fa fa-instagram"></a>
          <a href="https://www.linkedin.com" id="social" target="_blank" class="fa fa-linkedin"></a>
        </div>
      </div>
    </div>
    <!--copyright-->
    <p>Copyright &copy; <a id="author" href="http://fabio-morais.github.io/" target="_blank"><b>Fábio Morais</b></a>
      SIEM 2020
    </p>
  </div>
  <script src="js/slideshow.js"></script>
  <script src="js/main.js"></script>

</body>

</html>