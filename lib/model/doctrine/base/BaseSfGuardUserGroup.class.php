<?php
// Connection Component Binding
Doctrine_Manager::getInstance()->bindComponent('SfGuardUserGroup', 'doctrine');

/**
 * BaseSfGuardUserGroup
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $user_id
 * @property integer $group_id
 * @property timestamp $created_at
 * @property timestamp $updated_at
 * @property SfGuardGroup $SfGuardGroup
 * @property SfGuardUser $SfGuardUser
 * 
 * @method integer          getUserId()       Returns the current record's "user_id" value
 * @method integer          getGroupId()      Returns the current record's "group_id" value
 * @method timestamp        getCreatedAt()    Returns the current record's "created_at" value
 * @method timestamp        getUpdatedAt()    Returns the current record's "updated_at" value
 * @method SfGuardGroup     getSfGuardGroup() Returns the current record's "SfGuardGroup" value
 * @method SfGuardUser      getSfGuardUser()  Returns the current record's "SfGuardUser" value
 * @method SfGuardUserGroup setUserId()       Sets the current record's "user_id" value
 * @method SfGuardUserGroup setGroupId()      Sets the current record's "group_id" value
 * @method SfGuardUserGroup setCreatedAt()    Sets the current record's "created_at" value
 * @method SfGuardUserGroup setUpdatedAt()    Sets the current record's "updated_at" value
 * @method SfGuardUserGroup setSfGuardGroup() Sets the current record's "SfGuardGroup" value
 * @method SfGuardUserGroup setSfGuardUser()  Sets the current record's "SfGuardUser" value
 * 
 * @package    PuntoSeguro
 * @subpackage model
 * @author     Gustavo Lacoste <gustavo@lacosox.org>
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseSfGuardUserGroup extends sfMapFishRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('sf_guard_user_group');
        $this->hasColumn('user_id', 'integer', 8, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => true,
             'autoincrement' => false,
             'length' => 8,
             ));
        $this->hasColumn('group_id', 'integer', 8, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => true,
             'autoincrement' => false,
             'length' => 8,
             ));
        $this->hasColumn('created_at', 'timestamp', 25, array(
             'type' => 'timestamp',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 25,
             ));
        $this->hasColumn('updated_at', 'timestamp', 25, array(
             'type' => 'timestamp',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 25,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('SfGuardGroup', array(
             'local' => 'group_id',
             'foreign' => 'id'));

        $this->hasOne('SfGuardUser', array(
             'local' => 'user_id',
             'foreign' => 'id'));
    }
}