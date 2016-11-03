<?php
/**
 * Created by PhpStorm.
 * User: docro
 * Date: 02/11/2016
 * Time: 14:39
 */

namespace docroms\CncBundle\Service\Templates\Ressources;

use DateTime;
use docroms\CncBundle\Service\Templates\Ressources\Enum;

class editorProduct
{
    /**
     * @var string id of editor product
     */
    private $_idProductEditor;

    /**
     * @var int
     */
    private $_media;

    /**
     * @var int
     */
    private $_mode;

    /**
     * @var int
     */
    private $_quality;

    /**
     * @var int
     */
    private $_lang;

    /**
     * @var double price
     */
    private $_price;

    /**
     * @var string url
     */
    private $_url;

    /**
     * @var string Url Ios
     */
    private $_urlIos;

    /**
     * @var string Url Android
     */
    private $_urlAndroid;

    /**
     * @var Datetime
     */
    private $_publicationDate;

    /**
     * @var Datetime
     */
    private $_expirationDate;

    /**
     * @return string
     */
    public function getIdProductorEditor(){
        return $this->_idProductEditor;
    }

    /**
     * @param $idProductEditor string
     */
    public function setIdProductorEditor($idProductEditor){
        $this->_idProductEditor = $idProductEditor;
    }

    /**
     * @return int
     */
    public function getMedia(){
        return $this->_media;
    }

    /**
     * @param $media int
     */
    public function setMedia($media){
        $this->_media = $media;
    }

    /**
     * @return int
     */
    public function getMode(){
        return $this->_mode;
    }

    /**
     * @param $mode int
     */
    public function setMode($mode){
        $this->_mode = $mode;
    }

    /**
     * @return int
     */
    public function getQuality(){
        return $this->_quality;
    }

    /**
     * @param $quality int
     */
    public function setQuality($quality){
        $this->_quality = $quality;
    }

    /**
     * @return int
     */
    public function getLang(){
        return $this->_lang;
    }

    /**
     * @param $lang int
     */
    public function setLang($lang){
        $this->_lang = $lang;
    }

    /**
     * @return double
     */
    public function getPrice(){
        return $this->_price;
    }

    /**
     * @param $price double
     */
    public function setPrice($price){
        $this->_price = $price;
    }

    /**
     * @return string
     */
    public function getUrl(){
        return $this->_url;
    }

    /**
     * @param $url string
     */
    public function setUrl($url){
        $this->_url = $url;
    }

    /**
     * @return string
     */
    public function getUrlAndroid(){
        return $this->_urlAndroid;
    }

    /**
     * @param $url string
     */
    public function setUrlAndroid($url){
        $this->_urlAndroid = $url;
    }

    /**
     * @return string
     */
    public function getUrlIos(){
        return $this->_urlIos;
    }

    /**
     * @param $url string
     */
    public function setUrlIos($url){
        $this->_urlIos = $url;
    }

    /**
     * @return DateTime
     */
    public function getPublicationDate(){
        return $this->_publicationDate;
    }

    /**
     * @param $date DateTime
     */
    public function setPublicationDate($date){
        $this->_publicationDate = $date;
    }

    /**
     * @return DateTime
     */
    public function getExpirationDate(){
        return $this->_expirationDate;
    }

    /**
     * @param $date DateTime
     */
    public function setExpirationDate($date){
        $this->_expirationDate = $date;
    }
}