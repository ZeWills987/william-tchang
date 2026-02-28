<?php

namespace App\Form;

use App\Entity\Project;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\UrlType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;

class ProjectType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('title', TextType::class, [
                'label' => 'Titre du projet'
            ])
            ->add('description', TextareaType::class, [
                'label' => 'Description'
            ])
            ->add('skills', ChoiceType::class, [
                    'choices'  => [
                        'PHP' => 'PHP',
                        'Symfony' => 'Symfony',
                        'JavaScript' => 'JavaScript',
                        'HTML' => 'HTML',
                        'CSS' => 'CSS',
                        'SQL' => 'SQL',
                        'React' => 'React',
                        'Java' => 'Java',
                        'Python' => 'Python',
                        'C#' => 'C#',
                        'WordPress' => 'WordPress',
                    ],
                    'multiple' => true,
                    'expanded' => true,
                    'label'    => 'Compétences',
                    'required' => false,
                ])
            ->add('link', UrlType::class, [
                'label' => 'Lien du projet',
                'required' => false
            ])
            ->add('image', FileType::class, [
                'label' => 'Image du projet (Desktop)',
                'required' => false,
                'mapped' => false,
            ])
            ->add('image_mobile', FileType::class, [
                'label' => 'Image du projet (Mobile)',
                'required' => false,
                'mapped' => false,
            ])
            ->add('date', DateType::class, [
                'widget' => 'choice',          // listes déroulantes
                'input'  => 'datetime',        // objet \DateTimeInterface côté PHP
                'format' => 'dMy',
                'years'  => range((int)date('Y') - 100, (int)date('Y') + 5),
                'html5'  => false,             // éviter l’input type="date" HTML5
                // Astuce: comme on n’affiche que l’année, Symfony remplira mois/jour à 1
                // si non fournis (selon version/composant). Pour être sûr:
                'empty_data' => function ($form) {
                    $y = $form->get('year')->getData();
                    return $y ? (new \DateTimeImmutable(sprintf('%d-01-01', $y))) : null;
                },
            ])
            ->add('extract', TextareaType::class, [
                'label' => 'Extrait',
                'required' => false
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Project::class,
        ]);
    }
}
