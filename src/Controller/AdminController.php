<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

use Respect\Validation\Validator as v;
use Intervention\Image\ImageManager as Image;

use App\Entity\Sneakers;
use App\Entity\SneakersStock;

use Symfony\Component\Validator\Constraints\DateTime;


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
     * @Route("/admin/snkrs", name="adminSnkrs")
     */
    public function adminSnkrs()
    {
        return $this->render('admin/adminSnkrs.html.twig', [
            
        ]);
    }

    /**
     * @Route("/admin/addSnkr", name="adminAddSnkr")
     */
    public function addSnkr()
    {
        $errors = [];
        $maxSizeFile = 3 * 1000 * 1000;
        $allowMimes = ['image/jpg', 'image/jpeg', 'image/png', 'image/gif'];
        $uploadDir = 'img/sneakers/';

        if (!empty($_POST)) {

            print_r($_POST);
            echo ('</br>');
            print_r($_FILES);

            $safe = array_map('trim', array_map('strip_tags', $_POST));

            $errors = [
                (!v::notEmpty()->validate($safe['sku'])) ? 'SKU empty' : null,
                (!v::length(1, 255)->validate($safe['sku'])) ? 'SKU must be between 1 and 255 characters long' : null,
                (!v::notEmpty()->in(array_keys($this->sneakerBrands))->validate($safe['brand'])) ? 'Select a brand' : null,
                (!v::notEmpty()->validate($safe['name'])) ? 'Name empty' : null,
                (!v::length(1, 255)->validate($safe['name'])) ? 'Name must be between 1 and 255 characters long' : null,
                (!v::notEmpty()->validate($safe['cwsurname'])) ? 'CW/Surname empty' : null,
                (!v::length(1, 255)->validate($safe['cwsurname'])) ? 'CW/Surname must be between 1 and 255 characters long' : null,
                (!v::notEmpty()->validate($safe['sex'])) ? 'Select sex' : null,
            ];

            if ($_FILES['picture1']['error'] == 4) {

                $errors[] = 'pic1 empty';
                
            } elseif (!empty($_FILES['picture1'])) {

                if ($_FILES['picture1']['error'] == UPLOAD_ERR_OK) {

                    $image = new Image;

                    $img1 = $image->make($_FILES['picture1']['tmp_name']);

                    if ($img1->filesize() > $maxSizeFile) {

                        $errors[] = 'Pic 1 must be 3 Mo max';

                    } elseif (!v::in($allowMimes)->validate($img1->mime())) {

                        $errors[] = 'Pic 1 mime type not valid';

                    }

                } elseif ($_FILES['picture1']['error'] == UPLOAD_ERR_NO_FILE) {

                    $errors[] = 'Pic 1 Upload fail ';

                } else {

                    $errors[] = 'PIC 1 ERROR';

                }
            }

            if ($_FILES['picture2']['error'] == 4) {

                $errors[] = 'pic2 empty';
                
            } elseif (!empty($_FILES['picture2'])) {

                if ($_FILES['picture2']['error'] == UPLOAD_ERR_OK) {

                    $image = new Image;

                    $img2 = $image->make($_FILES['picture2']['tmp_name']);

                    if ($img2->filesize() > $maxSizeFile) {

                        $errors[] = 'Pic 2 must be 3 Mo max';

                    } elseif (!v::in($allowMimes)->validate($img2->mime())) {

                        $errors[] = 'Pic 2 mime type not valid';

                    }

                } elseif ($_FILES['picture2']['error'] == UPLOAD_ERR_NO_FILE) {

                    $errors[] = 'Pic 2 Upload fail ';

                } else {

                    $errors[] = 'PIC 2 ERROR';

                }
            }

            if ($_FILES['picture3']['error'] == 4) {

                $errors[] = 'pic3 empty';
                
            } elseif (!empty($_FILES['picture3'])) {

                if ($_FILES['picture3']['error'] == UPLOAD_ERR_OK) {

                    $image = new Image;

                    $img3 = $image->make($_FILES['picture3']['tmp_name']);

                    if ($img3->filesize() > $maxSizeFile) {

                        $errors[] = 'Pic 3 must be 3 Mo max';

                    } elseif (!v::in($allowMimes)->validate($img3->mime())) {

                        $errors[] = 'Pic 3 mime type not valid';

                    }

                } elseif ($_FILES['picture3']['error'] == UPLOAD_ERR_NO_FILE) {

                    $errors[] = 'Pic 3 Upload fail ';

                } else {

                    $error[] = 'PIC 3 ERROR';

                }
            }

            // 
            $errors = array_filter($errors);

            if (count($errors) == 0) {

                $path1 = pathinfo($_FILES['picture1']['name']);
                $path2 = pathinfo($_FILES['picture2']['name']);
                $path3 = pathinfo($_FILES['picture3']['name']);

                $filename1 = $safe["sku"];
                $filename2 = $safe["sku"];
                $filename3 = $safe["sku"];

                $filename1 = $filename1 . '_1' . '.' . $path1['extension'];
                $filename2 = $filename2 . '_2' . '.' . $path2['extension'];
                $filename3 = $filename3 . '_3' . '.' . $path3['extension'];

                $img1->save($uploadDir . $filename1);
                $img2->save($uploadDir . $filename2);
                $img3->save($uploadDir . $filename3);

                $entityManager = $this->getDoctrine()->getManager();
                $product = new Sneakers();
                $product->setSku($safe['sku']);
                $product->setBrand($safe['brand']);
                $product->setName($safe['name']);
                $product->setCwsurname($safe['cwsurname']);
                $product->setSex($safe['sex']);
                $product->setPicture1($uploadDir . $filename1);
                $product->setPicture2($uploadDir . $filename2);
                $product->setPicture3($uploadDir . $filename3);
                $product->setAddedAt(new \DateTime());

                $entityManager->persist($product);

                $entityManager->flush();

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
