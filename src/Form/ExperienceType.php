<?php

namespace App\Form;

use App\Entity\Experience;
use App\Entity\Project;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ExperienceType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('job', TextType::class, [
                'label' => 'Intitulé du poste'
            ])
            ->add('company', TextType::class, [
                'label' => 'Entreprise'
            ])
            ->add('date_start',DateType::class, [
                'widget' => 'single_text',
                'label' => 'Date de début'
            ])
            ->add('date_end',DateType::class, [
                'widget' => 'single_text',
                'label' => 'Date de fin'
            ])
            ->add('projects', EntityType::class, [
                'class' => Project::class,
                'choice_label' => 'title',
                'label' => 'Projets liés',
                'multiple' => true,
                'expanded' => true,
                'required' => false,
                'attr' => ['class' => 'form-control']
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Experience::class,
        ]);
    }
}
