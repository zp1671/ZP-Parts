<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title></title>
    <link rel="stylesheet" type="text/css" href="/css/style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
</head>
<body>

<header>
    <nav>
        <div class="main-wrapper">
            <ul>
              <li><a href="index.php">Home</a></li>
              <div class="subheader-wrapper">
                <li><a href="projects.php">Projects</a></li>
                <li><a href="dashboard.php">Dashboard</a></li>
              </div>
            </ul>
            <div class="nav-login">
              <?php
                if (isset($_SESSION['u_id'])) {
                    echo '<form action="includes/logout.inc.php" method="post">
                              <button type="submit" name="submit">Logout</button>
                          </form>';
                } else {
                    echo '<form action="includes/login.inc.php" method="post">
                            <input type="text" name="uid" placeholder="Username/E-Mail">
                            <input type="password" name="pwd" placeholder="Password">
                            <button type="submit" name="submit">Login</button>
                          </form>
                          <a href="signup.php">Sign Up</a>';
                }
              ?>
            </div>
        </div>
    </nav>
</header>
