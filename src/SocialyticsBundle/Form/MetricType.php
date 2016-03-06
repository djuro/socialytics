<?php

namespace SocialyticsBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateType;
/**
 * MetricType, a form class used to define details about result and a particular metric.
 *
 * @author djuro
 */
class MetricType extends AbstractType
{
    private $metricNames;
    
    public function __construct($metricNames)
    {
        $this->metricNames = $metricNames;
    }
    
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name','text', array('label' => 'Name'))
            ->add('metric','choice', array('label' => 'Metric', 
                                   'choices' => $this->metricNames, 
                                   'multiple' => false,
                                   'expanded' => false))
            ->add('dateFrom', DateType::class, array('label'=>'Date from'))
            ->add('dateTo', DateType::class, array('label'=>'Date to'))
            
            ->add('compareFrom', DateType::class, array('label'=>'Compare from'))
            ->add('compareTo', DateType::class, array('label'=>'Compare to'))
            ->add('save', SubmitType::class)
        ;
    }
    
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'SocialyticsBundle\Form\Model\Metric',
        ));
    }
}
