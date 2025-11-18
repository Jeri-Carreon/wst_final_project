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
        $email    = $this->request->getPost('email');
        $password = $this->request->getPost('password');

        $userModel = new \App\Models\UserModel();
        $user = $userModel->where('email', $email)->first();

        if ($user && password_verify($password, $user['password'])) {
            session()->set([
                'id'         => $user['id'],
                'name'       => $user['name'],
                'email'      => $user['email'],
                'role'       => $user['role'] ?? 'customer', // <- ensure role is set
                'isLoggedIn' => true,
            ]);
            return redirect()->to('/home');
        }

        session()->setFlashdata('error', 'Invalid credentials');
        return redirect()->back()->withInput();
    }

    public function logout() 
    {
        session()->destroy();
        return redirect()->to(base_url('/'));
    }

}
