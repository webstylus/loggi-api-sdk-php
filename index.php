<?php
include("src/config/bootstrap.php");

$api_key="";
$email="";
$password="";

/**
 * Obtem uma apikey através do email e senha
 * Como a apikey não muda, então salve para reutilizar como o método a seguir
 */
$loggi = new \Loggi\Loggi; //Monta cabeçalho da requisição
$api_key = $loggi->getCredentials($email, $password); //retorna a apikey
$api_key = $loggi->getApiKey(); //retorna a apikey

/**
 * utilize a apikey salva junto com o email para fazer as requisições
 */
$loggi = new \Loggi\Loggi($email, $api_key); //monta cabeçalho da requisição já autenticado
$shopList = $loggi->getApiKey(); //obtem lista de lojas cadastradas

dump($shopList);
