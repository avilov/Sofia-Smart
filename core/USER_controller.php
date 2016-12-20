<?
session_start();
if(($_POST['login']) && !empty($_POST['login']) && !empty($_POST['pass'])) {
    $login = clearData($_POST['login']);
    $pass = clearData($_POST['pass']);
    if(checkUser($login,$pass))
    {
        $check = checkUser($login,$pass);
        $_SESSION['user'] = $check['login'];
        $_SESSION['username'] = $check['firstname'];
        $_SESSION['userlastname'] = $check['lastname'];
        $_SESSION['avatar'] = $check['img'];
        $_SESSION['userid'] = $check['id'];
        $_SESSION['rank'] = $check['rank'];
    }
    else {}
}
if($_POST['exitadmin']) {
    session_start();
    unset($_SESSION);
    session_destroy();
}
?>
