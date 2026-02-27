<?php

namespace App\Form;

use App\Entity\Params;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\UrlType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType; 

class ParamsType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('firstname',TextType::class, [
                'label' => 'Prénom'
            ])
            ->add('name',TextType::class, [
                'label' => 'Nom'
            ])
            ->add('description',TextareaType::class, [
                'label' => 'Description'
            ])
            ->add('aboutMe',TextareaType::class, [
                'label' => 'À propos de moi'
            ])
            ->add('skills', ChoiceType::class, [
                            'label' => 'Compétences',
                            'choices' => [
                                'PHP' => 'PHP',
                                'Symfony' => 'Symfony',
                                'React' => 'React',
                                'TypeScript' => 'TypeScript',
                                'AWS S3' => 'AWS S3',
                                'WordPress' => 'WordPress',
                                'Python' => 'Python',
                                'Docker' => 'Docker',
                                'SQL' => 'SQL',
                                'Java' => 'Java',
                                'C#' => 'C#',
                                'C' => 'C',
                            ],
                            'multiple' => true, 
                            'expanded' => false,
                            'required' => false,
                            'attr' => [
                                'class' => 'select-skills'
                            ]
            ])
            ->add('profile_photo', FileType::class, [
                'label' => 'Photo de présentation',
                'required' => false,
                'mapped' => false,
            ])
            ->add('city', TextType::class, [
                'label' => 'Ville',
                'required' => false
            ])
            ->add('email', TextType::class, [
                'label' => 'Addresse mail',
                'required' => false
            ])
            ->add('mobile', TextType::class, [
                'label' => 'Mobile',
                'required' => false
            ])
            ->add('linkedin', UrlType::class, [
                'label' => 'Linkedin',
                'required' => false
            ])
            ->add('cv', FileType::class, [
                'label' => 'CV',
                'required' => false,
                'mapped' => false,
            ])
            ->add('github', UrlType::class, [
                'label' => 'Github',
                'required' => false
            ])
            ->add('gitlab', UrlType::class, [
                'label' => 'Gitlab',
                'required' => false
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Params::class,
        ]);
    }
}
