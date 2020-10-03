<?php

namespace App\Form;

use App\Entity\Category;
use App\Entity\Post;
use FOS\CKEditorBundle\Form\Type\CKEditorType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PostType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', TextType::class,['label'=> 'Nom' ])
            ->add('title', TextType::class,['label'=> 'Titre' ])
            ->add('slug', TextType::class,['label'=> 'Slug' ])
            ->add('description', TextType::class,['label'=> 'Description' ])
            ->add('category',EntityType::class,[
                'class' => Category::class,
                'choice_label' => 'Name',
                'label'=>'Categorie',
                //'expanded'     => true,
                'multiple'     => true  ])
            ->add('content', CKEditorType::class,['label'=> 'Contenu' ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Post::class,
        ]);
    }
}
