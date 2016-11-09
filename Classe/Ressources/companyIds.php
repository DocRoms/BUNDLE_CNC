<?php
/**
 * Created by PhpStorm.
 * User: docro
 * Date: 02/11/2016
 * Time: 09:18
 */

namespace docroms\CncBundle\Classe\Ressources;

class companyIds
{
    /**
     * @var string allocine Id
     */
    private $_allocineId;
    /**
     * @var string imdb Id
     */
    private $_imdbId;
    private $_otherId;

    /**
     * @return string allocine Id.
     */
    public function getAllocineId(){
        return $this->_allocineId;
    }

    /**
     * @param $allocineId string allocine Id.
     */
    public function setAllocineId($allocineId){
        $this->_allocineId = $allocineId;
    }

    /**
     * @return string imdb Id.
     */
    public function getImdbId(){
        return $this->_imdbId;
    }

    /**
     * @param $allocineId string imdb Id.
     */
    public function setImdbId($imdbId){
        $this->_imdbId = $imdbId;
    }
}