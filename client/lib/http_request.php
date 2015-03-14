<?php
/**
 * The variable $fields is an array looking like: 
 * $fields = [
 * 		"param 1" => "value 1", 
 * 		"param 2" => "value 2"
 * ]
 *
 * If you want to post a file in a request your $fields will look like
 * $fields = [
 * 		"param 1" => "value 1"
 *  	"param 2" => "value 2"
 *  	...
 *  	"param 3" => '@' . realpath($path)
 * ];
 *
 *
 * @params $fields
 * @params $url
 * @return json_decode(Response)
 */
	
	function httpGet($fields, $url)
	{
		// set the security key to be allowed to send request.
		$fields['identification_key'] = 'ihrOIZSz1Z44Zf4CSWZAz946ND5KTIgR';

		// Add the parameters to the request.
		$fields_string = '';

		foreach($fields as $key=>$value) { $fields_string .= $key.'='.$value.'&'; }
		rtrim($fields_string, '&');
		$url = $url . '?' . $fields_string;

		// open connection
		$ch = curl_init();

		// set the connection options
		curl_setopt($ch,CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($ch,CURLOPT_HTTPGET, count($fields));
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

		// execute post
		$result = curl_exec($ch);
		$err = curl_errno ( $ch );
		$errmsg = curl_error ( $ch );
		$header = curl_getinfo ( $ch );
		$httpCode = curl_getinfo ( $ch, CURLINFO_HTTP_CODE );

		// close connection
		curl_close($ch);

		$response ['content'] = $result;
		$response ['code'] = $httpCode;

		return $response;
	}

	function httpPost($fields,$url)
	{
		// set the security key to be allowed to send request.
		$fields['identification_key'] = 'ihrOIZSz1Z44Zf4CSWZAz946ND5KTIgR';

		// Add the parameters to the request.
		$fields_string = '';
		foreach($fields as $key=>$value) { $fields_string .= $key.'='.$value.'&'; }
		rtrim($fields_string, '&');

		// open connection
		$ch = curl_init();

		// set the connection options
		curl_setopt($ch,CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($ch,CURLOPT_POST, count($fields));
		curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

		// execute post
		$result = curl_exec($ch);
		$err = curl_errno ( $ch );
		$errmsg = curl_error ( $ch );
		$header = curl_getinfo ( $ch );
		$httpCode = curl_getinfo ( $ch, CURLINFO_HTTP_CODE );

		// close connection
		curl_close($ch);

		$response ['content'] = $result;
		$response ['code'] = $httpCode;

		return $response;
	}

	function httpPut($fields, $url)
	{
		// set the security key to be allowed to send request.
		$fields['identification_key'] = 'ihrOIZSz1Z44Zf4CSWZAz946ND5KTIgR';

		// Add the parameters to the request.
		$fields_string = '';
		foreach($fields as $key=>$value) { $fields_string .= $key.'='.$value.'&'; }
		rtrim($fields_string, '&');

		// open connection
		$ch = curl_init();

		// set the connection options
		curl_setopt($ch,CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($ch,CURLOPT_CUSTOMREQUEST, "PUT");
		curl_setopt($ch, CURLOPT_POSTFIELDS, $fields_string);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

		// execute post
		$result = curl_exec($ch);
		$err = curl_errno ( $ch );
		$errmsg = curl_error ( $ch );
		$header = curl_getinfo ( $ch );
		$httpCode = curl_getinfo ( $ch, CURLINFO_HTTP_CODE );

		// close connection
		curl_close($ch);

		$response ['content'] = $result;
		$response ['code'] = $httpCode;

		return $response;
	}

	function httpDelete($fields, $url)
	{
		// set the security key to be allowed to send request.
		$fields['identification_key'] = 'ihrOIZSz1Z44Zf4CSWZAz946ND5KTIgR';

		// Add the parameters to the request.
		$fields_string = '';
		foreach($fields as $key=>$value) { $fields_string .= $key.'='.$value.'&'; }
		rtrim($fields_string, '&');

		// open connection
		$ch = curl_init();

		// set the connection options
		curl_setopt($ch,CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($ch,CURLOPT_CUSTOMREQUEST, "DELETE");
		curl_setopt($ch, CURLOPT_POSTFIELDS, $fields_string);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

		// execute post
		$result = curl_exec($ch);
		$err = curl_errno ( $ch );
		$errmsg = curl_error ( $ch );
		$header = curl_getinfo ( $ch );
		$httpCode = curl_getinfo ( $ch, CURLINFO_HTTP_CODE );

		// close connection
		curl_close($ch);

		$response ['content'] = $result;
		$response ['code'] = $httpCode;

		return $response;
	}

	function redirect($url)
	{
	   header('Location: ' . $url);
	   die();
	}


	/**
	* For safe multipart POST request for PHP5.3 ~ PHP 5.4.
	* 
	* @param resource $ch cURL resource
	* @param array $assoc "name => value"
	* @param array $files "name => path"
	* @return bool
	*/
	function curl_custom_postfields($ch, array $assoc = array(), array $files = array()) {
	    
	    // invalid characters for "name" and "filename"
	    static $disallow = array("\0", "\"", "\r", "\n");
	    
	    // build normal parameters
	    foreach ($assoc as $k => $v) {
	        $k = str_replace($disallow, "_", $k);
	        $body[] = implode("\r\n", array(
	            "Content-Disposition: form-data; name=\"{$k}\"",
	            "",
	            filter_var($v), 
	        ));
	    }
	    
	    // build file parameters
	    foreach ($files as $k => $v) {
	        switch (true) {
	            case false === $v = realpath(filter_var($v)):
	            case !is_file($v):
	            case !is_readable($v):
	                continue; // or return false, throw new InvalidArgumentException
	        }
	        $data = file_get_contents($v);
	        $v = call_user_func("end", explode(DIRECTORY_SEPARATOR, $v));
	        $k = str_replace($disallow, "_", $k);
	        $v = str_replace($disallow, "_", $v);
	        $body[] = implode("\r\n", array(
	            "Content-Disposition: form-data; name=\"{$k}\"; filename=\"{$v}\"",
	            "Content-Type: application/octet-stream",
	            "",
	            $data, 
	        ));
	    }
	    
	    // generate safe boundary 
	    do {
	        $boundary = "---------------------" . md5(mt_rand() . microtime());
	    } while (preg_grep("/{$boundary}/", $body));
	    
	    // add boundary for each parameters
	    array_walk($body, function (&$part) use ($boundary) {
	        $part = "--{$boundary}\r\n{$part}";
	    });
	    
	    // add final boundary
	    $body[] = "--{$boundary}--";
	    $body[] = "";
	    
	    // set options
	    return @curl_setopt_array($ch, array(
	        CURLOPT_POST       => true,
	        CURLOPT_POSTFIELDS => implode("\r\n", $body),
	        CURLOPT_HTTPHEADER => array(
	            "Expect: 100-continue",
	            "Content-Type: multipart/form-data; boundary={$boundary}", // change Content-Type
	        ),
	    ));
	}
?>