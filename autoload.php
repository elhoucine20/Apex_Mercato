<?php
spl_autoload_register(function ($class) {
    // Mapper directement les namespaces complets vers les fichiers
    $map = [
        'Apex\Equipe\Equipe'     => __DIR__ . '/Equipe.php',
        'Apex\Joueur\Joueur'     => __DIR__ . '/Joueur.php',
        'Apex\Coach\Coach'       => __DIR__ . '/Coach.php',
        'Apex\DataBase\DataBase' => __DIR__ . '/DataBase.php',
        'Apex\Crud'              => __DIR__ . '/Trait.php',
    ];
    
    if (isset($map[$class])) {
        require_once $map[$class];
    }
});