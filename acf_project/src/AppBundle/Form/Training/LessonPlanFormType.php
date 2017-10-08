<?php
/**
 * Created by PhpStorm.
 * User: Timmy
 * Date: 08/10/2017
 * Time: 19:20
 */

namespace AppBundle\Form\Training;


use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class LessonPlanFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('Subject')
                ->add('Lesson')
                ->add('Instructor')
                ->add('Date')
                ->add('Periods')
                ->add('Length (minutes)')
                ->add('Start')
                ->add('Middle')
                ->add('End')
                ->add('Permissions');
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
                                   'data_class' => 'AppBundle\Entity\LessonPlan'
                               ]);
    }

    public function getBlockPrefix()
    {
        return 'app_bundle_lesson_plan_form_type';
    }
}