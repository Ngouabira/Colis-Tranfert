<?php

namespace controller;

use model\Colis;
use service\ColisService;

class ColisController
{
    public static function controllerManager()
    {

        $action = isset($_GET['action']) ? $_GET['action'] : NULL;

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

    public static function all()
    {

        echo json_encode(ColisService::all());
    }

    public static function add()
    {


        extract($_POST);

        $colis = new Colis(null, $libelle, $poids, $description, $expediteurId);

        if ($colis->isNotEmpty()) {

            ColisService::add($colis);
        } else {

            echo "Veuillez remplir tous les champs";
        }
    }

    public static function update()
    {

        extract($_GET);
        extract($_POST);

        $colis = new colis($id, $libelle, $poids, $description, $expediteurId);
        ColisService::update($colis);
        if ($colis->isNotEmpty()) {
        } else {

            echo "Veuillez remplir tous les champs";
        }
    }


    public static function delete()
    {

        extract($_GET);
        ColisService::delete($id);
    }

    public static function one()
    {

        extract($_GET);
        echo json_encode(ColisService::one($id));
    }
}

ColisController::controllerManager();
