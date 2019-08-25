<?php

namespace App\Console\Commands;

use App\Groups;
use App\ClassTop;
use Illuminate\Console\Command;

class updateDB extends Command
{
    //MyStat code
    //Start of code that needed in all file that use MyStat
    	/**
	* Send a POST requst using cURL
	* @param string $url to request
	* @param array $post values to Send
	* @param array $options for cURL
	* @return string
	*/
	public function curl_post($url, array $post = NULL, array $options = array())
	{
    	$defaults = array(
        	CURLOPT_POST => 1,
        	CURLOPT_HEADER => 0,
        	CURLOPT_URL => $url,
        	CURLOPT_FRESH_CONNECT => 1,
        	CURLOPT_RETURNTRANSFER => 1,
        	CURLOPT_FORBID_REUSE => 1,
        	CURLOPT_TIMEOUT => 4,
			CURLOPT_POSTFIELDS => json_encode($post,true),
			CURLOPT_SSL_VERIFYHOST=> FALSE,
			CURLOPT_SSL_VERIFYPEER=> FALSE,
    	);

    	$ch = curl_init();
    	curl_setopt_array($ch, ($options + $defaults));
    	if( ! $result = curl_exec($ch))
    	{
    	    trigger_error(curl_error($ch));
    	}
    	curl_close($ch);
    	return $result;
	}
	
	/**
	* Send a GET requst using cURL
	* @param string $url to request
	* @param array $get values to send
	* @param array $options for cURL
	* @return string
	*/
	public function curl_get($url, array $get = NULL, array $options = array())
	{   
    	$defaults = array(
        	CURLOPT_URL => $url. (strpos($url, '?') === FALSE ? '?' : ''). http_build_query($get),
        	CURLOPT_HEADER => 0,
        	CURLOPT_RETURNTRANSFER => TRUE,
        	CURLOPT_TIMEOUT => 4
    	);
	   
    	$ch = curl_init();
    	curl_setopt_array($ch, ($options + $defaults));
    	if( ! $result = curl_exec($ch))
    	{
        	trigger_error(curl_error($ch));
    	}
    	curl_close($ch);
    	return $result;
	} 
	/**
	* Get token from login and password
	* @param string $Pass to send to MyStat
	* @param string $Login to send to MyStat
	* @param int $City_id to send to MyStat (can be get from https://msapi.itstep.org/api/v1/public/cities)
	* @return string 
	*/
	public function Login ($Pass , $Login ,$City_id = 31)
	{
	//$this->log->Log(100,'started login function.');
	$data = array(
		'application_key' => '6a56a5df2667e65aab73ce76d1dd737f7d1faef9c52e8b8c55ac75f565d8e8a6',
		'id_city' => $City_id,
		'password' => $Pass,
		'username' => $Login
		);
	$url = 'https://msapi.itstep.org/api/v1/auth/login';
	$options = array(CURLOPT_HTTPHEADER => array('Authorization: Bearer null','Content-Type: application/json'));
	$result = $this->curl_post($url,$data,$options);
	$result = json_decode($result);
	//echo var_export($result);
	$result = (array)$result;
	//echo var_export($result);
	//$this->log->Log(100,'results of login: '.var_export($result,true).'Encoding of string : ' . mb_detect_encoding((array)$result[0]['message'][0]));
	if (array_key_exists('access_token' , $result) == true)
	{
		return $result['access_token'];
	}
	else
	{
			throw new Exception($result['message']);
	}
	}
    //end of needed code
    //For getting lederboards
    	/*
	*@param string $Token to pass to MyStat
	*@return array  leaders of group
	*
	*/
	public function GetLeaderboard($Token='')
	{
	$data = array();
	$url = 'https://msapi.itstep.org/api/v1/dashboard/progress/leader-group';
	$options = array(CURLOPT_HTTPHEADER => array('Authorization: Bearer ' . $Token,'Content-Type: application/json'));
	$result = $this->curl_get($url,$data,$options);
	$result = json_decode($result);
	//dd($result);
	if (array_key_exists('message' , $result) == false)
	{
		foreach ($result as $key => $value){
			//echo "Key : " . $key . ' value: ' . $value->id;
			if($value->photo_path == null)
			{
				$value->photo_path = 'https://mystat.itstep.org/assets/resources/profile.svg'; // this is default profile photo 
			}
		}
		return $result;
	}
	else
	{
		throw new Exception($result->message);
	}
	}
	/*
	*@param string $Token to pass to MyStat
	*@return array  leaders of stream
	*
	*/
	public function GetLeaderboardStream($Token='')
	{
	$data = array();
	$url = 'https://msapi.itstep.org/api/v1/dashboard/progress/leader-stream';
	$options = array(CURLOPT_HTTPHEADER => array('Authorization: Bearer ' . $Token,'Content-Type: application/json'));
	$result = $this->curl_get($url,$data,$options);
	$result = json_decode($result);
	if (array_key_exists('message' , $result) == false)
	{
		foreach ($result as $key => $value){
			//echo "Key : " . $key . ' value: ' . $value->id;
			if($value->photo_path == null)
			{
				$value->photo_path = 'https://mystat.itstep.org/assets/resources/profile.svg'; // this is default profile photo 
			}
		}
		return $result;
	}
	else
	{
		throw new Exception($result->message);
	}
	}
    //End of very bad code
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:updateDB';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update data in DB';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $Token = $this->Login(\env('MYSTAT_PASSWORD'),\env('MYSTAT_USER'));
		$Form = $this->GetLeaderboard($Token);
		Groups::truncate();	
		foreach ($Form as $key => $value) {
			$Group = new Groups;
			$Group->Place= $value->position;
			$Group->Name = $value->full_name;
			$Group->Photo = $value->photo_path;
			$Group->save();
		}
		$Class = $this->GetLeaderboardStream($Token);
		ClassTop::truncate();
		foreach ($Class as $key => $value) {
			$Group = new ClassTop;
			$Group->Place= $value->position;
			$Group->Name = $value->full_name;
			$Group->Photo = $value->photo_path;
			$Group->save();
		}

    }
}
