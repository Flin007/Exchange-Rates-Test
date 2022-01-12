<?php
	if ($_POST['header'] === 'getJson' && isset($_POST['date_req1']) && isset($_POST['date_req2'])) {
		$url = "https://www.cbr.ru/scripts/XML_dynamic.asp?date_req1=".$_POST['date_req1']."&date_req2=".$_POST['date_req2']."&VAL_NM_RQ=R01235";
		$xml = simplexml_load_file($url);
		$arrFromJson = json_decode(json_encode($xml),TRUE);
		$newArr = [];
		foreach ($arrFromJson['Record'] as $key => $value) {
			$dtime = DateTime::createFromFormat("d.m.Y", $value['@attributes']['Date']);
			$valurStr = number_format((float)str_replace(",", ".", $value['Value']), 2, '.', '');
			$dataForNewArr = [$dtime->getTimestamp() * 1000, floatval($valurStr)];
			array_push($newArr, $dataForNewArr);
		}

		$exportJson = json_encode($newArr);
		echo $exportJson;
	}else{
		echo 'false';
	}
	
?>