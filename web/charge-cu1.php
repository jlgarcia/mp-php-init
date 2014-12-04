<?php
  require_once('./sdk/meli.php');

  $meli = new Meli('7929281084187786', 'zgO0UhRBSnDRYLq0M8emV62s7VUw62Vu');
  $response = $meli->getAccessToken();
  $params = array('access_token' => $response['body']->access_token);


  $body = array(
      array("","")
    );
  $body['transaction_amount'] = 2.0;
  $body['card'] = $_POST['card_token'];
  //$body['payer_email'] ='test@mp.com';

  //Deberiamos hacer esto opcional
  $body['description'] = 'PHP reason';
  $body['installments'] = 1;
  $body['payment_method_id'] = 'visa';

  $body['payer'] = array("type" => "customer",
                          "id" => 422342);
 
  echo $body

  //$payment = $meli->post('/checkout/custom/beta/create_payment', $body, $params);
  $payment = $meli->post('/v1/payments', $body, $params);


  echo $payment["body"]->payment_id;
  

?>