<?php

namespace Fractalia\Bundle\SMSBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class SMSType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('mensajeId')
            ->add('destinatario')
            ->add('remitente')
            ->add('fechaEnvio')
            ->add('estadoEnvio')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Fractalia\Bundle\SMSBundle\Entity\SMS'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'fractalia_bundle_smsbundle_sms';
    }
}
