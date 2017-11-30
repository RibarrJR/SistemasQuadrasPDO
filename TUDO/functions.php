<?php

$mysqli = new mysqli("localhost", "root", "", "quadras");
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}
/**
 * Cria o hash da senha, usando MD5 e SHA-1
 */
function make_hash($str)
{
    return sha1(md5($str));
}

/**
 * Verifica se o usuário está logado
 */
function isLoggedIn()
{
    if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true)
    {
        return false;
    }

    return true;
}
function logout()
{
	echo "ENTROU";
    $_SESSION['logged_in']='false';
	
	session_destroy();
}

function chamahorarios(){
	
}