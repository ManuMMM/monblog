<?php

/*
 * Description of Autoloader
 *
 * @author Manu
 */

class Autoloader {
    /*
     * Register our autoloader
     * array(__CLASS__, 'autoload') correspond to array('name of the class', 'the function called in this class')
     * __CLASS__: Name of the current class
     */
    public static function register(){
        spl_autoload_register(array(__CLASS__, 'autoload'));
    }
    /*
     * Include the file coreesponding to our class
     * @param $class (string): Name of the class to load
     */
    public static function autoload($class){
        //list comma separated directory name
        $directory = array( 'model/', 'controller/', 'view/');
        foreach ($directory as $current_dir) {
            $file = $current_dir . $class .'.php';;
            if(file_exists($file)){
                require_once $file;
                return;
            }
        }
    }
}