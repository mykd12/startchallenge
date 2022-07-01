<?php

  /* 
  -----------------------------------------------------------------------------------
  발신프로필 인증요청
  -----------------------------------------------------------------------------------
  알림톡 및 친구톡을 전송하기 위해서는 반드시 플러스 친구를 인증한 후 진행해야 합니다.
  보유한 플러스 친구 계정이 없을경우 ( https://center-pf.kakao.com ) 에서 등록하신 후 진행 가능합니다.
  */

  $_apiURL	  =	'https://kakaoapi.aligo.in/akv10/profile/auth/';
  $_hostInfo	=	parse_url($_apiURL);
  $_port		  =	(strtolower($_hostInfo['scheme']) == 'https') ? 443 : 80;
  $_variables	=	array(
    'apikey'      => '발급받은 API 키',
    'userid'      => '사용중이신 아이디',
    'token'       => '생성한 토큰 문자열',
    'plusid'      => '@인증요청할 발신 프로필 아이디',
    'phonenumber' => '발신프로필 관리자 휴대폰'
  );

  $oCurl = curl_init();
  curl_setopt($oCurl, CURLOPT_PORT, $_port);
  curl_setopt($oCurl, CURLOPT_URL, $_apiURL);
  curl_setopt($oCurl, CURLOPT_POST, 1);
  curl_setopt($oCurl, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt($oCurl, CURLOPT_POSTFIELDS, http_build_query($_variables));
  curl_setopt($oCurl, CURLOPT_SSL_VERIFYPEER, FALSE);

  $ret = curl_exec($oCurl);
  $error_msg = curl_error($oCurl);
  curl_close($oCurl);
  
  // 리턴 JSON 문자열 확인
  print_r($ret . PHP_EOL);
  
  // JSON 문자열 배열 변환
  $retArr = json_decode($ret);

  // 결과값 출력
  print_r($retArr);

  /*
  code : 0 성공, 나머지 숫자는 에러
  message : 결과 메시지
  */

