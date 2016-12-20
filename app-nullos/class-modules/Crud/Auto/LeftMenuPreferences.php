<?php


namespace Crud\Auto;


class LeftMenuPreferences
{


    public static function getLeftMenuSectionBlocks()
    {
        return [
    'Website' => [
        'oui.concours',
        'oui.configuration',
        'oui.coups_de_coeur',
        'oui.equipe',
        'oui.equipe_has_membres',
        'oui.instruments',
        'oui.membres',
        'oui.messages',
        'oui.niveaux',
        'oui.pays',
        'oui.styles_musicaux',
        'oui.users',
        'oui.users_has_instruments',
        'oui.users_has_styles_musicaux',
        'oui.videos',
    ],
];
    }

    /**
     * Labels are used in the left menu only
     */
    public static function getTableLabels()
    {
        return [
    'oui.coups_de_coeur' => 'coups de coeur',
    'oui.equipe_has_membres' => 'equipe has membres',
    'oui.styles_musicaux' => 'styles musicaux',
    'oui.users_has_instruments' => 'users has instruments',
    'oui.users_has_styles_musicaux' => 'users has styles musicaux',
];
    }

}