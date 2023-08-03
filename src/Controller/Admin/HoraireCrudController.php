<?php

namespace App\Controller\Admin;

use App\Entity\Horaire;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Field\ArrayField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class HoraireCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Horaire::class;
    }

    public function configureFields(string $pageName): iterable
    {
        $horairesField = ArrayField::new('horaires')
            ->setTextAlign('left')
            ->hideOnForm();

        // Utiliser une valeur par défaut pour le champ "telephone" si celui-ci est vide
        $telephoneField = TextField::new('telephone')
            ->setFormTypeOption('empty_data', 'Aucun numéro de téléphone');

        // Utiliser une valeur par défaut pour le champ "adresse" si celui-ci est vide
        $adresseField = TextField::new('adresse')
            ->setFormTypeOption('empty_data', 'Aucune adresse');

        $horairesDisplayField = TextField::new('horaires_display', 'Horaires')
            ->formatValue(function ($value, $entity) {
                // Vérifier si l'entité n'est pas nulle avant d'appeler la méthode getHoraires()
                if ($entity) {
                    // Construire une chaîne de texte à partir de l'array des horaires
                    $jours = ['lun', 'mar', 'mer', 'jeu', 'ven', 'sam', 'dim'];
                    $joursAffiches = [];
                    foreach ($jours as $jour) {
                        if (isset($entity->getHoraires()[$jour])) {
                            $joursAffiches[] = ucfirst($jour) . ': ' . $entity->getHoraires()[$jour];
                        } else {
                            $joursAffiches[] = ucfirst($jour) . ': Fermé';
                        }
                    }
                    return implode("\n", $joursAffiches);
                }
                // Retourner une chaîne vide si l'entité est nulle
                return '';
            });

        // Afficher le champ "horaires_display" dans le formulaire d'édition et de création
        $fields[] = $horairesDisplayField;

        return [
            $horairesField,
            $telephoneField,
            $adresseField,
            // ... Autres champs
            $horairesDisplayField, // Champ personnalisé pour afficher les horaires sous la forme souhaitée
        ];
    }
}








