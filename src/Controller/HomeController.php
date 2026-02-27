<?php

namespace App\Controller;
use App\Repository\ProjectRepository;
use App\Repository\ParamsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use App\Repository\SkillsRepository;

final class HomeController extends AbstractController
{
    #[Route('/', name: 'app_home', methods: ['GET'])]
    public function index(ProjectRepository $projectRepository,ParamsRepository $paramsRepository, SkillsRepository $skillsRepository): Response
    {

        $languages = $skillsRepository->findBy(['type' => 'language'],['ordered' => 'ASC']);
        $frameworks = $skillsRepository->findBy(['type' => 'frameworks'],['ordered' => 'ASC']);
        $softSkills = $skillsRepository->findBy(['type' => 'softSkills'],['ordered' => 'ASC']);

        return $this->render('home/index.html.twig', [
            'projects' => $projectRepository->findBy([], ['date' => 'DESC']),
            'languages' => $languages,
            'frameworks' => $frameworks,
            'softSkills' => $softSkills
        ]);
    }
}
