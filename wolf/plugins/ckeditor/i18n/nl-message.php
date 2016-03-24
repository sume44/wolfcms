<?php defined('IN_CMS') || exit();

return array(
    'ckeditor::plugin.title'       => 'CKEditor',
    'ckeditor::plugin.description' => 'CKEditor wysiwyg filter voor WolfCMS',

    'ckeditor::uninstall.success' => 'CKEditor - plugin succesvol geinstalleerd',
    'ckeditor::uninstall.error'   => 'CKEditor - verwijderen van de plugin instellingen is niet gelukt',
    'ckeditor::disable.info'      => 'Sommige CKEditor instellingen staan in de database.<br/>Klik op verwijderen als je deze wilt verwijderen.',

    'ckeditor::views.sidebar.settings' => 'Instellingen',
    'ckeditor::views.sidebar.docs'     => 'Documentatie',

    'ckeditor::ui.settings.title'           => 'CKEditor Instellingen',
    'ckeditor::ui.settings.fm.enable.label' => 'Activeer bestandsbeheer',
    'ckeditor::ui.settings.fm.folder.label' => 'Standaard map',
    'ckeditor::ui.settings.fm.folder.help'  => 'Geef een relatief pad op van je wolf installatie. Vergeet niet de permissies van je map te controleren.',

    'ckeditor::ui.settings.fm.images_only.label' => 'Sta gebruikers enkel het uploaden van afbeeldingen toe?',
    'ckeditor::ui.settings.fm.images_only.help'  => 'Geeft aan of een gebruiker ook andere bestanden dan afbeeldingen kan uploaden.',

    'ckeditor::ui.settings.fm.rel_images.label' => 'Gebruik relatieve URLs voor het src atrribuut van een afbeelding?',
    'ckeditor::ui.settings.fm.rel_images.help'  => 'Instelling om een relatieve of volledige URL naar een afbeelding te gebruiken.',

    'ckeditor::settings.validation.root_folder'    => 'De standaard map mag niet je webroot zijn.',
    'ckeditor::settings.validation.invalid_folder' => 'Map: map bestaat niet!',

    'ckeditor::settings.save_success' => 'De instellingen zijn bijgewerkt',
    'ckeditor::settings.save_error'   => 'Er is een probleem opgetreden bij het opslaan van de instellingen',

    'Yes'  => 'Ja',
    'No'   => 'Nee',
    'Save' => 'Bewaren',
);