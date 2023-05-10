<?php

namespace App\Form;

use App\Entity\Rendezvous;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\NotNull;
class RendezvousType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            //->add('Ref')
            ->add('Nom')
            ->add('Prenom')
            ->add('Email', EmailType::class)
            ->add('tel')
            ->add('Date',  DateType::class, [
            'widget' => 'single_text',
            'empty_data' => null,
            'format' => 'yyyy-MM-dd',
            'html5' => true,
            'attr' => ['class' => 'js-datepicker'],
            'constraints' => [new NotBlank(['message'=>'Veuiller sélectionner la date de votre rendez vous.']),
                    new NotNull(['message'=>'Veuiller sélectionner la date de votre rendez vous.'])],
        ])
            ->add('spec', ChoiceType::class, [
                'choices' => [
                    'Spécialités' => null,
                    'CARDIOLOGIE' => true,
                    'NÉPHROLOGIE' => true,
                    'GASTRO-ENTÉROLOGIE' => true,
                    'PNEUMOLOGIE' => true,
                    'NEUROLOGIE' => true,


                ]
            ])
            ->add('message', TextareaType::class)
            //->add('admin')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Rendezvous::class,
        ]);
    }
}
