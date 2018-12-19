<?php
session_start();
if(isset($_SESSION['admin_id'])){
    unset($_SESSION['admin_id']);
}elseif(isset($_SESSION['Emp_id']) && isset($_SESSION['admin_id'])){
    unset($_SESSION['Emp_id']);
    unset($_SESSION['admin_id']);
}
session_destroy();
header('Location:../public_html/pages-signin.php');
?>
