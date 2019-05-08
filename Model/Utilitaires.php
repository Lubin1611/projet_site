<?php
/**
 * Created by PhpStorm.
 * User: Lubin
 * Date: 08/05/2019
 * Time: 18:28
 */

class Utilitaires
{

    public function __construct()

    {

    }

    public function get_date() {

        date_default_timezone_set('Europe/Paris');
        $date = date("d/m/y H:i:s");
        return $date;

    }

}