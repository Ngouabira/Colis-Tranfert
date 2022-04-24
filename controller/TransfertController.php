<?php

namespace controller;

use model\Transfert;
use service\TransfertService;

class TransfertController
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

        echo json_encode(TransfertService::all());
    }

    public static function add()
    {


        extract($_POST);

        $transfert = new Transfert(null, $expediteurId, $destinataireId, $colisId, $destinationId, $date);

        if ($transfert->isNotEmpty()) {

            TransfertService::add($transfert);
        } else {

            echo "Veuillez remplir tous les champs";
        }
    }

    public static function update()
    {

        extract($_GET);
        extract($_POST);

        $transfert = new Transfert($id, $expediteurId, $destinataireId, $colisId, $destinationId, $date);
        TransfertService::update($transfert);
        if ($transfert->isNotEmpty()) {
        } else {

            echo "Veuillez remplir tous les champs";
        }
    }


    public static function delete()
    {

        extract($_GET);
        TransfertService::delete($id);
    }

    public static function one()
    {

        extract($_GET);
        echo json_encode(TransfertService::one($id));
    }
}

TransfertController::controllerManager();
