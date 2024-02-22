<?php

class Login
{
    private $email;
    private $password;

    public function __construct($email = null)
    {
        if (!empty($email)) {
            $this->setEmail($email);
        }
    }

    public function setEmail($newEmail)
    {
        if (strlen($newEmail) < 4) {
            throw new Exception("L'email est trop court (min 4 caractères).");
        }
        $this->email = $newEmail;
        return $this;
    }

    public function getEmail()
    {
        return $this->email;
        echo $this->email;
    }

    public function setPassword($password)
    {
        if (strlen($password) < 5) {
            throw new Exception('Contenu trop court. Min 4 cars.');
        }
        $this->password = $password;
        return $this;
    }

    public function getPassword()
    {
        return $this->password;
        echo $this->password;
    }
}