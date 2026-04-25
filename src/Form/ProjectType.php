<?php

namespace App\Form;

use App\Entity\Project;
use App\Entity\Experience;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

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
                'widget' => 'choice',          
                'input'  => 'datetime',        
                'format' => 'dMy',
                'years'  => range((int)date('Y') - 100, (int)date('Y') + 5),
                'html5'  => false,
                'empty_data' => function ($form) {
                    $y = $form->get('year')->getData();
                    return $y ? (new \DateTimeImmutable(sprintf('%d-01-01', $y))) : null;
                },
            ])
            ->add('extract', TextareaType::class, [
                'label' => 'Extrait',
                'required' => false
            ])
            ->add('experience', EntityType::class, [
                'class' => Experience::class,
                'choice_label' => 'job',
                'label' => 'Entreprise / Expérience liée',
                'placeholder' => 'Projet indépendant (aucun)',
                'required' => false,
                'attr' => ['class' => 'form-control']
            ])
            ->add('is_published', ChoiceType::class, [
                'choices' => [
                    'Publié' => true,
                    'Brouillon' => false,
                ],
                'label' => 'Statut de publication',
                'expanded' => true,
                'multiple' => false,
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
