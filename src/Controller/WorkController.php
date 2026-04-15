<?php

namespace App\Controller;
use App\Repository\ProjectRepository;
use App\Repository\ParamsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use App\Repository\SkillsRepository;

final class WorkController extends AbstractController
{
    #[Route('/work', name: 'app_work')]
    public function index(ProjectRepository $projectRepository,ParamsRepository $paramsRepository, SkillsRepository $skillsRepository): Response
    {

        $languages = $skillsRepository->findBy(['type' => 'language'],['ordered' => 'ASC']);
        $frameworks = $skillsRepository->findBy(['type' => 'frameworks'],['ordered' => 'ASC']);
        $softSkills = $skillsRepository->findBy(['type' => 'softSkills'],['ordered' => 'ASC']);

        $projects = $projectRepository->findBy([], ['date' => 'DESC']);

        return $this->render('work/index.html.twig', [
            'projects' => $projects,
            'languages' => $languages,
            'frameworks' => $frameworks,
            'softSkills' => $softSkills
        ]);
    }

    #[Route('/work/{title}', name: 'single_work')]
    public function single($title, ProjectRepository $projectRepository,ParamsRepository $paramsRepository, SkillsRepository $skillsRepository): Response
    {

        return $this->render('work/single.html.twig', [
            'project' => $projectRepository->findBy(['title' => $title])[0] ?? null,
        ]);
    }
}
