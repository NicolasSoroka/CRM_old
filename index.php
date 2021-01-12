<?php
require "./templates/header.php";

if ($_SESSION['user']['access'] == 1) {   // 1 == Vendor
  header("Location: ./views/vendor.php");
  exit;
}

else if ($_SESSION['user']['access'] == 0) { // 0 == Administrator
  header("Location: ./views/administrator.php");
  exit;
}
require "./templates/footer.php";
?>