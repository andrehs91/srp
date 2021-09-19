<?php

$page = $router->getResource();
require "../Source/View/Templates/header.php";
require "../Source/View/$page.php";
require "../Source/View/Templates/footer.php";
