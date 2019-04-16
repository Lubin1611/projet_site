<?php
/**
 * Created by PhpStorm.
 * User: Administrateur
 * Date: 16/04/2019
 * Time: 11:59
 */

class controler_ajax
{
    private $model;
    /**
     * @set model from Model/Ajax.php
     */
    public function __construct()
    {

        $this->model = new Ajax();


    }

    public function send_request() {

        $this->model->getscore();

    }
}