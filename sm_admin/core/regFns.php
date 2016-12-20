<?php
// -------------------------------------------------------------------------------------------------------------------*
    function checkLogin($user) // функция проверки имени пользователя в базе (принимаем с параметром ($user) )
    {
        dbConnect();
        
        $query = sprintf(" SELECT username FROM users WHERE users.username = '%s' ",
                        mysql_real_escape_string($user));
        
        $result = mysql_query($query);
        if(mysql_num_rows($result) > 0) return FALSE;
        else return TRUE;
    }
// -------------------------------------------------------------------------------------------------------------------*
    function register($reg) // функция регистрации пользователя (принимаем с параметром ($reg) )
    {
        dbConnect();   // подключаемся к базе
        
        mysql_query("INSERT INTO users (username,password,email) VALUES ($reg) ");
    }
// -------------------------------------------------------------------------------------------------------------------*
    function checkUser($login,$pswd) // функция проверки пользователя для входа (принимаем с параметрами ($login,$pswd) )
    {
        dbConnect();
        $query = sprintf(" SELECT username FROM users WHERE users.username = '%s' AND users.password = '%s' ",
                        mysql_real_escape_string($login),
                        mysql_real_escape_string($pswd));
        
        $result = mysql_query($query);
        if(mysql_num_rows($result) > 0) return TRUE;
        else return FALSE;
    }
// -------------------------------------------------------------------------------------------------------------------*
    function exitUser() // функция выхода из кабинета (принимаем без параметров)
    {
        unset($_SESSION['username']);
    }
// -------------------------------------------------------------------------------------------------------------------*
    function forgot($user,$email) // функция восстановления пароля (принимаем с параметрами ($user, $email) )
    {
        dbConnect();
        $query = sprintf(" SELECT * FROM users WHERE users.username = '%s' AND users.email = '%s' ",
                        mysql_real_escape_string($user),
                        mysql_real_escape_string($email));
        $result = mysql_query($query);
        if(mysql_num_rows($result) > 0) return TRUE;
        else return FALSE;
    }
    // -----------------------------------------------------------------------------
    function changePswd($pswd,$user) // функция сохранения нового пароля (принимаем с параметрами ($pswd,$user) )
    {
        mysql_query("UPDATE users SET password='$pswd' WHERE users.username='$user' ");
    }
// -------------------------------------------------------------------------------------------------------------------*
    function getStatus($login) // функция проверки статуса пользователя
    {
        dbConnect();
        $query = sprintf("SELECT status FROM users WHERE users.username = '%s' ",
                        mysql_real_escape_string($login));
        
        $result = mysql_query($query);
        $row = mysql_fetch_array($result);
        return $row;
    }
// -------------------------------------------------------------------------------------------------------------------*
            
?>
