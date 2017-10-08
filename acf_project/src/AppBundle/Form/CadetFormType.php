<?php

namespace AppBundle\Form;

use AppBundle\Entity\Detachment;
use AppBundle\Entity\Syllabus;
use AppBundle\Tools\Detachment\DetachmentRepository;
use AppBundle\Tools\Syllabus\SyllabusRepository;
use Doctrine\ORM\EntityRepository;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CadetFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('rank')
                ->add('first_name')
                ->add('last_name')
                ->add('syllabus', EntityType::class, [
                    'placeholder'   => 'Choose a Star Level',
                    'class'         => Syllabus::class,
                    'query_builder' => function (SyllabusRepository $repo)
                    {
                        return $repo->createAlphabeticalQueryBuilder();
                    }
                ])
                ->add(
                    'detachment',
                    EntityType::class,
                    [
                        'placeholder'   => 'Select Detachment',
                        'class'         => Detachment::class,
                        'query_builder' => function (DetachmentRepository $repo)
                        {
                            return $repo->createAlphabeticalQueryBuilder();
                        }
                    ]
                );
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
                                   'data_class' => 'AppBundle\Entity\Cadet'
                               ]);
    }

    public function getBlockPrefix()
    {
        return 'app_bundle_cadet_form_type';
    }
}
