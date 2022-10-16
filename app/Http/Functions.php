<?php

function getRole($id)
{
    $roles = [
        '1' => 'Usuario',
        '0' => 'Administrador'
    ];
    
    return $roles[$id];
}

function getStatus($value)
{
    $status = [
        'PUBLISHED' => 'Publicado',
        'DRAFT' => 'Borrador',
    ];
    return $status[$value];
}

function zero_fill($valor, $long = 0)
{
    return str_pad($valor, $long, '0', STR_PAD_LEFT);
}

function outP($text)
{
    $text = str_replace(array("<p>","</p>"), "", $text);
    return $text;
}