<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

// Include config file
require PATH_THIRD.'bbm_gmt_to_local/config.php';

$plugin_info = array(
	'pi_name'			=> $config['name'],
	'pi_version'		=> $config['version'],
	'pi_author'			=> 'Adam Christianson',
	'pi_author_url'		=> 'http://www.backbeatmedia.com',
	'pi_description'	=> 'Converts a GMT time to a local time',
	'pi_usage'			=> Bbm_gmt_to_local::usage()
);

/**
* BBM Dated Plugin Class
*
* @package			bbm_gmt_to_local-ee2_addon
* @version			1.0
* @author			Adam Christianson <adam@backbeatmedia.com>
* @link				http://backbeatmedia.com/
* @license			http://creativecommons.org/licenses/by-sa/3.0/
*/

class Bbm_gmt_to_local {
    /**
	* Plugin return data
	*
	* @var	string
	*/
	var $return_data;
	
	// --------------------------------------------------------------------

	/**
	* PHP4 Constructor
	*
	* @see	__construct()
	*/
	function Bbm_gmt_to_local()
	{
		$this->__construct();
	}

	// --------------------------------------------------------------------

	/**
	* PHP5 Constructor
	*/
	function __construct()
	{
		/** -------------------------------------
		/**  Get global instance
		/** -------------------------------------*/
		$this->EE =& get_instance();

		//get current GMT time
		$curr_time = new DateTime('now', new DateTimeZone('UTC'));

		$gmt 	= $this->EE->TMPL->fetch_param('gmt', $curr_time->format('D, d M Y H:i:s O'));
		$ltz 	= $this->EE->TMPL->fetch_param('ltz','America/New_York');
		$format = $this->EE->TMPL->fetch_param('format','F jS, Y, g:ia T');

		$convertedTimezone = new DateTimeZone($ltz);
		$gmtDate = new DateTime($gmt, new DateTimeZone('GMT'));
		$gmtDate->setTimeZone($convertedTimezone);

		/** -------------------------------------
		/**  Boom. Return variable.
		/** -------------------------------------*/
		$this->return_data = $gmtDate->format($format);
	}
	/***************
    * Plugin Usage
    *
    * @return void
    *
    **************/

    public function usage()
    {
        ob_start(); 
?>
        Parameters
        ==================================

        - gmt 	: Start date in GMT
        		: Default to current time if not supplied
        		: Format: "Thu, 06 Sep 2012 18:55:25 +0000"

        - ltz 	: Local timezone you want to convert into
        		: Default is: "America/New_York"
        		: See http://php.net/manual/en/timezones.others.php

        - format 	: Date time format
        			: Use PHP formats. http://www.php.net/manual/en/datetime.formats.date.php

        
        Tag
        ==================================
		{exp:bbm_gmt_to_local gmt='Thu, 06 Sep 2012 18:55:25 +0000'}
		
		Return
        ==================================
        Returns the converted time in the format requested
        
        Example
        ===========================
        {exp:bbm_gmt_to_local gmt='Thu, 06 Sep 2012 18:55:25 +0000' tz='America/Los_Angeles' format='F jS, Y, g:ia T'}
        
        Changelog
        ===========================

        Version 1.0
        ---------------------------

        - Initial release
<?php
        $buffer = ob_get_contents();
        ob_end_clean(); 

        return $buffer;
    }
}
// END CLASS
?>