<?php

namespace AppBundle\Form;

use AppBundle\Entity\Detachment;
use AppBundle\Tools\Detachment\DetachmentRepository;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class InstructorFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('number')
                ->add('rank')
                ->add('first_name')
                ->add('last_name')
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
                                   'data_class' => 'AppBundle\Entity\Instructor'
                               ]);
    }

    public function getBlockPrefix()
    {
        return 'app_bundle_cadet_form_type';
    }
}
