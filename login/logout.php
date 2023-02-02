<?php
session_start();
$_SESSION = [];
session_unset();
session_destroy();

setcookie('tebakiniapa','',time()-36000);
setcookie('tebakiniapa2','',time()-36000);

header('location:../');
exit;


?>