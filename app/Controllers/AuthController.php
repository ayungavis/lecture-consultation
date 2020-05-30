<?php namespace App\Controllers;

use App\Models\AuthModel;
use App\Models\UserModel;

class AuthController extends BaseController
{
  protected $cookieName = 'XguEKBWP16H2wtgmzM1p';

  public function __construct()
  {
    helper('cookie');
    helper('text');
    
    $this->auth = new AuthModel();
    $this->user = new UserModel();
    $this->session = session();
  }

	public function login()
	{
    $data['title'] = 'Login';
    $cookie = $this->request->getCookie($this->cookieName);
    if ($cookie != '') {
      $user = $this->user->find($cookie);
      $user['password'] = null;  // menyembunyikan password
      $this->session->set($user);
      return redirect()->to(base_url());
    } else {
      if (!$this->validate($this->auth->getValidationRules())) {
        return view('auth/login', $data);
      } else {
        $user = $this->auth->check($this->request->getVar('email'))->getRowArray();
        if ($user) {
          if (password_verify($this->request->getVar('password'), $user['password'])) {
            if ($this->request->getVar('remember_me')) {
              set_cookie($this->cookieName, $user['id'], 3600*24*30); // expired 30 hari
            }

            $user['password'] = null;  // menyembunyikan password
            $this->session->set($user);
            return redirect()->to(base_url());
          } else {
            $this->session->setFlashdata('message', '<div class="alert alert-soft-danger d-flex" role="alert"><i class="material-icons mr-3">error</i><div class="text-body">Email atau password salah!</div></div>');
            return redirect()->to(base_url('auth/login'));
          }
        } else {
          $this->session->setFlashdata('inputs', $this->request->getVar());
          $this->session->setFlashdata('message', '<div class="alert alert-soft-danger d-flex" role="alert"><i class="material-icons mr-3">error</i><div class="text-body">Email atau password salah!</div></div>');
          return redirect()->to(base_url('auth/login'));
        }
      }
    }
	}
}
