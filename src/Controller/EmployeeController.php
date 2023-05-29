<?php

namespace App\Controller;

use App\Entity\Employee;
use App\Form\EmployeeModalType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class EmployeeController extends AbstractController
{
    #[Route('/employee', name: 'app_employee')]
    public function index(EntityManagerInterface $entityManager): Response
    {
        $employees = $entityManager->getRepository(Employee::class)->findAll();

        $newEmployee = new Employee();
        $newForm = $this->createForm(EmployeeModalType::class, $newEmployee);

        return $this->render('employee/index.html.twig', [
            'employees' => $employees,
            'newForm' => $newForm,
        ]);
    }

    #[Route('/employee/add', name: 'app_employee_add', methods: ['POST'])]
    public function addEmployee(Request $request, EntityManagerInterface $entityManager): Response
    {
        $employee = new Employee();

        $form = $this->createForm(EmployeeModalType::class, $employee);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $employee = $form->getData();
            $entityManager->persist($employee);
            $entityManager->flush();
            
        }
        return $this->redirectToRoute('app_employee');
    }
}
