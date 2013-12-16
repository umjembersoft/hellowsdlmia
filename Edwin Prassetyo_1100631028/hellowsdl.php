// Pull in the NuSOAP code
require_once('nusoap/lib/nusoap.php'); //memanggil kode NUSOAP yg terletak di folder lib, dimana lib terletak pada folder nusoap
// Create the server instance
$server = new soap_server(); //membuat contoh server
// Initialize WSDL support
$server->configureWSDL('hellowsdl', 'urn:hellowsdl'); //menginisialisasi dukungan WSDL
// Register the method to expose
$server->register('hello', // method nama
        array('name' => 'xsd:string'), // input parameters
        array('return' => 'xsd:string'), // output parameters
        'urn:hellowsdl', // namespace
        'urn:hellowsdl#hello', // soapaction
        'rpc', // style
        'encoded', // use
        'Says hello to the caller'            // documentation
);

//Mendefinisikan metode sebagai fungsi PHP
function hello($name) { 
    return 'Hellooo, ' . $name;
}

//Gunakan permintaan untuk (mencoba) memanggil layanan
$HTTP_RAW_POST_DATA = isset($HTTP_RAW_POST_DATA) ? $HTTP_RAW_POST_DATA : '';
$server->service($HTTP_RAW_POST_DATA);
?>