  <?php
      $mailTo = "lolkus53@gmail.com";
      $subject = "strona internetowa";
      $headers ="From: ".$_POST['email'];
      $imie = $_POST['name1'];
      $nazwisko = $_POST['ndname'];
      $content = $_POST['content'];
      if(mail($mailTo, $subject, $content, $headers))
      {
      echo "hello hej";
    } else {
      echo "no";
    }
 ?>
