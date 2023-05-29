<?php

namespace App\Form;

use App\Entity\Employee;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class EmployeeModalType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('firstname', TextType::class, [
                'label' => 'Vorname',
                'label_attr' => ['class' => 'form-label'],
                'attr' => ['class' => 'form-control', 'placeholder' => 'Vornamen eingeben'],
                'row_attr' => ['class' => 'mb-3']
            ])
            ->add('lastname', TextType::class, [
                'label' => 'Nachname',
                'label_attr' => ['class' => 'form-label'],
                'attr' => ['class' => 'form-control', 'placeholder' => 'Nachnamen eingeben'],
                'row_attr' => ['class' => 'mb-3']
            ])
            ->add('birthdate', DateType::class, [
                'label' => 'Geburtsdatum',
                'label_attr' => ['class' => 'form-label'],
                'attr' => ['class' => 'form-control', 'value' => date("d.m.Y")],
                'row_attr' => ['class' => 'mb-3'],
                'widget' => 'single_text'
            ])/*
            ->add('firstday', DateType::class, [
                'label' => 'Eintrittsdatum',
                'label_attr' => ['class' => 'form-label'],
                'attr' => ['class' => 'form-control', 'value' => date("d.m.Y")],
                'row_attr' => ['class' => 'mb-3'],
                'widget' => 'single_text',
                'required' => false,
            ])
            ->add('lastday', DateType::class, [
                'label' => 'Austrittsdatum',
                'label_attr' => ['class' => 'form-label'],
                'attr' => ['class' => 'form-control', 'value' => date("d.m.Y")],
                'row_attr' => ['class' => 'mb-3'],
                'widget' => 'single_text',
                'required' => false,
            ])*/
            ->add('toe', ChoiceType::class, [
                'label' => 'Arbeitsverhältnis',
                'label_attr' => ['class' => 'form-label'],
                'attr' => ['class' => 'form-select'],
                'row_attr' => ['class' => 'mb-3'],
                'choices' => [
                    'Angestellt' => 'Angestellt',
                    'Verbeamtet' => 'Verbeamtet',
                ],
            ])
            ->add('level', ChoiceType::class, [
                'label' => 'Laufbahn',
                'label_attr' => ['class' => 'form-label'],
                'attr' => ['class' => 'form-select'],
                'row_attr' => ['class' => 'mb-3'],
                'choices' => [
                    'Höherer Dienst' => 'hD',
                    'Gehobener Dienst' => 'gD',
                    'Mittlerer Dienst' => 'mD',
                    'Einfacher Dienst' => 'eD',
                ],
            ])
            ->add('submit', SubmitType::class, [
                'attr' => ['class' => 'btn btn-primary w-sm']
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Employee::class,
            'action' => '/employee/add'
        ]);
    }
}
