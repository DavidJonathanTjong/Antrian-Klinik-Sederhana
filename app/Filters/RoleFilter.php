<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class RoleFilter implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {

        // $uri = $request->getUri()->getPath();
        // $allowedRoutes = [
        //     'get-lokasi',
        //     'get-poli',
        //     'get-dokter',
        // ];

        // if (in_array($uri, $allowedRoutes)) {
        //     return;
        // }

        $session = session();
        $role = $session->get('role'); 
        if ($arguments && !in_array($role, $arguments)) {
            return redirect()->to('sirs/dashboard')->with('msg', 'Anda tidak memiliki akses ke halaman yang anda tuju');
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Do something here
    }
}