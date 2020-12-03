<?php session_start(); ?>

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

  <!--IMPORT MAP STUFF-->
  <link rel="stylesheet" href="https://unpkg.com/leaflet@1.6.0/dist/leaflet.css"
    integrity="sha512-xwE/Az9zrjBIphAcBb3F6JVqxf46+CDLwfLMHloNu6KEQCAWi6HcDUbeOfBIptF7tcCzusKFjFw2yuvEpDL9wQ=="
    crossorigin="" />
  <script src="https://unpkg.com/leaflet@1.6.0/dist/leaflet.js"
    integrity="sha512-gZwIG9x3wUXg2hdXF6+rVkLF/0Vi9U8D2Ntg4Ga5I5BZpVkVxlJWbSQtXPSiUTtC0TjtGOmxa1AJPuV0CPthew=="
    crossorigin=""></script>

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
                    echo "<a id=\"elemnt\" href=\"login.php\">Dashboard</a>";
                  }
                  ?>
              </div>
          </div>
          <!--Versão desktop-->
          <?php 
          if(isset($_SESSION['login']) && $_SESSION['login'] == TRUE){
            echo "<a id=\"elemnt\" href=\"dashboard/index.php\">Dashboard</a>";
          } else{
            echo "<a id=\"elemnt\" href=\"login.php\">Dashboard</a>";
          }
          ?>
          <a id="elemnt" class="active" href="contacts.php">Contactos</a>
          <a id="elemnt" href="courses.php">Cursos</a>
          <a id="elemnt" href="schedule.php">Horário</a>
          <a id="elemnt" href="about.php">Quem Somos</a>
      </div>
  </header>

  <div class="headSecu" id="contactsHead">
    <h1>Contactos</h1>
    <!--Redes sociais-->
    <div class="flex-column " id="socMedContainer2">
      <div class="socialMedia flex-center">
        <a href="https://www.facebook.com/" id="social" target="_blank" class="fa fa-facebook"></a>
        <a href="https://www.instagram.com" id="social" target="_blank" class="fa fa-instagram"></a>
        <a href="https://www.linkedin.com" id="social" target="_blank" class="fa fa-linkedin"></a>
      </div>
    </div>
  </div>
  <!--Onde Estamos-->
  <div class="section" id="secContacts">
    <div class="container">
      <h2>Onde Estamos
        <div class="line2"></div>
      </h2>
      <!--MAPA-->
      <div class="mapContainer">
        <div id="map"  data-aos="zoom-in-up" data-aos-duration="1500" data-aos-once="true"></div>
      </div>
      <!--4 caixas de contactos-->
      <div class="flex-nowrap flex-around" id="contacts">
        <!--Caixa Morada-->
        <div id="contact"  data-aos="fade-up" data-aos-delay="100" data-aos-once="true">
          <i class="fas fa-map-marker-alt"></i>
          <h4>Morada</h4>
          <p>R. Dr. Roberto Frias, <br>4200-465 Porto</p>
        </div>
        <!--Caixa Telemóvel-->
        <div id="contact"  data-aos="fade-up" data-aos-delay="300" data-aos-once="true">
          <i class="fas fa-phone-alt"></i>
          <h4>Telemóvel</h4>
          <p>(+351) 926789452</p>
        </div>
        <!--Caixa Email-->
        <div id="contact"  data-aos="fade-up" data-aos-delay="500" data-aos-once="true">
          <i class="fas fa-envelope"></i>
          <h4>Email</h4>
          <p>explicaFeup@example.com</p>
        </div>
        <!--Caixa Horário-->
        <div id="contact"  data-aos="fade-up" data-aos-delay="700" data-aos-once="true">
          <i class="fas fa-clock"></i>
          <h4>Horário</h4>
          <p><b>2ª a 6ª feira:</b> 10h - 18h</p>
          <p><b>Sábados:</b> 10h - 13h</p>
        </div>
      </div>
    </div>
  </div>
  <!--Formulario-->
  <div class="section" id="secForms">
    <div class="container">
      <h2>Fala Connosco
        <div class="line2"></div>
      </h2>
      <div class="flex-wrap flex-around">
        <!--FORM-->
        <div class="flex-column" id="forms">
          <!--Formulario NOME-->
          <div class="flex-column">
            <div class="" id="labelN">
              <label for="fname">Nome</label>
            </div>
            <div id="form" data-aos="fade-right" data-aos-delay="100" data-aos-once="true">
              <input type="text" id="fname" name="name" placeholder="Nome..">
            </div>
          </div>
          <!--Formulario EMAIL-->
          <div class="flex-column">
            <div class="" id="labelN">
              <label for="fname">Email</label>
            </div>
            <div  id="form" data-aos="fade-right" data-aos-delay="300" data-aos-once="true">
              <input type="email" id="fname" name="email" placeholder="Email..">
            </div>
          </div>
          <!--Formulario TEXTO-->
          <div class="flex-column">
            <div id="labelN">
              <label for="fname">Texto</label>
            </div>
            <div  id="form" data-aos="fade-right" data-aos-delay="500" data-aos-once="true">
              <textarea id="subject" name="subject" placeholder="Escreva alguma coisa.."></textarea>
            </div>
          </div>
          <input type="submit" class="button buttonRed" value="Enviar" id="submitButton">
        </div>
      </div>
    </div>
  </div>

  <div class="footer">
    <h2>Contactos</h2>
    <div class="flex-nowrap flex-around" id="footerContainer">
      <!--Footer da ESQUERDA-->
      <div class="flex-column" id="informatContainer">
        <h3 class="footerTitle">ExplicaFeup</h3>
        <p><b><i class="fas fa-map-marker-alt"></i> Morada: </b><a href="https://goo.gl/maps/HA1QhKSYkD59LjxJA"
            target="_blank" id="email"> R. Dr. Roberto Frias, <br>4200-465 Porto</a></p>
        <p><b><i class="fas fa-phone"></i> Telemóvel: </b>(+351) 926789452</p>
        <p><b><i class="fas fa-envelope-open-text"></i> Email: </b><a href="mailto:explicaFeup@example.com"
            id="email">explicaFeup@example.com </a></p>
      </div>
      <!--Footer do MEIO-->
      <div class="flex-column" id="informatContainer">
        <h3 class="footerTitle">Horário</h3>
        <p>Segundas a sextas:</p>
        <p id="hours"><b><i class="fas fa-caret-right"></i> 10:00 - 18:00</b></p>
        <p>Sábados:</p>
        <p id="hours"><b><i class="fas fa-caret-right"></i> 10:00 - 13:00</b></p>
      </div>
      <!--Footer da direita-->
      <div class="flex-column" id="informatContainer">
        <h3 class="footerTitle">Redes Sociais</h3>
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
  <script src="js/map.js"></script>
  <script src="js/main.js"></script>

</body>

</html>