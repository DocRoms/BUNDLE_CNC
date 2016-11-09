<?php

namespace docroms\CncBundle\Service;

use Doctrine\ORM\EntityManager;
use Symfony\Component\Config\Definition\Exception\Exception;
use Symfony\Component\DependencyInjection\Container;
use Symfony\Component\DependencyInjection\Exception\ParameterNotFoundException;

use GuzzleHttp\Client;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Subscriber\Oauth\Oauth1;

use docroms\CncBundle\Classe;


/**
 * Created by PhpStorm.
 * User: docro
 * Date: 01/06/2016
 * Time: 14:03
 */
class Cnc
{
    const URI_PING_AUTH = 'editor/oauth-ping';
    const URI_PRODUCTS = 'editor/v1/products';

    /**
     * @var EntityManager
     */
    private $_entityManager;

    /**
     * @var string
     */
    private $_consumer_key;

    /**
     * @var string
     */
    private $_consumer_secret;

    /**
     * @var string
     */
    private $_oauth_url;

    /**
     * @var string
     */
    private $_access_token;

    /**
     * @var string
     */
    private $_access_token_secret;

    /**
     * @var array mandatory fields
     */
    private $_mandatoryFields = array(
        'mode' => null,
        'production_consumer_key' => null,
        'production_consumer_secret' => null,
        'production_oauth_url' => null,
        'production_access_token' => null,
        'production_access_token_secret' => null,
        'recette_consumer_key' => null,
        'recette_consumer_secret' => null,
        'recette_oauth_url' => null,
        'recette_access_token' => null,
        'recette_access_token_secret' => null
    );

    /**
     * Paiement constructor.
     * @param EntityManager $entityManager
     * @param Container $container
     */
    public function __construct(EntityManager $entityManager, Container $container)
    {
        $this->_entityManager = $entityManager;
        //$container->getParameter('');
        foreach ($this->_mandatoryFields as $field => $value) {
            $this->_mandatoryFields[$field] = $container->getParameter(sprintf('cnc.%s', $field));
        }

        switch($this->_mandatoryFields['mode']){
            case 'production':
                $this->_consumer_key = $this->_mandatoryFields['production_consumer_key'];
                $this->_consumer_secret = $this->_mandatoryFields['production_consumer_secret'];
                $this->_oauth_url = $this->_mandatoryFields['production_oauth_url'];
                $this->_access_token = $this->_mandatoryFields['production_access_token'];
                $this->_access_token_secret = $this->_mandatoryFields['production_access_token_secret'];
                break;
            case 'recette':
                $this->_consumer_key = $this->_mandatoryFields['recette_consumer_key'];
                $this->_consumer_secret = $this->_mandatoryFields['recette_consumer_secret'];
                $this->_oauth_url = $this->_mandatoryFields['recette_oauth_url'];
                $this->_access_token = $this->_mandatoryFields['recette_access_token'];
                $this->_access_token_secret = $this->_mandatoryFields['recette_access_token_secret'];
                break;
            default:
                throw new Exception("cnc.mode can be defined to 'production' or 'recette' on config.yml");
        }

    }

    /**
     * @return Classe\oeuvre
     */
    public function getNewOeuvresByEditor(){
        $oeuvre = new Classe\oeuvre();
        return $oeuvre;
    }

    /**
     * Envoie les oeuvres au CNC
     * @param $movie Classe\oeuvre
     */
    public function SendToCnc($oeuvre){
        return $this->sendOeuvre($oeuvre);
    }

    /**
     * Récupère les oeuvres du CNC
     * @return string
     */
    public function GetFromCnc(){
        return $this->getMyAllOeuvres();
    }

    /**
     * Envoie mes oeuvres au CNC.
     * @param $oeuvre Classe\oeuvre
     */
    private function sendOeuvre($oeuvre)
    {
        $client = $this->getClientOAuth();

        $json = $oeuvre->getJson();

        $result = $client->request('POST', $this->getConstantePath(Cnc::URI_PRODUCTS),
            ['body' => $json]);


        return $result->getBody()->getContents();
    }

    /**
     * Récupère mes oeuvres du CNC.
     */
    private function getMyAllOeuvres(){

        $client = $this->getClientOAuth();

        $result2 = $client->request('GET', $this->getConstantePath(Cnc::URI_PRODUCTS));

        return $result2->getBody()->getContents();
    }

    /**
     * Permet de retournet le Client, si l'authentification à été acceptée et que le ping est passé.
     * @return Client
     */
    protected function getClientOAuth(){

        $stack = HandlerStack::create();

        $middleware = new Oauth1([
            'consumer_key'    => $this->_consumer_key,
            'consumer_secret' => $this->_consumer_secret,
            'token'           => $this->_access_token,
            'token_secret'    => $this->_access_token_secret,
            'signature_method' => Oauth1::SIGNATURE_METHOD_HMAC
        ]);

        $stack->push($middleware);

        $client = new Client([
            'base_uri' => $this->_oauth_url,
            'handler' => $stack,
            'auth' => 'oauth'
        ]);

        $response = $client->request('GET', $this->getConstantePath(Cnc::URI_PING_AUTH));

        //var_dump($response->getBody()->getContents());
        //echo '<br>Response from ping end<br><br><br>';//die();

        if ($response->getStatusCode() != 200 && $response->getReasonPhrase() != 'OK') {
            throw new Exception('ERROR - API IS NOT CALLABLE.');
        }

        return $client;
    }

    /**
     * Permet de récuperer des Urls différentes en Prod ou en recette.
     * @param $constante
     * @return string
     */
    protected function getConstantePath($constante){
        $uri = $constante;

        if ('recette' === $this->_mandatoryFields['mode']){
            $uri = 'api/' . $constante;
        }

        return $uri;
    }

}