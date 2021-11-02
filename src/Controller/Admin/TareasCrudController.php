<?php

namespace App\Controller\Admin;

use App\Entity\Tareas;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class TareasCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Tareas::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            IntegerField::new('id')->hideOnForm(),
            TextField::new('titulo'),
            TextEditorField::new('descripcion'),
            DateTimeField::new('fecha'),
            BooleanField::new('realizada'),

            DateTimeField::new('creada')->hideOnForm()
        ];
    }


}
