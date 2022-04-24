<?php



require_once "./vendor/autoload.php";
// require_once "./template/template.php";


use model\User;
use service\UserService;
use controller\UserController;



UserController::userControllerManager();

//var_dump(UserService::all());

/*$user = new User(1,"valdyngouabira@gmail.com","1234");

UserService::add($user);

$login = UserService::login($user);

echo $user->isNotEmpty();


 var_dump($login);*/





?>

<div class="col-lg-4 offset-4">Welcome on my web site</div>