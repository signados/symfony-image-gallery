<?php
namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;

use Symfony\Component\HttpFoundation\JsonResponse;

use App\Entity\Image;
use App\Repository\ImageRepository;

use App\Form\Type\ImageType;



class IndexController extends AbstractController
{
    public function index(ManagerRegistry $doctrine, Request $request)
    {

        $entityManager = $doctrine->getManager();

        $images = $entityManager->getRepository(Image::class)->findAll();

        return $this->render('index.html.twig', [
            'images' => $images,
        ]);

    }
}