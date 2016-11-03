<?php

namespace docroms\CncBundle\Service;

use Doctrine\ORM\EntityManager;
use Symfony\Component\DependencyInjection\Container;
use Symfony\Component\DependencyInjection\Exception\ParameterNotFoundException;
use GuzzleHttp\Client;


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
     * @var array mandatory fields
     */
    private $mandatoryFields = array(
        'consumerKey' => null,
        'consumerSecret' => null,
        'oauthUrl' => null,
        'accessToken' => null,
        'accessTokenSecret' => null
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
        foreach ($this->mandatoryFields as $field => $value) {
            $this->mandatoryFields[$field] = $container->getParameter(sprintf('cnc.%s', $field));
        }

    }

    /**
     * @param $oeuvre \oeuvre
     */
    private function sendOeuvre($oeuvre)
    {
        $json = $oeuvre->getJson();

        var_dump($json);

        die('end of Cnc Bundle for now');

        $client = new Client([
            // Base URI is used with relative requests
            'base_uri' => 'http://httpbin.org',
            // You can set any number of default request options.
            'timeout'  => 2.0,
        ]);

        $r = $client->request('PUT', 'http://httpbin.org/put', [
            'json' => ['foo' => 'bar']
        ]);
    }

    /**
     * @param $movie \movies
     */
    public function SendMovieToCnc($movie){
        return $this->sendOeuvre($movie);
    }

    /**
     * @param $serie \series
     */
    public function SendSerieToCnc($serie){
        return $this->sendOeuvre($serie);
    }

    /**
     * @return \movies
     */
    public function getNewMovie(){
        return new \movies();
    }

    /**
     * @return \series
     */
    public function getNewSerie(){
        return new \series();
    }
}