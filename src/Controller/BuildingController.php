<?php

namespace App\Controller;

use App\Repository\BuildingRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class BuildingController extends AbstractController
{
    #[Route('/buildings', name: 'building')]
    public function index(Request $request, BuildingRepository $repository): Response
    {
        $buildings = $repository->findAll();
        return $this->render('building/index.html.twig', [
            'buildings' => $buildings,


        ]);
    }
    #[Route('/buildings/{name}/{id}', name: 'building.show')]
    public function show(Request $request, string $name,int $id, BuildingRepository $repository): Response
    {
        $building = $repository->find($id);
        return $this->render('building/show.html.twig', [
            'building' => $building
        ]);
    }

}
