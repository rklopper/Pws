<?php

class Pw extends AppModel
{

  public function pick_monthly_winner($session_id, $date, $num_winners)
  {
    $request = array(
      'api_action' => 'pick_monthly_winner',
      'action_content' => array(
        'session_id' => htmlentities($session_id),
        'date' => htmlentities($date, ENT_QUOTES),
        'number_winners' => htmlentities($num_winners, ENT_QUOTES)
      )
    );
    $response = $this->find('all', $request);
    return $response;
  }

}