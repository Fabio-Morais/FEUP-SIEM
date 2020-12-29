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
          <a id="elemnt" class="active" href="schedule.php">Horário</a>
          <a id="elemnt" href="about.php">Quem Somos</a>
      </div>
  </header>

  <div class="headSecu" id="schedule">
    <h1>Horário</h1>
  </div>

   <!--Horarios-->
  <div class="section" id="secSchedule">
    <div class="container">
      <div class="flex-wrap flex-around">
        <!--Horario de segunda-->
        <div class="schedule-warp">
          <div class="day-one">Segunda</div>
          <div class="schedule-card" data-aos="fade-up" data-aos-delay="100" data-aos-once="true">
            <div class="insidebox">
              <span class="schedule-tag">10:00</span>
              <span class="schedule-start">Aula C/C++</span>
            </div>
          </div>

          <div class="schedule-card" data-aos="fade-up" data-aos-delay="300" data-aos-once="true">
            <div class="insidebox">
              <span class="schedule-tag">13:00</span>
              <span class="schedule-start">Aula Java</span>
            </div>
          </div>

          <div class="schedule-card" data-aos="fade-up" data-aos-delay="500" data-aos-once="true">
            <div class="insidebox">
              <span class="schedule-tag">16:00</span>
              <span class="schedule-start">Aula Machine learning</span>
            </div>
          </div>

          <div class="schedule-card" data-aos="fade-up" data-aos-delay="700" data-aos-once="true">
            <div class="insidebox">
              <span class="schedule-tag">17:00</span>
              <span class="schedule-start">Aula Web APIs</span>
            </div>
          </div>
        </div>
        <!--Horario de Quinta-->
        <div class="schedule-warp">
          <div class="day-one">Quinta</div>
          <div class="schedule-card" data-aos="fade-up" data-aos-delay="100" data-aos-once="true">
            <div class="insidebox">
              <span class="schedule-tag">10:00</span>
              <span class="schedule-start">Aula de HTML/CSS</span>
            </div>
          </div>

          <div class="schedule-card" data-aos="fade-up" data-aos-delay="300" data-aos-once="true">
            <div class="insidebox">
              <span class="schedule-tag">13:00</span>
              <span class="schedule-start">Aula Javascript</span>
            </div>
          </div>

          <div class="schedule-card" data-aos="fade-up" data-aos-delay="500" data-aos-once="true">
            <div class="insidebox">
              <span class="schedule-tag">16:00</span>
              <span class="schedule-start">Aula SQL e PHP</span>
            </div>
          </div>

          <div class="schedule-card" data-aos="fade-up" data-aos-delay="700" data-aos-once="true">
            <div class="insidebox">
              <span class="schedule-tag">18:00</span>
              <span class="schedule-start">Aula Python</span>
            </div>
          </div>
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
        <h3 class="footerTitle">ExplicaFeup</h3>
        <p><b><i class="fas fa-map-marker-alt"></i> Morada: </b><a href="https://goo.gl/maps/HA1QhKSYkD59LjxJA"
            target="_blank" id="email"> R. Dr. Roberto Frias, <br>4200-465 Porto</a></p>
        <p><b><i class="fas fa-phone"></i> Telemóvel: </b>(+351) 926789452</p>
        <p><b><i class="fas fa-envelope-open-text"></i> Email: </b><a href="mailto:explicaFeup@example.com"
            id="email">explicaFeup@example.com </a></p>
      </div>
      <!--Footer do MEIO-->
      <div class="flex-column" id="informatContainer">
        <h3 class="footerTitle" >Horário</h3>
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
  <script src="js/main.js"></script>
</body>

</html>