<?php
// src/Controller/LuckyController.php
namespace App\Controller;

use Psr\Container\ContainerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;

class LuckyController extends AbstractController
{
	/**
	* @Route("/lucky/number")
	*/
    public function number()
    {
        $number = random_int(0, 100);

        return $this->render('/lucky/number.html.twig',
            ['number' => $number]);
    }
    /**
     * @Route("/", name="homepage")
     */
    public function HomePage()
    {
        return $this->render('/base.html.twig');

    }
}