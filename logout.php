<?php
if(session_status()!=PHP_SESSION_ACTIVE){
session_start();
}
session_destroy();
session_unset();
exit(header("Location: ./login.php?msg=User Logout Successfully!&type=error"));
?>