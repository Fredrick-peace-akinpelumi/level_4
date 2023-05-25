<?php

$email = "piscoakinpelu416@mail.com";
$expires = time()+ (86400 * 30);

setcookie("user_email", $email, $expires, "/");
?>