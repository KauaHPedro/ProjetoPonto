<?php
loadModel("User");

class Login extends Model {
    public function checkLogin() {
        $user = User::getOneObject(['email' => $this->email]);

        if (!$user || !password_verify($this->password, $user->password)) {
            throw new AppException("Usuário/Senha incorreto");
        }

        if($user->end_date) {
            throw new AppException("Usuário desligado da empresa");
        }

        return $user;
    }
}
