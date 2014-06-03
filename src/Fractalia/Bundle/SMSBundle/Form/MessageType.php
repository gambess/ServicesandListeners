<?php

namespace Fractalia\Bundle\SMSBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class MessageType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('templateId')
            ->add('incidenciaId')
            ->add('estado')
            ->add('cliente')
            ->add('tipo')
            ->add('tecnico')
            ->add('tsol')
            ->add('fecha')
            ->add('modoRecepcion')
            ->add('resoluciones')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Fractalia\Bundle\SMSBundle\Entity\Message'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'fractalia_bundle_smsbundle_message';
    }
}
