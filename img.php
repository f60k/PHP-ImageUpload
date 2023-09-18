<?php
session_start();
header('Content-type: image/png');
echo($_SESSION['image']['data']);

