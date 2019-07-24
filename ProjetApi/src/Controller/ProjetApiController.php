<?php

namespace App\Controller;

use ApiPlatform\Core\Annotation\ApiResource;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class ProjetApiController extends AbstractController
{
    /**
     * @Route("/register", name="api_register",methods={"POST"})
     * @ApiResource
     */
    public function register()
    {
        return $this->json(['result' => true]);
    }

}
