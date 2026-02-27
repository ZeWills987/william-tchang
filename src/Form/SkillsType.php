<?php

namespace App\Form;

use App\Entity\Skills;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\UrlType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType; 
use Symfony\Component\Form\Extension\Core\Type\IntegerType;

class SkillsType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name',TextType::class, [
                'label' => 'Nom'
            ])
            ->add('type',TextType::class, [
                'label' => 'Type'
            ])
            ->add('image',FileType::class, [
                'label' => 'Image',
                'required' => false, 'mapped' => false,
            ])
            ->add('description',TextareaType::class, [
                'label' => 'Description',
                'required' => false,
            ])
            ->add('ordered',IntegerType::class, [
                'label' => 'Ordre',
                'required' => false,
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Skills::class,
        ]);
    }
}
