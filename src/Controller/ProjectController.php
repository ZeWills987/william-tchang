<?php

namespace App\Controller;

use App\Entity\Project;
use App\Form\ProjectType;
use App\Repository\ProjectRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\String\Slugger\SluggerInterface;

#[Route('/admin/project')]
final class ProjectController extends AbstractController
{
    #[Route(name: 'app_project_index', methods: ['GET'])]
    public function index(ProjectRepository $projectRepository): Response
    {
        return $this->render('admin/project/index.html.twig', [
            'projects' => $projectRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_project_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $project = new Project();
        $form = $this->createForm(ProjectType::class, $project);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $imageFile = $form->get('image')->getData();

            if ($imageFile) {
                $newFilename = uniqid().'.'.$imageFile->guessExtension();
                $imageFile->move(
                    $this->getParameter('uploads_directory'),
                    $newFilename
                );
                $project->setImage('uploads/' . $newFilename);
            }

            $entityManager->persist($project);
            $entityManager->flush();

            return $this->redirectToRoute('app_project_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('admin/project/new.html.twig', [
            'project' => $project,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_project_show', methods: ['GET'])]
    public function show(Project $project): Response
    {
        return $this->render('admin/project/show.html.twig', [
            'project' => $project,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_project_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Project $project, EntityManagerInterface $em, SluggerInterface $slugger): Response
    {
        $form = $this->createForm(ProjectType::class, $project);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            /** @var Symfony\Component\HttpFoundation\File\UploadedFile $imageFile */
            $imageFile = $form->get('image')->getData();

            if ($imageFile) {
                $originalFilename = pathinfo($imageFile->getClientOriginalName(), PATHINFO_FILENAME);
                $safeFilename = $slugger->slug($originalFilename);
                $extension = $imageFile->guessExtension() ?: $imageFile->getClientOriginalExtension() ?: 'bin';
                $newFilename = $safeFilename.'-'.uniqid().'.'.$extension;

                try {
                    $imageFile->move(
                        $this->getParameter('uploads_directory'),
                        $newFilename
                    );
                } catch (\Exception $e) {
                    $this->addFlash('error', "Erreur d'upload: ".$e->getMessage());
                    // Optionnel: retourner au formulaire
                    return $this->render('admin/project/edit.html.twig', [
                        'project' => $project,
                        'form' => $form,
                    ]);
                }

                // Stocker le chemin Web
                $project->setImage('uploads/'.$newFilename);
            }



            $em->flush();

            return $this->redirectToRoute('app_project_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('admin/project/edit.html.twig', [
            'project' => $project,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_project_delete', methods: ['POST'])]
    public function delete(Request $request, Project $project, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$project->getId(), $request->getPayload()->getString('_token'))) {
            $entityManager->remove($project);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_project_index', [], Response::HTTP_SEE_OTHER);
    }
}
