<?php
class Request{

    public $url; //URL appelle par l'utilisateur
function __construct(){
        $this->url = $_SERVER['PATH_INFO'];
}

}
