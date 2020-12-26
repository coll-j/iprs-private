<?php session_start();

	require_once(__DIR__ . '/lib/db.class.php');
	require_once('config.php');

	/**
	*	Check if user has logged in
	*	If session available, return is true, nor is false
	*	
	*	@return 	boolean
	*	
	*/
	function logged_in() 
	{
		if (isset($_SESSION["username"])) {
			$username	= $_SESSION["username"];
			$level      = $_SESSION["level"];

			if ($username!="" && $level!="") {
				return TRUE;
			}
		}
		else {
			return FALSE;
		}
	}

	/**
	*	Ambil data dari database
	*	
	*	@param 		string 		$tabel
	*	@param 		string 		$kolom
	*	@param 		string 		$kriteria
	*	@param 		string 		$urutan
	*	@param 		string 		$tambahan
	*	@return 	array 		$datas
	*	
	*/
	function get_data($tabel, $kolom, $kriteria="", $urutan="", $tambahan="") 
	{
		$db = new DB();
		$query = "SELECT $kolom FROM $tabel ";
		if ($kriteria!="") {
			$query .= " WHERE $kriteria ";
		}
		if ($urutan!="") {
			$query .= " ORDER BY $urutan ";
		}
		if ($tambahan!="") {
			$query .= $tambahan;
		}

		$datas = $db->query($query);
		return $datas;
	}

	/**
	*	Log function
	*	To save every action in system to database
	*	
	*	@param 		string 		$username
	*	@param 		string 		$slug
	*	@param 		string 		$stats
	*	@param 		string 		$activity
	*	
	*/
	function log_system($username, $slug, $stats,$activity) 
	{
		$db = new DB();
		$db->bindMore(array(
			"id" 		=> "",
			"ip"		=> get_ip_address(),
			"username"	=> "$username",
			"slug" 		=> "$slug",
			"stats"		=> "$stats",
			"logdate"	=> get_date(),
			"activity"	=> "$activity"
		));

		$query	= "INSERT INTO iprs_log (id, ip, username, slug, stats, logdate, activity) VALUES (:id, :ip, :username, :slug, :stats, :logdate, :activity)";
		$datas	= $db->query($query);
		return 0;
	}

	/**
	 *	Get date now
	 *	To get the date time from corresponding timezone
	 *
	 */
	function get_date()
	{
		$db 		= new DB();
		$query 		= "SELECT * FROM iprs_setting WHERE name = 'timezone'";
		$data 	 	= $db->query($query);
		foreach ($data as $row) {
			$timezone = $row['value'];
		}

		$date = new DateTime('now', new DateTimeZone($timezone));
		return $date->format('Y-m-d H:i:s');
	}

	/**
	*	Get IP address
	*	Get the IP address of visitor
	*	
	*/
	function get_ip_address() {
	    // check for shared internet/ISP IP
	    if (!empty($_SERVER['HTTP_CLIENT_IP']) && validate_ip($_SERVER['HTTP_CLIENT_IP'])) {
	        return $_SERVER['HTTP_CLIENT_IP'];
	    }

	    // check for IPs passing through proxies
	    if (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
	        // check if multiple ips exist in var
	        if (strpos($_SERVER['HTTP_X_FORWARDED_FOR'], ',') !== false) {
	            $iplist = explode(',', $_SERVER['HTTP_X_FORWARDED_FOR']);
	            foreach ($iplist as $ip) {
	                if (validate_ip($ip))
	                    return $ip;
	            }
	        } else {
	            if (validate_ip($_SERVER['HTTP_X_FORWARDED_FOR']))
	                return $_SERVER['HTTP_X_FORWARDED_FOR'];
	        }
	    }
	    if (!empty($_SERVER['HTTP_X_FORWARDED']) && validate_ip($_SERVER['HTTP_X_FORWARDED']))
	        return $_SERVER['HTTP_X_FORWARDED'];
	    if (!empty($_SERVER['HTTP_X_CLUSTER_CLIENT_IP']) && validate_ip($_SERVER['HTTP_X_CLUSTER_CLIENT_IP']))
	        return $_SERVER['HTTP_X_CLUSTER_CLIENT_IP'];
	    if (!empty($_SERVER['HTTP_FORWARDED_FOR']) && validate_ip($_SERVER['HTTP_FORWARDED_FOR']))
	        return $_SERVER['HTTP_FORWARDED_FOR'];
	    if (!empty($_SERVER['HTTP_FORWARDED']) && validate_ip($_SERVER['HTTP_FORWARDED']))
	        return $_SERVER['HTTP_FORWARDED'];

	    // return unreliable ip since all else failed
	    return $_SERVER['REMOTE_ADDR'];
	}

	/**
	 *	Validate IP
	 *	Ensures an ip address is both a valid IP and does not fall within
	 * 	a private network range.
	 *
	 *  @param 		string 		IP Address
	 *
	 */
	function validate_ip($ip) {
	    if (strtolower($ip) === 'unknown')
	        return false;

	    // generate ipv4 network address
	    $ip = ip2long($ip);

	    // if the ip is set and not equivalent to 255.255.255.255
	    if ($ip !== false && $ip !== -1) {
	        // make sure to get unsigned long representation of ip
	        // due to discrepancies between 32 and 64 bit OSes and
	        // signed numbers (ints default to signed in PHP)
	        $ip = sprintf('%u', $ip);
	        // do private network range checking
	        if ($ip >= 0 && $ip <= 50331647) return false;
	        if ($ip >= 167772160 && $ip <= 184549375) return false;
	        if ($ip >= 2130706432 && $ip <= 2147483647) return false;
	        if ($ip >= 2851995648 && $ip <= 2852061183) return false;
	        if ($ip >= 2886729728 && $ip <= 2887778303) return false;
	        if ($ip >= 3221225984 && $ip <= 3221226239) return false;
	        if ($ip >= 3232235520 && $ip <= 3232301055) return false;
	        if ($ip >= 4294967040) return false;
	    }
	    return true;
	}

	/**
	 *	Month
	 *	To show month format from database which the format is timestamp
	 *
	 *	@param 		integer 		month
	 *
	 */
	function month($int) {
		$month = array(
        	" ", 
        	"January", 
        	"February", 
        	"March", 
        	"April", 
        	"May", 
        	"June", 
        	"July", 
        	"August", 
        	"September", 
        	"October", 
        	"November", 
        	"December"
        );

        $result = $month[$int];
        return $result;
	}

	/**
	 *	Show date
	 *	To show date format from database which the format is timestamp
	 *
	 *	@param 		string 		date
	 *
	 */
	function show_date($str) {
        $y = explode(' ', $str);
        $x = explode('-', $y[0]);
        $date = "";    
        $m = (int)$x[1];
        $m = month($m);
        $st = array(1, 21, 31);
        $nd = array(2, 22);
        $rd = array(3, 23);

        if(in_array( $x[2], $st)) {
                $date = $x[2].'st';
        }
        else if(in_array( $x[2], $nd)) {
                $date .= $x[2].'nd';
        }
        else if(in_array( $x[2], $rd)) {
                $date .= $x[2].'rd';
        }
        else {
                $date .= $x[2].'th';
        }
		// $date .= ' ' . $m . ' ' . $x[0];
        $date = $x[2]. ' ' . $m . ' ' . $x[0];

        return $date;
	}

	/**
	 *	Show datetime
	 *	To show date and time format from database which the format is timestamp
	 *
	 *	@param 		string 		date
	 *
	 */
	function show_datetime($str) {
		// Date
        $y = explode(' ', $str);
        $x = explode('-', $y[0]);
        $date = "";    
        $m = (int)$x[1];
        $m = month($m);

        // Time
        $time = explode(':', $y[1]);

		// $date .= ' ' . $m . ' ' . $x[0];
        $date = $x[2]. ' ' . $m . ' ' . $x[0] . ' ' . $time[0] . ':' . $time[1];

        return $date;
	}

	/**
	 *	Convert file size
	 *  To convert file size to human readable
	 *
	 *	@param 		integer 		bytes
	 *	@return 	string 			bytes
	 *
	 */
	function size($bytes) {
        if ($bytes >= 1073741824)
        {
            $bytes = number_format($bytes / 1073741824, 2) . ' GB';
        }
        elseif ($bytes >= 1048576)
        {
            $bytes = number_format($bytes / 1048576, 2) . ' MB';
        }
        elseif ($bytes >= 1024)
        {
            $bytes = number_format($bytes / 1024, 2) . ' KB';
        }
        elseif ($bytes > 1)
        {
            $bytes = $bytes . ' bytes';
        }
        elseif ($bytes == 1)
        {
            $bytes = $bytes . ' byte';
        }
        else
        {
            $bytes = '0 bytes';
        }

        return $bytes;
	}
?>