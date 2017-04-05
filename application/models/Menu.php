<?php

/**
 * Modified to use REST client to get port data from our server.
 */
define('REST_SERVER', 'http://backend.local');   // the REST server host
define('REST_PORT', $_SERVER['SERVER_PORT']);    // the port you are running the server on


class Menu extends CI_Model {

	// constructor
	function __construct()
	{
            parent::__construct();
            //*** Explicitly load the REST libraries. 
            $this->load->library(['curl', 'format', 'rest']);
	}

        /**
	 * Returns all the ports from the REST server
	 * @return the ports
	 */
	function getPorts()
	{
		$this->rest->initialize(array('server' => REST_SERVER));
		$this->rest->option(CURLOPT_PORT, REST_PORT);
		$result = $this->rest->get('ports');
		return $result;
	}
        
        
        // Return all records as an array of objects
        function all()
        {
            $this->rest->initialize(array('server' => REST_SERVER));
            $this->rest->option(CURLOPT_PORT, REST_PORT);
            return $this->rest->get('/maintenance');
        }
        
}
