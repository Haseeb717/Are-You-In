<div class="modal fade" id="add_team" tabindex="-1" role="dialog" aria-labelledby="add_team" aria-hidden="true">
   <div class="modal-dialog">
      <div class="modal-content team-modal">
         <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <form action="/file-upload" class="dropzone team-pic no-margin">
               <i class="fa fa-users fa-7x"></i>
               <div class="fallback">
                  <input name="file" type="file" multiple />
               </div>
            </form>
            <h4 id="add_team" class="semi-bold">Add a New Team.</h4>
         </div>
         <div class="modal-body">
            <form id="add_team" class="add-team-form">
               <div class="form-wrap">
                  <div class="row form-row form-group">
                     <div class="col-md-12">
                        <input type="text" name="team_name" class="form-control" placeholder="Team Name"/>
                     </div>
                     <div class="col-md-12 m-b-10 select-container">
                        <select name="sport" class="source form-control" style="width:100%">
                           <option value="">Please Select Sport</option>
                           {exp:mx_team:sports}
                           <option value="{sport_id}">{sport_title}</option>
                           {/exp:mx_team:sports}
                        </select>
                     </div>
                     <div class="col-md-12">
                        <input type="text" name="city" class="form-control" placeholder="City">
                     </div>
                  </div>
                  <div class="row form-row form-group">
                     <div class="col-md-12">
                        <div class="radio border-sep">
                           <input id="male" type="radio" name="gender" value="male" checked="checked">
                           <label for="male">Male</label>
                           <input id="female" type="radio" name="gender" value="female">
                           <label for="female">Female</label>                            
                           <input id="coed" type="radio" name="gender" value="coed">
                           <label for="coed">Coed</label>
                        </div>
                     </div>
                  </div>
                  <div class="row form-row">
                     <div class="col-md-12">
                        <div class="radio toggles">
                           <input id="adult" type="radio" name="age" value="adult" checked="checked">
                           <label for="adult">Adult</label>
                           <input id="youth" type="radio" name="age" class="youth" value="youth">
                           <label for="youth">Youth</label>                            
                        </div>
                     </div>
                  </div>
                  <div class="row form-row collapse youth">
                     <div class="col-md-6 m-b-10">
                        <select name="age_from" class="source-nosearch" style="width:100%">
                           <option value="">Age From</option>
                           {exp:mx_team:numbers from="1" to="100"}
                           <option value="{short_name}">{name}</option>
                           {/exp:mx_team:numbers}
                        </select>
                     </div>
                     <div class="col-md-6 m-b-10">
                        <select name="age_to" class="source-nosearch" style="width:100%">
                           <option value="">Age To</option>
                           {exp:mx_team:numbers from="1" to="100"}
                           <option value="{short_name}">{name}</option>
                           {/exp:mx_team:numbers}
                        </select>
                     </div>
                  </div>
                  <div class="modal-footer">
                     <div class="row form-row">
                        <div class="col-md-7">
                           <div class="checkbox text-left">
                              <input id="yes" type="checkbox" name="public_contact_info" value="1">
                              <label for="yes">Allow team to see each others contact info</label>
                           </div>
                        </div>
                        <div class="col-md-5">
                           <div class="checkbox">
                              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                              <button type="submit" class="btn btn-primary">Create Team</button>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </form>
            <div id="status">
               <div class="modal-body">
                  <div class="row">
                     <div class="col-xs-12 align-center">
                        <h4><i class="fa fa-check"></i> Team Successfully Added</h4>
                        <p>Next step is to add players to your team</p>
                        <a href="/teams/">Click here to manage team</a>
                     </div>
                  </div>
               </div>
               <div class="modal-footer">
                  <div class="row">
                     <div class="col-md-12">
                        <div class="checkbox">
                           <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                           <a href="#" class="btn team-page btn-primary">Go to Team Page</a>
                           <a href="#" class="btn btn-primary add-another">Add Another Team</a>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
   </div>
   <!-- /.modal -->
</div>