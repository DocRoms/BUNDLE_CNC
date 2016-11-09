<?php

namespace docroms\CncBundle\Service;

use Doctrine\ORM\EntityManager;
use Symfony\Component\Config\Definition\Exception\Exception;
use Symfony\Component\DependencyInjection\Container;
use Symfony\Component\DependencyInjection\Exception\ParameterNotFoundException;
use GuzzleHttp\Client;
use GuzzleHttp\HandlerStack;

use docroms\CncBundle\Classe;


/**
 * Created by PhpStorm.
 * User: docro
 * Date: 01/06/2016
 * Time: 14:03
 */
class Cnc
{
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
     * @param $movie Classe\oeuvre
     */
    public function SendToCnc($oeuvre){
        return $this->sendOeuvre($oeuvre);
    }

    /**
     * @param $oeuvre Classe\oeuvre
     */
    private function sendOeuvre($oeuvre)
    {

        $client = new Client([
            // Base URI is used with relative requests
            'base_uri' => $this->_oauth_url,
        ]);

        echo $this->_oauth_url . '/editor/oauth-ping <br><br><br><br><br><br>';

        $response = $client->request('GET', 'editor/oauth-ping');

        if ($response->getStatusCode() === 200 && $response->getReasonPhrase() === 'OK'){
            
            $json = $oeuvre->getJson();

            var_dump($json);

            // echo '<br><br><br><br>';

            // var_dump($this->_mandatoryFields);
            //die('end of Cnc Bundle for now');

        }else{
            throw new Exception('ERROR - API IS NOT CALLABLE.');
        }

        var_dump($response); die(" <plouf >");
        return false;
    }


}