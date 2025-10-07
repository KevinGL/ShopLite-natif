<?php

class SQLManagement
{
    private $pdo;
    
    public function __construct()
    {
        $this->pdo = new PDO("mysql:dbname=shop_lite_native;port=3306;host=localhost", "root", "");
    }

    public function auth()
    {
        $query = "SELECT * FROM users u WHERE u.username = :username LIMIT 1";

        $th = $this->pdo->prepare($query);
        $password = $_POST["password"];
        $username = $_POST["username"];

        $th->execute([
            "username" => $username
        ]);

        $res = $th->fetch(PDO::FETCH_ASSOC);

        if(!$res)
        {
            $_SESSION["FLASH_MESSAGE"] = "Utilisateur introuvable";
            return;
        }

        if(password_verify($password, $res["password"]))
        {
            $_SESSION["user"] =
            [
                "username" => $res["username"],
                "email" => $res["email"],
                "address" => $res["address"],
                "zipCode" => $res["zipCode"],
                "phoneNumber" => $res["phoneNumber"]
            ];

            return true;
        }

        else
        {
            $_SESSION["FLASH_MESSAGE"] = "Mot de passe erroné";
            
            return false;
        }
    }

    public function registry()
    {
        $username = $_POST["username"];
        $email = $_POST["email"];
        $address = $_POST["address"];
        $zipCode = $_POST["zipCode"];
        $phoneNumber = $_POST["phoneNumber"];
        $password = password_hash($_POST["plainPassword"], PASSWORD_BCRYPT);

        $query = "SELECT * FROM users u WHERE u.username = :username LIMIT 1";
        $th = $this->pdo->prepare($query);

        $th->execute([
            "username" => $username
        ]);

        $res = $th->fetch(PDO::FETCH_ASSOC);
        
        if($res)
        {
            $_SESSION["FLASH_MESSAGE"] = "Cet utilisateur existe déjà";
            return;
        }

        $query = "INSERT INTO users (username, email, address, zipCode, phoneNumber, password) VALUES (:username, :email, :address, :zipCode, :phoneNumber, :password)";
        
        $th = $this->pdo->prepare($query);

        $res = $th->execute([
            "username" => $username,
            "email" => $email,
            "address" => $address,
            "zipCode" => $zipCode,
            "phoneNumber" => $phoneNumber,
            "password" => $password
        ]);

        if($res)
        {
            $_SESSION["user"] =
            [
                "username" => $username,
                "email" => $email,
                "address" => $address,
                "zipCode" => $zipCode,
                "phoneNumber" => $phoneNumber
            ];
        }
    }
}