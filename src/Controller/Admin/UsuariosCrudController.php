<?php

namespace App\Controller\Admin;

use App\Entity\Usuarios;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class UsuariosCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Usuarios::class;
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
