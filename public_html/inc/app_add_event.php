<div class="modal fade" id="add_event" tabindex="-1" role="dialog" aria-labelledby="add_event" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content event-modal">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <i class="fa fa-calendar-o fa-7x"></i>
        <h4 id="add_event" class="semi-bold">Add an Event.</h4>
      </div>
      <div class="modal-body">
        <div class="row form-row">
          <div class="col-md-12">
            <input type="text" class="form-control" name="event_title" placeholder="Event Title">
          </div>
        </div>

        <div class="row form-row">
          <div class="col-md-12">
            <div class="radio no-brd toggles">
              <input id="practice" type="radio" name="event_type" value="practice" checked="checked">
              <label for="practice">Practice</label>
              <input id="game" type="radio" name="event_type" class="game" value="game">
              <label for="game">Game</label>                
              <input id="pickup" type="radio" name="event_type" value="pickup">
              <label for="pickup">Pickup</label>    
              <input id="other" type="radio" name="event_type" value="other">
              <label for="other">Other</label>                                        
            </div>
          </div>
        </div>

        <div class="row form-row collapse game">
          <div class="col-md-12">
            <input type="text" class="form-control" name="event_opponent" placeholder="Opponent">
          </div>
        </div>

        <div class="row form-row">
          <div class="col-md-6">
            <input type="text" class="datepicker form-control" placeholder="Date">
          </div>
          <div class="col-md-6">
            <input type="text" class="timepicker form-control" placeholder="Time">
          </div>

        </div>
        <div class="row form-row">
          <div class="col-md-12">
            <textarea id="text-editor" placeholder="Enter Note about this Event ..." class="form-control" rows="3"></textarea>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Add Event</button>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->