<?php

namespace App\Controllers;

use App\Models\UserModel;

class Profile extends BaseController
{
    public function index()
    {
        $session = session();

        // require login
        if (! $session->get('isLoggedIn')) {
            return redirect()->to('/login');
        }

        // common session keys: user_id or id
        $userId = $session->get('user_id') ?? $session->get('id');
        if (! $userId) {
            return redirect()->to('/login');
        }

        $userModel = new UserModel();
        $user = $userModel->find($userId);

        if (! $user) {
            // account no longer exists -> logout and redirect
            $session->destroy();
            return redirect()->to('/login');
        }

        // send user array to view
        return view('profile', ['user' => $user]);
    }

    public function submit()
{
    $session = session();

    // require login
    if (!$session->get('isLoggedIn')) {
        return redirect()->to('/login');
    }

    $userId = $session->get('user_id') ?? $session->get('id');
    if (!$userId) {
        return redirect()->to('/login');
    }

    $post = $this->request->getPost();

    // Get current user data to check against
    $userModel = new \App\Models\UserModel(); // Use your actual model name
    $currentUser = $userModel->find($userId);

    // Flexible validation rules
    $rules = [
        'name'  => 'required|min_length[2]',
        'email' => "required|valid_email|is_unique[users.email,id,{$userId}]",
    ];

    // Only validate password if provided
    if (!empty($post['password'])) {
        $rules['password'] = 'min_length[6]';
    }

    if (!$this->validate($rules)) {
        return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
    }

    $userData = [
        'name'  => $post['name'],
        'email' => $post['email'],
    ];

    // Only update password if provided and not empty
    if (!empty($post['password'])) {
        $userData['password'] = password_hash($post['password'], PASSWORD_DEFAULT);
    }

    // Update the user
    if ($userModel->update($userId, $userData)) {
        // Update session data
        $session->set('name', $userData['name']);
        $session->set('email', $userData['email']);

        return redirect()->to('/profile')->with('success', 'Profile updated successfully.');
    } else {
        return redirect()->to('/profile')->with('error', 'Failed to update profile.');
    }
}
}