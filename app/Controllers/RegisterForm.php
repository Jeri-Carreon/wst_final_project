<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\UserModel;

class RegisterForm extends Controller
{
    public function index()
    {
        helper(['form', 'url']);
        echo view('auth/register');
    }

    public function submit()
    {
        helper(['form', 'url']);
        $userModel = new UserModel();

        $validationRules = [
            'name' => 'required|min_length[3]|max_length[20]',
            'email'    => 'required|valid_email|is_unique[users.email]',
            'password' => 'required|min_length[6]',
            'confirm'  => 'required|matches[password]'
        ];

        if (!$this->validate($validationRules)) {
            echo view('auth/register', ['validation' => $this->validator]);
        } else {
            // Prepare sanitized data
            $data = [
                'name' => $this->request->getPost('name'),
                'email'    => $this->request->getPost('email'),
                'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT)
            ];

            // Insert data into database
            $userModel->insert($data);

            // Pass name to success page
            echo view('auth/register-success', ['name' => $data['name']]);
        }
    }
}
