<?php
 session_start();
 if (!isset($_SESSION['user'])) {
  header("Location: login.php");
 } else if(isset($_SESSION['user'])!="") {
   $_SESSION['user'] = $row['user_id'];
                                        $_SESSION['username'] = $row['username'];
                                        $_SESSION['firstname'] = $row['firstname'];
                                        $_SESSION['email'] = $row['email'];
  session_unset();
  session_destroy();
  header("Location: login.php");
  exit;
 }