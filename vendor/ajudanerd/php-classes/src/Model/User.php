<?php

namespace AjudaNerd\Model;

use \AjudaNerd\DB\Sql;
use \AjudaNerd\Model;

Class User extends Model {

    const SESSION = "User";
    const ERROR = "UserError";
    const ERROR_REGISTER = "UserErrorRegister";
    const SUCCESS = "UserSucesss";

    public static function getFromSession()
		{

			$user = new User();

			if (isset($_SESSION[User::SESSION]) && (int)$_SESSION[User::SESSION]['iduser'] > 1) {

				$user->setData($_SESSION[User::SESSION]);

			}

			return $user;

		}

		public static function checkLogin($inadmin = true)
		{

			if (
				!isset($_SESSION[User::SESSION])
				||
				!$_SESSION[User::SESSION]
				||
				!(int)$_SESSION[User::SESSION]["iduser"] > 1
			) {

				//Não está logado
				return false;

			} else {

				if ($inadmin === true && (bool)$_SESSION[User::SESSION]['inadmin'] === true) {

					return true;

				} else if ($inadmin === false) {

					return true;

				} else {

					return false;

				}

			}

		}

        public static function login($login, $password)
        {

            $sql = new Sql();

            $results = $sql->select("SELECT * FROM tb_users a INNER JOIN tb_persons b ON a.idperson = b.idperson WHERE a.login = :LOGIN", array(
                ":LOGIN"=>$login
            ));

            if (count($results) === 0)
            {
                throw new \Exception("Usuário inexistente ou senha inválidaaaa.");
            }

            $data = $results[0];

            if (password_verify($password, $data["password"]) === true)
            {

                $user = new User();

                $data['person'] = utf8_encode($data['person']);

                $user->setData($data);

                switch($_SESSION[User::SESSION]['inadmin'] = $user->getValues()){

                    case 1:
                        header("Location: /admin");
                        break;

                    case 2:
                        header("Location: /suporte");
                        break;

                }

                return $user;

            } else {
                throw new \Exception("Usuário inexistente ou senha inválida.");
            }

        }


        public static function verifyLogin($inadmin = true)
		{
			if (!User::checkLogin($inadmin)) {

				if ($inadmin) {

					header("Location: /admin/login");

				} else {

					header("Location: /login");

				}

				exit;

			}
		}

    public static function logout() {

        $_SESSION[User::SESSION] = null;
    }

    public static function listAll() {

        $sql = new Sql();

        return $sql->select("SELECT * FROM tb_users a INNER JOIN tb_persons b USING (idperson) ORDER BY b.person");

    }

    public function get($iduser) {

        $sql = new Sql();

        $results = $sql->select("SELECT * FROM tb_users a INNER JOIN tb_persons b USING (idperson) WHERE a.iduser = :iduser", array(
            ":iduser"=>$iduser
        ));

        $data = $results[0];
        $data['person'] = utf8_encode($data['person']);
        $this->setData($data);

    }

    public function save() {

        $sql = new Sql();

        $results = $sql->select("CALL sp_users_save(:person, :user, :profession, :email, :nrphone, :login, :password, :inadmin)", array(
            ":person"=>$this->getperson(),
            ":user"=>$this->getuser(),
            ":profession"=>$this->getprofession(),
            ":email"=>$this->getemail(),
            ":nrphone"=>$this->getnrphone(),
            ":login"=>$this->getlogin(),
            ":password"=>User::getPasswordHash($this->getpassword()),
            ":inadmin"=>$this->getinadmin()
        ));

        $this->setData($results[0]);

    }

    public function update() {

        $sql = new Sql();

        $results = $sql->select("CALL sp_usersupdate_save(:iduser, :person, :user, :profession, :email, :nrphone, :login, :password, :inadmin, :imgprofile)", array(
            ":iduser"=>$this->getiduser(),
            ":person"=>$this->getperson(),
            ":user"=>$this->getuser(),
            ":profession"=>$this->getprofession(),
            ":email"=>$this->getemail(),
            ":nrphone"=>$this->getnrphone(),
            ":login"=>$this->getlogin(),
            ":password"=>$this->getpassword(),
            ":inadmin"=>$this->getinadmin(),
            ":imgprofile"=>$this->getimgprofile()

        ));

        $this->setData($results[0]);

    }

    public function delete() {

        $sql = new Sql();

        $sql->query("CALL sp_users_delete(:iduser)", array(
            ":iduser"=>$this->getiduser()
        ));

    }

    public static function setError($msg)
    {

        $_SESSION[User::ERROR] = $msg;

    }

    public static function getError()
    {

        $msg = (isset($_SESSION[User::ERROR]) && $_SESSION[User::ERROR]) ? $_SESSION[User::ERROR] : '';

        User::clearError();

        return $msg;

    }

    public static function clearError()
    {

        $_SESSION[User::ERROR] = NULL;

    }

    public static function setSuccess($msg)
    {

        $_SESSION[User::SUCCESS] = $msg;

    }

    public static function getSuccess()
    {

        $msg = (isset($_SESSION[User::SUCCESS]) && $_SESSION[User::SUCCESS]) ? $_SESSION[User::SUCCESS] : '';

        User::clearSuccess();

        return $msg;

    }

    public static function clearSuccess()
    {

        $_SESSION[User::SUCCESS] = NULL;

    }

    public static function setErrorRegister($msg)
    {

        $_SESSION[User::ERROR_REGISTER] = $msg;

    }

    public static function getErrorRegister()
    {

        $msg = (isset($_SESSION[User::ERROR_REGISTER]) && $_SESSION[User::ERROR_REGISTER]) ? $_SESSION[User::ERROR_REGISTER] : '';

        User::clearErrorRegister();

        return $msg;

    }

    public static function clearErrorRegister()
    {

        $_SESSION[User::ERROR_REGISTER] = NULL;

    }

    public function checkPhoto() {

        if (file_exists(
            $_SERVER['DOCUMENT_ROOT'] . DIRECTORY_SEPARATOR .
            "res" . DIRECTORY_SEPARATOR .
            "images-profile" . DIRECTORY_SEPARATOR .
            $this->getimgprofile() . ".jpg"
        )) {
            $url = "/res/images-profile/" . $this->getimgprofile() . ".jpg";
        } else {
            $url = "/res/images-profile/standard-photo.jpg";
        }
        return $this->setimgprofile($url);

    }

    public function getValues(){

        $this->checkPhoto();

        $values = parent::getValues();

        return $values;

    }

    public function setPhoto($file)
    {
        $extension = explode('.', $file['name']);

        $extension = end($extension);

        switch ($extension) {
            case "jpg":
            case "jpeg":
                $image = imagecreatefromjpeg($file["tmp_name"]);
                break;
            case "gif":
                $image = imagecreatefromgif($file["tmp_name"]);
                break;
            case "png":
                $image = imagecreatefrompng($file["tmp_name"]);
                break;
        }

        $dist = $_SERVER['DOCUMENT_ROOT'] . DIRECTORY_SEPARATOR .
            "res" . DIRECTORY_SEPARATOR .
            "images-profile" . DIRECTORY_SEPARATOR .
            $this->getiduser() . ".jpg";

        imagejpeg($image, $dist);

        imagedestroy($image);

        $this->checkPhoto();

    }

    public function getPhotoProfile($imgprofile) {

        $sql = new Sql();

        $rows= $sql->select("SELECT * FROM tb_persons WHERE imgprofile = :imgprofile LIMIT 1", [
            ':imgprofile'=>$imgprofile
        ]);

        $this->setData($rows[0]);

    }

    public static function getPasswordHash($password) {

        return password_hash($password, PASSWORD_DEFAULT, [
            'cost'=>12
        ]);

    }

    public static function getPage($page = 1, $itemsPerPage = 10)
    {

        $start = ($page - 1) * $itemsPerPage;

        $sql = new Sql();

        $results = $sql->select("
			SELECT SQL_CALC_FOUND_ROWS *
			FROM tb_users a 
			INNER JOIN tb_persons b USING(idperson) 
			ORDER BY b.person
			LIMIT $start, $itemsPerPage;
		");

        $resultTotal = $sql->select("SELECT FOUND_ROWS() AS nrtotal;");

        return [
            'data'=>$results,
            'total'=>(int)$resultTotal[0]["nrtotal"],
            'pages'=>ceil($resultTotal[0]["nrtotal"] / $itemsPerPage)
        ];

    }

    public static function getPageSearch($search, $page = 1, $itemsPerPage = 10)
    {

        $start = ($page - 1) * $itemsPerPage;

        $sql = new Sql();

        $results = $sql->select("
			SELECT SQL_CALC_FOUND_ROWS *
			FROM tb_users a 
			INNER JOIN tb_persons b USING(idperson)
			WHERE b.person LIKE :search OR b.email = :search OR a.user LIKE :search
			ORDER BY b.person
			LIMIT $start, $itemsPerPage;
		", [
            ':search'=>'%'.$search.'%'
        ]);

        $resultTotal = $sql->select("SELECT FOUND_ROWS() AS nrtotal;");

        return [
            'data'=>$results,
            'total'=>(int)$resultTotal[0]["nrtotal"],
            'pages'=>ceil($resultTotal[0]["nrtotal"] / $itemsPerPage)
        ];

    }

    public function getUsersTotals() {

        $sql = new Sql();

        $results = $sql->select("SELECT SUM(user) AS user, COUNT(*) AS nrqtd FROM tb_users WHERE iduser;", [
            ':iduser'=>$this->getiduser()
        ]);

        if (count($results) > 0) {
            return $results[0];
        }else {
            return [];
        }

    }

}