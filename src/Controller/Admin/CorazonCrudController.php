<?php

namespace App\Controller\Admin;

use App\Entity\Countandadd;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\EmailField;
use EasyCorp\Bundle\EasyAdminBundle\Field\NumberField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class CorazonCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Countandadd::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
//            IdField::new('id'),
//            TextField::new('name', 'Nombre'),
//            TextField::new('apellido'),
//            EmailField::new('email'),
//            NumberField::new('promise', 'Promesa'),
//            NumberField::new('meses', 'Meses'),
            NumberField::new('totalPeople', 'Personas'),
            NumberField::new('totalPromises', 'Promesas'),
        ];
    }
}
