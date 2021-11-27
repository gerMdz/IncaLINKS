<?php

namespace App\Form;

use App\Entity\Organization;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class OrganizationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', TextType::class, [
                'attr' => ['autofocus' => true],
                'label' => 'label.name',
            ])
            ->add('address', TextType::class, [
                'attr' => ['autofocus' => true],
                'label' => 'label.address',
            ])
            ->add('identifier', TextType::class, [
                'label' => 'title.organization_identifier',
                'attr' => [
                    'autofocus' => true,
                ],
            ])
            ->add('responsable')
            ->add('email')
            ->add('isActive', CheckboxType::class, [
                'label' => 'label.active',
            ])
            ->add('isManager', CheckboxType::class, [
                'label' => 'label.manager',
                'required'=>false,
                'help' => 'Solo puede haber un manager del sitio',
            ])// el ";" no debe sacarse
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Organization::class,
        ]);
    }
}
