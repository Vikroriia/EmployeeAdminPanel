<?php

namespace App\Controller;

use App\Entity\Positions;
use http\Env\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Employees;
use App\Repository\EmployeesRepository;

class MainController extends AbstractController
{
    /**
     * @Route("/", name="index")
     */
    public function index()
    {
        $em = $this->getDoctrine()->getManager(); // Entity Manager for DB

        $employees = $em->getRepository(Employees::class)->findAll();
        $positions = $em->getRepository(Positions::class)->findAll();

        return $this->render('main/index.html.twig', [
            'controller_name' => 'MainController',
            'employees' => $employees,
            'positions' => $positions
        ]);
    }

    /**
     * @Route("remove/{employee}", name="remove_employee")
     */
    public function removeEmployee(Employees $employee)
    {
        $em = $this->getDoctrine()->getManager();
        $em->remove($employee);
        $em->flush();

        return $this->redirectToRoute("index");
    }
}
