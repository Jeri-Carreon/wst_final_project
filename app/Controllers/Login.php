<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\UserModel;

class Login extends Controller
{
    public function index()
    {
        helper(['form', 'url']);
        echo view('auth/login');
    }

    public function submit()
    {
        helper(['form', 'url']);
        $userModel = new UserModel();

        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');

        // Find user by email
        $user = $userModel->where('email', $email)->first();

        if (!$user || !password_verify($password, $user['password'])) {
            echo view('auth/login', ['error' => 'Invalid email or password.']);
        } else {
            // Login success
            session()->set([
                'user_id'   => $user['id'],
                'name'  => $user['name'],
                'isLoggedIn'=> true
            ]);
            echo view('auth/login-success', ['name' => $user['name']]);
        }
    }

    public function logout() 
    {
        session()->destroy();
        return redirect()->to(base_url('/'));
    }

}
