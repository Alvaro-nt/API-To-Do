<?php

namespace App\Controller\Admin;

use App\Entity\Tareas;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class TareasCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Tareas::class;
    }

    /*
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id'),
            TextField::new('title'),
            TextEditorField::new('description'),
        ];
    }
    */


}
