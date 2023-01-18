<?php
date_default_timezone_set('America/Sao_Paulo');
define( "cPaginate" , 150 );
ini_set('post_max_size', '4096M');
ini_set('upload_max_filesize', '4096M');
ini_set('default_charset', 'UTF-8');

define ("cHStr", '172.29.0.2');
define ("cUserStr", 'user_aartelecom');
define ("cPassStr", '123456');
define ("cBancoStr", 'mysql_aartelecom');

define( "cURL_API" , "" );

define("prefix_tables" , "");

define( "cAppKey" , "aartelecom" );
define( "cTitle" , "AAR Telecom" );

define( "cAppRoot" , "/" );
define( "cRootServer" ,  sprintf( "%s%s" , $_SERVER["DOCUMENT_ROOT"] , constant("cAppRoot") ) ) ;
define( "cRootServer_APP" ,  sprintf( "%s%s" , $_SERVER["DOCUMENT_ROOT"] , constant("cAppRoot") . "../app"  ) ) ;
define( "cFrontend" , sprintf( "http://%s%s" , $_SERVER["HTTP_HOST"] , constant("cAppRoot") ) );

define( "cFurniture" , sprintf( "%s%s" , constant("cFrontend") , "furniture/" ) );

define( "mail_from_port" , "465" );
define( "mail_from_host" , "a2plcpnl0228.prod.iad2.secureserver.net" );
define( "mail_from_user" , "contato@aartelecom.com" );
define( "mail_from_name" , "Contato AAR Telecom" );
define( "mail_from_pwd" , "82JbU06ot=S(" );

?>
