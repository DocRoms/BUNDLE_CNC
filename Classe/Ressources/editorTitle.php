<?php

namespace docroms\CncBundle\Classe\Ressources;
use docroms\CncBundle\Classe\Ressources\Enum\type;
use Symfony\Component\Config\Definition\Exception\Exception;

/**
 * Created by PhpStorm.
 * User: docro
 * Date: 01/11/2016
 * Time: 21:38
 */
class editorTitle
{
    /**
     * @var string editor title id.
     */
    private $_idTitleEditor;

    /**
     * @var string director name
     */
    private $_director;

    /**
     * @var \DateTime production year
     */
    private $_productionYear;

    /**
     * @var string french title
     */
    private $_frenchTitle;

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
        $editorProduct = new editorProduct();
        return $editorProduct;
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
        switch ($type){
            case type::MOVIE:
                $this->_type = 'movie';
                break;
            case type::SERIE:
                $this->_type = 'serie';
                break;
            default:
                new Exception('Invalid type value :You you must use the constants \'type :: something\'');
        }
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
     * @return string year of the movie start
     */
    public function getDirector(){
        return $this->_director;
    }

    /**
     * @param $yearStart string year of the movie start.
     */
    public function setDirector($director){
        $this->_director = $director;
    }

    /**
     * @return \Datetime year of the movie start
     */
    public function getProductionYear(){
        return $this->_productionYear;
    }

    /**
     * @param $yearStart \Datetime production Year
     */
    public function setProductionYear($productionYear){
        $this->_productionYear = $productionYear;
    }

    /**
     * @return string french title
     */
    public function getFrenchTitle(){
        return $this->_frenchTitle;
    }

    /**
     * @param $frenchTitle string french title.
     */
    public function setFrenchTitle($frenchTitle){
        $this->_frenchTitle = $frenchTitle;
    }

    /**
     * @return array
     */
    public function getEditorProducts(){
        return $this->_editorProduct;
    }

    /**
     * @return companyIds
     */
    public function getIds(){
        return $this->_ids;
    }

}