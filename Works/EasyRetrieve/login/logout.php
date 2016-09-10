<?php
      session_start();
        session_destroy();
        header("Location: index.php"); // Redirecting To Home Page
      ?>