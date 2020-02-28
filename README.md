# eko-session

Module PHP permettant de gérer les session

## Installation

Pour l'installer vous devez à avoir déjà composer installé. Si ce n'est pas le cas aller sur  [Composer](https://getcomposer.org/)

```bash
$ composer require ekolo/eko-session
```

## API

```php
<?php
    require __DIR__.'/vendor/autoload.php';

    use Ekolo\Component\EkoSession\Session;

    $sessions = new Session([
        'id' => '1',
        'nom' => 'Etokila',
        'prenom' => 'Diani',
        'sexe' => 'M'
    ]);

    echo $sessions->nom(); // Etokila
```

### Session::add(array $parameters = [])

Permet de rajouter des variables à la session

`$parameters` Les variables à rajouter

```php
$sessions->add([
    'profession' => 'Medecin',
    'age' => 'adulte'
])

echo $sessions->age(); // adulte
```

### Session::get($key)

Permet de renvoyer la valeur d'une variable en session

`$key` Le nom de la variable à appeler

```php
echo $sessions->get('prenom'); // Diani
```

### Session::get($key, $default = null)

Permet de renvoyer la valeur d'une variable en session

`$key` : C'est le nom de la clé de la variable à récuperer
`$default` : C'est la valeur par défaut au cas où cette variable n'existe pas

```php
echo $sessions->get('prenom'); // Diani
```

### Session::set($key, $value)

Permet de modifier ou de créer une nouvelle variable session

`$key` Le nom de la clé de la variable à créer ou à modifier
`$value` La valeur à mettre à jour

```php
echo $sessions->get('prenom'); // Diani
```

### Session::all()

Renvoi toutes les variables en session

```php
print_r($sessions->all());
/*
    Array
    (
        [id] => 1
        [nom] => Etokila
        [prenom] => Diani
        [sexe] => M
        [proffession] => Medecin
        [age] => adulte
    )
*/
```

### Session::keys()

Renvoi toutes les clés de variables

```php
print_r($sessions->keys());
/*
    Array
    (
        [0] => id
        [1] => nom
        [2] => prenom
        [3] => sexe
        [4] => proffession
        [5] => age
    )
*/
```

### Session::replace(array $parameters = [])

Remplace l'ancien tableau contenant des variables par un nouveau

`$parameters` Le tableau des nouveaux paramètres à remplacer

```php
$sessions->replace([
    'id' => '2'
    'nom' => 'Isao',
    'prenom' => 'Obed Sara Tabitha'
])
```

### Session::has($key)

Vérifie si la variable dont la clée passée en paramètre existe

`$key` Le nom de la variable en question

```php
echo $sessions->has('nom') ? "'nom' existe" : "N'existe pas"; // 'nom' existe
```

### Session::remove($key)

Supprime la varible passée en paramètre

`$key` Le nom de la variable en question

```php
$sessions->remove('prenom');
echo $sessions->has('prenom') ? "'nom' existe" : "N'existe pas"; // N'existe pas
```

### Session::count()

Renvoi le nombre de variables

```php
$parameters->count(); // 3
```