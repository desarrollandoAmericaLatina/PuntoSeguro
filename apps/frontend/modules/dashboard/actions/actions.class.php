<?php

/**
 * dashboard actions.
 *
 * @package    geo_search
 * @subpackage dashboard
 * @author     Gustavo Lacoste <gustavo@lacosox.org>
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class dashboardActions extends sfActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeIndex(sfWebRequest $request)
  {
   // $this->forward('default', 'module');
  }
  
 /**
  * Registro de nuevo punto
  *
  * @param sfRequest $request A request object
  */
  public function executeNewLocal(sfWebRequest $request)
  {
  
  }  
  
}
