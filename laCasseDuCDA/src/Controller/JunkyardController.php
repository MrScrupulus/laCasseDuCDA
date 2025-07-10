<?php

namespace App\Controller;

use App\Entity\Model;
use App\Repository\ModelRepository;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\Tools\Pagination\Paginator;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\HttpFoundation\Request;

final class JunkyardController extends AbstractController
{
    #[Route('/junkyard', name: 'app_junkyard')]
    public function index(EntityManagerInterface $em, PaginatorInterface $paginator, Request $request): Response
    {
        $model = $em->getRepository(Model::class)->findAll();
        $model = $paginator->paginate($model, $request->query->getInt('page', 1), 5);
            
        return $this->render('junkyard/junkyard.html.twig', [
            'models' => $model,
        ]);
    }
}