
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
  <?php
  if (isset($winners))
  {
    ?>
    <table class="table table-striped table-hover table-bordered dataTable no-footer">
      <thead class="bordered-darkorange">
      <tr>
        <th>Name</th>
        <th>Surname</th>
        <th>Cell</th>
        <th>Email</th>
        <th>Winner Order</th>
      </tr>
      </thead>
      <tbody>
      <?php
        foreach($winners as $winner)
        {
          ?>
          <tr id="winner-<?= $winner['user_id'] ?>">
            <td id="name-<?= $winner['user_id'] ?>"><?= $winner['firstname'] ?></td>
            <td id="surname-<?= $winner['user_id'] ?>"><?= $winner['surname'] ?></td>
            <td id="email-<?= $winner['user_id'] ?>"><?= $winner['email'] ?></td>
            <td id="cellnumber-<?= $winner['user_id'] ?>"><?= $winner['cellnumber'] ?></td>
            <td id="winner_order-<?= $winner['user_id'] ?>"><?= $winner['winner_order'] ?></td>
          </tr>
          <?php
        }
      ?>
      </tbody>
    </table>
    <?php
  }
  else
  {
    ?>
    <div class="row">
      <div class="alert alert-info">
<span><h5>No Winners</h5>
              <p>There are NO winners within the specified time frame.<br>
                If this error persists please contact support for further assistance.<br>
              </p></span>
      </div>
    </div>
    <?php
  }
  ?>
  <br>

  <div class="row">
    <div class="col-md-12" align="left">
      <button type="button" class="btn btn-danger" id="back_btn"> Back
      </button>
    </div>
  </div>

  <div class="row DTTTFooter">
    <div class="col-sm-6">
      <div class="dataTables_info" id="editabledatatable_info" role="status" aria-live="polite">
      </div>
    </div>
  </div>
</div>

<script>
  $("button[id^='back_btn']").click(function ()
  {
    $('#pick_a_winner').show();
    $('#winner_table').html();
    $('#winner_table').hide();
  });
</script>
