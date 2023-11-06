<?php

session_start();

SESSION_DESTROY();
header("location:index.php");

?>