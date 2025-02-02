<?php

declare(strict_type=1);

namespace App\Controllers;

use App\Core\Controller;
use App\Models\User;

class AuthController extends Controller {
    private User $userModel;

    public function __construct() {
        $this->userModel = new User();
    }

    public function loginForm(): void {
        $this->view('auth/login');
    }

    public function registerForm(): void {
        $this->view('auth/register');
    }

    public function register(): void {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            $this->redirect('/register');
            exit;
        }

        $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
        $password = $_POST['password'] ?? '';


        if (!$email || strlen($password) < 6) {
            $this->view('auth/register', ['error' => 'Invalid input']);
            return;
        }

        if ($this->userModel->create($email, $password)) {
            $this->redirect('/login');
        } else {
            $this->view('auth/register', ['error' => 'Registration failed']);
        }
    }

    public function login(): void {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            $this->redirect('/login');
            return;
        }

        $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
        $password = $_POST['password'];

        $user = $this->userModel->findByEmail($email);

        if ($user && password_verify($password, $user['password'])) {
            $_SESSION['user_id'] = $user['id'];
            $this->redirect('/home');
        } else {
            $this->view('auth/login', ['error' => 'Invalid credentials']);
        }
    }
}