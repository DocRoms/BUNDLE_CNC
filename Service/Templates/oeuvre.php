<?php

use docroms\CncBundle\Service\Templates\Ressources;

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
    private $_totalProducts;

    /**
     * @var int
     */
    private $_totalTitles;

    /**
     * @var Ressources\editor|null
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
     * @return Ressources\editorTitles
     */
    public function getNewEditorTitle(){
        return new Ressources\editorTitles();
    }

    /**
     * @param $editor Ressources\editorTitles
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
     * @param $totalProducts
     */
    public function setTotalProducts($totalProducts){
        $this->_totalProducts = $totalProducts;
    }

    /**
     * @return int
     */
    public function getTotalTitles(){
        return $this->_totalTitles;
    }

    /**
     * @param $totalTitles
     */
    public function setTotalTitles($totalTitles){
        $this->_totalTitles = $totalTitles;
    }

    /**
     * @return string
     */
    public function getJson()
    {
        return json_encode((array)$this);
    }
}