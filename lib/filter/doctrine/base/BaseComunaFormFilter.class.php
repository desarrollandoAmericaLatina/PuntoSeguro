<?php

/**
 * Comuna filter form base class.
 *
 * @package    PuntoSeguro
 * @subpackage filter
 * @author     Gustavo Lacoste <gustavo@lacosox.org>
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseComunaFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'comuna_nombre'       => new sfWidgetFormFilterInput(),
      'comuna_provincia_id' => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'comuna_nombre'       => new sfValidatorPass(array('required' => false)),
      'comuna_provincia_id' => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
    ));

    $this->widgetSchema->setNameFormat('comuna_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Comuna';
  }

  public function getFields()
  {
    return array(
      'comuna_id'           => 'Number',
      'comuna_nombre'       => 'Text',
      'comuna_provincia_id' => 'Number',
    );
  }
}
