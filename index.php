<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Insert title here</title>
</head>
    <body>
    <?php
    require_once 'config.php';
        
    // create a new cURL resource
    if (function_exists('curl_init')) {
    $ch = curl_init();

    // set URL and other appropriate options
    curl_setopt($ch, CURLOPT_VERBOSE, true);
    curl_setopt($ch, CURLOPT_URL, "$host/virtual-server/remote.cgi?program=list-domains");
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_USERPWD, "$username:$password");
    curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);

    //disable ssl checking
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);

    // grab URL and pass it to the browser
    $data = curl_exec($ch);
    $info = curl_getinfo($ch);
    // close cURL resource, and free up system resources
    curl_close($ch);

    echo $data;
} else {
    'curl is not available, please install';
}
?>
    </body>
</html>