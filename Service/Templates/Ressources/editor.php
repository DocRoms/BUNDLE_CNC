<?php

namespace docroms\CncBundle\Service\Templates\Ressources;

/**
 * Created by PhpStorm.
 * User: docro
 * Date: 01/11/2016
 * Time: 21:41
 */
class editor
{
    /**
     * @var string editor's logo URL
     */
    private $_editorUrlLogo;

    /**
     * @var string editor name.
     */
    private $_editorName;

    /**
     * @var string editor Id
     */
    private $_editorId;

    /**
     * @return string path (url) of the editor's logo.
     */
    public function getUrlLogo(){
        return $this->_editorUrlLogo;
    }

    /**
     * @param $value string Path (url) of the editor's logo.
     */
    public function setUrlLogo($value){
        $this->_editorUrlLogo = $value;
    }

    /**
     * @return string editor's name.
     */
    public function getName(){
        return $this->_editorName;
    }

    /**
     * @param $value string editor's name.
     */
    public function setName($value){
        $this->_editorName = $value;
    }

    /**
     * @return string editor's id.
     */
    public function getId(){
        return $this->_editorId;
    }

    /**
     * @param $value string editor's id.
     */
    public function setId($value){
        $this->_editorId = $value;
    }

}