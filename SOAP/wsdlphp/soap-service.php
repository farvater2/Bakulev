<?php

ini_set("soap.wsdl_cache_enabled", "0"); // disabling WSDL cache
$server = new SoapServer("http://krprtl.bakulev.ru/mostarikov/soap_testGenerator/wsdl.php?WSDL");	// Locate WSDL file to learn structure of functions
$server->addFunction("ChooseColour");	// Same func name as in our WSDL XML, and below
$server->addFunction("ChoosePatientByID");	// Same func name as in our WSDL XML, and below
$server->handle();  

function ChooseColour($formdata) {
    $attempt = false; // File writing attempt successful or not
    $formdata = get_object_vars($formdata); // Pull parameters from SOAP connection
    
    // Sort out the parameters and grab their data
    $myname = $formdata['Name']; 
    $mycolour = $formdata['FavColour'];
    $mynumber = $formdata['FavNumber'];
    
    $str =  "Name: " . $myname . ", ";
    $str .= "Colour: " . $mycolour . ", ";
    $str .= "Number: " . $mynumber . "\r\n";
    
    $filename = "./formdata.txt";
    if (($fp = fopen($filename, "a")) == false) return array('Success' => false);
    if (fwrite($fp, $str)) {
    	$attempt = true;
    }
    fclose($fp);     

    return array('Success' => $attempt);
}

function ChoosePatientByID($formdata) {
    $formdata = get_object_vars($formdata); // Pull parameters from SOAP connection
    
    // Sort out the parameters and grab their data
    //$ID = $formdata['ID_MIS'];

	/*
	$arSelect = Array("ID"
		,"ACTIVE"
		,"PROPERTY_ID_MIS"
		,"PROPERTY_COUNTRY"
		,"PROPERTY_SURNAME"
		,"PROPERTY_NAME"
		,"PROPERTY_PATRONYMIC"
		,"PROPERTY_BIRTHDAY"
		,"PROPERTY_REGION"
		,"PROPERTY_CITY"
		,"PROPERTY_SEX"
		);
	$arFilter = Array("IBLOCK_ID" => IntVal(44)
		,"ACTIVE" => "Y"
		,"PROPERTY_ID_MIS" 		=> "%".$formdata['ID_MIS']."%"
		,"PROPERTY_COUNTRY" 	=> "%".$formdata['COUNTRY']."%"
		,"PROPERTY_SURNAME"		=> "%".$formdata['SURNAME']."%"
		,"PROPERTY_NAME" 		=> "%".$formdata['NAME']."%"
		,"PROPERTY_PATRONYMIC" 	=> "%".$formdata['PATRONYMIC']."%"
		,"PROPERTY_BIRTHDAY" 	=> "%".$formdata['BIRTHDAY']."%"
		,"PROPERTY_REGION" 		=> "%".$formdata['REGION']."%"
		,"PROPERTY_CITY" 		=> "%".$formdata['CITY']."%"
		,"PROPERTY_SEX" 		=> "%".$formdata['SEX']."%"
		);
	$res = CIBlockElement::GetList(Array(), $arFilter, false, false, $arSelect);
	while ($ob = $res->GetNextElement()) {
		$arFields = $ob->GetFields();
		$arResult['ID_MIS'][] 			= $arFields[PROPERTY_ID_MIS_VALUE];
		$arResult['COUNTRY'][]  	= trim($arFields[PROPERTY_COUNTRY_VALUE]);
		$arResult['SURNAME'][] 		= trim($arFields[PROPERTY_SURNAME_VALUE]);
		$arResult['NAME'][]  		= trim($arFields[PROPERTY_NAME_VALUE]);
		$arResult['PATRONYMIC'][]	= trim($arFields[PROPERTY_PATRONYMIC_VALUE]);
		$arResult['BIRTHDAY'][] 	= trim($arFields[PROPERTY_BIRTHDAY_VALUE]);
		$arResult['REGION'][] 		= trim($arFields[PROPERTY_REGION_VALUE]);
		$arResult['CITY'][] 		= trim($arFields[PROPERTY_CITY_VALUE]);
		$arResult['SEX'][] 			= trim($arFields[PROPERTY_SEX_VALUE]);
	}*/       
	
		$Result['ID_MIS'][] 	= 1;
		$Result['COUNTRY'][]  	= 'COUNTRY-1';
		$Result['SURNAME'][]	= 'SURNAME-1';
		$Result['NAME'][]  		= 'NAME-1';
		$Result['PATRONYMIC'][]	= 'PATRONYMIC-1';
		$Result['BIRTHDAY'][] 	= 'BIRTHDAY-1';
		$Result['REGION'][] 		= 'REGION-1';
		$Result['CITY'][] 		= 'CITY-1';
		$Result['SEX'][] 			= 'SEX-1';
		//$arResult[] = $Result;
		
		$Result['ID_MIS'][] 		= 2;
		$Result['COUNTRY'][]  	= 'COUNTRY-2';
		$Result['SURNAME'][] 		= 'SURNAME-2';
		$Result['NAME'][]  		= 'NAME-2';
		$Result['PATRONYMIC'][]	= 'PATRONYMIC-2';
		$Result['BIRTHDAY'][] 	= 'BIRTHDAY-2';
		$Result['REGION'][] 		= 'REGION-2';
		$Result['CITY'][] 		= 'CITY-2';
		$Result['SEX'][] 			= 'SEX-2';
		//$arResult[] = $Result;
		
		for ($i=0; $i < Count($Result['ID_MIS']); $i++) {

			if($formdata['ID_MIS'] != -1){
			$res = strpos($Result['ID_MIS'][$i], $formdata['ID_MIS']);
			if(strlen($formdata['ID_MIS']) > 0 && $res === false) continue;
			}
			$res = strpos($Result['COUNTRY'][$i], trim($formdata['COUNTRY']));
			if(strlen($formdata['COUNTRY']) > 0 && $res === false) continue;
			$res = strpos($Result['SURNAME'][$i], $formdata['SURNAME']);
			if(strlen($formdata['SURNAME']) > 0 && $res === false) continue;
			$res = strpos($Result['NAME'][$i], $formdata['NAME']);
			if(strlen($formdata['NAME']) > 0 && $res === false) continue;
			$res = strpos($Result['PATRONYMIC'][$i], $formdata['PATRONYMIC']);
			if(strlen($formdata['PATRONYMIC']) > 0 && $res === false) continue;
			$res = strpos($Result['BIRTHDAY'][$i], $formdata['BIRTHDAY']);
			if(strlen($formdata['BIRTHDAY']) > 0 && $res === false) continue;
			$res = strpos($Result['REGION'][$i], $formdata['REGION']);
			if(strlen($formdata['REGION']) > 0 && $res === false) continue;
			$res = strpos($Result['CITY'][$i], $formdata['CITY']);
			if(strlen($formdata['CITY']) > 0 && $res === false) continue;
			$res = strpos($Result['SEX'][$i], $formdata['SEX']);
			if(strlen($formdata['SEX']) > 0 && $res === false) continue;

			$arResult['ID_MIS'][] 		= $Result['ID_MIS'][$i];
			$arResult['COUNTRY'][]  	= $Result['COUNTRY'][$i];
			$arResult['SURNAME'][] 		= $Result['SURNAME'][$i];
			$arResult['NAME'][]  		= $Result['NAME'][$i];
			$arResult['PATRONYMIC'][]	= $Result['PATRONYMIC'][$i];
			$arResult['BIRTHDAY'][] 	= $Result['BIRTHDAY'][$i];
			$arResult['REGION'][] 		= $Result['REGION'][$i];
			$arResult['CITY'][] 		= $Result['CITY'][$i];
			$arResult['SEX'][] 			= $Result['SEX'][$i];
			
		}
	
    return $arResult;
}

?>