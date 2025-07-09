<?php

setcookie("_aut_ui_","",time()-(60*60*24),'/');

header('Location: http://localhost/stpshop/index.php');

?>