<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class AuthFilter implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        $session = session();

        //cek user login
        if (!$session->get('isLoggedIn')) {
            return redirect()->to(base_url('/login'));
        }

        //cek role
        if ($arguments && !in_array($session->get('role'), $arguments)) {
            session()->setFlashdata('error', 'Kamu tidak memiliki akses ke halaman ini!!');
            return redirect()->to(base_url('/login'));
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // ...
    }
}
