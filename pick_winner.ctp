<?php
echo $this->Html->script('autoNumeric');
echo $this->Html->script('datetime/bootstrap-datepicker');
?>

<div class="row">
  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
    <div class="widget flat radius-bordered">
      <div class="widget-header bg-themeprimary">
        <span class="widget-caption" id="heading">PW Details</span>
      </div>
      <div class="widget-body">
        <div class="widget-main" id="vendors">
          <div class="row" id="pick_winner">
            <div class="alert alert-info">
              <h3>Fill in the details for the PW</h3>
              <?php
              echo $this->Form->create("pickWinner");
              ?>
              <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                  <?php
                  echo $this->Form->input("Month", array(
                    "div" => array("class" => "profile-input"),
                    "label" => array("class" => "profile-label", "id" => "month"),
                    "name" => "Month",
                    "class" => "form-control date-picker",
                    "default" => "",
                    "between" => "<div class='profile-info-wrap'>",
                    "after" => "<div class='profile-notice'></div></div>"));
                  ?>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                  <?php
                  echo $this->Form->input("Number of Winners", array(
                    "div" => array("class" => "profile-input winners_num"),
                    "label" => array("class" => "profile-label", "id" => "no_of_winners_field"),
                    "name" => "Number of Winners",
                    "class" => "form-control",
                    "default" => "",
                    "between" => "<div class='profile-info-wrap'>",
                    "after" => "<div class='profile-notice'></div></div>"));
                  ?>
                </div>
              </div>
              <?php echo $this->Form->end();
              ?>

              <br>

              <div class="row">
                <div class="col-md-12" align="left">
                  <button type="button" class="btn btn-success" id="pick_winner_btn"> Pick Winners</button>
                </div>
              </div>
            </div>
          </div>
          <div class="row" id="winner_table" hidden>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<script>
  $('.date-picker').datepicker({format: 'yyyy-mm', maxDate: 0});

  $('.winners_num').autoNumeric();

  $("button[id^='pick_winner_btn']").click(function ()
  {
    var tempDate = $('#pickWinnerMonth').val();
    var num_winners = $('#pickWinnerNumberOfWinners').val();
    var tempDate2 = tempDate.slice(2);
    var date = tempDate2.replace('-', '');

    $.postJSON(globalPagePath + 'pw/winner_table',
      {
        date: date,
        num_winners: num_winners
      }, function (data)
      {
        $('#pick_winner').hide();
        $('#winner_table').html(data.content);
        $('#winner_table').show();
      });
  });
</script>