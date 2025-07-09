<?php
class Login extends Model {

    public function validate() {
        $errors = [];

        if(!$this->email) {
            $errors["email"] = "Preencha o campo E-mail";
        }

        if(!$this->password) {
            $errors["password"] = "Preencha o campo Senha";
        }

        if(count($errors) > 0) {
            throw new ValidationException($errors);
        }
    }
    public function checkLogin() {

        $this->validate();

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
