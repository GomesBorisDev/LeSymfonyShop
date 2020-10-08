<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

use Respect\Validation\Validator as v;


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

        if(!empty($_POST)) {

            $errors = [];

            $safe = array_map('trim', array_map('strip_tags', $_POST));

            $errors = [
                (!v::notEmpty()->validate($safe['sku'])) ? 'SKU empty' : null,
                (!v::length(1, 255)->validate($safe['sku'])) ? 'SKU must be between 1 and 255 characters long' : null,
                (!v::notEmpty()->in(array_keys($this->sneakerBrands))->validate($safe['brand'])) ? 'Select a brand' : null,
                (!v::notEmpty()->validate($safe['name'])) ? 'Name empty' : null,
                (!v::length(1, 255)->validate($safe['name'])) ? 'Name must be between 1 and 255 characters long' : null,
                (!v::notEmpty()->validate($safe['sex'])) ? 'Select sex' : null,
                (!v::notEmpty()->validate($safe['picture1'])) ? 'You must upload a image in Pic 1 field' : null,
                (!v::notEmpty()->validate($safe['picture2'])) ? 'You must upload a image in Pic 2 field' : null,
                (!v::notEmpty()->validate($safe['picture3'])) ? 'You must upload a image in Pic 3 field' : null,

            ];

            if (count($errors) == 0) {

                $success = true;

            } else {
                $errorsForm = implode('<br>', $errors);
            }

        }

        return $this->render('admin/addSnkr.html.twig', [
            'sneakerBrands' => $this->sneakerBrands,
            'sneakerSizes' => $this->sneakerSizes,
            'errors'     => $errorsForm ?? [],
            'success'    => $success ?? false
        ]);
    }
}
