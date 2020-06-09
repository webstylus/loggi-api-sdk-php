### API de integração com a Loggi

Esta library tem o objetivo de abstrair a conexão com a api de fretes da Loggi.
Utilize os metodos abaixo para obter sua chave de api e depois usa-la para fazer suas próximas conexões

###### Como usar

Antes de iniciar faça o cadastro na Loggi seguindo os passos do (comece rápido e fácil) neste link:
https://docs.api.loggi.com/docs

__Obter chave de acesso__
- Obtem uma apikey através do email e senha.
- Como a apikey não muda, então salve para reutilizar como o método a seguir

```php
<?php
    
    use Loggi;
    $loggi = new \Loggi\Loggi; 
    $api_key = $loggi->getCredentials($email, $password); 
    $api_key = $loggi->getApiKey(); 
    
```

__Instanciar conexão com email e apiKey__ 
- Utilize a apikey salva junto com o email para fazer as requisições    
    
```php
<?php
     
    use Lojazone\Loggi;
    $loggi = new \Lojazone\Loggi\Loggi($email, $api_key);
````
 
__Métodos__
- Cadastro de Lojas
  
```php
<?php

    $loggi->shop()->createShop(
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
```
         
- Obtem a lista de Lojas cadastradas na Loggi

```php
<?php
    
    $loggi->shop()->getShopList();
```
    
        