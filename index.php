<?php
include("src/config/app.php");


/**
 * Obtem uma apikey através do email e senha
 * Como a apikey não muda, então salve para reutilizar como o método a seguir
 */

if (empty($api_key)) {
    $loggi = new \Loggi\Loggi; //Monta cabeçalho da requisição
    $api_key = $loggi->getCredentials($email, $password); //retorna a apikey
    $api_key = $loggi->getApiKey(); //retorna a apikey
} else {
    /**
     * utilize a apikey salva junto com o email para fazer as requisições
     */
    $loggi = new \Loggi\Loggi($email, $api_key); //monta cabeçalho da requisição já autenticado
}

//dump($loggi);


/**
 * Métodos relacionados as Lojas
 */
try {
    /** @var  \Loggi\Models\Shop $createShop  criar uma loja*/
    $createShop = $loggi->shop()->createShop(
        'Loja Integrando com a Loggi',
        '01418200',
        '2400',
        'apto. 61',
        '11999998888',
        1003,
        'Entregar na recepção',
        0,
        'integracao1019',
        'start'
    );
    /** @var \Loggi\Models\Shop $getShop Obtem a lista de lojas */
    $getShop = $loggi->shop()->getShopList();

    dump($createShop, $getShop);

} catch (Exception $e) {
    dd($e->getMessage());
}

