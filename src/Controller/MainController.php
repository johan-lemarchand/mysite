<?php

namespace App\Controller;

use Swift_Mailer;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Routing\Annotation\Route;

class MainController extends AbstractController
{
    /**
     * @Route("/", name="home", methods={"GET", "POST"})
     * @param Request $request
     * @param Swift_Mailer $mailer
     * @return Response
     */
    public function index(Request $request, Swift_Mailer $mailer)
    {
        $dataFonction = $request->request->get("fonction");
        $dataName = $request->request->get("nom");
        $dataEmail = $request->request->get("email");
        $dataPhone = $request->request->get("phone");
        $dataDescription = $request->request->get("description");
        $dataTitle = $request->request->get("title");


        $message = (new \Swift_Message('Formulaire de contact'))
            ->setFrom ($dataEmail)
            ->setTo('johan27000@gmail.com' )
            ->setBody($dataFonction . '<br>' . $dataEmail . '<br>' . $dataName . '<br>' . $dataPhone . '<br>' . $dataTitle. '<br>' . $dataDescription
            );


        $mailer->send($message);

        return $this->render('home/index.html.twig', [
            'controller_name' => 'MainController',
        ]);
    }

    /**
     * @Route("/project", name="project")
     * @return Response
     */
    public function project()
    {
        return $this->render('project/project.html.twig', [
            'controller_name' => 'MainController',
        ]);
    }
    /**
     * @Route("/propos", name="propos")
     * @return Response
     */
    public function propos()
    {
        return $this->render('propos/propos.html.twig', [
            'controller_name' => 'MainController',
        ]);
    }

    /**
     * @Route("/service", name="service")
     * @return Response
     */
    public function service()
    {
        return $this->render('service/service.html.twig', [
            'controller_name' => 'MainController',
        ]);
    }
}
