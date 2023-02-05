<?php
date_default_timezone_set('America/Sao_Paulo');
define( "cPaginate" , 150 );
ini_set('post_max_size', '4096M');
ini_set('upload_max_filesize', '4096M');
ini_set('default_charset', 'UTF-8');

define ("cHStr", '172.29.0.2');
define ("cUserStr", 'user_sysmob');
define ("cPassStr", '123456');
define ("cBancoStr", 'mysql_sysmob');

define("prefix_tables" , "");

define( "cAppKey" , "sysmob.gerenciador" );
define( "cTitle" , "Gerenciador - SYSMOB" );
define( "cVersion" , "Desenvolvimento" );

define( "cAppRoot" , "/" );
define( "cRootServer" ,  sprintf( "%s%s" , $_SERVER["DOCUMENT_ROOT"] , "/" ) ) ;
define( "cRootServer_APP" ,  sprintf( "%s%s" , $_SERVER["DOCUMENT_ROOT"] , constant("cAppRoot") . "../app"  ) ) ;
define( "cFrontend" , sprintf( "http://%s%s" , $_SERVER["HTTP_HOST"] , constant("cAppRoot") ) );
define( "cFrontend_USER" , constant("cFrontend") );
define( "cFrontComponents" ,  sprintf( "%s%s" , $_SERVER["DOCUMENT_ROOT"] , "ui/components/" ) ) ;
define( "cFurniture" , sprintf( "%s%s" , constant("cFrontend") , "furniture/" ) );

// define( "mail_from_port" , "2525" );
// define( "mail_from_host" , "smtp.mailtrap.io" );
// define( "mail_from_user" , "97e415f995a883" );
// define( "mail_from_name" , "Atendimento SISMOB" );
// define( "mail_from_pwd" , "1d8c1c6c618fb1" );

// define( "mail_from_port" , "587" );
// define( "mail_from_host" , "a2plcpnl0228.prod.iad2.secureserver.net" );
// define( "mail_from_user" , "contato@sysmob.com" );
// define( "mail_from_name" , "Atendimento AAR Telecom" );
// define( "mail_from_pwd" , "82JbU06ot=S(" );
?>