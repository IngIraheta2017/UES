<?php

namespace CidesBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class UserType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('username')
        ->add('password')
        ->add('nombres')
        ->add('apellidos')
        ->add('email')
        ->add('role', 'choice', array('choices' => array('ROLE_ADMIN' => 'ADMINISTRADOR', 'ROLE_USER' => 'USUARIO', 'ROLE_COOR' => 'COORDINADOR', 'ROLE_INVES' => 'INVESTIGADOR', 'ROLE_lIDER_INVES' => 'INVESTIGADOR LIDER', 'ROLE_STUDENT' => 'ESTUDIANTE'), 'placeholder' => 'Select a role'))
        ->add('isActive', 'checkbox')
        ->add('save', 'submit', array('label' => 'Save user'))
        ;
    }

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'CidesBundle\Entity\User'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'user';
    }


}
