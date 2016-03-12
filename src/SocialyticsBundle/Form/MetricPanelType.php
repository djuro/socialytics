<?php

namespace SocialyticsBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateType;
/**
 * MetricType, a form class used to define details about result and a particular metric.
 *
 * @author djuro
 */
class MetricPanelType extends AbstractType
{
    /**
     *
     * @var string[]
     */
    private $metricNames;
    
    /**
     *
     * @var string[]
     */
    private $formatTypes;
    
    public function __construct($metricNames, $formatTypes)
    {
        $this->metricNames = $metricNames;
        $this->formatTypes = $formatTypes;
    }
    
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title','text', array('label' => 'Panel title'))
            ->add('metric','choice', array('label' => 'Metric', 
                                   'choices' => $this->metricNames, 
                                   'multiple' => false,
                                   'expanded' => false))
            ->add('format','choice', array('label'=>'Format', 'choices'=>$this->formatTypes))
            ->add('dateFrom', DateType::class, array('label'=>'Date from'))
            ->add('dateTo', DateType::class, array('label'=>'Date to'))
            
            ->add('compareFrom', DateType::class, array('label'=>'Compare from'))
            ->add('compareTo', DateType::class, array('label'=>'Compare to'))
        ;
    }
    
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'SocialyticsBundle\Form\Model\MetricPanel',
        ));
    }
}
