<?php

namespace Raziel\TestBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class LoggerType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('fechaCreacion')
            ->add('errorTrace')
            ->add('fechaEnvio')
            ->add('fechaEnvioErroneo')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Raziel\TestBundle\Entity\Logger'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'raziel_testbundle_logger';
    }
}
