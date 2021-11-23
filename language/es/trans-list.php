<?php
/*
NESSSSSSSSSSSS
Variables disponibles
% plural_name%: nombre de categoría en plural (p. ej., restaurantes mexicanos)
% page% - el número de página
% limit%: el número de elementos por página
% state_name% - el nombre del estado
% state_abbr%: abreviatura de estado de dos letras (por ejemplo, CA)
% city_name% - el nombre de la ciudad
% Neighborhood_name% - el nombre del vecindario
% meta_desc_str%: esta variable se reemplazará con los primeros 3 nombres comerciales (p. ej., "Joey's place, Jane's Café, Mike's Joint")
*/

// case: category = defined, location = country (e.g. mexican restaurant in United States)
$txt_html_title_1 = "%plural_name% en %default_country% - Pagina %page%";
$txt_meta_desc_1  = "%plural_name% populares en la cuidad de La Paz. Mostrando %limit% resultados en la página %page%. %meta_desc_str% y otros.";

// case: category = defined, state = defined (e.g. mexican restaurant in California)
$txt_html_title_2 = "%plural_name% en %state_name% - Pagina %page%";
$txt_meta_desc_2  = "%plural_name% populares en %state_name%. Mostrando %limit% resultados en la página %page%. %meta_desc_str% y otros.";

// case: category = undefined, state = defined (e.g. all types of venues in California)
$txt_html_title_3 = "Lugares populares en %state_name% - Pagina %page%";
$txt_meta_desc_3  = "Lugares populares en %state_name%. Mostrando %limit% resultados en la página %page%. %meta_desc_str% y otros.";

// case: category = defined, city = defined (e.g. mexican restaurant in Los Angeles)
$txt_html_title_4 = "%plural_name% en %city_name%, %state_abbr% - Pagina %page%";
$txt_meta_desc_4  = "%plural_name% populares en %city_name%. Mostrando %limit% resultados en la página %page%. %meta_desc_str% y otros.";

// case: category = undefined, city = defined (e.g. all types of venues in Los Angeles)
$txt_html_title_5 = "Lugares populares en %city_name% - Pagina %page%";
$txt_meta_desc_5  = "Lugares populares en %city_name%. Mostrando %limit% resultados en la página %page%. %meta_desc_str% y otros.";

// case: category = defined, neighborhood = defined (e.g. mexican restaurant in Downtown)
$txt_html_title_6 = "%plural_name% en %neighborhood_name%, %city_name%, %state_abbr% - Pagina %page%";
$txt_meta_desc_6  = "%plural_name% populares en %neighborhood_name%, %city_name%. Mostrando %limit% resultados en la página %page%. %meta_desc_str% y otros.";

// case: category = undefined, neighborhood = defined (e.g. all types of venues in Downtown)
$txt_html_title_7 = "Lugares populares en %neighborhood_name%, %city_name% - Pagina %page%";
$txt_meta_desc_7  = "Lugares populares en %neighborhood_name%, %city_name%. Mostrando %limit% resultados en la página %page%. %meta_desc_str% y otros.";

$txt_results          = "Resultado(s)";
$txt_temp_empty_msg_1 = "Tu búsqueda tuvo 0 resultados.";
$txt_temp_empty_msg_2 = "Si deseas enlistar tu negocio en esta categoría, por favor haz clic a continuación:";
$txt_temp_empty_msg_3 = "Enlistar negocio";
$txt_pager_page1      = "Página 1";
$txt_pager_lastpage   = "Última página";