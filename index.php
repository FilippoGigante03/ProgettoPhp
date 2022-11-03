<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Hello World!</title>
    </head>
    <body>
      <p>Hello World!</p>
      <?php
        $users = $_POST["0"];
        $name = $_POST["pippo"];
        $id = $_POST["a01"];
        $mail = $_POST["pippo@gmail.com"];
        $hashPassword = $_POST["hvehGYUG9"];

        $users2 = $_POST["1"];
        $name2 = $_POST["emanuele"];
        $id2 = $_POST["b02"];
        $mail2 = $_POST["emanuele@gmail.com"];
        $hashPassword2 = $_POST["ouhouhY6"];

        $users3 = $_POST["2"];
        $name3 = $_POST["Claudio"];
        $id3 = $_POST["c03"];
        $mail3 = $_POST["claudio@gmail.com"];
        $hashPassword3 = $_POST["ygigUG7"];

        $users4 = $_POST["3"];
        $name4 = $_POST["Ravleen"];
        $id4 = $_POST["d04"];
        $mail4 = $_POST["ravleen@gmail.com"];
        $hashPassword4 = $_POST["pijpijpijkR3"];
        echo <<< OUTPUT
          <p>$users, $name, $id, $mail, $hashPassword</p>
          <p>$users2, $name2, $id2, $mail2, $hashPassword2</p>
          <p>$users3, $name3, $id3, $mail3, $hashPassword3</p>
          <p>$users4, $name4, $id4, $mail4, $hashPassword4</p>
          OUTPUT
      ?>
    </body>
</html>
