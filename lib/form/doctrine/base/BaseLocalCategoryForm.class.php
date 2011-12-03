<?php

/**
 * LocalCategory form base class.
 *
 * @method LocalCategory getObject() Returns the current form's model object
 *
 * @package    geo_search
 * @subpackage form
 * @author     Gustavo Lacoste <gustavo@lacosox.org>
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseLocalCategoryForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                    => new sfWidgetFormInputHidden(),
      'name'                  => new sfWidgetFormInputText(),
      'descripcion_categoria' => new sfWidgetFormInputText(),
      'url_icono_categoria'   => new sfWidgetFormInputText(),
      'created_at'            => new sfWidgetFormDateTime(),
      'updated_at'            => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'                    => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'name'                  => new sfValidatorString(array('max_length' => 255)),
      'descripcion_categoria' => new sfValidatorString(array('max_length' => 140, 'required' => false)),
      'url_icono_categoria'   => new sfValidatorString(array('max_length' => 140, 'required' => false)),
      'created_at'            => new sfValidatorDateTime(),
      'updated_at'            => new sfValidatorDateTime(),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorDoctrineUnique(array('model' => 'LocalCategory', 'column' => array('name')))
    );

    $this->widgetSchema->setNameFormat('local_category[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'LocalCategory';
  }

}
