<?php
$yes_no_lists = array(
  "yes" => "Sim" ,
  "no" => "Não"
) ;

$method_lists = array(
  "GET" => "GET" ,
  "POST" => "POST"
) ;

$alphabetic_list = array(
  "0" => "A"
  , "1" => "B"
  , "2" => "C"
  , "3" => "D"
  , "4" => "E"
  , "5" => "F"
  , "6" => "G"
  , "7" => "H"
  , "8" => "I"
  , "9" => "J"
  , "10" => "K"
  , "11" => "L"
  , "12" => "M"
  , "13" => "N"
  , "14" => "O"
  , "15" => "P"
  , "16" => "Q"
  , "17" => "R"
  , "18" => "S"
) ;

$week_name =array(
  "0" => "Domingo"
  , "1" => "Segunda-feira"
  , "2" => "Terça-feira"
  , "3" => "Quarta-feira"
  , "4" => "Quinta-feira"
  , "5" => "Sexta-feira"
  , "6" => "Sábado"  
) ;

$withoutaccents_lists = array(
  'á'=>'a'
  , 'ä'=>'a'
  , 'à'=>'a'
  , 'ã'=>'a'
  , 'â'=>'a'
  , 'Á'=>'A'
  , 'Ä'=>'A'
  , 'À'=>'A'
  , 'Ã'=>'A'
  , 'Â'=>'A'
  , 'é'=>'e'
  , 'ë'=>'e'
  , 'è'=>'e'
  , 'ê'=>'e'
  , 'É'=>'E'
  , 'Ë'=>'E'
  , 'È'=>'E'
  , 'Ê'=>'E'
  , 'í'=>'i'
  , 'ï'=>'i'
  , 'ì'=>'i'
  , 'î'=>'i'
  , 'Í'=>'I'
  , 'Ï'=>'I'
  , 'Ì'=>'I'
  , 'Î'=>'I'
  , 'ó'=>'o'
  , 'ö'=>'o'
  , 'ò'=>'o'
  , 'õ'=>'o'
  , 'ô'=>'o'
  , 'Ó'=>'O'
  , 'Ö'=>'O'
  , 'Ò'=>'O'
  , 'Õ'=>'O'
  , 'Ô'=>'O'
  , 'ú'=>'u'
  , 'ü'=>'u'
  , 'ù'=>'u'
  , 'û'=>'u'
  , 'Ú'=>'U'
  , 'Ü'=>'U'
  , 'Ù'=>'U'
  , 'Û'=>'U'
  , 'ç'=>'c'
  , 'Ç'=>'C'
  , '´'=>''
);

$accents_lists = array(
  'á'=>'Á'
  , 'ä'=>'Ä'
  , 'à'=>'À'
  , 'ã'=>'Ã'
  , 'â'=>'Â'
  , 'é'=>'É'
  , 'ë'=>'Ë'
  , 'è'=>'È'
  , 'ê'=>'Ê'
  , 'í'=>'Í'
  , 'ï'=>'Ï'
  , 'ì'=>'Ì'
  , 'î'=>'Î'
  , 'ó'=>'Ó'
  , 'ö'=>'Ö'
  , 'ò'=>'Ò'
  , 'õ'=>'Õ'
  , 'ô'=>'Ô'
  , 'ú'=>'Ú'
  , 'ü'=>'Ü'
  , 'ù'=>'Ù'
  , 'û'=>'Û'
  , 'ç'=>'Ç'
) ;

$html_entities_list = array(
  '&nbsp;'  =>  ' ' 
  , '&gt;'  =>  '>' 
  , '<'  =>  '<' 
  , '&amp;'  =>  '&' 
  , '&quot;'  =>  '"' 
  , '&apos;'  =>  '"' 
  , '&iexcl;'  =>  '¡' 
  , '&cent;'  =>  '¢' 
  , '&pound;'  =>  '£' 
  , '&curren;'  =>  '¤' 
  , '&yen;'  =>  '¥' 
  , '&brvbar;'  =>  '¦' 
  , '&sect;'  =>  '§' 
  , '&uml;'  =>  '¨' 
  , '&copy;'  =>  '©' 
  , '&ordf;'  =>  'ª' 
  , '&laquo;'  =>  '«' 
  , '&not;'  =>  '¬' 
  , '&shy;'  =>  '­' 
  , '&reg;'  =>  '®' 
  , '&macr;'  =>  '¯' 
  , '&deg;'  =>  '°' 
  , '&plusmn;'  =>  '±' 
  , '&sup2;'  =>  '²' 
  , '&sup3;'  =>  '³' 
  , '&acute;'  =>  '´' 
  , '&micro;'  =>  'µ' 
  , '&para;'  =>  '¶' 
  , '&middot;'  =>  '·' 
  , '&cedil;'  =>  '¸' 
  , '&sup1;'  =>  '¹' 
  , '&ordm;'  =>  'º' 
  , '&raquo;'  =>  '»' 
  , '&frac14;'  =>  '¼' 
  , '&frac12;'  =>  '½' 
  , '&frac34;'  =>  '¾' 
  , '&iquest;'  =>  '¿' 
  , '&times;'  =>  '×' 
  , '&divide;'  =>  '÷' 
  , '&Agrave;'  =>  'À' 
  , '&Aacute;'  =>  'Á' 
  , '&Acirc;'  =>  'Â' 
  , '&Atilde;'  =>  'Ã' 
  , '&Auml;'  =>  'Ä' 
  , '&Aring;'  =>  'Å' 
  , '&AElig;'  =>  'Æ' 
  , '&Ccedil;'  =>  'Ç' 
  , '&Egrave;'  =>  'È' 
  , '&Eacute;'  =>  'É' 
  , '&Ecirc;'  =>  'Ê' 
  , '&Euml;'  =>  'Ë' 
  , '&Igrave;'  =>  'Ì' 
  , '&Iacute;'  =>  'Í' 
  , '&Icirc;'  =>  'Î' 
  , '&Iuml;'  =>  'Ï' 
  , '&ETH;'  =>  'Ð' 
  , '&Ntilde;'  =>  'Ñ' 
  , '&Ograve;'  =>  'Ò' 
  , '&Oacute;'  =>  'Ó' 
  , '&Ocirc;'  =>  'Ô' 
  , '&Otilde;'  =>  'Õ' 
  , '&Ouml;'  =>  'Ö' 
  , '&Oslash;'  =>  'Ø' 
  , '&Ugrave;'  =>  'Ù' 
  , '&Uacute;'  =>  'Ú' 
  , '&Ucirc;'  =>  'Û' 
  , '&Uuml;'  =>  'Ü' 
  , '&Yacute;'  =>  'Ý' 
  , '&THORN;'  =>  'Þ' 
  , '&szlig;'  =>  'ß' 
  , '&agrave;'  =>  'à' 
  , '&aacute;'  =>  'á' 
  , '&acirc;'  =>  'â' 
  , '&atilde;'  =>  'ã' 
  , '&auml;'  =>  'ä' 
  , '&aring;'  =>  'å' 
  , '&aelig;'  =>  'æ' 
  , '&ccedil;'  =>  'ç' 
  , '&egrave;'  =>  'è' 
  , '&eacute;'  =>  'é' 
  , '&ecirc;'  =>  'ê' 
  , '&euml;'  =>  'ë' 
  , '&igrave;'  =>  'ì' 
  , '&iacute;'  =>  'í' 
  , '&icirc;'  =>  'î' 
  , '&iuml;'  =>  'ï' 
  , '&eth;'  =>  'ð' 
  , '&ntilde;'  =>  'ñ' 
  , '&ograve;'  =>  'ò' 
  , '&oacute;'  =>  'ó' 
  , '&ocirc;'  =>  'ô' 
  , '&otilde;'  =>  'õ' 
  , '&ouml;'  =>  'ö' 
  , '&oslash;'  =>  'ø' 
  , '&ugrave;'  =>  'ù' 
  , '&uacute;'  =>  'ú' 
  , '&ucirc;'  =>  'û' 
  , '&uuml;'  =>  'ü' 
  , '&yacute;'  =>  'ý' 
  , '&thorn;'  =>  'þ' 
  , '&yuml;'  =>  'ÿ' 
);

$month_name = array(
    "01" => "Janeiro"
    , "02" => "Fevereiro"
    , "03" => "Março"
    , "04" => "Abril"
    , "05" => "Maio"
    , "06" => "Junho"
    , "07" => "Julho"
    , "08" => "Agosto"
    , "09" => "Setembro"
    , "10" => "Outubro"
    , "11" => "Novembro"
    , "12" => "Dezembro"
) ;

$ufbr_lists = array(
    "AC" => "Acre"
    , "AL" => "Alagoas"
    , "AP" => "Amapá"
    , "AM" => "Amazonas"
    , "BA" => "Bahia"
    , "CE" => "Ceará"
    , "DF" => "Distrito Federal"
    , "ES" => "Espírito Santo"
    , "GO" => "Goiás"
    , "MA" => "Maranhão"
    , "MT" => "Mato Grosso"
    , "MS" => "Mato Grosso do Sul"
    , "MG" => "Minas Gerais"
    , "PA" => "Pará"
    , "PB" => "Paraíba"
    , "PR" => "Paraná"
    , "PE" => "Pernambuco"
    , "PI" => "Piauí"
    , "RJ" => "Rio de Janeiro"
    , "RN" => "Rio Grande do Norte"
    , "RS" => "Rio Grande do Sul"
    , "RO" => "Rondônia"
    , "RR" => "Roraima"
    , "SC" => "Santa Catarina"
    , "SE" => "Sergipe"
    , "SP" => "São Paulo"
    , "TO" => "Tocantins"
) ;

$genre_lists = array(
  "male" => "Masculino"
  , "female" => "Feminino"
  , "other" => "Outros"
);

$civil_status_list = array(
  "singer" => "Solteiro"
  , "married" => "Casado"
  , "divorced" => "Divorciado"
  , "widower" => "Viúvo"
);

$type_tenants_lists = array(
  "cpf" => "CPF",
  "cnpj" => "CNPJ"
);

$type_bank_lists = array(
  "J" => "Jurídica"
  , "F" => "Física"
);

$type_nature_lists = array(
  "service" => "Serviço"
  , "refund" => "Reembolso"
);

$type_public_lists = array(
  "in" => "Interno",
  "out" => "Externo"
);

$type_relation_lists = array(
  "1" => "Pai/Mãe",
  "2" => "Irmão/Irmã",
  "3" => "Tio/Tia"
);
