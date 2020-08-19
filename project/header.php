<?php
    class Environment
    {
        const Production = 'Production';
        const Development = 'Development';
    }
    
    $environment = $_SERVER['SERVER_NAME'] == "localhost" ? Environment::Development : Environment::Production;
    $appsettings = $environment == Environment::Production ? "./appsettings.json" : "./appsettings.development.json";

    $settings = json_decode(file_get_contents($appsettings), TRUE);
?>

<html>
<body>
<div class="container">
<!-- Bootstrap- Start -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
<!-- Bootstrap- End -->

<!-- Navbar- Start -->
<nav class="navbar navbar-light bg-light">
    <a class="navbar-brand" href="#">
      <img src="<?php echo $settings["SiteIdentity"]["Logo"] ?>" height="100" class="d-inline-block align-top" alt="">
      <?php echo $settings["SiteIdentity"]["Name"] ?>
    </a>
  </nav>
  <!-- Navbar- End -->
