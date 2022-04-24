<?php

namespace controller;

use model\User;
use service\UserService;

class UserController
{



	public static function userControllerManager()
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
			case 'add':
				# code...
				break;
			case 'update':
				# code...
				break;
			case 'delete':
				# code...
				break;
			case 'login':
				self::login();
				break;
			case 'logout':
				# code...
				break;

			case 'forgotPassword':
				# code...
				break;
			case 'resetPassword':
				# code...
				break;
			case 'uploadFile':
				# code...
				break;

			default:
				# code...
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

		// echo json_encode($_POST);

		$user = new User(null, $email, $password);
		if ($user->isNotEmpty()) {
			if (UserService::login($user)) {
				/*self::includeView("user");*/
				//var_dump(UserService::login($user));
				//echo json_encode($_POST);
				echo  "ok";
			} else {
				echo "Email ou Password incorrect!";
				//self::includeView("login");
			}
		} else {
			echo "Veuillez remplir tous les champss!";
			//self::includeView("login");
		}
	}
}
