<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Employees;

class MainController extends AbstractController
{
    /**
     * @Route("/", name="index")
     */
    public function index()
    {
        $em = $this->getDoctrine()->getManager(); // Entity Manager for DB

        $employees = $em->getRepository(Employees::class)->findAll();

        return $this->render('main/index.html.twig', [
            'controller_name' => 'MainController',
            'employees' => $employees
        ]);
    }
}
