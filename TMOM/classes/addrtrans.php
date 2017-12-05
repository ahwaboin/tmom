<?php 
	class AddrTrans{

		//주소를 좌표로 변환 
		public function addrToLatLng($addr){
			$res=$this->getRes($addr);
			$resArray=json_decode($res,true);
// 		echo $resArray['result']['items']['0']['point']['x'];
// 		echo $resArray['result']['items']['0']['point']['y'];
			$lat=$resArray['result']['items']['0']['point']['x'];
			$lng=$resArray['result']['items']['0']['point']['y'];
			$latLng['lat']=$lat;
			$latLng['lng']=$lng;
			return $latLng;
		}
		
		//네이버 MAP API이용 무료키 사용
		public function getRes($addr){
			$client_id = "yRPrUdQVzWmUJL1AI_Hi";
			$client_secret = "fIKUYH3yRK";
			$encText = urlencode($addr);
			$url = "https://openapi.naver.com/v1/map/geocode?query=".$encText; // json
			// $url = "https://openapi.naver.com/v1/map/geocode.xml?query=".$encText; // xml
			$is_post = false;
			$ch = curl_init();
			curl_setopt($ch, CURLOPT_URL, $url);
			curl_setopt($ch, CURLOPT_POST, $is_post);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			$headers = array();
			$headers[] = "X-Naver-Client-Id: ".$client_id;
			$headers[] = "X-Naver-Client-Secret: ".$client_secret;
			curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
			$response = curl_exec ($ch);
			$status_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
			//echo "status_code:".$status_code."<br>";
			curl_close ($ch);
			if($status_code == 200) {
				return $response;
			} else {
				echo "Error 내용:".$response;
			}
		}
	}
	
	//debug
// 	$addrTrans=new AddrTrans();
// 	$addrTrans->addrToLatLng('불정로 6');
?>