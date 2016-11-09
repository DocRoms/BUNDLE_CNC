<?php

namespace docroms\CncBundle\Classe;

use docroms\CncBundle\Classe\Ressources;
use docroms\CncBundle\Classe\Ressources\editor;
use docroms\CncBundle\Classe\Ressources\editorTitle;

/**
 * Created by PhpStorm.
 * User: docro
 * Date: 01/11/2016
 * Time: 20:33
 */
class oeuvre implements Ressources\jsonTemplate
{
    /**
     * @var array
     */
    private $_editorTitles = array();

    /**
     * @var int
     */
    private $_totalProducts = 0;

    /**
     * @var int
     */
    private $_totalTitles = 0;

    /**
     * @var editor|null
     */
    private $_editor = null;

    /**
     * oeuvre constructor.
     */
    public function __construct()
    {
        $this->_editor = new Ressources\editor();
    }

    /**
     * @return Ressources\editor|null
     */
    public function getEditor(){
        return $this->_editor;
    }

    /**
     * @return editorTitle
     */
    public function getNewEditorTitle(){
        $editorTitle = new editorTitle();
        return $editorTitle;
    }

    /**
     * @param $editor editorTitle
     */
    public function addNewEditorTitle($editor){
        $this->_editorTitles[] = $editor;
    }

    /**
     * @return int
     */
    public function getTotalProducts(){
        return $this->_totalProducts;
    }

    /**
     * @return int
     */
    public function getTotalTitles(){
        return $this->_totalTitles;
    }

    /**
     * @return string
     */
    public function getJson()
    {
        $json = '
        {
            "editorTitles": [';

            $editorTitleN = 0;
            $editorTitleLast = count($this->_editorTitles);
            foreach ($this->_editorTitles as $editorTitle) {
                /* @var $editorTitle editorTitle */
                $json .= '{
                    "ids": {';
                if (! is_null($editorTitle->getIds()->getAllocineId())){
                    $json .= '"idAllocine": "' . $editorTitle->getIds()->getAllocineId(). '"';
                    if (! is_null($editorTitle->getIds()->getImdbId())){
                        $json .= ',';
                    }
                }
                if (! is_null($editorTitle->getIds()->getImdbId())){
                    $json .= '"idImdb": "' . $editorTitle->getIds()->getImdbId() . '"';
                }
                $json .= '},
			        "type": "'. $editorTitle->getType().'",
                    "director": "' . $editorTitle->getDirector() . '",
                    "productionYear": ' . $editorTitle->getProductionYear()->format('Y') .',
                    "originalTitle": "' . $editorTitle->getOriginalTitle() . '",
                    "idTitleEditor": "' . $editorTitle->getIdTitleEditor() . '",
                    "editorProduct": 
                    [';

                    $editorProductN = 0;
                    $editorProductLast = count($editorTitle->getEditorProducts());
                    foreach ($editorTitle->getEditorProducts() as $editorProduct) {
                        /* @var $editorProduct Ressources\editorProduct */
                        $json .= '{
                                    "idProductEditor": "' . $editorProduct->getIdProductorEditor() . '",
                                    "media": {
                                        "name": "' . $editorProduct->getMediaName() . '",
                                        "code": ' . $editorProduct->getMediaCode() . '
                                    },
                                    "mode": {
                                        "name": "' . $editorProduct->getModeName() . '",
                                        "code": ' . $editorProduct->getModeCode() . '
                                    },
                                    "quality": {
                                        "name": "' . $editorProduct->getQualityName() . '",
                                        "code": ' . $editorProduct->getQualityCode() . '
                                    },
                                    "lang": [';
                                        $langN = 0;
                                        $langLast = count($editorProduct->getLang());
                                        foreach ($editorProduct->getLang() as $lang){
                                            $json .='{
                                                "code": ' . $lang['code'] . ',
                                                "name": "' . $lang['name'] . '"
                                            }';

                                            $langN++;
                                            if ($langN < $langLast){
                                                $json .= ',';
                                            }
                                        }
                                $json .= '],
                                    "price": ' . $editorProduct->getPrice() . ',
                                    "url": "' . $editorProduct->getUrl() . '",';
                        if (!is_null($editorProduct->getUrlIos())) {
                            $json .= '"urlIOS": "' . $editorProduct->getUrlIos() . '",';
                        }
                        if (!is_null($editorProduct->getUrlAndroid())) {
                            $json .= '"urlAndroid": "' . $editorProduct->getUrlAndroid() . '",';
                        }
                        $json .= '"publicationDate": "' . $editorProduct->getPublicationDate()->format('Y-m-d')
                            .'T'
                            . $editorProduct->getPublicationDate()->format('H:i:s')
                            . 'Z'
                            . '",
                                    "expirationDate": "' . $editorProduct->getExpirationDate()->format('Y-m-d')
                            .'T'
                            . $editorProduct->getExpirationDate()->format('H:i:s')
                            . 'Z'
                            . '"
                                }';
                        $editorProductN++;
                        if ($editorProductN < $editorProductLast ){
                            $json .= ',';
                        }
                    }

                    $this->_totalProducts += $editorProductN;

                    $json .= '],
                        "frTitle": "' . $editorTitle->getFrenchTitle() . '"
                    }';

                    $editorTitleN++;
                    if ($editorTitleN < $editorTitleLast){
                        $json .= ',';
                    }
                }

                $this->_totalTitles = $editorTitleN;

            $json .= '],
            "totalProducts": ' . $this->_totalProducts . ',
            "totalTitles": ' . $this->_totalTitles . ',
            "editor": {
                "urlLogo": "'. $this->_editor->getUrlLogo() .'",
                "name": "'. $this->_editor->getName() .'",
                "id": '. $this->_editor->getId() .'
            }
        }';

        return $json;
    }
}