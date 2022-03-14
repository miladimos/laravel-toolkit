- [![Starts](https://img.shields.io/github/stars/miladimos/laravel-toolkit?style=flat&logo=github)](https://github.com/miladimos/laravel-toolkit/forks)
- [![Forks](https://img.shields.io/github/forks/miladimos/laravel-toolkit?style=flat&logo=github)](https://github.com/miladimos/laravel-toolkit/stargazers)

- [فارسی](README-fa.md)

## Installation

`composer require miladimos/laravel-toolkit`

##### Install Package Configs

`php artisan toolkit:install`


##### Create new helper file

`php artisan make:helper {name}`

default name is: helpers

if you want create empty helper file use -e|--empty option

##### Register helper methods globally

in composer.php file:

```php
"autoload": {
    "files": [
        "pathToHelperFile.php" // app/Helpers/helpers.php
    ],
    ...
},
```

#### Helper Traits

``Miladimos\Toolkit\Traits\RouteKeyNameUUID``

``Miladimos\Toolkit\Traits\HasUUID``

``Miladimos\Toolkit\Traits\HasTimestamps``

``Miladimos\Toolkit\Traits\HasTags``

``Miladimos\Toolkit\Traits\HasJWT``

``Miladimos\Toolkit\Traits\HasAuthor``

``Miladimos\Toolkit\Traits\HasComment``

``Miladimos\Toolkit\Traits\GetConstantsEnum``

``Miladimos\Toolkit\Traits\ApiResponder``


