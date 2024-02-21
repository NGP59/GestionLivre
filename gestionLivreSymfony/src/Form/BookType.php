<?php

namespace App\Form;

use App\Entity\Book;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\GreaterThan;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;

class BookType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('ISBN', TextType::class, [
                'constraints' => [
                    new NotBlank(),
                    new Length([
                        'min' => 15,
                        'minMessage' => 'ISBN doit etre de {{ limit }} caractères',
                        'max' => 15,
                        'maxMessage' => 'ISBN doit etre de {{ limit }} caractères'

                    ])
                ]
            ])
            ->add('Titre', TextType::class, [
                'constraints' => [
                    new NotBlank(),
                    new Length([
                        'min' => 5,
                        'minMessage' => 'Le titre doit faire au moins {{ limit }} caratères'
                    ])
                ]
            ])
            ->add('Resume', TextType::class, [
                'constraints' => [
                    new NotBlank(),
                    new Length([
                        'min' => 5,
                        'minMessage' => 'Le resumé doit faire au moins {{ limit }} caratères'
                    ])
                ]
            ])
            ->add('Description', TextType::class, [
                'constraints' => [
                    new NotBlank(),
                    new Length([
                        'min' => 5,
                        'minMessage' => 'La description doit faire au moins {{ limit }} caratères'
                    ])
                ]
            ])
            ->add('Price', IntegerType::class, [
                'constraints' => [
                    new NotBlank(),
                    new GreaterThan(
                        [
                            'value' => 1,
                            'message' => 'La maison ne fait pas gratuit'
                        ]
                    )

                ]
            ])
            ->add('Ajout', SubmitType::class);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Book::class,
        ]);
    }
}
