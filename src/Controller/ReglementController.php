<?php

namespace App\Controller;

use App\Entity\Reglement;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
//use Symfony\Component\Serializer\Encoder\JsonEncoder;
//use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;



class ReglementController extends AbstractController
{


    /**
     * @Route("/api/reglement/index", name="api_reglement_list",methods={"GET"})
     */
    public function apiindexAction()
    {
        //$encoders = [new JsonEncoder()];
        //$normalizers = [new ObjectNormalizer()];

        //$serializer = new Serializer($normalizers, $encoders);
        $repository = $this->getDoctrine()->getRepository(Reglement::class);
        $reglements = $repository->findAll();
        //$jsonContent = $serializer->serialize($reglements, 'json');
        return $this->json($reglements);
    }
    /**
     * @Route("/reglement/index", name="reglement_list")
     */
    public function indexAction()
    {
        $repository = $this->getDoctrine()->getRepository(Reglement::class);
        $reglements = $repository->findAll();
        return $this->render('reglement/index.html.twig', [
            'reglements' => $reglements
        ]);
    }

    /**
     * @Route("/reglement/create", name="reglement_create")
     */
    public function createAction(Request $request)
    {
        $entityManager = $this->getDoctrine()->getManager();
        $reglement = new Reglement();
        $form = $this->createFormBuilder($reglement)
            ->add('groupResponsable',TextType::class,['attr' => ['class' => 'form-control' ,'style' => 'margin-bottom:15px']])
            ->add('responsable', TextType::class,['attr' => ['class'=> 'form-control' ,'style' => 'margin-bottom:15px']])
            ->add('emailAddress', TextType::class,['attr' => ['class'=> 'form-control' ,'style' => 'margin-bottom:15px']])
            ->add('sipNumber', TextType::class,['attr' => ['class'=> 'form-control' ,'style' => 'margin-bottom:15px']])
            ->add('save', SubmitType::class,['label'=> 'Create Reglement','attr' => ['class'=> 'btn btn-primary' ,'style' => 'margin-bottom:15px']])
            ->getForm();
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){

            //get Data from submit
            $groupResponsable = $form['groupResponsable']->getData();
            $responsable = $form['responsable']->getData();
            $emailAddress = $form['emailAddress']->getData();
            $sipNumber = $form['sipNumber']->getData();
            $now = new\DateTime('now');

            $reglement->setGroupResponsable($groupResponsable);
            $reglement->setResponsable($responsable);
            $reglement->setEmailAddress($emailAddress);
            $reglement->setSipNumber($sipNumber);
            $reglement->setCreateDate($now);
            //saving data

            $em = $this ->getDoctrine()->getManager();
            $em->persist($reglement);
            $em->flush();

            $this->addFlash(
                'notice',
                'reglement Created'


            );
            return $this->redirectToRoute('reglement_list');

        }
        return $this->render('reglement/create.html.twig',array('form' =>$form->createView()
        ));
    }
    /**
     * @Route("/reglement/delete/{id}", name="reglement_delete")
     */
    public function deleteAction($id)
    {
        // replace this example code with whatever you need
        $em = $this ->getDoctrine()->getManager();
        $reglement= $em ->getRepository(Reglement::class)->find($id);

        $em->remove($reglement);
        $em->flush();

        $this->addFlash(
            'notice',
            'reglement Deleted'


        );
        return $this->redirectToRoute('reglement_list');
    }
    /**
     * @Route("/reglement/details/{id}", name="reglement_details")
     */
    public function detailsAction($id)
    {
        // replace this example code with whatever you need
        $reglement = $this ->getDoctrine()->getRepository(Reglement::class)->find($id);
        return $this->render('reglement/details.html.twig',[
            'reglement' => $reglement
        ]);
    }
    /**
     * @Route("/reglement/edit/{id}", name="reglement_edit")
     */
    public function editAction($id, Request $request)
    {
        // replace this example code with whatever you need
        $reglement = $this ->getDoctrine()->getRepository(Reglement::class)->find($id);
        $last=$reglement->getLastUpdate();
        $reglement->setGroupResponsable($reglement->getGroupResponsable());
        $reglement->setResponsable($reglement->getResponsable());
        $reglement->setEmailAddress($reglement->getEmailAddress());
        $reglement->setSipNumber($reglement->getSipNumber());
        $reglement->setCreateDate($reglement->getCreateDate());
        $reglement->setLastUpdate($reglement->getLastUpdate());

        $form = $this ->createFormBuilder($reglement)



            ->add('groupResponsable',TextType::class,['attr' => ['class' => 'form-control' ,'style' => 'margin-bottom:15px']])
            ->add('responsable', TextType::class,['attr' => ['class'=> 'form-control' ,'style' => 'margin-bottom:15px']])
            ->add('emailAddress', TextType::class,['attr' => ['class'=> 'form-control' ,'style' => 'margin-bottom:15px']])
            ->add('sipNumber', TextType::class,['attr' => ['class'=> 'form-control' ,'style' => 'margin-bottom:15px']])
            ->add('save', SubmitType::class,['label'=> 'Edit Reglement','attr' => ['class'=> 'btn btn-primary' ,'style' => 'margin-bottom:15px']])
            ->getForm();
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){

            //get Data from submit
            $groupResponsable = $form['groupResponsable']->getData();
            $responsable = $form['responsable']->getData();
            $emailAddress = $form['emailAddress']->getData();
            $sipNumber = $form['sipNumber']->getData();




            $em = $this ->getDoctrine()->getManager();
            $reglement= $em ->getRepository(Reglement::class)->find($id);
            $now = new\DateTime('now');
            $reglement->setGroupResponsable($groupResponsable);
            $reglement->setResponsable($responsable);
            $reglement->setEmailAddress($emailAddress);
            $reglement->setSipNumber($sipNumber);
            $reglement->setCreateDate($reglement->getCreateDate());
            $reglement->setLastUpdate($now);
            //saving data



            $em->flush();

            $this->addFlash(
                'notice',
                'Reglement Updated'


            );
            return $this->redirectToRoute('reglement_list');

        }
        return $this->render('reglement/edit.html.twig',[
            'reglement' => $reglement,
            'form' =>$form->createView()
        ]);
    }
}


