<?php

namespace PortfolioBundle\Controller;

use PortfolioBundle\Entity\Message;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\BinaryFileResponse;
use Symfony\Component\HttpFoundation\Request;

class PortfolioMainController extends Controller {

    public function indexAction() {
        return $this->render('PortfolioBundle:Pages:home.html.twig');
    }

    public function portfolioitemAction($id) {
        if ($id == "expandit") {
            return $this->render('PortfolioBundle:Pages:expandit.html.twig');
        }
        if ($id == "ikotlin") {
            return $this->render('PortfolioBundle:Pages:ikotlin.html.twig');
        }
        if ($id == "kinectfitness") {
            return $this->render('PortfolioBundle:Pages:kinectfitness.html.twig');
        }
        if ($id == "ikotlin") {
            return $this->render('PortfolioBundle:Pages:ikotlin.html.twig');
        }
        if ($id == "avalanche") {
            return $this->render('PortfolioBundle:Pages:avalanche.html.twig');
        }
        if ($id == "goodreadslog") {
            return $this->render('PortfolioBundle:Pages:goodreadslog.html.twig');
        }
        if ($id == "easyfragments") {
            return $this->render('PortfolioBundle:Pages:easyfragments.html.twig');
        }
        if ($id == "pragmatictheories") {
            return $this->render('PortfolioBundle:Pages:pragmatictheories.html.twig');
        }
        if ($id == "aquitembico") {
            return $this->render('PortfolioBundle:Pages:aquitembico.html.twig');
        }
    }

    public function downloadAction() {

        $publicResourcesFolderPath = $this->get('kernel')->getRootDir() . '/Resources/assets/';
        $filename = "Amal_HICHRI_Software_development_engineer.pdf";

        $response = new BinaryFileResponse($publicResourcesFolderPath . $filename);
        return $response;
    }

    public function contactAction($data) {

        echo $data;
         $mailLogger = new \Swift_Plugins_Loggers_ArrayLogger();
          $this->get('mailer')->registerPlugin(new \Swift_Plugins_LoggerPlugin($mailLogger));
          $toEmail = 'amal.hichri@esprit.tn';

          $message = \Swift_Message::newInstance(null)
          ->setSubject('Hello Email')
          ->setFrom('amal.hichri@esprit.tn')
          ->setTo($toEmail)
          ->setBody($data["message"] . "<br>ContactMail :" . $data["email"]);
          if ($this->get('mailer')->send($message)) {
          echo '[SWIFTMAILER] sent email to: ' . $mailLogger->dump();
          } else {
          echo '[SWIFTMAILER] not sending email: ' . $mailLogger->dump();
          }
          return $this->get('mailer')->send($message); 
    }

}
