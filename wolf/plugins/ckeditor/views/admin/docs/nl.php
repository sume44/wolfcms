<?php defined('IN_CMS') || exit(); ?>

<h1>Documentatie</h1>

<div id="ckeditor_filter">
    <h2>CKEditor</h2>
    <p>
        Deze plugin bevat de <b>standaard</b> distributie van CKEditor (Versie 4.2 - 18 Juli 2013).
        Het moet mogelijk zijn deze zonder problemen te updaten of te vervangen,
        download de gewenste distributie en vervang de inhoud van <code>'resources/ckeditor/'</code> met die van je download.
    </p>
    <p>
        Configuratie, stylesheet en style bestanden zijn opgeslagen in  <code>'resources/users/ckeditor.*'</code>,
        lees de officiële CKEditor documentatie om meer te weten over de beschikbare opties.
    </p>
    <p>
        De hoofd configuratie kun je aanpassen door het bestand <code>'resources/users/ckeditor.config.js'</code> te bewerken,
        er staat wat documentatie in om je te helpen.
    </p>

    <p>De editor stylesheet vind in je <code>'resources/users/ckeditor.editor.css'</code>.</p>

    <h2>Bestandsbeheer</h2>
    <p>
        Het activeren van bestandsbeheer doe je bij de instellingen
        <a href="<?php echo get_url('plugin/ckeditor/settings'); ?>" title="CKEditor plugin instellingen" target="_self">instellingen</a>.
    </p>
    <p>
        De bestandbeheer configuratie is nu beschikbaar in een json bestand <code>'resources/users/filemanager.config.json'</code>,
        belangrijk, het moet een geldig json bestand zijn, dus gebruik <em>geen enkele aanhalingstekens</em>!
    </p>
    <p>
        Een aantal instellingen worden in de database bewaard en deze overschrijven de instellingen van het json bestand.
    </p>
    <p>
        De <a href="https://github.com/simogeo/Filemanager" title="Filemanager github" target="_blank">bestandsbeheerder</a> gebruikt een aangepast versie van de 'php' connector,
        dus updaten of vervangen is niet 'noodzakelijk'.
    </p>
</div>