<?php

/**
 * local actions.
 *
 * @package    geo_search
 * @subpackage local
 * @author     Gustavo Lacoste <gustavo@lacosox.org>
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class localActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $this->locals = Doctrine::getTable('Local')
      ->createQuery('a')
      ->execute();
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new LocalForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new LocalForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($local = Doctrine::getTable('Local')->find(array($request->getParameter('id_local'))), sprintf('Object local does not exist (%s).', $request->getParameter('id_local')));
    $this->form = new LocalForm($local);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $this->forward404Unless($local = Doctrine::getTable('Local')->find(array($request->getParameter('id_local'))), sprintf('Object local does not exist (%s).', $request->getParameter('id_local')));
    $this->form = new LocalForm($local);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($local = Doctrine::getTable('Local')->find(array($request->getParameter('id_local'))), sprintf('Object local does not exist (%s).', $request->getParameter('id_local')));
    $local->delete();

    $this->redirect('local/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $local = $form->save();

      $this->redirect('local/edit?id_local='.$local->getIdLocal());
    }
  }
  
    public function countActiveLocals()
    {
      $q = Doctrine_Query::create()
        ->from('Local l');

      return Doctrine::getTable('Local')->count();
    }  
  
}
