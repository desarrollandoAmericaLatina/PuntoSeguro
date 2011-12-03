<?php


class LocalTable extends sfMapFishTable
{
    
    public static function getInstance()
    {
        return Doctrine_Core::getTable('Local');
    }
    
      public function countActiveLocals(Doctrine_Query $q = null)
      {
          echo "AAA";
        return $this->addActiveLocalsQuery($q)->count();
      }
    
      public function addActiveLocalsQuery(Doctrine_Query $q = null)
      {
        if (is_null($q))
        {
          $q = Doctrine_Query::create()
            ->from('Local l');
        }

        $alias = $q->getRootAlias();

        $q->addOrderBy($alias . '.nombre_local DESC');

        return $q;
      }
      
      
}