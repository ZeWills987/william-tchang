<?php

namespace App\Form;

use App\Entity\Project;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\UrlType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class ProjectType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('title', TextType::class, [
                'label' => 'Titre du projet'
            ])
            ->add('description', TextType::class, [
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
                'label' => 'Image du projet',
                'required' => false,
                'mapped' => false,
            ])
            ->add('extract', TextType::class, [
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
