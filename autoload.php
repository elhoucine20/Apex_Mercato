<?php
spl_autoload_register(function ($class) {
    // Mapper directement les namespaces complets vers les fichiers

    $map = [
        'Apex\Equipe\Equipe'     => __DIR__ . '/Equipe.php',
        'Apex\Joueur\Joueur'     => __DIR__ . '/Joueur.php',
        'Apex\Coach\Coach'       => __DIR__ . '/Coach.php',
        'Apex\DataBase\DataBase' => __DIR__ . '/DataBase.php',
        'Apex\Contract\Contract' => __DIR__ . '/contract.php',
        'Apex\Crud'              => __DIR__ . '/Trait.php',
        'Apex\ClassFinal\ClassFinal'=> __DIR__ . '/ClassFinal.php',
        'Apex\Transfert\Transfert'  => __DIR__ . '/Transfert.php',
    ];
    
    if (isset($map[$class])) {
        require_once $map[$class];
    }
});



// spl_autoload_register(function ($class) {

// // delete apex en start
//     $class = str_replace('Apex\\', '', $class);

// // transform namespace a direction 
//     $path = __DIR__ . '/' . str_replace('\\', '/', $class) . '.php';

//     if (file_exists($path)) {
//         require_once $path;
//     }
// });

// Apex_Mercato/
// │── autoload.php
// │── DataBase/
// │   └── DataBase.php
// │── Transfert/
// │   └── Transfert.php
// │── ClassFinal/
// │   └── ClassFinal.php
// │── Equipe/
// │   └── Equipe.php
// │── Joueur/
// │   └── Joueur.php
// │── Coach/
// │   └── Coach.php
