<?php

use Core\Controller;

class AuthController extends Controller {
    public function register() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name     = trim($_POST['name']);
            $email    = trim($_POST['email']);
            $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

            $userModel = $this->model('User');

            if ($userModel->findByEmail($email)) {
                $error = "Email already registered!";
                $this->view('auth/register', compact('error'));
                return;
            }

            $userModel->register($name, $email, $password);
            header('Location: /auth/login');
            exit;
        }

        $this->view('auth/register');
    }

    public function login() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email    = trim($_POST['email']);
            $password = $_POST['password'];

            $userModel = $this->model('User');
            $user = $userModel->findByEmail($email);

            if ($user && password_verify($password, $user['password'])) {
                $_SESSION['user'] = $user;
                header("Location: /dashboard");
                exit;
            } else {
                $error = "Invalid credentials!";
                $this->view('auth/login', compact('error'));
                return;
            }
        }

        $this->view('auth/login');
    }

    public function logout() {
        session_destroy();
        header("Location: /auth/login");
        exit;
    }
}
