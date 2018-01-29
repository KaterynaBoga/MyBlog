<?php
/**
 * Created by PhpStorm.
 * User: BKN1402
 * Date: 29.01.2018
 * Time: 21:18
 */

namespace App\Form;


use App\Entity\Commentary;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CommentType extends AbstractType
{
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => Commentary::class,
        ));
    }

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('postedAt')
            ->add('name')
            ->add('message')
        ;
    }
}
