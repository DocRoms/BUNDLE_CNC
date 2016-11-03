<?php

namespace docroms\CncBundle\Service\Templates\Ressources;

/**
 * Created by PhpStorm.
 * User: docro
 * Date: 01/11/2016
 * Time: 21:38
 */
class editorTitles
{
    /**
     * @var string editor title id.
     */
    private $_idTitleEditor;

    /**
     * @var string original title name
     */
    private $_originalTitle;

    /**
     * @var string season number
     */
    private $_seasonNumber;

    /**
     * @var string episode number
     */
    private $_episodeNumber;
    /**
     * @var companyIds
     */
    private $_ids;

    /**
     * @var string type of mobie
     */
    private $_type;

    /**
     * @var string year start
     */
    private $_yearStart;

    /**
     * @var array
     */
    private $_editorProduct = array();

    /**
    * oeuvre constructor.
    */
    public function __construct()
    {
        $this->_ids = new companyIds();
    }

    /**
     * @return editorProduct
     */
    public function getNewEditorProduct(){
        return new editorProduct();
    }

    /**
     * @param $editorProduct editorProduct
     */
    public function addNewEditorProduct($editorProduct){
        $this->_editorProduct[] = $editorProduct;
    }

    /**
     * @return string title editor id
     */
    public function getIdTitleEditor(){
        return $this->_idTitleEditor;
    }

    /**
     * @param $idTitleEditor string title editor id.
     */
    public function setIdTitleEditor($idTitleEditor){
        $this->_idTitleEditor  = $idTitleEditor;
    }

    /**
     * @return string title original name.
     */
    public function getOriginalTitle(){
        return $this->_originalTitle;
    }

    /**
     * @param $idTitleEditor string title original name.
     */
    public function setOriginalTitle($originalTitle){
        $this->_originalTitle  = $originalTitle;
    }

    /**
     * @return string season number
     */
    public function getSeasonNumber(){
        return $this->_seasonNumber;
    }

    /**
     * @param $seasonNumber string season number.
     */
    public function setSeasonNumber($seasonNumber){
        $this->_seasonNumber = $seasonNumber;
    }

    /**
     * @return string episode number
     */
    public function getEpisodeNumber(){
        return $this->_episodeNumber;
    }

    /**
     * @param $episodeNumber string episode number.
     */
    public function setEpisodeNumber($episodeNumber){
        $this->_episodeNumber = $episodeNumber;
    }

    /**
     * @return string type
     */
    public function getType(){
        return $this->_type;
    }

    /**
     * @param $type string type of movie.
     */
    public function setType($type){
        $this->_type = $type;
    }

    /**
     * @return string year of the movie start
     */
    public function getYearStart(){
        return $this->_yearStart;
    }

    /**
     * @param $yearStart string year of the movie start.
     */
    public function setYearStart($yearStart){
        $this->_yearStart = $yearStart;
    }

    /**
     * @return companyIds
     */
    public function getIds(){
        return $this->_ids;
    }

}