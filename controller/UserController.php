<?php

namespace controller;

use model\User;
use service\UserService;

class UserController
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

		echo json_encode(UserService::all());
	}

	public static function add()
	{


		extract($_POST);

		$user = new User(null, $email, $password);

		if ($user->isNotEmpty()) {

			UserService::add($user);
		} else {

			echo "Veuillez remplir tous les champs";
		}
	}

	public static function update()
	{

		extract($_GET);
		extract($_POST);

		$user = new User($id, $email, $password);
		UserService::update($user);
		if ($user->isNotEmpty()) {
		} else {

			echo "Veuillez remplir tous les champs";
		}
	}


	public static function delete()
	{

		extract($_GET);
		UserService::delete($id);
	}

	public static function one()
	{

		extract($_GET);
		echo json_encode(UserService::one($id));
	}
}

UserController::controllerManager();
