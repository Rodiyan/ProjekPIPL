<?php

namespace App\Controllers;

class Login extends BaseController
{
    public function index()
    {
        if (session()->get('isLoggedIn')) {
            return redirect()->to('/admin');
        }
        return view('auth/login_page');
    }

    public function process()
    {
        $session = session();
        $username = $this->request->getVar('username');
        $password = $this->request->getVar('password');

        $db = \Config\Database::connect();
        $user = $db->table('admin_users')->where('username', $username)->get()->getRowArray();

        if ($user && password_verify($password, $user['password'])) {
            $session->set([
                'id' => $user['id'],
                'username' => $user['username'],
                'isLoggedIn' => TRUE
            ]);
            return redirect()->to('/admin');
        }

        $session->setFlashdata('msg', 'Username atau Password Salah');
        return redirect()->to('/login');
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/login'); // Redirect ke Login Page
    }
}