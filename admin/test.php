<?php
require_once '../include.php';
echo "欢迎登录<br>";
echo md5(sha1(admin));
echo "<br>";
echo PATH_SEPARATOR;