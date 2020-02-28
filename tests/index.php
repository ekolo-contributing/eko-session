<?php
    require_once __DIR__.'./../vendor/autoload.php';

    use Ekolo\Component\EkoSession\Session;

    $session = new Session([
        'id' => 1,
        'nom' => 'Bolenge',
        'prenom' => 'Nancy'
    ]);

    $session->set('age', 'adulte');
    $session->set('super', "maman");

    $session->remove('id');
    
    $session->set('panier', []);
    $session->set('panier', [
        'elements' => [1,4,8]
    ]);

    if ($session->has('prenom')) {
        debug($session->prenom());
    }