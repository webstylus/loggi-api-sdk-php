### API de integração com a Loggi

Esta library tem o objetivo de abstrair a conexão com a api de fretes da Loggi.
Utilize os metodos abaixo para obter sua chave de api e depois usa-la para fazer suas próximas conexões

###### Como usar

Antes de iniciar faça o cadastro na Loggi seguindo os passos do (comece rápido e fácil) neste link:
https://docs.api.loggi.com/docs

__Obter chave de acesso__

    <?php
    
    use Loggi;
    $loggi = new \Loggi\Loggi;
    $api_key = $loggi->getCredentials($email, $password);
    
__Instanciar conexão com email e apiKey__ 
    
    use Loggi;
    $loggi = new \Loggi\Loggi($email, $apikey);
    
__Métodos__
    
    Obtem a lista de Lojas cadastradas na Loggi
    $shops = $loggi->getShopList();      
    
    $cities = $loggi->getCityList();
    
    
        