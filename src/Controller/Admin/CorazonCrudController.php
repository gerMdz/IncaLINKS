<?php

namespace App\Controller\Admin;

use App\Entity\Corazon;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\EmailField;
use EasyCorp\Bundle\EasyAdminBundle\Field\NumberField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class CorazonCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Corazon::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [
//            IdField::new('id'),
            TextField::new('name'),
            EmailField::new('email'),
            NumberField::new('promise'),
        ];
    }

}
