<?php

namespace App\Controller;

use App\Entity\Params;
use App\Form\ParamsType;
use App\Repository\ParamsRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/admin/params')]
final class ParamsController extends AbstractController
{
    #[Route(name: 'app_params_index', methods: ['GET'])]
    public function index(ParamsRepository $paramsRepository): Response
    {
        return $this->render('params/index.html.twig', [
            'params' => $paramsRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_params_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $param = new Params();
        $form = $this->createForm(ParamsType::class, $param);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $imageFile = $form->get('profile_photo')->getData();
            $cvFile = $form->get('cv')->getData();

            if ($imageFile) {
                $newFilename = uniqid().'.'.$imageFile->guessExtension();
                $imageFile->move(
                    $this->getParameter('uploads_directory'),
                    $newFilename
                );

                $param->setProfilePhoto('uploads/' . $newFilename);
            }

            if ($cvFile) {
                $newFilename = uniqid().'.'.$cvFile->guessExtension();
                $cvFile->move(
                    $this->getParameter('uploads_directory'),
                    $newFilename
                );
                $param->setCv('uploads/' . $newFilename);
            }

            $entityManager->persist($param);
            $entityManager->flush();

            return $this->redirectToRoute('app_params_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('params/new.html.twig', [
            'param' => $param,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_params_show', methods: ['GET'])]
    public function show(Params $param): Response
    {
        return $this->render('params/show.html.twig', [
            'param' => $param,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_params_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Params $param, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(ParamsType::class, $param);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_params_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('params/edit.html.twig', [
            'param' => $param,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_params_delete', methods: ['POST'])]
    public function delete(Request $request, Params $param, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$param->getId(), $request->getPayload()->getString('_token'))) {
            $entityManager->remove($param);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_params_index', [], Response::HTTP_SEE_OTHER);
    }
}
