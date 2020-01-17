<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>LAMP STACK</title>

  <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
  <link rel="stylesheet" href="/assets/css/bulma.min.css">
</head>

<body>
  <section class="hero is-medium is-info is-bold">
    <div class="hero-body">
      <div class="container has-text-centered">
        <h1 class="title">
          LAMP STACK
        </h1>
        <h2 class="subtitle">
        </h2>
      </div>
    </div>
  </section>
  <section class="section">
    <div class="container">
      <div class="columns">
        <div class="column">
          <h3 class="title is-3 has-text-centered">Environment</h3>
          <hr>
          <div class="content">
            <ul>
              <li>
                <?php echo apache_get_version(); ?>
              </li>
              <li>
                PHP <?php echo phpversion(); ?>
              </li>
              <li>
                <?php
                  $link = mysqli_connect('mysql', 'root', 'root123!@', null);

                  if (!$link) {
                    echo 'Error: Unable to connect to MySQL.' . PHP_EOL;
                    echo 'Debugging errno: ' . mysqli_connect_errno() . PHP_EOL;
                    echo 'Debugging error: ' . mysqli_connect_error() . PHP_EOL;
                    exit;
                  }
                  printf('MySQL Server %s', mysqli_get_server_info($link));
                  echo ' (Successful Connection)' . PHP_EOL;

                  mysqli_close($link);
                ?>
              </li>
            </ul>
          </div>
        </div>
        <div class="column">
          <h3 class="title is-3 has-text-centered">Quick Links</h3>
          <hr>
          <div class="content">
            <ul>
              <li><a href="http://localhost/pages/phpinfo.php">phpinfo()</a></li>
              <li><a href="http://localhost:8080">phpMyAdmin</a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </section>
</body>

</html>
