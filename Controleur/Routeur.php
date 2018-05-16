<?php

/**
 * Description of Routeur
 *
 * @author Manu
 */

require_once 'Controleur/ControleurAccueil.php';
require_once 'Controleur/ControleurBillet.php';
require_once 'Vue/Vue.php';

class Routeur {

  private $ctrlAccueil;
  private $ctrlBillet;

  public function __construct() {
    $this->ctrlAccueil = new ControleurAccueil();
    $this->ctrlBillet = new ControleurBillet();
    $this->action = $this->getParametre($_GET, 'action');
  }

  // Traite une requête entrante
  public function routerRequete() {
    try {
        if ($this->action == 'billet') {
            $idBillet = intval($this->getParametre($_GET, 'id'));
            if ($idBillet != 0) {
                $this->ctrlBillet->billet($idBillet);
            }
            else
              throw new Exception("Identifiant de billet non valide");
        }
        else if ($this->action == 'commenter') {
            $auteur = $this->getParametre($_POST, 'auteur');
            $contenu = $this->getParametre($_POST, 'contenu');
            $idBillet = $this->getParametre($_POST, 'id');
            $this->ctrlBillet->commenter($auteur, $contenu, $idBillet);
        }
        elseif ($this->action == NULL) {
            $this->ctrlAccueil->accueil();
        }
        else
            throw new Exception("Action non valide");
    }
    catch (Exception $e) {
        $this->erreur($e->getMessage());
    }
  }
  
  // Recherche un paramètre dans un tableau
  private function getParametre($tableau, $nom) {
    if (isset($tableau[$nom])) {
      return $tableau[$nom];
    }
    else
        return NULL;
  }

  // Show an error
  private function erreur($msgErreur) {
    $vue = new Vue("Erreur");
    $vue->generer(array('msgErreur' => $msgErreur));
  }
}