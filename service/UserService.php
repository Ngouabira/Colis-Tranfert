<?php

namespace service;

use PHPMailer\PHPMailer\PHPMailer;
// use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

use model\User;
use dao\DbConnection;
use \PDO;

class UserService
{


	public static function all()
	{

		$query = DbConnection::getConnection()->query("SELECT * FROM user");

		return $query->fetchall(PDO::FETCH_CLASS);
	}

	public static function add(User $user)
	{

		$email = $user->getEmail();
		$password = password_hash($user->getPassword(), PASSWORD_DEFAULT);
		$user = self::findByEmail($email);

		if ($user != null) {

			return "Email already exists";
		} else {
			$stmt = DbConnection::getConnection()->prepare("INSERT INTO user(email,password) VALUES(:email,:password)");
			$stmt->bindParam(':email', $email);
			$stmt->bindParam(':password', $password);
			$stmt->execute();
		}
	}

	public static function update(User $user)
	{

		$id = $user->getId();
		$email = $user->getEmail();
		$password = password_hash($user->getPassword(), PASSWORD_DEFAULT);

		$stmt = DbConnection::getConnection()->prepare("UPDATE user SET email=:email,password=:password WHERE id=:id ");
		$stmt->bindParam(':id', $id);
		$stmt->bindParam(':email', $email);
		$stmt->bindParam(':password', $password);
		$stmt->execute();
	}


	public static function delete($id)
	{

		$stmt = DbConnection::getConnection()->prepare("DELETE FROM user WHERE id =:id");
		$stmt->bindParam(':id', $id);

		$stmt->execute();
	}

	public static function one($id)
	{

		$stmt = DbConnection::getConnection()->prepare("SELECT * FROM user WHERE id =:id");
		$stmt->bindParam(':id', $id);

		$stmt->execute();

		return $stmt->fetchObject(__CLASS__);
	}


	public static function findByEmail($email)
	{

		$stmt = DbConnection::getConnection()->prepare("SELECT * FROM user WHERE email =:email");
		$stmt->bindParam(':email', $email);

		$stmt->execute();

		return $stmt->fetchObject(__CLASS__);
	}


	public static function uploadFile()
	{

		if (isset($_FILES['image'])) {
			$errors = array();
			$file_name = $_FILES['image']['name'];
			$file_size = $_FILES['image']['size'];
			$file_tmp = $_FILES['image']['tmp_name'];
			// $file_type = $_FILES['image']['type'];
			$file_ext = strtolower(end(explode('.', $_FILES['image']['name'])));

			$extensions = array("jpeg", "jpg", "png");

			if (in_array($file_ext, $extensions) === false) {
				$errors[] = "extension non autorisée, veuillez choisir un fichier JPEG ou PNG.";
			}

			if ($file_size > 2097152) {
				$errors[] = "La taille du fichier doit être d'exactement 2 Mo";
			}

			if (empty($errors) == true) {
				move_uploaded_file($file_tmp, "images/" . $file_name);
				echo "Success";
			} else {
				print_r($errors);
			}
		}
	}


	public static function login(User $user)
	{

		$email = $user->getEmail();
		$password = $user->getPassword();

		$stmt = DbConnection::getConnection()->prepare("SELECT * FROM user WHERE email =:email");
		$stmt->bindParam(':email', $email);
		$stmt->execute();

		$count = $stmt->rowCount();

		if ($count > 0) {

			$user = $stmt->fetchObject(__CLASS__);

			if (password_verify($password, $user->password)) {

				$token = uniqid();
				self::updateToken($user->id, $token);
				return $user;
			} else {
				return null;
			}
		}
	}

	public static function logout($id)
	{

		self::updateToken($id, "");
	}


	public static function updateToken($id, $token)
	{

		$stmt = DbConnection::getConnection()->prepare("UPDATE user SET token=:token WHERE id=:id");
		$stmt->bindParam(":id", $id);
		$stmt->bindParam(":token", $token);
		$stmt->execute();
	}

	public static function resetPassword($token, $password)
	{

		$stmt = DbConnection::getConnection()->prepare("UPDATE user SET password=:password WHERE token=:token");
		$stmt->bindParam(":password", $password);
		$stmt->bindParam(":token", $token);
		$stmt->execute();
	}

	public static function forgotPassword($email)
	{

		$user = self::findByEmail($email);

		if ($user != null) {

			$token = uniqid();
			$stmt = DbConnection::getConnection()->prepare("UPDATE user SET token=:token WHERE email=:email");
			$stmt->bindParam(":email", $email);
			$stmt->bindParam(":token", $token);
			$stmt->execute();

			self::sendMail($email, $token);
		} else {

			return "Cette adresse mai n'existe pas";
		}
	}


	public static function sendMail($email, $token)
	{

		try {
			$link = "<a href='localhost/reset-password?token=" . $token . "'>Click To Reset password</a>";

			$mail = new PHPMailer();

			$mail->CharSet =  "utf-8";
			$mail->IsSMTP();
			$mail->SMTPAuth = true;
			$mail->Username = "your_email_id@gmail.com";
			$mail->Password = "your_gmail_password";
			$mail->SMTPSecure = "ssl";
			$mail->Host = "smtp.gmail.com";
			$mail->Port = "465";
			$mail->From = 'your_gmail_id@gmail.com';
			$mail->FromName = 'your_name';
			$mail->AddAddress('reciever_email_id', 'reciever_name');
			$mail->Subject  =  'Reset Password';
			$mail->IsHTML(true);
			$mail->Body    = 'Click On This Link to Reset Password ' . $link . '';
			$mail->Send();

			return "Check Your Email and Click on the link sent to your email";
		} catch (Exception $ex) {

			return "Mail Error - >" . $mail->ErrorInfo;
		}
	}


	public static function signin(User $user)
	{

		$email = $user->getEmail();
		$password = $user->getPassword();

		$stmt = DbConnection::getConnection()->prepare("SELECT * FROM user WHERE email =:email AND password=:password");
		$stmt->bindParam(':email', $email);
		$stmt->bindParam(':password', $password);

		$stmt->execute();

		$count = $stmt->rowCount();

		if ($count > 0) {

			$user = $stmt->fetchObject(__CLASS__);
			self::updateToken($user->id, uniqid());
			return $user;
		} else {

			return null;
		}
	}
}
