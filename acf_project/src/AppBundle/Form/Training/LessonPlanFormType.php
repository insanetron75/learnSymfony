<?php
/**
 * Created by PhpStorm.
 * User: Timmy
 * Date: 08/10/2017
 * Time: 19:20
 */

namespace AppBundle\Form\Training;


use AppBundle\Entity\Instructor;
use AppBundle\Entity\PermissionType;
use AppBundle\Entity\Syllabus;
use AppBundle\Tools\Training\PermissionTypeRepository;
use AppBundle\Tools\Syllabus\SyllabusRepository;
use Doctrine\ORM\EntityRepository;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class LessonPlanFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add(
                    'instructor',
                    EntityType::class,
                    [
                        'placeholder' => 'Select Instructor',
                        'class'       => Instructor::class
                    ])
                ->add('timestamp', DateType::class,
                      [
                          'label'  => 'Date',
                          'widget' => 'choice',
                          'input'  => 'timestamp'
                      ]
                )
                ->add(
                    'periodCount',
                    ChoiceType::class,
                    [
                        'label'       => 'Periods',
                        'placeholder' => 'Select No. of Periods',
                        'choices'     =>
                            [
                                '1 Period' => 1,
                                '2 Period' => 2,
                                '3 Period' => 3
                            ]
                    ]
                )
                ->add(
                    'length',
                    ChoiceType::class,
                    [
                        'placeholder' => 'Select Lesson Length',
                        'choices'     =>
                            [
                                '30 Minutes' => 30,
                                '45 Minutes' => 45,
                                '1 Hour'     => 60,
                                '1.5 Hours'  => 90,
                                '2 Hours'    => 120
                            ]
                    ]
                )
                ->add('start',
                      TextareaType::class,
                      [
                          'attr' => ['style' => 'min-height: 250px']
                      ]
                )
                ->add('middle',
                      TextareaType::class,
                      [
                          'attr' => ['style' => 'min-height: 250px']
                      ]
                )
                ->add('end',
                      TextareaType::class,
                      [
                          'attr' => ['style' => 'min-height: 250px']
                      ]
                )
                ->add(
                    'permissionType',
                    EntityType::class,
                    [
                        'placeholder'   => 'Select Permission',
                        'class'         => PermissionType::class,
                        'query_builder' => function (PermissionTypeRepository $repo)
                        {
                            return $repo->createIdQueryBuilder();
                        }
                    ]
                );
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