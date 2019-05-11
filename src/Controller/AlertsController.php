<?php

namespace App\Controller;

use App\Entity\Alerts;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class AlertsController extends AbstractController
{
    /**
     * @Route("/alerts", name="alerts")
     */
    public function index()
    {
        return $this->render('alerts/index.html.twig', [
            'controller_name' => 'AlertsController',
        ]);
    }

}
