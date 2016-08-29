<?php

namespace docroms\Bundle\CncBundle\Service;

use Doctrine\ORM\EntityManager;
use Symfony\Component\DependencyInjection\Container;
use Symfony\Component\DependencyInjection\Exception\ParameterNotFoundException;

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
        'paypalMode' => null,
        'paypalIdentifiant' => null,
        'paypalUserApi' => null,
        'paypalUserPassApi' => null,
        'paypalSignature' => null,
        'paypalClientId' => null,
        'paypalSecret' => null,
        'stripeTestSecretKey' => null,
        'stripeTestPublishableKey' => null
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
     * @param $fields
     * trans_id => x
     * cust_email => xxxxxx@xx.xx
     * @return $this
     */
    public function setOptionnalFields($fields)
    {
        foreach ($fields as $field => $value)
            $this->mandatoryFields[$field] = $value;

        return $this;
    }


    /**
     * @return $this
     */
    public function init(){

        return $this;
    }

    /**
     *
     */
    public function auth(){
        return $this;
    }
}