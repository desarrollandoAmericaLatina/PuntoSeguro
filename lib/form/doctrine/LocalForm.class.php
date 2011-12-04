<?php

/**
 * Local form.
 *
 * @package    geo_search
 * @subpackage form
 * @author     Gustavo Lacoste <gustavo@lacosox.org>
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class LocalForm extends BaseLocalForm
{
  public function configure()
  {
    $this->widgetSchema->setLabels(array(
      'nombre_local'    => 'Tema o Discusión',
      'descripcion_local'  => 'Descripción',
      'direccion'   => 'Dirección',
      'category_id'   => 'Categoría'       
    ));
    $this->getWidget('lat')->setAttribute('style', 'display: none');
    $this->getWidget('lng')->setAttribute('style', 'display: none');
    $this->setValidators(array(
      'id_local'          => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id_local')), 'empty_value' => $this->getObject()->get('id_local'), 'required' => false)),        
      'nombre_local'  => new sfValidatorString(array('required' => true,'trim'=>true,'max_length' => 140,'min_length' => 3), array(
        'required'   => 'Debes escribir el nombre de la temática o discusión',
        'min_length' => 'El nombre "%value%" es demasiado corto. Su longitud debe ser al menos de %min_length% caracteres.',
        'max_length' => 'El nombre "%value%" es demasiado largo. Su longitud debe ser al menos de %max_length% caracteres.',
      )),
      'descripcion_local'   => new sfValidatorString(array('required' => true,'trim'=>true,'max_length' => 140,'min_length' => 3), array(
        'required'   => 'Debes escribir una descripción para esta temática',
        'min_length' => 'La descripción es demasiado corta. Su longitud debe ser al menos de %min_length% caracteres.',
        'max_length' => 'La descripción es demasiado larga. Su longitud debe ser al menos de %max_length% caracteres.',
      )),
      'direccion'  => new sfValidatorString(array('required' => true,'trim'=>true,'min_length' => 3), array(          
        'required'   => 'Debes escribir una dirección para este tema o discusión aún cuando no pueda ser determinada por el mapa, recuerda posicionar el marcador del mapa en la posición geográfica correspondiente ya que dicha posición indicará dónde mostrar la discusión a los usuarios independiente de la dirección que definas en el campo dirección.',
        'min_length' => 'La dirección es demasiado corta. Su longitud debe ser al menos de %min_length% caracteres. En caso de que el punto geográfico no tenga dirección escribe (S/D)'
      )),
        
      'category_id'       => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('LocalCategory'))),        
        
      'lat'               => new sfValidatorNumber(array('required' => false)),
      'lng'               => new sfValidatorNumber(array('required' => false)),
    ));

    
    $this->widgetSchema['descripcion_local'] = new sfWidgetFormTextareaTinyMCE(array(
      'width'  => 631,
      'height' => 350,
      'config' => 'theme_advanced_disable: "anchor,image,cleanup,help",theme_advanced_resizing : false',
        
    ));

    $this->widgetSchema->setLabel('descripcion_local','Descripción');

    
    unset($this['the_geom']);
    $this->disableCSRFProtection();
    
  }
}
