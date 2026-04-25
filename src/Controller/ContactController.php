<?php

namespace App\Controller;

use App\Form\ContactType;

use App\Repository\ParamsRepository;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email; 
use Symfony\Component\HttpFoundation\Request;

final class ContactController extends AbstractController
{
    #[Route('/contact', name: 'app_contact')]
    public function index(Request $request, MailerInterface $mailer, ParamsRepository $paramsRepository): Response
    {
        $params = $paramsRepository->findBy([])[0];

        $form = $this->createForm(ContactType::class);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $data = $form->getData();

            $email = (new Email())
                ->from('service@william-tchang.fr')
                ->replyTo($data['email'])
                ->to('william.tchang.pro@gmail.com')
                ->subject('Nouveau message du Portfolio')
                ->text($data['message']);

            $mailer->send($email);

            $this->addFlash('success', 'Your messages was send !');
            return $this->redirectToRoute('app_contact');
        }

        return $this->render('contact/index.html.twig', [
            'params' => $params,
            'contactForm' => $form->createView(),
        ]);
    }
}
