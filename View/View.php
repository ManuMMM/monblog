<?php

/**
 * Description of View
 *
 * @author Manu
 */

class View {

    // Name of the file associated with the view
    private $file;
    // Title of the view (defined in the 'View' file)
    private $title;

    public function __construct($action) {
        $directory = array('View/', 'View/Frontend/', 'View/Backend/');
        // Loop the search in all the specified folders
        foreach ($directory as $current_dir) {
            // Determining the name of the view file from the action parameter
            $file = $current_dir . 'view' . $action .'.php';
            if(file_exists($file)){                
                $this->file = $file;
                return;
            }
        }
    }

    // Generate and display the view
    public function generate($data) {
        // Generation of the specific part of the view
        $content = $this->generateFile($this->file, $data);
        // Generation of the common template using the specific part
        $view = $this->generateFile('View/template.php', array('title' => $this->title, 'content' => $content));
        // Return the view to the browser
        echo $view;
    }

    // Generate a view file and return the result made
    private function generateFile($file, $data) {
        if (file_exists($file)) {
            // Makes the array elements $data accessible in the view
            // "Extract()" assign each value to its key, ex: array('a' => 'dog') will result to $a = 'dog'
            extract($data);
            // Turn on output buffering
            ob_start();
            // Include the view file
            // Its result is placed in the output buffering
            require $file;
            // Stop the output buffering and return the output buffer
            return ob_get_clean();
        }
        else {
            throw new Exception("File '$file' not found");
        }
    }
}
