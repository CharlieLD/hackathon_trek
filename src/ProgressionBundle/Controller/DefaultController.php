<?php

namespace ProgressionBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('ProgressionBundle:Default:index.html.twig');
    }
}
