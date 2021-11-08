<?php

namespace App\Controller\Admin;

use App\Entity\Tareas;

use App\Repository\TareasRepository;
use EasyCorp\Bundle\EasyAdminBundle\Config\Filters;
use EasyCorp\Bundle\EasyAdminBundle\Filter\BooleanFilter;
use EasyCorp\Bundle\EasyAdminBundle\Filter\ChoiceFilter;

use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;


class TareasCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Tareas::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            IntegerField::new('id')->hideOnForm()->hideOnDetail()->hideOnIndex(),
            TextField::new('titulo'),
            TextEditorField::new('descripcion'),
            ChoiceField::new('categoria')->setChoices([
                'Reunión' => 'Reunión',
                'Venta' => 'Venta',
                'Ocio' => 'Ocio',
                'Sin categoria' => 'Sin categoria'
            ]),
            DateTimeField::new('fecha'),
            BooleanField::new('realizada'),

            AssociationField::new('user')
                ->setRequired(true)
                ->setFormTypeOptions(['query_builder' => function (TareasRepository $em) {
                    return $em->createQueryBuilder('f')
                        ->where('f.id = :user')
                        ->setParameter('user', $this->getUser()->getUserIdentifier());
                }])->hideOnForm()->hideOnDetail()->hideOnIndex(),

            DateTimeField::new('creada')->hideOnForm()
        ];
    }

    public function configureFilters(Filters $filters): Filters
    {
        return $filters

            // most of the times there is no need to define the
            // filter type because EasyAdmin can guess it automatically
            ->add(BooleanFilter::new('realizada'))
            ->add(ChoiceFilter::new('categoria')->setChoices([
                'Reunión' => 'Reunión',
                'Venta' => 'Venta',
                'Ocio' => 'Ocio',
                'Sin categoria' => 'Sin categoria'
            ]));
    }


}
