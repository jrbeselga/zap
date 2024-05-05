<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<?

$request_body = file_get_contents('php://input');
    $data = json_decode($request_body, true);

$fone = $data['fone'];
$nome = $data['nome'];

$i = is_numeric($data['item']);



 $text_arr = array(
        'preview_url' => 'false', 
        'body' => $nome . ' Seja bem vindo !!' .$fone. ';
		
		
		
  "messaging_product": "whatsapp",
  "recipient_type": "individual",
  "to": 	" ' . $fone . ' ",
  "type": "interactive",
  "interactive": {
    "type": "list",
    "header": {
      "type": "text",
      "text": "HEADER_TEXT"
    },
    "body": {
      "text": "BODY_TEXT"
    },
    "footer": {
      "text": "FOOTER_TEXT"
    },
    "action": {
      "button": "BUTTON_TEXT",
      "sections": [
        {
          "title": "SECTION_1_TITLE",
          "rows": [
            {
              "id": "SECTION_1_ROW_1_ID",
              "title": "SECTION_1_ROW_1_TITLE",
              "description": "SECTION_1_ROW_1_DESCRIPTION"
            },
            {
              "id": "SECTION_1_ROW_2_ID",
              "title": "SECTION_1_ROW_2_TITLE",
              "description": "SECTION_1_ROW_2_DESCRIPTION"
            }
          ]
        },
        {
          "title": "SECTION_2_TITLE",
          "rows": [
            {
              "id": "SECTION_2_ROW_1_ID",
              "title": "SECTION_2_ROW_1_TITLE",
              "description": "SECTION_2_ROW_1_DESCRIPTION"
            },
            {
              "id": "SECTION_2_ROW_2_ID",
              "title": "SECTION_2_ROW_2_TITLE",
              "description": "SECTION_2_ROW_2_DESCRIPTION"
            }
          ]
        }
      ]
    }
  }'
		
		 
    );
	

    $fields = array(
        'messaging_product' => 'whatsapp',
        'recipient_type' => 'individual',
        'to' => $fone,
        'type' => 'text',
        'text' => $text_arr
    );

$url = 'https://graph.facebook.com/v19.0/109784498894962/messages';

    $header = array(
        'Authorization:Bearer EAAKRpdg1Kk0BO7ZCAZCFozOab1O0ffR7eaLDZCRhSvCEX0fS2ZBUV0AYY422MVHglGmugiEZB0Jj7PaX2N6ZBs62inrYkHUp6ROYwbDPCFIgvZCslA6tbWIZAg1lL6ThQw1d1s0RnRF1OfdmzQuQkUn4L7VgZCXeM7518oHZCAZAWs5rwvMZBYId5aqsZACsfigZDZD',
        'Content-Type:application/json'
    );

    $curl = curl_init();
    
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($fields) );
    curl_setopt($curl, CURLOPT_HTTPHEADER, $header );
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

    $response = json_decode(curl_exec($curl), true);
    print  $response;
    
    echo $status_code = curl_getinfo($curl, CURLINFO_HTTP_CODE);
           
    curl_close($curl);
?>

</body>
</html>