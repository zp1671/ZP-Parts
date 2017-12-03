<?php
session_start();

if (isset($_POST['submit'])) {
    include 'dbh.inc.php';

    $uid = mysqli_real_escape_string($conn, $_POST['uid']);
    $password = mysqli_real_escape_string($conn, $_POST['pwd']);

    //Error Handlers
    //Check if inputs are empty

    if (empty($uid) || empty($password)) {
      header("Location: ../index.php?login=empty");
      exit();
    } else {
        $sql = "SELECT * FROM users WHERE user_uid = '$uid' OR user_email = '$uid'";
        $result = mysqli_query($conn, $sql);
        $resultCheck = mysqli_num_rows($result);
        if ($resultCheck < 1) {
          header("Location: ../index.php?login=nouser");
          exit();
        } else {
            if ($row = mysqli_fetch_assoc($result)) {
                //Dehash
                $hashedPwdCheck = password_verify($password, $row['user_pwd']);
                if ($hashedPwdCheck == false)  {
                  header("Location: ../index.php?login=wrongpassword");
                  exit();
                } elseif ($hashedPwdCheck == true) {
                    //Logs in the user
                    $_SESSION['u_id'] = $row['user_id'];
                    $_SESSION['u_first'] = $row['user_first'];
                    $_SESSION['u_last'] = $row['user_last'];
                    $_SESSION['u_email'] = $row['user_email'];
                    $_SESSION['u_uid'] = $row['user_uid'];
                    header("Location: ../index.php?login=success");
                    exit();
                }
            }
        }
    }

  } else {
      header("Location: ../index.php?login=error");
      exit();
  }
