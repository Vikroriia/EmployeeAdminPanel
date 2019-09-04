<?php

namespace App\Controller;

use App\Entity\Positions;
use App\Form\EmployeeType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Employees;

class MainController extends AbstractController
{
    /**
     * @Route("/", name="index")
     */
    public function index(Request $request)
    {
        $em = $this->getDoctrine()->getManager(); // Entity Manager for DB

       // $employees = $em->getRepository(Employees::class)->findAll();
      //  $positions = $em->getRepository(Positions::class)->findAll();
        
        $employee = new Employees();
        $formAddNew = $this->createForm(EmployeesType::class, $employee);
        $formAddNew->handleRequest($request);


        return $this->render('main/index.html.twig', [
            'controller_name' => 'MainController',
            //'employees' => $employees,
            //'positions' => $positions,
            'formAddNew' => $formAddNew->createView()
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

    /**
     * @Route("add_new/{employee}", name="add_new_employee")
     */
    public function addNewEmployee(Employees $employee)
    {
        $em = $this->getDoctrine()->getManager();
        $employee = new Employees();
        $formAddNew = $this->createForm(EmployeeType::class, $employee);

        $em->flush();

        return $this->redirectToRoute("index");
    }
}
