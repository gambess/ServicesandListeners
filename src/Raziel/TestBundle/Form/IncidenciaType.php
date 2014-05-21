<?php

namespace Raziel\TestBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class IncidenciaType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('estado')
            ->add('fechaInsercion', 'datetime', array('required' => false,))
            ->add('fechaLectura', 'datetime', array('required' => false,))
            ->add('fechaEnvio', 'datetime', array('required' => false,))
            ->add('fechaLog', 'datetime', array('required' => false,))
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Raziel\TestBundle\Entity\Incidencia'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'raziel_testbundle_incidencia';
    }
}
