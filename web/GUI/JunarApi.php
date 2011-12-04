﻿<?php

class DataStream {

    private $authkey   = '28553bfe4d6781021bf6281687fcfb4805eb9b1d';
    private $guid     = '';
    private $baseURI  = 'http://apisandbox.junar.com';
    private $response = null;

    /**
     * for default junar json leave output blank, its structure is explained here http://wiki.junar.com/index.php/API#JSON_Structure
     * other options are: 
     * - prettyjson
     * - json_array, basic javascript array of arrays
     * - csv
     * - tsv
     * - excel
     */

    private $output   = '';

    public function __construct($guid){
        $this->guid = $guid;
    }

    public function getGuid(){
        return $this->guid;
    }

    public function invoke($params = array(), $output = ''){
        // create the URL
        $i = 0;
        $query = array();
        foreach ($params as $param) {
            $query["pArgument$i"] = $param;
            $i++;
        }

        if ($output != '') {
            $this->output = $output;
            $query['output'] = $output;
        }

        $query['auth_key'] = $this->authkey;
        $url = "/datastreams/invoke/{$this->guid}?" . http_build_query($query);
        return $this->callURI($url);
    }

    public function info(){
        // create the URL
        $url = "/datastreams/{$this->guid}?auth_key={$this->authkey}";
        return $this->callURI($url);
    }

    public function callURI($url) {
        // get the url
        // you could also use cURL here, it has better performance but i dont
        // know if you have cURL installed
        $response = file_get_contents($this->baseURI . $url);

        // parsing the content
        if (in_array($this->output, array('', 'prettyjson', 'json_array'))) {
            $this->response = @json_decode($response, true);
        }
        return $this->response;
    }
	
	public function getResponse(){
	 return $this->response;
	}
	
}
#descripcion, tasa 2010, tasa variacion
function get_info_data($comuna, $limit){
	
 set_time_limit($limit);

 $ds = new DataStream('VIOLA-2010-STATS-POR-COMUN');
	$ds->invoke(array(), 'json_array');
	$data = $ds->getResponse();
	
	return $data;
}
 //---------------------------------------------------------------
 #echo "<br />";  
 //---------------------------------------------------------------
 
function get_info_data_homic($comuna, $limit){
	
	set_time_limit($limit);
	
 $ds = new DataStream('HOMIC-2010-STATS-POR-COMUN');
 $ds->invoke(array(), 'json_array');
 $data = $ds->getResponse();
 
 return $data;
}
 //---------------------------------------------------------------- 
 #echo "<br />";  
 //---------------------------------------------------------------
 
function get_info_data_hurto($comuna, $limit){
	
	set_time_limit($limit);
	
 $ds = new DataStream('HURTO-2010-STATS-POR-COMUN');
 $ds->invoke(array(), 'json_array');
 $data = $ds->getResponse();
 
 return $data;
}
 //---------------------------------------------------------------- 
 #echo "<br />";  
 //---------------------------------------------------------------
 
function get_info_data_robo($comuna, $limit){
	
	set_time_limit($limit);
	
 $ds = new DataStream('ROBOS-CON-STATS-POR-COMUN');
 $ds->invoke(array(), 'json_array');
 $data = $ds->getResponse();
 
 return $data;
}
 //----------------------------------------------------------------
 #echo "<br />";  
 //---------------------------------------------------------------
 
function get_info_data_rlnh($comuna, $limit){
	
	set_time_limit($limit);
	
 $ds = new DataStream('RLNH-CHILE-STATS-POR-COMUN');
 $ds->invoke(array(), 'json_array');
 $data = $ds->getResponse();
 
 return $data;
}
 //----------------------------------------------------------------
 #echo "<br />";  
 //---------------------------------------------------------------
 
function get_info_data_rcf($comuna, $limit){
	
	set_time_limit($limit);
	
 $ds = new DataStream('RCF-CHILE-STATS-POR-COMUN');
 $ds->invoke(array(), 'json_array');
 $data = $ds->getResponse();
 
 return $data;
}
 //----------------------------------------------------------------
 # echo "<br />";  
 //---------------------------------------------------------------
 
function get_info_data_rcs($comuna, $limit){
	
	set_time_limit($limit);
	
 $ds = new DataStream('RCS-CHILE-STATS-POR-COMUN');
 $ds->invoke(array(), 'json_array');
 $data = $ds->getResponse();
 
 return $data;
}
 //----------------------------------------------------------------
 # echo "<br />";  
 //---------------------------------------------------------------
 
function get_info_data_rcv($comuna, $limit){
	
	set_time_limit($limit);
	
 $ds = new DataStream('RCV-2010-STATS-POR-COMUN');
 $ds->invoke(array(), 'json_array');
 $data = $ds->getResponse();
 
 return $data;
}
?>