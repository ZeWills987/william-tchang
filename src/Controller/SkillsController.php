<?php

namespace App\Controller;

use App\Entity\Skills;
use App\Form\SkillsType;
use App\Repository\SkillsRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/admin/skills')]
final class SkillsController extends AbstractController
{
    #[Route(name: 'app_skills_index', methods: ['GET'])]
    public function index(SkillsRepository $skillsRepository): Response
    {
        return $this->render('admin/skills/index.html.twig', [
            'skills' => $skillsRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_skills_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $skill = new Skills();
        $form = $this->createForm(SkillsType::class, $skill);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($skill);
            $entityManager->flush();

            return $this->redirectToRoute('app_skills_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('admin/skills/new.html.twig', [
            'skill' => $skill,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_skills_show', methods: ['GET'])]
    public function show(Skills $skill): Response
    {
        return $this->render('admin/skills/show.html.twig', [
            'skill' => $skill,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_skills_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Skills $skill, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(SkillsType::class, $skill);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $imageFile = $form->get('image')->getData();
            if ($imageFile) {
                $newFilename = uniqid().'.'.$imageFile->guessExtension();
                $imageFile->move(
                    $this->getParameter('uploads_directory'),
                    $newFilename
                );
                $skill->setImage('uploads/' . $newFilename);
            }
            $entityManager->flush();

            return $this->redirectToRoute('app_skills_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('admin/skills/edit.html.twig', [
            'skill' => $skill,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_skills_delete', methods: ['POST'])]
    public function delete(Request $request, Skills $skill, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$skill->getId(), $request->getPayload()->getString('_token'))) {
            $entityManager->remove($skill);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_skills_index', [], Response::HTTP_SEE_OTHER);
    }
}
