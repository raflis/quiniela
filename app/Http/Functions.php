<?php

function calculate_hits($forecast1, $forecast2, $result1, $result2)
{
    if($forecast1 == 'NO' || $forecast2 == 'NO'):
        return NULL;
    else:
        if(($forecast1 == $result1) and ($forecast2 == $result2)): //marcador exacto
            return '3 puntos';
        elseif(($forecast1 == $forecast2) and ($result1 == $result2)): //empate
            return '1 punto';
        elseif((($forecast1 - $forecast2) < 0) and (($result1 - $result2) < 0)): //ganador
            return '1 punto';
        elseif((($forecast1 - $forecast2) > 0) and (($result1 - $result2) > 0)): //ganador
            return '1 punto';
        else:
            return NULL;
        endif;
    endif;
}

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

function phases()
{
    $phases = [
        'Octavos de final' => 'Octavos de final',
        'Cuartos de final' => 'Cuartos de final',
        'Semifinales' => 'Semifinales',
        'Tercer lugar' => 'Tercer lugar',
        'Final' => 'Final',
    ];
    return $phases;
}

function countries()
{
    $countries = [
        'Afganistán' => 'Afganistán',
        'Åland' => 'Åland',
        'Albania' => 'Albania',
        'Alemania' => 'Alemania',
        'Andorra' => 'Andorra',
        'Angola' => 'Angola',
        'Anguila' => 'Anguila',
        'Antártico' => 'Antártico',
        'Antigua y Barbuda' => 'Antigua y Barbuda',
        'Arabia Saudita' => 'Arabia Saudita',
        'Argelia' => 'Argelia',
        'Argentina' => 'Argentina',
        'Armenia' => 'Armenia',
        'Aruba' => 'Aruba',
        'Australia' => 'Australia',
        'Austria' => 'Austria',
        'Azerbaiyán' => 'Azerbaiyán',
        'Bahamas' => 'Bahamas',
        'Bahréin' => 'Bahréin',
        'Bangladesh' => 'Bangladesh',
        'Barbados' => 'Barbados',
        'Bélgica' => 'Bélgica',
        'Belice' => 'Belice',
        'Benín' => 'Benín',
        'Bermudas' => 'Bermudas',
        'Bielorrusia' => 'Bielorrusia',
        'Bolivia' => 'Bolivia',
        'Bonaire, San Estaquio y Saba' => 'Bonaire, San Estaquio y Saba',
        'Bosnia-Herzegovina' => 'Bosnia-Herzegovina',
        'Botsuana' => 'Botsuana',
        'Brasil' => 'Brasil',
        'Brunei Darussalam' => 'Brunei Darussalam',
        'Bulgaria' => 'Bulgaria',
        'Burkina Faso' => 'Burkina Faso',
        'Burundi' => 'Burundi',
        'Bután' => 'Bután',
        'Cabo Verde' => 'Cabo Verde',
        'Camboya' => 'Camboya',
        'Camerún' => 'Camerún',
        'Canadá' => 'Canadá',
        'Chad' => 'Chad',
        'Chile' => 'Chile',
        'China (República Popular)' => 'China (República Popular)',
        'Chipre' => 'Chipre',
        'Ciudad del Vaticano' => 'Ciudad del Vaticano',
        'Colombia' => 'Colombia',
        'Comoras' => 'Comoras',
        'Congo (República del)' => 'Congo (República del)',
        'Corea, Republica de' => 'Corea, Republica de',
        'Costa de Marfil' => 'Costa de Marfil',
        'Costa Rica' => 'Costa Rica',
        'Croacia' => 'Croacia',
        'Curasao' => 'Curasao',
        'Dinamarca' => 'Dinamarca',
        'Dominica' => 'Dominica',
        'Ecuador' => 'Ecuador',
        'Egipto' => 'Egipto',
        'El Salvador' => 'El Salvador',
        'Emiratos Árabes Unidos' => 'Emiratos Árabes Unidos',
        'Eritrea' => 'Eritrea',
        'Eslovaquia' => 'Eslovaquia',
        'Eslovenia' => 'Eslovenia',
        'España' => 'España',
        'Estados Unidos de America' => 'Estados Unidos de America',
        'Estonia' => 'Estonia',
        'Etiopía' => 'Etiopía',
        'Filipinas' => 'Filipinas',
        'Finlandia' => 'Finlandia',
        'Fiyi' => 'Fiyi',
        'Francia' => 'Francia',
        'Gabón' => 'Gabón',
        'Gambia' => 'Gambia',
        'Georgia' => 'Georgia',
        'Ghana' => 'Ghana',
        'Gibraltar' => 'Gibraltar',
        'Granada' => 'Granada',
        'Grecia' => 'Grecia',
        'Groenlandia' => 'Groenlandia',
        'Guadalupe' => 'Guadalupe',
        'Guam' => 'Guam',
        'Guatemala' => 'Guatemala',
        'Guayana Francesa' => 'Guayana Francesa',
        'Guernesey' => 'Guernesey',
        'Guinea' => 'Guinea',
        'Guinea Ecuatorial' => 'Guinea Ecuatorial',
        'Guinea-Bissau' => 'Guinea-Bissau',
        'Guyana' => 'Guyana',
        'Haití' => 'Haití',
        'Honduras' => 'Honduras',
        'Hong Kong' => 'Hong Kong',
        'Hungría' => 'Hungría',
        'India' => 'India',
        'Indonesia' => 'Indonesia',
        'Iraq' => 'Iraq',
        'Irlanda' => 'Irlanda',
        'Isla Bouvet' => 'Isla Bouvet',
        'Isla de Jersey' => 'Isla de Jersey',
        'Isla de Man' => 'Isla de Man',
        'Isla de Navidad' => 'Isla de Navidad',
        'Isla Norfolk' => 'Isla Norfolk',
        'Islandia' => 'Islandia',
        'Islas Caimán' => 'Islas Caimán',
        'Islas Cocos' => 'Islas Cocos',
        'Islas Cook' => 'Islas Cook',
        'Islas Feroe' => 'Islas Feroe',
        'Islas Georgias del Sur y Sandwich del Sur' => 'Islas Georgias del Sur y Sandwich del Sur',
        'Islas Heard y McDonald' => 'Islas Heard y McDonald',
        'Islas Malvinas' => 'Islas Malvinas',
        'Islas Marianas del Norte' => 'Islas Marianas del Norte',
        'Islas Marshall' => 'Islas Marshall',
        'Islas menores alejadas de los Estados Unidos' => 'Islas menores alejadas de los Estados Unidos',
        'Islas Pitcairn' => 'Islas Pitcairn',
        'Islas Salomón' => 'Islas Salomón',
        'Islas Svalbard y Jan Mayen' => 'Islas Svalbard y Jan Mayen',
        'Islas Turcas y Caicos' => 'Islas Turcas y Caicos',
        'Islas Vírgenes Británicas' => 'Islas Vírgenes Británicas',
        'Islas Vírgenes de los Estados Unidos' => 'Islas Vírgenes de los Estados Unidos',
        'Israel' => 'Israel',
        'Italia' => 'Italia',
        'Jamaica' => 'Jamaica',
        'Japón' => 'Japón',
        'Jordania' => 'Jordania',
        'Kazajistán' => 'Kazajistán',
        'Kenia' => 'Kenia',
        'Kirguistán' => 'Kirguistán',
        'Kiribati' => 'Kiribati',
        'Kuwait' => 'Kuwait',
        'Laos' => 'Laos',
        'Lesotho' => 'Lesotho',
        'Letonia' => 'Letonia',
        'Líbano' => 'Líbano',
        'Liberia' => 'Liberia',
        'Libia' => 'Libia',
        'Liechtenstein' => 'Liechtenstein',
        'Lituania' => 'Lituania',
        'Luxemburgo' => 'Luxemburgo',
        'Macao' => 'Macao',
        'Macedonia (República de)' => 'Macedonia (República de)',
        'Madagascar' => 'Madagascar',
        'Malasia' => 'Malasia',
        'Malawi' => 'Malawi',
        'Maldivas' => 'Maldivas',
        'Malí' => 'Malí',
        'Malta' => 'Malta',
        'Marruecos' => 'Marruecos',
        'Martinica' => 'Martinica',
        'Mauricio' => 'Mauricio',
        'Mauritania' => 'Mauritania',
        'Mayotte' => 'Mayotte',
        'México' => 'México',
        'Micronesia (Estados Federados de)' => 'Micronesia (Estados Federados de)',
        'Moldavia' => 'Moldavia',
        'Mónaco' => 'Mónaco',
        'Mongolia' => 'Mongolia',
        'Montenegro' => 'Montenegro',
        'Montserrat' => 'Montserrat',
        'Mozambique' => 'Mozambique',
        'Myanmar' => 'Myanmar',
        'Namibia' => 'Namibia',
        'Nauru' => 'Nauru',
        'Nepal' => 'Nepal',
        'Nicaragua' => 'Nicaragua',
        'Níger' => 'Níger',
        'Nigeria' => 'Nigeria',
        'Niue' => 'Niue',
        'Noruega' => 'Noruega',
        'Nueva Caledonia' => 'Nueva Caledonia',
        'Nueva Zelanda' => 'Nueva Zelanda',
        'Omán' => 'Omán',
        'Países Bajos (Holanda)' => 'Países Bajos (Holanda)',
        'Pakistán' => 'Pakistán',
        'Palau' => 'Palau',
        'Palestina' => 'Palestina',
        'Panamá' => 'Panamá',
        'Papúa Nueva Guinea' => 'Papúa Nueva Guinea',
        'Paraguay' => 'Paraguay',
        'Perú' => 'Perú',
        'Polinesia Francesa' => 'Polinesia Francesa',
        'Polonia' => 'Polonia',
        'Portugal' => 'Portugal',
        'Puerto Rico' => 'Puerto Rico',
        'Qatar' => 'Qatar',
        'Reino Unido de Gran Bretaña e Irlanda del Norte' => 'Reino Unido de Gran Bretaña e Irlanda del Norte',
        'República Centroafricana' => 'República Centroafricana',
        'República Checa' => 'República Checa',
        'República Democrática del Congo' => 'República Democrática del Congo',
        'República Dominicana' => 'República Dominicana',
        'Reunión' => 'Reunión',
        'Ruanda' => 'Ruanda',
        'Rumania' => 'Rumania',
        'Rusia' => 'Rusia',
        'Sahara Occidental' => 'Sahara Occidental',
        'Saint Barthélemy' => 'Saint Barthélemy',
        'Samoa Americana' => 'Samoa Americana',
        'Samoa del Oeste' => 'Samoa del Oeste',
        'San Cristóbal y Nieves' => 'San Cristóbal y Nieves',
        'San Marino' => 'San Marino',
        'San Martín (parte francesa)' => 'San Martín (parte francesa)',
        'San Martín (Sint Maarten)' => 'San Martín (Sint Maarten)',
        'San Pedro y Miquelón' => 'San Pedro y Miquelón',
        'San Vicente y las Granadinas' => 'San Vicente y las Granadinas',
        'Santa Helena' => 'Santa Helena',
        'Santa Lucía' => 'Santa Lucía',
        'Santo Tomé y Príncipe' => 'Santo Tomé y Príncipe',
        'Senegal' => 'Senegal',
        'Serbia' => 'Serbia',
        'Seychelles' => 'Seychelles',
        'Sierra Leona' => 'Sierra Leona',
        'Singapur' => 'Singapur',
        'Somalia' => 'Somalia',
        'Sri Lanka' => 'Sri Lanka',
        'Sudáfrica' => 'Sudáfrica',
        'Sudán' => 'Sudán',
        'Sudán del Sur' => 'Sudán del Sur',
        'Suecia' => 'Suecia',
        'Suiza' => 'Suiza',
        'Surinam' => 'Surinam',
        'Swazilandia' => 'Swazilandia',
        'Tailandia' => 'Tailandia',
        'Taiwán' => 'Taiwán',
        'Tanzania' => 'Tanzania',
        'Tayikistán' => 'Tayikistán',
        'Territorio Británico en el Océano Índico' => 'Territorio Británico en el Océano Índico',
        'Territorios Australes Franceses' => 'Territorios Australes Franceses',
        'Timor Oriental' => 'Timor Oriental',
        'Togo' => 'Togo',
        'Tokelau' => 'Tokelau',
        'Tonga' => 'Tonga',
        'Trinidad y Tobago' => 'Trinidad y Tobago',
        'Túnez' => 'Túnez',
        'Turkmenistán' => 'Turkmenistán',
        'Turquía' => 'Turquía',
        'Tuvalu' => 'Tuvalu',
        'Ucrania' => 'Ucrania',
        'Uganda' => 'Uganda',
        'Uruguay' => 'Uruguay',
        'Uzbekistán' => 'Uzbekistán',
        'Vanuatu' => 'Vanuatu',
        'Venezuela' => 'Venezuela',
        'Vietnam' => 'Vietnam',
        'Wallis y Futuna' => 'Wallis y Futuna',
        'Yemen' => 'Yemen',
        'Yibuti' => 'Yibuti',
        'Zambia' => 'Zambia',
        'Zimbabue' => 'Zimbabue'
    ];
    return $countries;
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