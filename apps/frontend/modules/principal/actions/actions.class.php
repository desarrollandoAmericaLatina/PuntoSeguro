<?php

/**
 * principal actions.
 *
 * @package    geo_search
 * @subpackage principal
 * @author     Gustavo Lacoste <gustavo@lacosox.org>
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class principalActions extends sfActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeIndex(sfWebRequest $request)
  {
       $this->localsList = Doctrine::getTable('Local')->findAll();


  }

 /**
  * El home inicial que ve un encuestador al iniciar session action
  *
  * @param sfRequest $request A request object
  */
  public function executeHome(sfWebRequest $request)
  {
       return sfView::SUCCESS;

  }



}
