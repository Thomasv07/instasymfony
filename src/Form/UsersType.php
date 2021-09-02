<?php

namespace App\Form;

use App\Entity\Users;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\OptionsResolver\OptionsResolver;


class UsersType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('email', EmailType::class, [
                'label' => false,
                'attr' => ['placeholder' => 'Numéro de mobile',
                'class' => 'inputform'
                ]
            ])
            ->add('name', TextType::class,[
                'label' => false,
                'attr' => ['placeholder' => 'Nom complet',
                'class' => 'inputform'
                ]
            ])
            ->add('username', TextType::class,[
                'label' => false,
                'attr' => ['placeholder' => "Nom d'utilisateur",
                'class' => 'inputform'
                ]
            ])
            ->add('password', PasswordType::class, [
                'label' => false,
                'attr' => ['placeholder' => 'Votre mot de passe',
                'class' => 'inputform'
                ]
            ]);
            
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Users::class,
        ]);
    }
}
