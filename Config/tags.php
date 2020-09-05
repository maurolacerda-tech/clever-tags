<?php

return [
    'name' => 'Tags',
    'controller' => 'TagsController',
    'actions' => 'get;index,get;create;create,post;store;store,get;edit;edit/{tag},put;update;{tag},delete;destroy;{tag}',
    'fields' => 'name',
    'menu' => true,
    'author' => 'Mauro Lacerda - contato@maurolacerda.com.br',
    'folder' => 'tags'
];