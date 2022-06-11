<?php

class Users{
    public $logErrors;
    public function allUsers(){
        return [
            [
              'login' => 'admin',
              'password' => '123'
            ],
            [
               'login' => 'root',
               'password' => '123'
            ]
        ];
    }
    public function checkAuth( $login, $password){
        foreach ($this->allUsers() as $user){
            if ($user['login'] == $login && $user['password'] == $password){
                return true;
            }
        }
        return  false;
    }
    public function getLogin(){
        $loginFromCookie = empty($_COOKIE['login']) ? '' : $_COOKIE['login'];
        $passwordFromCookie = empty($_COOKIE['password']) ? '' : $_COOKIE['password'];

        if ($this->checkAuth($loginFromCookie, $passwordFromCookie)){
            return $loginFromCookie;
        }
        return null;
    }
    public function AddCookie($data){
        $login = $data['login'];
        $password = $data['password'];

        if($this->checkAuth($login, $password)){
            setcookie('login', $login, 0, '/');
            setcookie('password', $password, 0, '/');
        }
        else{
            $this->logErrors = 'Ошибка авторизации';
        }
    }
}