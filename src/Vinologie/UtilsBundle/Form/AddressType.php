<?php

/**
 * Created by PhpStorm.
 * User: arthur
 * Date: 18/02/16
 * Time: 17:49
 */

namespace Vinologie\UtilsBundle\Form;

use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AddressType extends \Core\UtilsBundle\Form\AddressType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        parent::buildForm($builder, $options);

        /*$builder
            ->add('save', SubmitType::class, array('label' => 'Create Account'))
        ;*/
    }

    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Vinologie\UtilsBundle\Entity\Address'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'vinologie_utils_form_address';
    }

}

