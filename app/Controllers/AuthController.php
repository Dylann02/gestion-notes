<?php

namespace App\Controllers;

use App\Models\UserModel;

class AuthController extends BaseController
{

    public function index()
    {
        if (session()->get('isLoggedIn')) {
            return redirect()->to('/');
        }
        return view('auth/login');
    }

    public function login()
    {
        $session = session();
        $model = new UserModel();

        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');

        $user = $model->where('email', $email)->first();

        if ($user) {
            if ($user['mot_de_passe'] == $password) {

                $user_data = [
                    'id'         => $user['id'],
                    'nom'        => $user['nom'],
                    'email'      => $user['email'],
                    'role'       => $user['role'],
                    'isLoggedIn' => TRUE
                ];
                $session->set($user_data);
                return redirect()->to('/')->with('success', 'Bienvenue ' . $user['nom']);
            } else {
                return redirect()->back()->with('error', 'Mot de passe erroné.');
            }
        } else {
            return redirect()->back()->with('error', 'Email non reconnu.');
        }
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/login');
    }
}
