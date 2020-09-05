# clever-tags
Módulo de criação de tag do CMS da cleverweb.com.br

## Instalação
```
composer require maurolacerda-tech/clever-tags:dev-master
```
```
php artisan migrate
```

## Opcionais
Você poderá públicar os arquivos de visualização padrão em seu diretório views/vendor/Tag

```
php artisan vendor:publish --provider="Modules\Tags\Providers\TagServiceProvider" --tag=views
```


Para públicar os arquivos de configurações.

```
php artisan vendor:publish --provider="Modules\Tags\Providers\TagServiceProvider" --tag=config
```

