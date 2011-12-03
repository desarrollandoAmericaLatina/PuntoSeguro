<?php

/**
 * Local form base class.
 *
 * @method Local getObject() Returns the current form's model object
 *
 * @package    geo_search
 * @subpackage form
 * @author     Gustavo Lacoste <gustavo@lacosox.org>
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseLocalForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id_local'          => new sfWidgetFormInputHidden(),
      'nombre_local'      => new sfWidgetFormInputText(),
      'descripcion_local' => new sfWidgetFormInputText(),
      'category_id'       => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('LocalCategory'), 'add_empty' => false)),
      'direccion'         => new sfWidgetFormInputText(),
      'lat'               => new sfWidgetFormInputText(),
      'lng'               => new sfWidgetFormInputText(),
      'the_geom'          => new sfWidgetFormTextarea(),
      'created_at'        => new sfWidgetFormDateTime(),
      'updated_at'        => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id_local'          => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id_local')), 'empty_value' => $this->getObject()->get('id_local'), 'required' => false)),
      'nombre_local'      => new sfValidatorString(array('max_length' => 140)),
      'descripcion_local' => new sfValidatorString(array('max_length' => 140)),
      'category_id'       => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('LocalCategory'))),
      'direccion'         => new sfValidatorString(array('max_length' => 80)),
      'lat'               => new sfValidatorNumber(array('required' => false)),
      'lng'               => new sfValidatorNumber(array('required' => false)),
      'the_geom'          => new sfValidatorString(array('required' => false)),
      'created_at'        => new sfValidatorDateTime(),
      'updated_at'        => new sfValidatorDateTime(),
    ));

    $this->widgetSchema->setNameFormat('local[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Local';
  }

}
