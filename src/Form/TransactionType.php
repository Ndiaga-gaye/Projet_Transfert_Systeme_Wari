<?php

namespace App\Form;

use App\Entity\Transaction;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class TransactionType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('NomEnvoyeur')
            ->add('PrenomEnvoyeur')
            ->add('DateNaissance')
            ->add('NumeroIdentite')
            ->add('Telephone')
            ->add('TelephoneBeneficiaire')
            ->add('NomBeneficiare')
            ->add('PrenomBeneficiare')
            ->add('DateEnvoie')
            ->add('CodeEnvoie')
            ->add('Montant')
            ->add('User')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Transaction::class,
        ]);
    }
}
