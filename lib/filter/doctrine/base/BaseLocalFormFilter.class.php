<?php

/**
 * Local filter form base class.
 *
 * @package    PuntoSeguro
 * @subpackage filter
 * @author     Gustavo Lacoste <gustavo@lacosox.org>
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseLocalFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'nombre_local'      => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'descripcion_local' => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'category_id'       => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('LocalCategory'), 'add_empty' => true)),
      'comuna_id'         => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Comuna'), 'add_empty' => true)),
      'direccion'         => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'lat'               => new sfWidgetFormFilterInput(),
      'lng'               => new sfWidgetFormFilterInput(),
      'the_geom'          => new sfWidgetFormFilterInput(),
      'created_at'        => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'updated_at'        => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
    ));

    $this->setValidators(array(
      'nombre_local'      => new sfValidatorPass(array('required' => false)),
      'descripcion_local' => new sfValidatorPass(array('required' => false)),
      'category_id'       => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('LocalCategory'), 'column' => 'id')),
      'comuna_id'         => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Comuna'), 'column' => 'comuna_id')),
      'direccion'         => new sfValidatorPass(array('required' => false)),
      'lat'               => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'lng'               => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'the_geom'          => new sfValidatorPass(array('required' => false)),
      'created_at'        => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'updated_at'        => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
    ));

    $this->widgetSchema->setNameFormat('local_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Local';
  }

  public function getFields()
  {
    return array(
      'id_local'          => 'Number',
      'nombre_local'      => 'Text',
      'descripcion_local' => 'Text',
      'category_id'       => 'ForeignKey',
      'comuna_id'         => 'ForeignKey',
      'direccion'         => 'Text',
      'lat'               => 'Number',
      'lng'               => 'Number',
      'the_geom'          => 'Text',
      'created_at'        => 'Date',
      'updated_at'        => 'Date',
    );
  }
}
