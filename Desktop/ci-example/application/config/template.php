<?php  if (!defined('BASEPATH')) exit('No direct script access allowed');
 
$template['active_template'] = 'default';
 
 
$template['default']['template'] = 'template';
$template['default']['regions'] = array(
 'header' => array('content' => array('<h1>Cook Books</h1>')),
 'title',
 'content',
 'sidebar',
 'footer'=>array('content' => array('<p id="copyright">© Grupo De Desarrollo RSG</p>')),
);
$template['default']['parser'] = 'parser';
$template['default']['parser_method'] = 'parse';
$template['default']['parse_template'] = FALSE; 
 
//definimos una plantilla para el formulario de registro
$template['registro']['template'] = 'indexPrincipal/indexPrincipal';
$template['registro']['regions'] = array(
 'header',
 'title',
 'content',
 'sidebar',
 'footer',
);
$template['registro']['parser'] = 'parser';
$template['registro']['parser_method'] = 'parse';
$template['default']['parse_template'] = FALSE;
 
/* End of file template.php */
/* Location: ./system/application/config/template.php */
