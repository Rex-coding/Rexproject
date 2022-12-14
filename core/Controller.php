<?php
class Controller{
 
    public $request;                // Objet Request
    private $vars     = array();    // Variables à passer à la vue
    public $layout    = 'default';  // Layout à utiliser pour rendre la vue
    private $rendered = false;      // Si le rendu a été fait ou pas

    /**
     * Constructeur
     * @param $request objet de notre application
     */
    function __construct($request){
        $this->request = $request;  // On stock la request dans l'instance    
    }
/**
 * Permet de rendre une vue
 * @param $view fichier à rendre (chemin depuis view ou nom de la vue)
 **/
    public function render($view){
        if($this->rendered){ return false;}
        extract($this->vars);
            if(strpos($view,'/')===0){
                $view = ROOT.DS.'view'.$view.'.php';
            }else{
                $view = ROOT.DS.'view'.DS.$this->request->controller.DS.$view.'.php';
            }
        
        ob_start();
        require($view);
        $content_for_layout = ob_get_clean();
        require ROOT.DS.'view'.DS.'layout'.DS.$this->layout.'.php' ;
        $this->rendered = true;
    }

    /**
     * Permet de passer un ou plusieurs variables à la vue
     * @param $key nom de la variable OU tableau de variable
     * @param $value Valeur de la variable
     */
    public function set( $key, $value = null)
    {
        if (is_array($key)){
            $this->vars +=$key;
        }else{
            $this->vars[$key] = $value;
        }
    }
    
    /**
     * Permet de charger un model
     */
    function loadModel($name){
        $file= ROOT.DS.'model'.DS.$name.'.php';
        require_once($file);
        if (!isset($this->$name)){
             $this->$name= NEW $name();
        }
       
     }
}
