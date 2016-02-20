<?php

namespace Vinologie\ServiceBundle\Form;



use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Vinologie\UtilsBundle\Form\AddressType;

class DegustationType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('hours', DateTimeType::class,array('required'=>true))
            ->add('description', TextType::class, array('required'=>true))
            ->add('address',AddressType::class,array('required'=>true))
            ->add('maxGuestNumber',IntegerType::class, array('required'=>true))
            ->add('save', SubmitType::class, array('label' => 'Create Event'))
        ;
    }
    
    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Vinologie\ServiceBundle\Entity\Degustation'
        ));
    }
}
