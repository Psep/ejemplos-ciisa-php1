<?php

$userAgent = $_SERVER['HTTP_USER_AGENT'];

if (!preg_match("/(android|iphone|mini|mobi|phone|tablet|up\.browser|up\.link|wos)/i", $userAgent)) {
  header("Location: index.html");
} else {
  header("Location: movil.html");
}

?>
