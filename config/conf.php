<?php
class Conf {

    static $debug = 1;
    /**
     * Crée une Variable static
     * @param $database stock les informations de connexion de la base 
     * 
     */
    static $database = array(
        'default' => array(
            'host'      => 'localhost',
            'database'  => 'tuto',
            'login'     => 'root',
            'password'  => ''
        ),

    'blog'      => array(
        'host'      => 'localhost',
        'database'  => 'mini_chat',
        'login'     => 'root',
        'password'  => ''  
    )
    );
}







;?>