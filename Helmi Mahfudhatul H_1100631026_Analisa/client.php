<?php

// Pull in the NuSOAP code
require_once('nusoap/lib/nusoap.php'); //untuk memanggil kode NUSOAP yang terdapat dalam folder lib, dimana lib terdapat pada folder nusoap
// Create the client instance
$wsdl = "http://localhost/LatihanWsdl/hellowsdl.php?wsdl"; //menuliskan letak client yg disimpan di folder C:xampp/htdocs/LatihanWsdl(project yang saya buat)/hellowsdl.php
$client = new nusoap_client($wsdl, true); //membuat contoh client
// Check for an error
$err = $client->getError(); //memeriksa client jika terjadi error
if ($err) { //jika terjadi error 
    // Display the error
    echo '<h2>Constructor error</h2><pre>' . $err . '</pre>'; //maka akan menampilkan tulisan "Constructor error"
    // At this point, you know the call that follows will fail
}
// Call the SOAP method
$result = $client->call('hello', array('name' => 'Helmi Mahfudhatul Harum')); //variabel result memanggil hasil client
// Check for a fault
if ($client->fault) { //memeriksa jika terjadi kesalahan
    echo '<h2>Fault</h2><pre>'; //maka akan menampilkan kata Fault
    print_r($result);
    echo '</pre>';
} else { //jika tidak
    //periksa kesalahan
    $err = $client->getError(); //variabel err adalah client yang memanggil method getError
    if ($err) { //jika terjadi error
        // Display the error
        echo '<h2>Error</h2><pre>' . $err . '</pre>'; //maka akan menampilkan kata Error
    } else { //jika tidak
        // Display the result
        echo '<h2>Result</h2><pre>'; //maka akan menamplika kata Result
        print_r($result); //untuk menampilkan result yang dipanggil yaitu Hellooo, Helmi Mahfudhatul arum
        echo '</pre>';
    }
}
// Display the request and response
echo '<h2>Request</h2>'; //untuk menampilkan kata Requets
echo '<pre>' . htmlspecialchars($client->request, ENT_QUOTES) . '</pre>'; //untuk menampilkan requestnya
echo '<h2>Response</h2>'; //untuk menampilkan kata Response
echo '<pre>' . htmlspecialchars($client->response, ENT_QUOTES) . '</pre>'; //untuk menampilkan responnya
// Display the debug messages
echo '<h2>Debug</h2>'; //untuk menampilkan kata Debug
echo '<pre>' . htmlspecialchars($client->debug_str, ENT_QUOTES) . '</pre>'; //untuk menampilkan pesan debugnya
?>