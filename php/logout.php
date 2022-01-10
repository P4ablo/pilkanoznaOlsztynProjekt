<?php
session_start();
session_destroy();
echo "<script>window.location.href='../html/index.php';</script>";
