<?php

/**
 * buscador actions.
 *
 * @package    geo_search
 * @subpackage buscador
 * @author     Gustavo Lacoste <gustavo@lacosox.org>
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class buscadorActions extends sfActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeIndex(sfWebRequest $request)
  {
    $this->forward('default', 'module');
  }
  
 /**
  * Executes search action
  *
  * @param sfRequest $request A request object
  */
  public function executeSearch(sfWebRequest $request)
  {

      $this->find_loc=$request->getParameter('find_loc');
      $geocode_pending = true;
      while ($geocode_pending) {
            // hace una geocodificación con tendencia a Temuco
            $request_url = "http://maps.google.com/maps/api/geocode/xml?address=".urlencode($this->find_loc)."&latlng=-38.8890953,-72.9227855&bounds=-38.7674311,-72.8461155|-38.5524561,-72.4662816&region=CL&language=es&sensor=true";
            //echo $request_url;
            $xml = simplexml_load_file($request_url) or die("url not loading");
            
            $status = $xml->status;
            //echo $status;
            if (strcmp($status, "OK") == 0) {
              // Successful geocode
              $geocode_pending = false;
              $this->north  = $xml->result->geometry->bounds->northeast->lat[0];
              $this->south  = $xml->result->geometry->bounds->southwest->lat[0];
              $this->east  = $xml->result->geometry->bounds->northeast->lng[0];
              $this->west  = $xml->result->geometry->bounds->southwest->lng[0];
              $this->lat = $xml->result->geometry->location->lat[0];
              $this->lng = $xml->result->geometry->location->lng[0];
              $this->address =$xml->result->formatted_address[0];
              $this->error_geocodificacion="";
            } else if (strcmp($status, "OVER_QUERY_LIMIT") == 0) {
              // sent geocodes too fast
              $intentos++;
              $geocode_pending=true;
              sleep(2);
              if($intentos>2){
                  $this->error_geocodificacion="Nuestro sitio está colapsado de solicitudes, intentelo más tarde";
                  $geocode_pending = false;
              }
            } else {
              // failure to geocode
              $geocode_pending = false;
              $this->error_geocodificacion="No se pudo determinar la ubicación de <b>\"".$this->find_loc."\"</b>";
            }
      }
      
    $queryCategories=Doctrine_Query::create()->select('c.id, c.name')->from('LocalCategory c');
    $this->categories = $queryCategories->fetchArray();
    $this->filterCatArray = array(); // array with the category id for show the results 
    
    foreach ($this->categories as $category) {
      if($request->hasParameter('filterIn'.$category['id'])) $this->filterCatArray[]=$category['id']; // if filter is defined in the resquest parameter then the category id is added to $filterCatArray
    }      
      
    if($this->error_geocodificacion!=''){
        return sfView::ERROR;
    }else {
        
        $conn = Doctrine_Manager::connection();

        //$this->data2=$conn->execute("select id_local, nombre_local, descripcion_local, direccion, lat, lng from local WHERE (lng BETWEEN {$this->west} AND {$this->east} )AND (lat BETWEEN {$this->south} and {$this->north})")->fetchAll();
        $this->pager = new sfDoctrinePager('local', 2);
        $query=Doctrine::getTable('local')->createQuery('a')->where("(a.lng BETWEEN ? AND ?) AND (a.lat BETWEEN ? AND ?)", array($this->west, $this->east,$this->south,$this->north));

        
        
        
        
       // echo "<br><br>";
        //print_r($this->data2);
        if(count($this->filterCatArray)>0) $query->whereIn('a.category_id', $this->filterCatArray); // filter by category, $filterCatArray is a array with the category ids
        $query2= clone $query;
        $this->data=$query2->fetchArray();
             

          foreach ($this->data as &$local) {
            $local['descripcion_local']=json_decode($local['descripcion_local']); // if filter is defined in the resquest parameter then the category id is added to $filterCatArray
          }
        //print_r($this->data);
        
        $this->pager->setQuery($query);
        //$this->pager->setQuery(Doctrine::getTable('local')->createQuery('a'));
        $this->pager->setPage($request->getParameter('page'));
        $this->pager->init();
        
        #parameters is used in pagination for see the same params
        $this->parameters ='';
        foreach ($request->getParameterHolder()->getAll() as $param_name=>$param_val) {
          if(!in_array($param_name,array('action','module','page'))) $this->parameters.=$param_name.'='.$param_val.'&'; // if filter is defined in the resquest parameter then the category id is added to $filterCatArray
        }
        
        
        return sfView::SUCCESS;
    }
  }  
  
}
