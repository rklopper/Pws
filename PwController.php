<?php

class PwController extends AppController
{
  public $uses = array('Pw');

  public function beforeFilter()
  {
    parent::beforeFilter();
    // Allow users to logout.
  }

  /**pick_winner
   * Loads view for the the Pick Winner page.
   */
  public function pick_winner()
  {
    $this->set('pageHeading', 'Pick Winners');
  }

  /**winner_table
   * Fetches all data required and builds the element for the table of selected winners.
   * Called from the Pick Winner page when an user submits a date period and number of winners.
   */
  public function winner_table()
  {
    //comments
    $this->autoLayout = false;
    $this->autoRender = false;
    $session_id = $this->Session->read('Auth.User.session_id');
    $date = $_POST['date'];
    $temp_num_winners = $_POST['num_winners'];
    $num_winners = (int)$temp_num_winners;

    $winners_response = $this->Pw->admin_user_pick_monthly_winner($session_id, $date, $num_winners);

    if (isset($winners_response))
    {
      if($winners_response['result'] == true)
      {
        $winners = $winners_response['response'];
      }
    }

    $view = new View($this, false);
    $view->viewPath = 'Elements';  // Directory inside view directory to search for .ctp files
    $view->layout = false; // if you want to disable layout
    if(isset($winners))
    {
      $view->set('winners', $winners);
    }

    return json_encode(array("result" => 'true', "content" => $view->render('Pw/winner_table')));
  }
}