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
?>