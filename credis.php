<?php
error_reporting(E_ALL);

define('Token',  '');
define('Type',  '');
define('API_WSDL',      'https://credisiscobranca.com.br/ws?wsdl');


ini_set("soap.wsdl_cache_enabled", "0");

$xmlReq = '<soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:urn="urn:CredisisBoletoInterface" xmlns:urn1="urn:CredisisBoletoInterface-CredisisWebService">
   <soapenv:Header>
      <urn:Chave>
         <token>'.Token.'</token>
         <convenio>?</convenio>
      </urn:Chave>
   </soapenv:Header>
   <soapenv:Body>
      <urn1:gerarBoleto>
         <boleto>
            <!--Optional:-->
            <avalista>
               <nome>?</nome>
               <!--Optional:-->
               <nomeFantasia>?</nomeFantasia>
               <cpfCnpj>?</cpfCnpj>
               <!--Optional:-->
               <identidade>?</identidade>
               <!--Optional:-->
               <dataNascimento>?</dataNascimento>
               <endereco>
                  <endereco>?</endereco>
                  <bairro>?</bairro>
                  <!--Optional:-->
                  <complemento>?</complemento>
                  <cep>?</cep>
                  <cidade>?</cidade>
                  <uf>?</uf>
                  <numero>?</numero>
               </endereco>
               <contatos>
                  <!--Zero or more repetitions:-->
                  <item>
                     <contato>?</contato>
                     <tipoContato>?</tipoContato>
                  </item>
               </contatos>
            </avalista>
            <pagador>
               <nome>?</nome>
               <!--Optional:-->
               <nomeFantasia>?</nomeFantasia>
               <cpfCnpj>?</cpfCnpj>
               <!--Optional:-->
               <identidade>?</identidade>
               <!--Optional:-->
               <dataNascimento>?</dataNascimento>
               <endereco>
                  <endereco>?</endereco>
                  <bairro>?</bairro>
                  <!--Optional:-->
                  <complemento>?</complemento>
                  <cep>?</cep>
                  <cidade>?</cidade>
                  <uf>?</uf>
                  <numero>?</numero>
               </endereco>
               <contatos>
                  <!--Zero or more repetitions:-->
                  <item>
                     <contato>?</contato>
                     <tipoContato>?</tipoContato>
                  </item>
               </contatos>
            </pagador>
            <documento>?</documento>
            <dataEmissao>?</dataEmissao>
            <dataVencimento>?</dataVencimento>
            <dataLimitePagamento>?</dataLimitePagamento>
            <valor>?</valor>
            <quantidadeParcelas>?</quantidadeParcelas>
            <intervaloParcela>?</intervaloParcela>
            <!--Optional:-->
            <layout>?</layout>
            <!--Optional:-->
            <formato>?</formato>
            <codigoEspecie>?</codigoEspecie>
            <protesto>
               <tipo>?</tipo>
               <dias>?</dias>
            </protesto>
            <!--Optional:-->
            <instrucao>?</instrucao>
            <!--Optional:-->
            <multa>
               <valor>?</valor>
               <carencia>
                  <tipo>?</tipo>
                  <dias>?</dias>
               </carencia>
               <tipo>?</tipo>
            </multa>
            <!--Optional:-->
            <juros>
               <valor>?</valor>
               <carencia>
                  <tipo>?</tipo>
                  <dias>?</dias>
               </carencia>
               <tipo>?</tipo>
            </juros>
            <!--Optional:-->
            <desconto1>
               <valor>?</valor>
               <!--Optional:-->
               <data>?</data>
               <tipo>?</tipo>
            </desconto1>
            <!--Optional:-->
            <desconto2>
               <valor>?</valor>
               <!--Optional:-->
               <data>?</data>
               <tipo>?</tipo>
            </desconto2>
            <!--Optional:-->
            <desconto3>
               <valor>?</valor>
               <!--Optional:-->
               <data>?</data>
               <tipo>?</tipo>
            </desconto3>
         </boleto>
      </urn1:gerarBoleto>
   </soapenv:Body>
</soapenv:Envelope>
';
    $xmlRes = doSoapRequest($xmlReq);
    
//	var_dump($xmlRes);

function doSoapRequest($xmlReq) {
    try {
		$client = new SoapClient(API_WSDL,array('trace' => 1));
    	$return = $client->gerarBoleto(Token, $xmlReq);
	//echo "REQUEST:\n" . $client->__getLastRequest() . "\n";
		return $return;
    } catch(SoapFault $exception) {
		return "Fault Code: {$exception->getMessage()}";
    }
}





?>