<?php

namespace App\Controllers;

use App\Models\UserModel;

class RegisterForm extends BaseController
{
    protected $helpers = ['form'];

    private const ADMIN_CODE = 'Admin123'; // admin registration code

    public function index()
    {
        return view('auth/register');
    }

    public function submit()
    {
        $post = $this->request->getPost();

        $rules = [
            'name'     => 'required',
            'email'    => 'required|valid_email|is_unique[users.email]',
            'password' => 'required|min_length[6]',
            'confirm'  => 'matches[password]',
            'role'     => 'required|in_list[admin,customer]',
        ];

        if (! $this->validate($rules)) {
            return view('auth/register', ['validation' => $this->validator]);
        }

        // Server-side admin code check (authoritative)
        if ($post['role'] === 'admin') {
            $adminCode = $this->request->getPost('admin_code') ?? '';
            if ($adminCode !== self::ADMIN_CODE) {
                session()->setFlashdata('error', 'Invalid admin code.');
                return redirect()->back()->withInput();
            }
        }

        $userModel = new UserModel();

        $userData = [
            'name'       => $post['name'],
            'email'      => $post['email'],
            'password'   => password_hash($post['password'], PASSWORD_DEFAULT),
            'role'       => $post['role'],
            'created_at' => date('Y-m-d H:i:s'),
        ];

        $userModel->save($userData);
        $id = $userModel->getInsertID();

        // set session
        session()->set([
            'id'         => $id,
            'name'       => $userData['name'],
            'email'      => $userData['email'],
            'role'       => $userData['role'],
            'isLoggedIn' => true,
        ]);

        return redirect()->to('/home');
    }
}
