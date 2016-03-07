<?php

namespace SocialyticsBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
/**
 * ReportType. A parent form, contains embedded metric panel forms.
 *
 * @author djuro
 */
class ReportType extends AbstractType
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
            ->add('title','text', array('label' => 'Report title'))
            ->add('panels',CollectionType::class, 
                    array('entry_type'=>new MetricPanelType($this->metricNames, $this->formatTypes),
                            'label' => 'Metric',
                            'allow_add'=> true,))
            
            ->add('save', SubmitType::class)
        ;
    }
    
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'SocialyticsBundle\Form\Model\Report',
        ));
    }
}
