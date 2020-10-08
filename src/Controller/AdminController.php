<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class AdminController extends AbstractController
{
    /*** SneakersBrands Table ***/
    public $sneakerBrands = [

        1 => 'Nike',
        2 => 'Jordan',
        3 => 'Adidas',
        4 => 'Yeezy',
        5 => 'Reebok',
        6 => 'Converse'

    ];

    /*** SneakersSizes Table ***/
    public $sneakerSizes = [

        1  => '5.5',
        2  => '6',
        3  => '6.5',
        4  => '7',
        5  => '7.5',
        6  => '8',
        7  => '8.5',
        8  => '9',
        9  => '9.5',
        10 => '10',
        11 => '10.5',
        12 => '11',
        13 => '11.5',
        14 => '12',
        15 => '12.5'

    ];

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
            'sneakerBrands' => $this->sneakerBrands,
            'sneakerSizes' => $this->sneakerSizes
        ]);
    }
}
