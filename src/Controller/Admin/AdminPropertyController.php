<?php

namespace App\Controller\Admin;

use App\Entity\Property;
use App\Form\PropertyType;
use App\Repository\PropertyRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;

class AdminPropertyController extends AbstractController
{

    private $repository;

    private $em;


    public function __construct(PropertyRepository $repository, EntityManagerInterface $em)
    {
        $this->repository = $repository;
        $this->em = $em;
    }
    
    /**
     * @Route("/admin", name="admin_property_index")
     */

    public function index()
    {


        $properties = $this->repository->findAll();


        return $this->render("admin/property/index.html.twig", [
            "current_menu" => "admin",
            "properties" => $properties
        ]);
    }


    /**
     * @Route("/admin/create", name="admin_property_create")
     */
    public function create(Request $request)
    {

        $property = new Property();
        $form = $this->createForm(PropertyType::class, $property);
        $form->handleRequest($request);
        
        if ($form->isSubmitted() && $form->isValid()) 
        {
            $this->em->persist($property);
            $this->em->flush();

            return $this->redirectToRoute("admin_property_index");
        }

        return $this->render("admin/property/create.html.twig", [
            "form" => $form->createView()
        ]);
    }
}
