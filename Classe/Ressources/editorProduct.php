<?php
/**
 * Created by PhpStorm.
 * User: docro
 * Date: 02/11/2016
 * Time: 14:39
 */

namespace docroms\CncBundle\Classe\Ressources;

use DateTime;
use docroms\CncBundle\Classe\Ressources\Enum\lang;
use docroms\CncBundle\Classe\Ressources\Enum\media;
use docroms\CncBundle\Classe\Ressources\Enum\mode;
use docroms\CncBundle\Classe\Ressources\Enum\quality;
use docroms\CncBundle\Service\Templates\Ressources\Enum;
use Symfony\Component\Config\Definition\Exception\Exception;

class editorProduct
{
    /**
     * @var string id of editor product
     */
    private $_idProductEditor;

    /**
     * @var string
     */
    private $_mediaName;
    /**
     * @var int
     */
    private $_mediaCode;

    /**
     * @var string
     */
    private $_modeName;

    /**
     * @var int
     */
    private $_modeCode;

    /**
     * @var string
     */
    private $_qualityName;
    /**
     * @var int
     */
    private $_qualityCode;

    /**
     * @var array
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
     * @return string
     */
    public function getMediaName(){
        return $this->_mediaName;
    }

    /**
     * @return int
     */
    public function getMediaCode(){
        return $this->_mediaCode;
    }

    /**
     * @param $media int
     */
    public function setMedia($media){
        switch($media) {
            case media::DIGITAL:
                $this->_mediaCode = 1;
                $this->_mediaName = 'DIGITAL';
                break;
            case media::PHYSICAL:
                $this->_mediaCode = 2;
                $this->_mediaName = 'PHYSICAL';
                break;
            case media::DIGITAL_BOX:
                $this->_mediaCode = 3;
                $this->_mediaName = 'DIGITAL_BOX';
                break;
            default:
                new Exception('Invalid media value :You you must use the constants \'media :: something\'');

        }
    }

    /**
     * @return string
     */
    public function getModeName(){
        return $this->_modeName;
    }

    /**
     * @return int
     */
    public function getModeCode(){
        return $this->_modeCode;
    }

    /**
     * @param $mode int
     */
    public function setMode($mode){
        switch($mode) {
            case mode::TVOD:
                $this->_modeCode = 2;
                $this->_modeName = 'TVOD';
                break;
            case mode::SVOD:
                $this->_modeCode = 3;
                $this->_modeName = 'SVOD';
                break;
            case mode::VODEST:
                $this->_modeCode = 4;
                $this->_modeName = 'VODEST';
                break;
            case mode::DVD:
                $this->_modeCode = 5;
                $this->_modeName = 'DVD';
                break;
            case mode::BLURAY:
                $this->_modeCode = 6;
                $this->_modeName = 'BLURAY';
                break;
            case mode::REPLAY:
                $this->_modeCode = 7;
                $this->_modeName = 'REPLAY';
                break;
            default:
                new Exception('Invalid mode value :You you must use the constants \'mode :: something\'');
        }
    }

    /**
     * @return string
     */
    public function getQualityName(){
        return $this->_qualityName;
    }

    /**
     * @return int
     */
    public function getQualityCode(){
        return $this->_qualityCode;
    }

    /**
     * @param $quality int
     */
    public function setQuality($quality){
        switch($quality) {
            case quality::SD:
                $this->_qualityCode = 1;
                $this->_qualityName = 'SD';
                break;
            case quality::HD:
                $this->_qualityCode = 2;
                $this->_qualityName = 'HD';
                break;
            case quality::FHD:
                $this->_qualityCode = 3;
                $this->_qualityName = 'FHD';
                break;
            default:
                new Exception('Invalid quality value :You you must use the constants \'quality :: something\'');
        }
    }

    /**
     * @return array
     */
    public function getLang(){
        return $this->_lang;
    }

    /**
     * @param $lang int
     */
    public function addLang($langCode){
        switch($langCode) {
            case lang::VO:
                $this->_lang[] = array('name' => 'VO', 'code' => $langCode);
                break;
            case lang::VF:
                $this->_lang[] = array('name' => 'VF', 'code' => $langCode);
                break;
            case lang::VOSTFR:
                $this->_lang[] = array('name' => 'VOSTFR', 'code' => $langCode);
                break;
            case lang::MALENTENDANT:
                $this->_lang[] = array('name' => 'MALENTENDANT', 'code' => $langCode);
                break;
            case lang::AUDIODESCRIPTION:
                $this->_lang[] = array('name' => 'AUDIODESCRIPTION', 'code' => $langCode);
                break;
            case lang::COMPATIBILITE_MAC:
                $this->_lang[] = array('name' => 'COMPATIBILITE_MAC', 'code' => $langCode);
                break;
            default:
                new Exception('Invalid lang value :You you must use the constants \'lang :: something\'');
        }

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