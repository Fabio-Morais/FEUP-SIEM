<?php
session_start();
include_once(dirname(__FILE__) . "/dashboard/dataBase/dataBase.php");
/*Para retirar a visibilidade do erro*/
/*error_reporting(E_ERROR | E_PARSE);*/
$db = DataBase::Instance();
$courses = "";
$connected = false;

if ($db->connect()) {
    $courses = $db->getCoursesPrices();
    $connected = true;
} else
    Alerts::showError(Alerts::DATABASEOFF);

?>

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
          <a id="elemnt" href="contacts.php">Contactos</a>
          <a id="elemnt" class="active" href="courses.php">Cursos</a>
          <a id="elemnt" href="schedule.php">Horário</a>
          <a id="elemnt" href="about.php">Quem Somos</a>
      </div>
  </header>

  <!-- HEAD -->
  <div class="headSecu" id="courses">
    <h1>Cursos</h1>
  </div>

  <!-- COURSES -->
  <div class="section" id="secCourses">
    <div class="container no-margin">
      <div class="flex-wrap flex-between flex-center">
        <!--Barra cinza-->
        <div class="full-bar">
          <!--Botao para selecionar-->
          <div class="flex-nowrap">
            <select class="select-css">
              <option value="all">All</option>
              <option value="soft">Software</option>
              <option value="web">Web</option>
              <option value="ml">Machine Learning</option>
            </select>
          </div>
        </div>
        <?php
        $row = pg_fetch_assoc($courses);
        if($connected) :
            while(isset($row["price"])){
              echo "<div id=\"course\" class=\"all ". $row['type'] ." box\" data-aos=\"fade-up\" data-aos-delay=\"100\" data-aos-once=\"true\">";
              echo    "<div id=\"imgBorder\"><img src=\"img/courses/" . $row['image'] . " \" id=\"imgCourse\"></div>";
              echo    "<h4>" . ucwords($row['coursename']) . "</h4>";  // Primeira letra maiuscula
              echo    "<h3>€" . $row['price'] . "</h3>";
              echo  "<div class=\"flex-nowrap flex-around\" id=\"butnCourseBox\">";
              echo       "<button onclick=\"document.getElementById('". preg_replace("/\s+/", "", $row['coursename']) ."').style.display = 'block'\" class=\"buttonInfo\">"; //Remove espaços brancos na string
              echo          "<i class=\"far fa-question-circle\"></i> Info";
              echo      "</button>";
              echo      "<button onclick=\"location.href = 'register.php?course=".urlencode($row['coursename'])."';\" class=\"buttonBuy\">";
              echo          "<i class=\"fas fa-shopping-cart\"></i> Comprar";
              echo      "</button>";
              echo  "</div>";
              echo "</div>";
              $row = pg_fetch_assoc($courses);
            }
        endif;
        ?>
      </div>
    </div>
  </div>
<!--******Modals dos diferentes cursos******-->
  <!--Curso C++-->
  <div id="c++" class="modal" >
    <div class="modal-content animate" >
      <div class="imgcontainer">
        <span onclick="document.getElementById('c++').style.display='none'" class="close" title="Close Modal">&times;</span>
      </div>
      <div class="container" id="modalContainer">
        <h2>C++</h2>
        <div class="line3"></div>
        <ol>
          <li> Programação em C e Metodologias de Desenvolvimento</li><br>
          <li>Programação de baixo-nível</li><br>
          <li>Conceitos Fundamentais de Algoritmia</li><br>
          <li>Estruturas de dados</li><br>
          <li>Programação orientada por objetos em C++</li>
        </ol> 
      </div>
      <div class="container" id="modalBtnContainer">
        <button type="button" onclick="document.getElementById('c++').style.display='none'" class="cancelbtn button">Fechar</button>
      </div>
    </div>
  </div>
  <!--Curso Java-->
  <div id="java" class="modal">
    <div class="modal-content animate" >
      <div class="imgcontainer">
        <span onclick="document.getElementById('java').style.display='none'" class="close" title="Close Modal">&times;</span>
      </div>
      <div class="container" id="modalContainer">
        <h2>Java</h2>
        <div class="line3"></div>
        <ol>
          <li><b>Linguagem JAVA + Programação Orientada por Objectos:</b> sintaxe, conceitos, classes, coleções, genéricos, SWING, I/O, Concorrência.  
          </li>
          <br>
          <li><b>Linguagem de modelação UML:</b> conceitos gerais de modelação, diagramas de classes, estados e sequencia. Outros diagramas.
          </li><br>
          <li><b>Processos de Desenvolvimento de Software:</b> conceitos, metodologias, fases, práticas, ferramentas, artefactos, tecnologias emergentes.
          </li>
        </ol>  
      </div>
      <div class="container" id="modalBtnContainer">
        <button type="button" onclick="document.getElementById('java').style.display='none'" class="cancelbtn button">Fechar</button>
      </div>
    </div>
  </div>
  <!--Curso Python-->
  <div id="python" class="modal">
    <div class="modal-content animate" >
      <div class="imgcontainer">
        <span onclick="document.getElementById('python').style.display='none'" class="close" title="Close Modal">&times;</span>
      </div>
      <div class="container" id="modalContainer">
        <h2>Python</h2>
        <div class="line3"></div>
        <ol>
          <li>Fundamentos da web com Python</li><br>
          <li>Criar scripts em Python e a usar APIs para recolher e processar dados de milhares de páginas Web ao mesmo tempo.</li><br>
          <li>Bibliotecas que vão lhe auxiliar nas tarefas de scraping como BeautifulSoup, LXML e Scrapy</li><br>
          <li>Utilizar o Selenium WebDriver</li><br>
          <li> criar programas para ler diversos tipos de documentos como CSV, PDF, DOCX, XLSX, JSON e ODT</li>
        </ol> 
      </div>
      <div class="container" id="modalBtnContainer">
        <button type="button" onclick="document.getElementById('python').style.display='none'" class="cancelbtn button">Fechar</button>
      </div>
    </div>
  </div>
  <!--Curso web dev-->
  <div id="webdevelopment" class="modal">
    <div class="modal-content animate" >
      <div class="imgcontainer">
        <span onclick="document.getElementById('webdevelopment').style.display='none'" class="close" title="Close Modal">&times;</span>
      </div>
      <div class="container" id="modalContainer">
        <h2>Web Development</h2>
        <div class="line3"></div>
        <ol>
          <li><b>Bases de Dados:</b> modelação de dados em UML, modelo relacional, linguagem SQL.</li><br>
          <li><b>Linguagens e Tecnologias Web: </b>protocolo HTTP, linguagens HTML, CSS e JavaScript</li><br>
          <li><b>APIs: </b>Utilização de frameworks e API de acesso a dados</li><br>
          <li><b>PHP: </b>Principios básicos</li><br>
          <li><b>Wordpress: </b>Introdução ao desenvolvimento de websites através do wordpress</li>
        </ol> 
      </div>
      <div class="container" id="modalBtnContainer">
        <button type="button" onclick="document.getElementById('webdevelopment').style.display='none'" class="cancelbtn button">Fechar</button>
      </div>
    </div>
  </div>
  <!--Curso web apis-->
  <div id="webapis" class="modal">
    <div class="modal-content animate" >
      <div class="imgcontainer">
        <span onclick="document.getElementById('webapis').style.display='none'" class="close" title="Close Modal">&times;</span>
      </div>
      <div class="container" id="modalContainer">
        <h2>Web APIs</h2>
        <div class="line3"></div>
        <ol>
          <li>Introdução ao .NET CORE
          </li><br>
          <li>Construção de uma Web API (CRUD Completo)
          </li><br>
          <li>Publicação no Windows Azure
          </li><br>
          <li>Arquitetura MVC
          </li><br>
          <li>Criação de página de Help para Web API utilizando Swagger.
          </li>
        </ol> 
      </div>
      <div class="container" id="modalBtnContainer">
        <button type="button" onclick="document.getElementById('webapis').style.display='none'" class="cancelbtn button">Fechar</button>
      </div>
    </div>
  </div>
  <!--Curso matematica-->
  <div id="matematica" class="modal">
    <div class="modal-content animate" >
      <div class="imgcontainer">
        <span onclick="document.getElementById('matematica').style.display='none'" class="close" title="Close Modal">&times;</span>
      </div>
      <div class="container" id="modalContainer">
        <h2>Matematica</h2>
        <div class="line3"></div>
        <ol>
          <li><b>ESTATÍSTICA DESCRITIVA:</b> Tipos de Dados e Escalas. Caracterização e Representação de Dados Categóricos, Quantitativos e Bivariados.</li><br>
          <li><b>PROBABILIDADES:</b> Experiências aleatórias, Espaços Amostrais e Acontecimentos. Probabilidade, Probabilidade Condicional e Acontecimentos Independentes. Teoremas da Probabilidade Total e de Bayes.
          </li><br>
          <li><b>VARIÁVEIS ALEATÓRIAS E DISTRIBUIÇÕES DE PROBABILIDADE:</b> Variáveis Aleatórias. Variáveis Aleatórias Discretas e Contínuas. Função de Probabilidade, de Densidade de Probabilidade e de Distribuição.
          </li><br>
          <li><b>PRINCIPAIS DISTRIBUIÇÕES DISCRETAS e CONTÍNUAS:</b> Distribuições Binomial, Binomial Negativa, Hipergeométrica e Poisson.
          </li>

        </ol> 
      
      </div>
      <div class="container" id="modalBtnContainer">
        <button type="button" onclick="document.getElementById('matematica').style.display='none'" class="cancelbtn button">Fechar</button>
      </div>
    </div>
  </div>
  <!--Curso machine learning-->
  <div id="machinelearning" class="modal">
    <div class="modal-content animate" >
      <div class="imgcontainer">
        <span onclick="document.getElementById('machinelearning').style.display='none'" class="close" title="Close Modal">&times;</span>
      </div>
      <div class="container" id="modalContainer">
        <h2>Machine Learning</h2>
        <div class="line3"></div>
        <ol>
          <li>Introdução à área: o que é machine learning atualmente
          </li><br>
          <li>Modelos simples de classificação e regressão (modelos lineares e de vizinho mais próximo) e a sua validação: paradigmas de aprendizagem, funções de perda, erro de viés e de variância.
          </li><br>
          <li>Métodos de inferência de modelos: Procura, Expectation-maximization, agregação.
          </li><br>
          <li>Redes neuronais, modelos deep e aprendizagem de representação
          </li>
        </ol> 

      </div>
      <div class="container" id="modalBtnContainer">
        <button type="button" onclick="document.getElementById('machinelearning').style.display='none'" class="cancelbtn button">Fechar</button>
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
  <script src="js/courses.js"></script>
</body>

</html>