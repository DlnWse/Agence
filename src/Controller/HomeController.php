<?php 

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
/**
 * @route ("/", name="home")
 */
    public function home(): Response
    {
        return $this->render("home/home.html.twig", [
             "current_menu" => "home" ]);
    }

  
/**
 * @route ("/index", name="index")
 */
    public function index(): Response
    {
        return $this->render("home/index.html.twig",[ 
            "current_menu" => "index"]);
    }



}