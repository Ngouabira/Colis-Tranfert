<?php 
namespace controller;

require_once "../vendor/autoload.php";

use model\Expediteur;
use service\ExpediteurService; 

class ExpediteurController {

public static function expediteurControllerManager(){

        $action = isset($_GET['action'])?$_GET['action']:NULL;
        
        switch ($action) {
            case 'all':
                self::all();
                break;
            case 'add':
                self::add();
                break;
            case 'update':
               self::update();
                break;
            case 'delete':
                self::delete();
                break;
            case 'one':
                  self::one();  
                break;
            
            default:
               return "Error";
                break;
        }
        
        }

public static function all(){
	
	echo json_encode(ExpediteurService::all());
}

public static function add(){


		extract($_POST);

        $expediteur = new Expediteur(null,$nom,$prenom,$genre,$telephone,$email,$adresse,$cni);

        if ( $expediteur->isNotEmpty()) {
            
                if ($expediteur->emailIsValid()) {

                    ExpediteurService::add($expediteur);

                    echo "OK";

                } else {

                    echo "Email invalide";
                }
                

        } else {

            echo "Veuillez remplir tous les champs";
        }
	
}

public static function update(){

    extract($_GET);
    extract($_POST);

    $expediteur = new Expediteur($id,$nom,$prenom,$genre,$telephone,$email,$adresse,$cni);

    if ( $expediteur->isNotEmpty()) {
        
            if ($expediteur->emailIsValid()) {

                ExpediteurService::update($expediteur);

                echo "OK";

            } else {

                echo "Email invalide";
            }
            

    } else {

        echo "Veuillez remplir tous les champs";
    }
		
}


public static function delete(){

    extract($_GET);
	ExpediteurService::delete($id);
}

public static function one(){

	extract($_GET);
	echo json_encode(ExpediteurService::one($id));
}

}


ExpediteurController::expediteurControllerManager();
