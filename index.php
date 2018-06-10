<!DOCTYPE HTML>

<?php
  require_once("connect.php");
  $polaczenie = mysqli_connect($host, $db_user, $db_password, $db_name);
  if (mysqli_connect_errno()) {
    echo "Connect failed: <br>". mysqli_connect_error();
    exit();
}

?>
<html>
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    <link rel="stylesheet" href="index.css" type="text/css">
  </head>
  <body>
    <script>
    $('document').ready(function(){
        $('header').animate({
          height:"150px",
          "line-height":"150px"
        }, 2222, "swing"
          );
        $('#menu').delay(2222).fadeIn('slow');
        $('main').delay(2222).fadeIn('slow');
        $('footer').delay(2222).fadeIn('slow');
        $('#start').delay(2222).fadeIn('slow');
    //    $('main1').delay(2).fadeIn('slow');
        $('#main1').delay(2222).css({"display":"flex"});
      var footer = document.getElementsByTagName("aside")[0];
      var post = document.getElementsByClassName("post")[document.getElementsByClassName("post").length - 1];
      $(window).scroll(function(){
      if(window.scrollY > footer.offsetTop)
        $('footer').css({'position':'fixed'});
      else if(window.scrollY < footer.offsetTop)
        $('footer').css({'position':'relative'});
    //    alert(window.scrollY);
      console.log(window.scrollY)
      $(window).scroll(function(){
      if(window.scrollY > post.offsetTop + 200)
    {

      $('#socialmedia').fadeIn('slow');
      $('footer').animate({
        height:"120px",
        position:"relative"
      }, 800, "swing"
      );
    }
      else if(window.scrollY < post.offsetTop + 200)
    {
      $('#socialmedia').fadeOut('fast');

  //    $('#produkcja').delay(500).fadeIn();

    }
  });
      });
    $("a").on('click', function(event) {
    if (this.hash !== "") {
        event.preventDefault();
        var hash = this.hash;
        $('html, body').animate({
          scrollTop: $(hash).offset().top
        }, 800, function(){
          window.location.hash = hash;
        });
      }
    });

  $( window ).resize(function() {
    var offLeft = $('.post:last').offset().left;
    if (offLeft > innerWidth /2 - 100 )
    {
      $('.post:last').css({"float":"right","margin-right":"0"});
    } else {
      $('.post:last').css({"float":"left","margin-right":"11px"});
    }


  });
  $("img[src='Facebook.png']").tooltip();
  $("img[src='snapchat.ico']").tooltip();
  $("img[src='insta.png']").tooltip();
  $("img[src='twitter.png']").tooltip();
    });
    </script>
    <header>
    <h1>Universum</h1>
    </header>
    <div id="menu" >
      <ul>
        <li><a href="#start">Start</a></li>
        <li><a href="#blog">Blog</a></li>
        <li><a href="#contactForm">Mail me</a></li>

      </ul>
    </div>
    <aside id="start">
      <div>
      </div>
        <h1> Talk is cheap, <br> show me your code...<br> Mordeczko
    </aside>
    <div class="random">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</div>
    <main id="blog">
    <aside id="leftcol">
      <?php
        $lastLine = $polaczenie -> query("SELECT `id` FROM galera ORDER BY `id` DESC LIMIT 1 ");
        $rezultat = $polaczenie -> query("SELECT * FROM galera ORDER BY `id` DESC ");
        $Lid = mysqli_fetch_row($lastLine);

        while(list($id,$title,$descr,$imgname,$data,$film)=mysqli_fetch_row($rezultat))
        {
          if($Lid[0] % 2 == 1)
          {
            if($id % 2 == 1)
            {
              echo "<div class='post'>";
              if ($imgname != "")
              {
                  echo "<img src='./uploads/$imgname' />";
              }
              if($film != "")
              {
                echo $film;
              }
              echo "<span>$data</span>";
              if ($title != "")
              {
                echo "<h2>$title</h2>";
              }
              if ($descr != "")
              {
                echo "<p>$descr</p>";
              }
              echo "</div>";
            }
          } else {
            if($id % 2 == 0)
            {
              echo "<div class='post'>";
              if ($imgname != "")
              {
                  echo "<img src='./uploads/$imgname' />";
              }
              if($film != "")
              {
                echo $film;
              }
              echo "<span>$data</span>";
              if ($title != "")
              {
                echo "<h2>$title</h2>";
              }
              if ($descr != "")
              {
                echo "<p>$descr</p>";
              }
              echo "</div>";
            }
          }
      }
       ?>
    </aside>
    <aside id="rightcol">
      <?php
        $rezultat = $polaczenie -> query("SELECT * FROM galera ORDER BY `id` DESC ");
        while(list($id,$title,$descr,$imgname,$data,$film)=mysqli_fetch_row($rezultat))
        {
          if($Lid[0] % 2 == 0)
          {
            if($id % 2 == 1)
            {
              echo "<div class='post'>";
              if ($imgname != "")
              {
                  echo "<img src='./uploads/$imgname' />";
              }
              if($film != "")
              {
                echo $film;
              }
              echo "<span>$data</span>";
              if ($title != "")
              {
                echo "<h2>$title</h2>";
              }
              if ($descr != "")
              {
                echo "<p>$descr</p>";
              }
              echo "</div>";
            }
          } else {
            if($id % 2 == 0)
            {
              echo "<div class='post'>";
              if ($imgname != "")
              {
                  echo "<img src='./uploads/$imgname' />";
              }
              if($film != "")
              {
                echo $film;
              }
              echo "<span>$data</span>";
              if ($title != "")
              {
                echo "<h2>$title</h2>";
              }
              if ($descr != "")
              {
                echo "<p>$descr</p>";
              }
              echo "</div>";
            }
          }
        }
       ?>
    </aside>
    </main>
    <main id="main1">
      <aside id="contactForm">
        <form action="mailme.php" method="post">
          <p>Formularz kontaktowy</p>
          <input placeholder="imię" type="text" name="name1" id="name">
          <input placeholder="nazwisko" type="text" name="ndname" id="secndname">
          <input placeholder="adres e-mail" type="text" name="email" id="mail">
          <textarea name="content" placeholder="treść"></textarea>
          <input type="submit">
          <input type="reset" id="reset1">
        </form>
      </aside>
    </main>
    <footer>
      <div id="socialmedia">
        <img title="bochenkks" src="snapchat.ico" />
          <a href="https://www.facebook.com/swiez4k">
          <img title="Michał Hutnik" src="Facebook.png" />
          </a>
          <a href="https://www.instagram.com/falkenberg.s/?hl=pl">
            <img title="@falkenberg.S" src="insta.png" /></a>
            <a href="https://twitter.com/mhutnikC9?lang=pl">
          <img title="@mhutnikC9" src="twitter.png" />
        </a>
      </div>
      <div id="produkcja">Wyprodukowano w Polsce.</div>
    </footer>
  </body>
</html>
