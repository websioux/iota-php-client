<?php

/* Class to handle NXT API request */

class CIotaApi {


	public function __construct(){
		$this->timeout = 7;
		$this->bOutputRequest = false;
		$sNode=defined('IOTA_NODE')?IOTA_NODE:'http://127.0.0.1:14265';
		if(substr($sNode,0,4)=='http') {
			list($this->protocol,$this->host,$this->nxt_port) = explode(':',$sNode); //
			$this->host = str_replace('//','',$this->host);
		}
		else {
			list($this->protocol,$this->host) = explode(':',$sNode); //
			if(strpos($this->host,'@')>0)
				list($this->user,$this->host) = explode('@',$this->host); //
		}
	}

	/* Make the request with to the IOTA server
	 * $this->aInput is a key/value pair array of the API query or a string of the type key1=val1&key2=val2...
	 * returns the NXT response string (json)
	 */ 
	protected function _request(){
		if(empty($this->aInput))
			die('error: you must specify input to request API '."\n");
		if(!empty($this->timeout))
			$sTimeOut = 'timeout '.$this->timeout;
		else
			$sTimeOut = '';
		$sQuery = json_encode($this->aInput);
			switch($this->protocol) {
				case 'https':
				case 'http':
					// curl http://localhost:14265 -X POSTcurl http://localhost:14265 -X POST -H 'Content-Type: application/json' -d '{"command": "getNeighbors"}'
					$this->sCmd = $sTimeOut.' curl -sk '.$this->protocol.'://'. $this->host .':'.$this->nxt_port.' -X POST -H \'Content-Type: application/json\' -d \''.$sQuery.'\'';
					break;
				case 'ssh':
					if(in_array($this->host,array('127.0.0.1','localhost')))
						$this->sCmd = $sTimeOut.' '. PHP_LIB .'commands/bootstrap -http -json "' . $sQuery.'"';
					else
						$this->sCmd = $sTimeOut.' ssh '.$this->user.'@'. $this->host .' '. EXTERNAL_NODE_PHP_LIB .'commands/bootstrap -http -json "' . $sQuery.'"';
					break;
			}
			if($this->bOutputRequest)
				echo "Request : ".$this->sCmd."\n";
			$sJson = exec($this->sCmd);
			return $sJson;
		}

    /* function to be used to obtain request response.
     * It treats the API response object based on $attribute 
     * - if $attribute is an array => returns array of value
     * - if $attribute is a string => returns string value 
     * - if $attribute is empty => returns the full response object 
    */ 
	function getResponse($attribute='') {
		$sResp = $this->_request();
		if(empty($sResp)) {
			$this->oResponse = new stdClass;
			$this->oResponse->errorCode=1;
			$this->oResponse->errorDescription='IOTA node Timeout';
			return $this->oResponse;
		}
		$this->oResponse = json_decode($sResp);
		if(!empty($attribute)) {
			if(is_array($attribute)) { // we only want specific properties
				foreach($attribute as $property) {
					$aResponse[$property] = $this->oResponse->$property;
					}
					return $aResponse;
			} else {
				return $this->oResponse->$attribute; // we only want one property
			}
		}
		else
			return $this->oResponse; // we want full object output
	}
}
