<?php
include("src/config/app.php");


/**
 * Obtem uma apikey através do email e senha
 * Como a apikey não muda, então salve para reutilizar como o método a seguir
 */

if (empty($api_key)) {
    $loggi = new \Lojazone\Loggi\Loggi; //Monta cabeçalho da requisição
    $api_key = $loggi->getCredentials($email, $password); //retorna a apikey
    $api_key = $loggi->getApiKey(); //retorna a apikey
} else {
    /**
     * utilize a apikey salva junto com o email para fazer as requisições
     */
    $loggi = new \Lojazone\Loggi\Loggi($email, $api_key); //monta cabeçalho da requisição já autenticado
}

//dump($loggi);

$googleApi = new \Lojazone\Loggi\Models\GoogleApi($api_google);
dd($googleApi->getFormattedAddress('04814530'), $googleApi->getLatLong('04814530'));

/**
 * Métodos relacionados as Lojas
 */
try {
    /** @var  \Lojazone\Loggi\Models\Shop $createShop criar uma loja */
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
    /** @var \Lojazone\Loggi\Models\Shop $getShop Obtem a lista de lojas */
    $getShop = $loggi->shop()->getShopList();

    dump($createShop, $getShop);

    /** @var \Lojazone\Loggi\Models\City $allCity Obtem a lista de cidades de atendimento */
    $allCity = $loggi->city()->getCityList();
    dump($allCity);

    //Invoice
    /** @var \Lojazone\Loggi\Models\Invoice $getEstimativeOfInvoice Estimar preços de pedido utilizando ponto fixo com lat/long */
    $getEstimativeOfInvoice = $loggi->invoice()->estimatePricesUsingFixedOrderWithLatLong(5990, -23.5025491, -46.69607400000001, 1);
    dump($getEstimativeOfInvoice);

    /** @var \Lojazone\Loggi\Models\Invoice $createInvoice Criar invoice */
    $createInvoice = $loggi->invoice()->createInvoice(5990,
        '123456789',
        -23.5703022,
        -46.6473154,
        "Av. Paulista, 100 - Bela Vista, São Paulo - SP, Brasil",
        "8o andar",
        "Client XYZ",
        "1199678890",
        -23.635334,
        -46.529835,
        "R. Miguel Pereira dos Santos, 12 - Jardim Guanhembu, São Paulo - SP, Brasil",
        "Apto 133",
        "10.00",
        64,
        "5.00",
        10,
        10,
        10
    );
    dump($createInvoice);

    /** @var \Lojazone\Loggi\Models\Invoice $redoAnOrder Refazer um pedido */
    $redoAnOrder = $loggi->invoice()->redoAnOrder(10);
    dump($redoAnOrder);

    /** @var \Lojazone\Loggi\Models\Invoice $consultAnOrderAndTrackDeliveryPerson Consultar um pedido e rastrear entregador */
    $consultAnOrderAndTrackDeliveryPerson = $loggi->invoice()->consultAnOrderAndTrackDeliveryPerson(10);
    dump($consultAnOrderAndTrackDeliveryPerson);

    /** @var \Lojazone\Loggi\Models\Invoice $consultOrderbyTrackingKey Consultar um Pedido pela Tracking Key */
    $consultOrderbyTrackingKey = $loggi->invoice()->consultOrderbyTrackingKey(123456789);
    dump($consultOrderbyTrackingKey);

    //Packages
    /** @var \Lojazone\Loggi\Models\Package $listOfPackage Lista dos pacotes */
    $listOfPackage = $loggi->package()->listPackages(5990);
    dump($listOfPackage);

    /** @var \Lojazone\Loggi\Models\Package $historyOfPackage Historico do pacote */
    $historyOfPackage = $loggi->package()->historyOfPackage(123);
    dump($historyOfPackage);

    /** @var \Lojazone\Loggi\Models\Package $statusPackage Status do pacote */
    $statusPackage = $loggi->package()->statusPackage(123);
    dump($statusPackage);
} catch (Exception $e) {
    dd($e->getMessage());
}

