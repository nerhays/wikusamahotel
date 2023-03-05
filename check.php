<?Php
if(!(isset($_SESSION['user']) and strlen($_SESSION['user']) > 2)){
echo "Please <a href=login.php>login</a> to use this page ";
exit;
}else{
echo "Welcome $_SESSION[userid] | <a href='logout.php'>Logout</a>|<a href='change.php'>Change Password</a>";
}
?>