<?php

namespace App\Controller\Admin;

use App\Entity\Bouy;
use App\Enum\Color;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;
use EasyCorp\Bundle\EasyAdminBundle\Field\CollectionField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class BouyCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Bouy::class;
    }

    public function configureFields(string $pageName): iterable
    {
        yield IdField::new('id')
        ->onlyOnIndex();
        yield TextField::new('name');
        yield TextField::new('code');


        yield ChoiceField::new('colour')
                ->setChoices(array_combine([Color::GREEN->name, Color::RED->name], [Color::GREEN->value, Color::RED->value]));
        yield DateField::new('year');

        yield CollectionField::new('locations')
            ->hideOnForm()
            ->setTemplatePath('admin/fields/locations.html.twig')
        ;
    }
}
