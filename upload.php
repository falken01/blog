<?php

  if(isset($_POST['submit']))
  {
      if($_FILES['file']['name']!="")
      {

          $descr = $_POST['descr'];
          $title = $_POST['title'];
          $file = $_FILES['file'];
          $fileName = $_FILES['file']['name'];
          $fileTmpName  = $_FILES['file']['tmp_name'];
          $fileSize = $_FILES['file']['size'];
          $fileError = $_FILES['file']['error'];
          $fileType =$_FILES['file']['type'];

          $fileExt = explode('.', $fileName);
          $fileActualExt = strtolower(end($fileExt));
          print_r($file);
          $allow = array('jpg','jpeg','png', 'pdg', 'mp4');
            if (in_array($fileActualExt, $allow) ){
              if($fileError == 0) {
                  if($fileSize < 50000000)
                  {
                  //  $func = "CURDATE()";
                    $fileNameNew = "img".uniqid('',true).".".$fileActualExt;
                    $fileDestination = "uploads/".$fileNameNew;
                    require_once("connect.php");
                    $polaczenie = mysqli_connect($host, $db_user, $db_password, $db_name);
                      $stmt = mysqli_stmt_init($polaczenie);
                      $sql = "INSERT INTO galera (id, title, description, imgname, data) VALUES( NULL, ?, ?, ?, CURDATE())";
                      if (!mysqli_stmt_prepare($stmt, $sql)) {
                        echo "fail";
                      } else {
                        mysqli_stmt_bind_param($stmt, "sss", $title, $descr,$fileNameNew);
                        mysqli_stmt_execute($stmt);
                        move_uploaded_file($fileTmpName, $fileDestination);
                        $stmt->close();
                        $polaczenie->close();
                        header("location: index.php");
                      }

                  } else {
                    echo "Plik jest za duży";
                    exit();
                  }
              } else {
                echo "Wystąpił błąd przy wrzucaniu pliku.";
                exit();
              }
            } else {
              echo "Nie możesz wrzucac plików z tym rozszerzeniem.";
              exit();
            }
          } else {
            $descr = $_POST['descr'];
            $title = $_POST['title'];
            $film = $_POST['film'];
            $id = NULL;
            $file = NULL;
            require_once("connect.php");
            $polaczenie = mysqli_connect($host, $db_user, $db_password, $db_name);
            $polaczenie -> query("INSERT INTO galera VALUES('$id','$title','$descr','$file', CURDATE() , '$film')");
            $polaczenie -> close();
            header("Location: index.php");
          }

}
 ?>
