<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class AdminController extends AbstractController
{
    /**
     * @Route("/admin", name="admin")
     */
    public function index()
    {
        return $this->render('admin/index.html.twig', [
            'controller_name' => 'AdminController',
        ]);
    }

    /**
     * @Route("/adminSnkrs", name="adminSnkrs")
     */
    public function adminSnkrs()
    {
        return $this->render('admin/adminSnkrs.html.twig', [
            
        ]);
    }

    /**
     * @Route("/addSnkr", name="addSnkr")
     */
    public function addSnkr()
    {
        return $this->render('admin/addSnkr.html.twig', [
            
        ]);
    }
}
