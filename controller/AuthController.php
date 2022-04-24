<?php

namespace controller;

use model\User;
use service\UserService;

class AuthController
{



	public static function controllerManager()
	{

		// $view = isset($_GET['view'])?$_GET['view']:NULL;
		$action = isset($_GET['action']) ? $_GET['action'] : NULL;

		// switch ($view) {
		// 	case 'all':
		// 		self::includeView($view);
		// 		break;
		// 	case 'register':
		// 		self::includeView($view);
		// 		break;
		// 	case 'one':
		// 		self::includeView($view);
		// 		break;
		// 	case 'login':
		// 		self::includeView($view);
		// 		break;
		// 	case 'forgotPassword':
		// 		self::includeView($view);
		// 		break;
		// 	case 'resetPassword':
		// 		self::includeView($view);
		// 		break;
		// 	case 'uploadFile':
		// 		self::includeView($view);
		// 		break;

		// 	default:
		// 		self::includeView("user");
		// 		break;
		// }

		switch ($action) {

			case 'login':
				self::login();
				break;
			case 'logout':
				self::logout();
				break;

			case 'forgotPassword':
				self::forgotPassword();
				break;
			case 'resetPassword':
				self::resetPassword();
				break;
			default:
				echo "Erreur";
				break;
		}
	}


	public static function includeView($view)
	{
		require_once './view/' . $view . '.php';
	}

	public static function login()
	{

		extract($_POST);

		$user = new User(null, $email, $password);
		if ($user->isNotEmpty()) {
			if (UserService::login($user)) {

				echo  "ok";
			} else {
				echo "Email ou Password incorrect!";
			}
		} else {
			echo "Veuillez remplir tous les champss!";
		}
	}

	public static function logout()
	{
		extract($_GET);
		UserService::logout($id);
	}

	public static function signin()
	{
		extract($_POST);
		$user = new User(null, $email, $password);
		UserService::signin($user);
	}

	public static function forgotPassword()
	{
		extract($_POST);
		UserService::forgotPassword($email);
	}

	public static function resetPassword()
	{
		extract($_GET);
		extract($_POST);
		UserService::resetPassword($token, $password);
	}
}

AuthController::controllerManager();
