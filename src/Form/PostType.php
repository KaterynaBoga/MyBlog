<?php
/**
 * Created by PhpStorm.
 * User: BKN1402
 * Date: 09.01.2018
 * Time: 21:08
 */
namespace App\Form;

use App\Entity\Post;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PostType extends AbstractType
{
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => Post::class,
        ));
    }

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('postedAt')
            ->add('heading')
            ->add('description')
        ;
    }


}
