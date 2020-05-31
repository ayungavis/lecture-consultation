<?php namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class AuthFilter implements FilterInterface
{
  public function before(RequestInterface $request)
  {
    $session = session();
    if (!$session->get('id')) {
      if ($request->uri->getPath() != 'auth/login') {
        return redirect()->to('auth/login');
      }
    } else {
      if ($session->get('role_code') != 'administrator' or $session->get('role_level') < 10) {
        if ($request->uri->getPath() == 'users' 
            or $request->uri->getPath() == 'periode' 
            or $request->uri->getPath() == 'topik-konsultasi'
            or $request->uri->getPath() == 'fakultas'
            or $request->uri->getPath() == 'program-studi') {
          return redirect()->back();
        }
      }
    }
  }

  //--------------------------------------------------------------------

  public function after(RequestInterface $request, ResponseInterface $response)
  {
      // Do something here
  }
}