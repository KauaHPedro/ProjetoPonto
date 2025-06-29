<?php
loadModel("User");

class Login extends Model {
    public function checkLogin() {
        $user = User::getOneObject(['email' => $this->email]);

        if (!$user || !password_verify($this->password, $user->password)) {
            throw new Exception("Wrong username or password");
        }

        return $user;
    }
}
