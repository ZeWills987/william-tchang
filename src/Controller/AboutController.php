<?php

namespace App\Controller;
use App\Repository\ProjectRepository;
use App\Repository\ParamsRepository;
use App\Repository\SkillsRepository;
use App\Repository\ExperienceRepository;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\HttpFoundation\Request;

final class AboutController extends AbstractController
{
    #[Route('/about', name: 'app_about')]
    public function index(ProjectRepository $projectRepository,ParamsRepository $paramsRepository, SkillsRepository $skillsRepository, ExperienceRepository $experienceRepository): Response
    {

        $experiences = $experienceRepository->findBy([], ['date_start' => 'DESC']);
        $languages = $skillsRepository->findBy(['type' => 'language'],['ordered' => 'ASC']);
        $frameworks = $skillsRepository->findBy(['type' => 'frameworks'],['ordered' => 'ASC']);
        $softSkills = $skillsRepository->findBy(['type' => 'softSkills'],['ordered' => 'ASC']);

        return $this->render('about/index.html.twig', [
            'experiences' => $experiences,
            'projects' => $projectRepository->findBy([], ['date' => 'DESC']),
            'languages' => $languages,
            'frameworks' => $frameworks,
            'softSkills' => $softSkills
        ]);
    }
}
