<?php

namespace App\Controller;

use App\Entity\Property;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class PropertyController extends AbstractController
{

    /**
     * @Route("/buy", name="property_index")
     */
    public function index()
    {

        $repository = $this->getDoctrine()->getRepository(Property::class);
        $properties =  $repository->findAllVisible();


        return $this->render("home/property/index.html.twig", [
            "current_menu" => "buy",
            "properties" => $properties
        ]);
    }
}
