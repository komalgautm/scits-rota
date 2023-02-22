<script>
  // Ignore this in your implementation
  window.isMbscDemo = true;
  </script>
@include('rotaStaff.components.header')
<style>
   / Dropdown Button /
.dropbtn {
  /* background-color: #3498DB;
  color: white;
  padding: 16px; */
  font-size: 16px;
  border: none;
  cursor: pointer;
}

/ The container <div> - needed to position the dropdown content /
.dropdown {
  position: relative;
  display: inline-block;
}

/ Dropdown Content (Hidden by Default) /
.dropdown-content {
  display: none;
  position: absolute;
  right: 0px;
  background-color: #f1f1f1;
  min-width: 200px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

/ Links inside the dropdown /
.dropdown-content a,
.dropdown-content button {
  color: #1f88b5;
  padding: 5px 12px;
  text-decoration: none;
  display: inline-block;
  font-size: 15px;
  outline: none;
  border: none;
  font-weight: 500;
}

.dropdown-content ul {
  list-style-type: none;
  padding-left: 0px;
  margin-bottom: 0rem;
} 

.dropdown-content .dropdown_icon {
  color:#106e97cf;
  font-size: 20px;
}

.dropdown-content ul li {
  padding: .50rem .50rem .50rem 1rem;
  transition: all 0.3s ease-in-out;
}

.dropdown-content ul li .delete-icon {
  color: #990000;
}

.dropdown-content ul li:last-child .delete_btn {
  color: #990000;
}

.dropdown-content ul li:last-child:hover {
  background-color: #99000024;
}

.dropdown-content ul li:hover {
  background-color: #1f88b514;
}

.dropdown-content ul li a {
  cursor: pointer;
}

.form-control {
  border: 2px solid #a1a9b3;
}

.form-control:focus {
  border: 2px solid #1f88b5;
  box-shadow: rgb(0 0 0 / 25%) 0px 2px 8px;
}

.modal-header{
  background-color: #1f88b5;
  color: #fff;
}

.modal-dialog .close_btn_modal {
  border: none;
  outline: none;
  background-color: inherit;
  color: #e10078;
  border: 2px solid #e10078;
  padding: 5px 16px;
  border-radius: 5px;
  font-weight: 600;
  transition: all 0.3s ease-in-out;
}

.modal-dialog .close_btn_modal:hover {
  background-color: #ad005c;
  color: #fff;
  border: 2px solid #ad005c;
}

.modal-dialog .save_btn_modal {
  border: none;
    outline: none;
    padding: 8px 20px;
    background-color: #e10078;
    color: #fff;
    border-radius: 5px;
    font-weight: 600;
    transition: all 0.3s ease-in-out;
}

.modal-dialog .save_btn_modal:hover {
  background-color: #ad005c;
  border-color: #ad005c;
}

.modal-header .modal_close_btn {
    color: #fff;
    border: none;
    outline: none;
    background-color: inherit;
    font-size: 22px;
}

.active-rots-slt-from h4 {
  margin-top: 0px;
}
</style>
            <!-- Top Bar Info Section End Here -->  
            <div class="col-lg-9">
              <div class="row">
                <div class="col-lg-12">
                  <ul class="nav nav-tabs rotas" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                      <button class="nav-link active" id="activerotas-tab" data-bs-toggle="tab"
                        data-bs-target="#activerotas" type="button" role="tab" aria-controls="activerotas"
                        aria-selected="true">Active Rotas</button>
                    </li>
                    <li class="nav-item" role="presentation">
                      <button class="nav-link" id="oldrotas-tab" data-bs-toggle="tab" data-bs-target="#oldrotas"
                        type="button" role="tab" aria-controls="oldrotas" aria-selected="false">Old Rotas</button>
                    </li>
                    <li class="nav-item" role="presentation">
                      <button class="nav-link" id="createrota-tab" data-bs-toggle="tab" data-bs-target="#createrota"
                        type="button" role="tab" aria-controls="createrota" aria-selected="false">Create rota </button>
                    </li>
                  </ul>
                  <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="activerotas" role="tabpanel"
                      aria-labelledby="activerotas-tab">
                      <form class="active-rots-slt-from">
                        <div class="row">
                          <div class="col-lg-9">
                            <h3>Active rotas</h3>
                          </div>
                          <div class="col-lg-4 col-md-4">
                            <input type="date" placeholder="Select range..." id="search_date" class="form-control">
                          </div>
                          <div class="col-lg-3 col-md-3">
                            <input type="text" class="form-control form-select" id="rota_name_search" placeholder="Rota name...">
                          </div>
                          <div class="col-md-3 col-lg-3">
                            <button type="button" class="filter_btn">Clear all filter</button>
                          </div>
                          <div class="col-lg-3 col-md-3">
                              <select name="sortBy" class="form-select fotm-control">
                                <option value="Name (A-Z)">Name (A-Z)</option>
                                <option value="Name (Z-A)">Name (Z-A)</option>
                                <option value="Start date (Newest first)">Start date (Newest first)</option>
                                <option value="Start date (Oldest first)">Start date (Oldest first)</option></select>
                          </div>
                          <div id="result"></div>
                         </div>
                      </form>
                      <div class="col-md-12 my-5 publish_rota_content">
                        <div class="d-flex justify-content-between">
                          <div class="d-flex align-items-center">
                            <h4>Published rotas</h4>
                            <span class="no_of_rota_publish" id="active_publish_rota_count"></span>
                          </div>
                          <div class="toggle_btns">
                            <button class="view_all_btn" onclick="showRotaPublish()" id="viewPublish">View all</button>
                            <button class="show_less_btn" onclick="lessRotaPublish()" id="lessPublish">Show less</button>
                          </div>
                        </div>
                        <div class="content_about_publish" id="beforePublishRota">
                          <h5>In progress</h5>
                          <div id="new_publish_rota">
                          </div>
                          <p class="pb-8">Rotas that are currently active and in progress will appear here.</p>
                          <h5>Future rotas</h5>
                          <p class="pb-8">Rotas that are starting in the future will appear here.</p>
                        </div>
                      </div>
                      <div class="col-md-12 unpublish_rota_content">
                        <div class="d-flex justify-content-between">
                          <div class="d-flex align-items-center">
                            <h4>Unpublished rotas</h4>
                            <span class="no_of_rota_publish" id="active_unpublish_rota_count"></span>
                          </div>
                          <div class="toggle_btns">
                            <button class="view_all_btn" onclick="unPublishview()" id="viewUnpublish">View all</button>
                            <button class="show_less_btn" onclick="unPublishless()" id="lessUnpublish">Show less</button>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-12 col-lg-12" id="unpublish_rota_content_detail">
                        <div  id="new_unpublish_rota">
                         
                        </div>
                      </div>
                    <div class="col-lg-12">
                      <div class="no-rate-see">
                        <h2>No rotas to see here yet...</h2>
                      </div>
                    </div>
                    <div class="box-shod-info-part">
                      <div class="row">
                        <div class="cl-lg-2 col-md-2 col-sm-2">
                          <div class="icon_info-part"> <i class="fa fa-calendar-check-o"></i> </div>
                        </div>
                        <div class="cl-lg-10 col-md-10 col-sm-9">
                          <div class="content-active-tabsinfo">
                            <h2>Create & manage</h2>
                            <p>Create, plan and manage rotas all in one place. Add multiple staff to shifts, edit
                              ongoing shifts and get an up-to-date view of who's working when. </p>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="box-shod-info-part">
                      <div class="row">
                        <div class="cl-lg-10 col-md-10 col-sm-9">
                          <div class="content-active-tabsinfo">
                            <h2>Share with employees
                            </h2>
                            <p>Create, plan and manage rotas all in one place. Add multiple staff to shifts, edit
                              ongoing shifts and get an up-to-date view of who's working when. </p>
                          </div>
                        </div>
                        <div class="cl-lg-2 col-md-2 col-sm-2">
                          <div class="icon_info-part"> <i class="fa fa-user" aria-hidden="true"></i> </div>
                        </div>
                      </div>
                    </div>
                    <div class="box-shod-info-part">
                      <div class="row">
                        <div class="cl-lg-2 col-md-2 col-sm-2">
                          <div class="icon_info-part"> <i class="fa fa-laptop" aria-hidden="true"></i> </div>
                        </div>
                        <div class="cl-lg-10 col-md-10 col-sm-9">
                          <div class="content-active-tabsinfo">
                            <h2>Everything in one place
                            </h2>
                            <p>Create, plan and manage rotas all in one place. Add multiple staff to shifts, edit
                              ongoing shifts and get an up-to-date view of who's working when. </p>
                          </div>
                        </div>
                      </div>
                    </div>
                    </div>
                    <div class="tab-pane fade" id="oldrotas" role="tabpanel" aria-labelledby="oldrotas-tab">
                    <form class="active-rots-slt-from">
                        <div class="row">
                          <div class="col-lg-9">
                            <h3>Old rotas</h3>
                          </div>
                          <div class="col-lg-3 col-md-3">
                            <h4><a href="#">Create new Rota</a></h4>
                          </div>
                          <div class="col-lg-3 col-md-3">
                            <input type="date" placeholder="Select range..." class="form-control">
                          </div>
                          <div class="col-lg-3 col-md-3">
                            <input type="text" class="form-control" placeholder="Rota name...">
                          </div>
                          <div class="col-md-3">
                            <button type="button" class="filter_btn">Clear all filter</button>
                          </div>
                          <div class="row">
                            <div class="col-md-3 col-lg-3">
                              <select name="" class="form-select fotm-control" id="">
                                <option value="">Name (A-Z)</option>
                                <option value="">Name (Z-A )</option>
                                <option value="">Start date (Newest first)</option>
                                <option value="">Start date (Oldest first)</option>
                              </select>
                            </div>
                            <p class="mt-2">Rotas which have ended are shown here.</p>
                          </div>
                        </div>
                      </form>
                      <div class="row">
                        <div class="col-md-12 my-5 publish_rota_content">
                          <div class="d-flex justify-content-between">
                            <div class="d-flex align-items-center">
                              <h4>Published rotas</h4>
                              <span class="no_of_rota_publish" id="old_publish_rota_count"></span>
                            </div>
                            <div class="toggle_btns">
                              <button class="view_all_btn" onclick="showRotaPublish()" id="viewPublish" style="display: none;">View all</button>
                              <button class="show_less_btn" onclick="lessRotaPublish()" id="lessPublish">Show less</button>
                            </div>
                          </div>
                          <div class="content_about_publish" id="beforePublishRota">
                            <h5>In progress</h5>
                              <div id="old_publish_rota">
                              </div>
                          </div>
                            <p class="pb-8">Rotas that are currently active and in progress will appear here.</p>
                          </div>
                        </div>       
                        <div class="col-md-12 unpublish_rota_content">
                          <div class="d-flex justify-content-between">
                            <div class="d-flex align-items-center">
                              <h4>Unpublished rotas</h4>
                              <span class="no_of_rota_publish" id="old_unpublish_rota_count"></span>
                            </div>
                            <div class="toggle_btns">
                              <button class="view_all_btn" onclick="unPublishview()" id="viewUnpublish" style="display: none;">View all</button>
                              <button class="show_less_btn" onclick="unPublishless()" id="lessUnpublish">Show less</button>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-12 col-lg-12" id="unpublish_rota_content_detail">
                              <div  id="old_unpublish_rota">
                              </div>
                        </div>
                      </div>
                    <!-- </div> -->
                    <div class="tab-pane fade" id="createrota" role="tabpanel" aria-labelledby="createrota-tab">
                      <div class="row">
                        <div class="col-lg-12 create-a-rota-info">
                          <h2>Create a rota
                          </h2>
                          <p>Create and manage staggered shift patterns to support your back to work plans and manage
                            shift rotas for employees who regularly change their hours of work.
                          </p>
                          <h3>What would you like to do?</h3>
                        </div>
                        <div class="col-lg-4 select-rota" onclick="creatNewRota()">
                          <div class="box-createrota-boz card-btn card">
                            <input type="radio" class="radio-btn" name="select-btn">
                            <div class="bg-color">
                              <i class="fa fa-calendar"></i>
                              <h3>Create a new rota</h3>
                              <p>Create a new bespoke rota for your business. Choose your shift times, assign employees
                                and add notes before publishing.</p>
                            </div>
                        </div>
                      </div>
                        <form action="{{ url('/add-rota-data') }}" method="POST" class="select-rota formOne" id="createRota"        style="display: none;">
                          <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                          <div class="row">
                            <div class="col-md-12 mt-4">
                              <h3>Create a new rota</h3>
                            </div>
                            <div class="form-group col-md-12 my-3">
                              <label for="rota-name" class="mb-2">Rota name</label>
                              <div class="col-sm-4 col-md-4">
                                <input type="text" name="rota_name" id="rota-name" class="form-control"
                                  placeholder="Enter a new rota name">
                              </div>
                            </div>
                            <div class="form-group col-md-12 my-3">
                              <label for="select-days" class="mb-2">Rota duration</label>
                              <div class="col-sm-3 col-md-3">
                                <select name="rotaPeriodLength" class="form-select form-control" id="select-days">
                                  <option value="4">4 days</option>
                                  <option value="5">5 days</option>
                                  <option value="6">6 days</option>
                                  <option value="7">7 days</option>
                                  <option value="8">8 days</option>
                                  <option value="9">9 days</option>
                                  <option value="10">10 days</option>
                                  <option value="11">11 days</option>
                                  <option value="12">12 days</option>
                                  <option value="13">13 days</option>
                                  <option value="14">14 days</option>
                                  <option value="Calendar month">Calendar month</option>
                                </select>
                              </div>
                            </div>
                            <div class="form-group col-md-12 my-3">
                              <label for="select-date" class="mb-2">Rota start date</label>
                              <div class="col-sm-4 col-md-4">
                                <input type="date" id="select-date" name="start_date" class="form-control" placeholder="Select date">
                              </div>
                            </div>
                            <div class="col-md-12 mt-2">
                              <h3>Select your rota view</h3>
                            </div>
                            <div class="col-lg-4 select-rota">
                              <div class="box-createrota-boz card-btn card">
                                <input type="radio" name="rota_view" class="radio-btn"  value="1">
                                <div class="bg-color">
                                  <i class="fa fa-th" aria-hidden="true"></i>
                                  <h3>Table view</h3>
                                  <p>Set your shift times and easily assign this across employees and dates at once, with a click.</p>
                                </div>
                              </div>
                            </div>
                            <div class="col-lg-4 select-rota">
                              <div class="box-createrota-boz card card-btn">
                                <input type="radio" name="rota_view" class="radio-btn"  value="2">
                                <div class="bg-color">
                                  <i class="fa fa-calendar"></i>
                                  <h3>Timeline view</h3>
                                  <p>Add your shift times and assign this to as many employees as you need, right then and there. </p>
                                </div>
                              </div>
                            </div>
                            <div class="col-lg-4 select-rota">
                              <div class="box-createrota-boz card-btn card">
                                <input type="radio" name="rota_view" class="radio-btn"  value="3">
                                <div class="bg-color">
                                  <i class="fa fa-clone"></i>
                                  <h3>Drag and drop view</h3>
                                  <p>Drag and drop each employee onto the shift you'd like them to work.</p>
                                </div>
                              </div>
                            </div>
                            <div class="submit-btn my-3">
                              <button type="submit" id="rota_submit_btn">Create your rota</button>
                            </div>
                          </div>
                        </form>
                        <form action="" class="select-rota formTwo" id="copyRota" style="display: none;">
                          <div class="row">
                            <div class="col-md-12 mt-4">
                              <h3>Copy an existing rota</h3>
                            </div>
                            <div class="form-group col-md-12 my-3">
                              <label for="select-days" class="mb-2">Select a rota to copy</label>
                              <div class="col-sm-3 col-md-4">
                                <select name="whichRotaToCopy" class="form-select form-control" id="whichRotaToCopy">
                                  <option disabled="" value="">Select rota...</option>
                                  <option value="d9a73a7f-f3cb-41af-b3a5-e2d7115109f5">Mon 09 Jan 2023 - Shift 3</option>
                                  <option value="bd2e1487-ee40-43cf-9462-c977a314fcce">Wed 04 Jan 2023 - Shift 1</option>
                                  <option value="a8d09c6a-0e39-452e-8fdc-e61ea51c253d">Mon 21 Nov 2022 - Nov week 3
                                  </option>
                                </select>
                              </div>
                            </div>
                            <div class="form-group col-md-12 my-3">
                              <label for="rota-name" class="mb-2">Copy the notes for this rota?</label>
                              <div class="row">
                                <div class="col-md-2 select-rota">
                                  <div class="card-btn card">
                                    <input type="radio" class="radio-btn" name="select-btn" checked>
                                    <div class="change-color">
                                      <div class="custom-btn">
                                        <p class="bg-color-custom-btn"></p>
                                      </div>
                                      <div class="bg-color">Yes</div>
                                    </div>
                                  </div>
                                </div>
                                <div class="col-md-2 select-rota">
                                  <div class="card-btn card">
                                    <input type="radio" class="radio-btn" name="select-btn">
                                    <div class="change-color">
                                      <div class="custom-btn">
                                        <p class="bg-color-custom-btn"></p>
                                      </div>
                                      <div class="bg-color">No</div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <div class="form-group col-md-12 my-3">
                              <label for="rota-name" class="mb-2">Copy colour coding and labels for this rota?</label>
                              <div class="row">
                                <div class="col-md-2 select-rota">
                                  <div class="card-btn card">
                                    <input type="radio" class="radio-btn" name="select-btn-rota" checked>
                                    <div class="change-color">
                                      <div class="custom-btn">
                                        <p class="bg-color-custom-btn"></p>
                                      </div>
                                      <div class="bg-color">Yes</div>
                                    </div>
                                  </div>
                                </div>
                                <div class="col-md-2 select-rota">
                                  <div class="card-btn card">
                                    <input type="radio" class="radio-btn" name="select-btn-rota">
                                    <div class="change-color">
                                      <div class="custom-btn">
                                        <p class="bg-color-custom-btn"></p>
                                      </div>
                                      <div class="bg-color">No</div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <div class="form-group col-md-12 my-3">
                              <label for="rota-name" class="mb-2">Rota name</label>
                              <div class="col-sm-4 col-md-4">
                                <input type="text" id="rota-name" class="form-control"
                                  placeholder="Enter a new rota name">
                              </div>
                            </div>
                            <div class="form-group col-md-12 my-3">
                              <label for="select-date" class="mb-2">Rota start date</label>
                              <div class="col-sm-4 col-md-4">
                                <input type="date" id="select-date" name="start_date" class="form-control" placeholder="Select date">
                              </div>
                            </div>
                            <div class="col-md-12 mt-2">
                              <h3>Select your rota view</h3>
                            </div>
                            <div class="col-lg-4 select-rota">
                              <div class="box-createrota-boz card-btn card">
                                <input type="radio" class="radio-btn" name="select-btn">
                                <div class="bg-color">
                                  <i class="fa fa-th" aria-hidden="true"></i>
                                  <h3>Table view</h3>
                                  <p>Set your shift times and easily assign this across employees and dates at once, with a click.</p>
                                </div>
                              </div>
                            </div>
                            <div class="col-lg-4 select-rota">
                              <div class="box-createrota-boz card card-btn">
                                <input type="radio" class="radio-btn" name="select-btn">
                                <div class="bg-color">
                                  <i class="fa fa-calendar"></i>
                                  <h3>Timeline view</h3>
                                  <p>Add your shift times and assign this to as many employees as you need, right then and there. </p>
                                </div>
                              </div>
                            </div>
                            <div class="col-lg-4 select-rota">
                              <div class="box-createrota-boz card-btn card">
                                <input type="radio" class="radio-btn" name="select-btn">
                                <div class="bg-color">
                                  <i class="fa fa-clone"></i>
                                  <h3>Drag and drop view</h3>
                                  <p>Drag and drop each employee onto the shift you'd like them to work.</p>
                                </div>
                              </div>
                            </div>
                            <div class="submit-btn my-3">
                              <button type="submit">Create your rota</button>
                            </div>
                          </div>
                        </form>
                    </div>
                  </div>

                    </div>

                    </div>
                  </div>
                </div>
                <!-- Col Md 9 End -->
              </div>
            </div>
          </div>
        </div>
      </div>
  </section>
   <!-- Rename Modal -->
   <div class="modal fade" id="renameModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">Rename rota</h1>
            <button type="button" class="modal_close_btn" data-bs-dismiss="modal" aria-label="Close"> ✖ </button>
          </div>
          <div class="modal-body">
            <div class="col-md-5">
              <input type="text" id="team-name" placeholder="Enter name..." class="form-control">
            </div>
          </div>
          <div class="modal-footer">
            <input type="hidden" id="renameid" value=""/>
            <button type="button" class="close_btn_modal" data-bs-dismiss="modal">Close</button>
            <button type="button" id="rename_save_btn" data-bs-dismiss="modal" class="save_btn_modal">Save</button>
          </div>
        </div>
      </div>
  </div> 
   <!-- Rename Modal End -->

      <!-- Publish Modal -->
      <div class="modal fade" id="publishModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">Are you sure you want to publish this rota?</h1>
            <button type="button" class="modal_close_btn" data-bs-dismiss="modal" aria-label="Close"> ✖ </button>
          </div>
          <div class="modal-body">
            <div class="col-md-12">
            <input type="hidden" id="publish_rota_id" value=""/>
              <span>This will show <p id="shift_name_for_publish"></p> to your employees. They will be able to see their shifts and absence conflicts.</span>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="close_btn_modal" data-bs-dismiss="modal">Close</button>
            <button type="button" id="publish_model_btn" data-bs-dismiss="modal" class="save_btn_modal">Publish Rota</button>
          </div>
        </div>
      </div>
  </div> 
   <!-- Publish Modal End-->

    <!-- Unpublish Modal -->
    <div class="modal fade" id="unpublishModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">Are you sure you want to unpublish this rota?</h1>
            <button type="button" class="modal_close_btn" data-bs-dismiss="modal" aria-label="Close"> ✖ </button>
          </div>
          <div class="modal-body">
            <div class="col-md-12">
            <input type="hidden" id="unpublish_rota_id" value=""/>
              <span>This will hide <p id="shift_name_for_unpublish"></p> from your employees. They will no longer be able to access it or see their shifts and absence conflicts.</span>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="close_btn_modal" data-bs-dismiss="modal">Close</button>
            <button type="button" id="unpublish_model_btn" data-bs-dismiss="modal" class="save_btn_modal">Unpublish Rota</button>
          </div>
        </div>
      </div>
  </div> 
   <!-- Unpublish Modal End-->
     <!-- Modal View start -->
<div class="modal fade" id="exampleModalViewDetail" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog"  style="max-width: 70rem;">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Evening Shift</h1>
        <button type="button" class="modal_close_btn" data-bs-dismiss="modal" aria-label="Close"> ✖ </button>
      </div>
      <div class="modal-body">
        <div class="d-flex align-items-center">
          <span class="me-3">Select Week</span>
          <div class="col-md-3 col-lg-3 me-3">
            <select name="" class="form-select form-control" id="rota_starting_date">
            </select>
          </div>
          <span>Week total our: <strong>8 hrs (Incl. breaks)</strong></span>
        </div>
        <div class="w_full view_detail_modal">
          <div class="d-flex align-items-center shrink_all">
            <div class="w_19 py-2">Employee</div>
            <div class="w_19 py-2">Current contracted hours</div>
            <div class="w_19 py-2 ps-2">Days worked</div>
            <div class="w_19 py-2">
              <div class="w_full">Breaks</div>
              <small>(Total)</small>
            </div>
            <div class="w_19 py-2">
              <div class="w_full">Total hours</div>
              <form action="">
                <small class="d-flex align-items-center">
                  Incl. breaks?
                  <label for="break_check">
                    <input type="checkbox" class="d-none" id="break_check">
                    <span class="custom_checkbox">
                      <span class="d-flex align-items-center justify-content-center"><i class="fa fa-check" aria-hidden="true"></i></span>
                    </span>
                  </label>
                </small>
              </form>
            </div>
          </div>
        </div>
        <div class="w_full row_detail" id="add_emp_record">
          <div class="d-flex align-items-center justify-content-end hour_count">
            <div class="w_19 m-0 py-3">
              <p class="fw-bolder" id="total_emp_hour"></p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- Modal View end -->
  @include('rotaStaff.components.footer')
  <script>
    $( document ).ready(function() {
      var token = "<?=csrf_token()?>";
      $.ajax({
              url:"{{ url('/get_all_rota_data') }}",    
              dataType: 'json',
              data: {_token:token},
              success:function(result){
                  console.log(result);   
                  console.log(result.active_rota[0]['rota_start_date']);
                  document.getElementById('active_publish_rota_count').innerHTML = result.active_publish_rota_count;
                  document.getElementById('active_unpublish_rota_count').innerHTML = result.active_unpublish_rota_count;
                  document.getElementById('old_publish_rota_count').innerHTML = result.old_publish_rota_count;
                  document.getElementById('old_unpublish_rota_count').innerHTML = result.old_unpublish_rota_count;
                  
                  for (let index = 0; index < result.active_rota.length; index++) {
                    if(result.active_rota[index]['status'] === 1){
                      document.querySelector('#new_publish_rota').insertAdjacentHTML(
                      'afterbegin',
                          `  <div  class="parent_div my-2">
                              <div class="d-flex justify-content-between">
                                <div class="d-flex flex-column align-items-center justify-content-center col-md-2 date_of_shift_rota">
                                  <div>`+moment(result.active_rota[index]['rota_start_date']).format('ddd')+`</div>
                                  <div class="">`+moment(result.active_rota[index]['rota_start_date']).format('Do MMM ')+`</div>
                                </div>
                                <div class="col-md-10 px-2">
                                  <div class="d-flex justify-content-between align-items-center">
                                    <div>
                                      <a href="{{  url('/edit_rota/', `+result.active_rota[index]['id']+` ) }}" class="rota_shift_employee_name">`+result.active_rota[index]['rota_name']+`</a>
                                    </div>
                                    <div class="dropdown">
                                      <button class=" my-2 d-flex justify-content-center align-items-center three_dot_btn" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        <span class="dropbtn">
                                          <svg width="32" class="dropbtn" height="32" viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg">
                                            <circle cx="16" class="dropbtn" cy="24" r="2"></circle>
                                            <circle cx="16" class="dropbtn" cy="16" r="2"></circle>
                                            <circle cx="16" class="dropbtn" cy="8" r="2"></circle>
                                          </svg>
                                        </span>
                                      </button>
                                      <div class="dropdown-menu dropdown-content">
                                        <ul>
                                            <li>
                                              <span class="edit-icon dropdown_icon"><i class="fa fa-pencil" aria-hidden="true"></i></span>
                                              <a href="{{ url('/edit_rota/',`+result.active_rota[index]['id']+` ) }}">Edit</a>
                                            </li>
                                            <li>  
                                              <span class="i-icon dropdown_icon"><i class="fa fa-info-circle" aria-hidden="true"></i></span>
                                              <a onclick="RotaView(`+result.active_rota[index]['id']+`,`+result.active_rota[index]['rota_name']+`)">View</a>
                                            </li>
                                            <li>
                                              <span class="edit-icon dropdown_icon"><i class="fa fa-pencil" aria-hidden="true"></i></span>
                                              <a onclick="renamedata(`+result.active_rota[index]['id']+`,`+result.active_rota[index]['rota_name']+`)">Rename</a> 
                                            </li>
                                            <li>
                                              <span class="tick-icon dropdown_icon"><i class="fa fa-check" aria-hidden="true"></i></span>
                                              <a onclick="unpublishRotaEmployee(`+result.active_rota[index]['id']+`,`+result.active_rota[index]['rota_name']+`)">Unpublish</a>
                                            </li>
                                            <li>
                                              <span class="delete-icon dropdown_icon"><i class="fa fa-trash" aria-hidden="true"></i></span>
                                              <a onclick="DeleteRotaEmployee(`+result.active_rota[index]['id']+`,`+result.active_rota[index]['rota_name']+`)" class="delete_btn">Delete</a>
                                            </li>
                                        </ul>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="d-flex">
                                    <div class="pe-3">Total:  (Incl. breaks)</div>
                                    <div class="order-1">`+result.active_rota[index]['rota_duration']+` days<span class="px-2"></span><span>
                                      <?php $emp1 = \App\RotaAssignEmployee::where(['rota_id' => 1, 'status'=> 1])->count(); echo $emp1; ?> employees</span>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>`   
                       ); 
                    }
                    if(result.active_rota[index]['status'] === 0) {
                      document.querySelector('#new_unpublish_rota').insertAdjacentHTML(
                        'afterbegin',
                            `  <div  class="parent_div my-2">
                                <div class="d-flex justify-content-between">
                                  <div class="d-flex flex-column align-items-center justify-content-center col-md-2 date_of_shift_rota">
                                    <div>`+moment(result.active_rota[index]['rota_start_date']).format('ddd')+`</div>
                                    <div class="">`+moment(result.active_rota[index]['rota_start_date']).format('Do MMM ')+`</div>
                                  </div>
                                  <div class="col-md-10 px-2">
                                    <div class="d-flex justify-content-between align-items-center">
                                      <div>
                                        <a href="{{  url('/edit_rota/', `+result.active_rota[index]['id']+` ) }}" class="rota_shift_employee_name">`+result.active_rota[index]['rota_name']+`</a>
                                      </div>
                                      <div class="dropdown">
                                        <button class=" my-2 d-flex justify-content-center align-items-center three_dot_btn" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                          <span class="dropbtn">
                                            <svg width="32" class="dropbtn" height="32" viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg">
                                              <circle cx="16" class="dropbtn" cy="24" r="2"></circle>
                                              <circle cx="16" class="dropbtn" cy="16" r="2"></circle>
                                              <circle cx="16" class="dropbtn" cy="8" r="2"></circle>
                                            </svg>
                                          </span>
                                        </button>
                                        <div class="dropdown-menu dropdown-content">
                                          <ul>
                                              <li>
                                                <span class="edit-icon dropdown_icon"><i class="fa fa-pencil" aria-hidden="true"></i></span>
                                                <a href="{{ url('/edit_rota/',`+result.active_rota[index]['id']+` ) }}">Edit</a>
                                              </li>
                                              <li>  
                                                <span class="i-icon dropdown_icon"><i class="fa fa-info-circle" aria-hidden="true"></i></span>
                                                <a onclick="RotaView(`+result.active_rota[index]['id']+`,`+result.active_rota[index]['rota_name']+`)">View</a>
                                              </li>
                                              <li>
                                                <span class="edit-icon dropdown_icon"><i class="fa fa-pencil" aria-hidden="true"></i></span>
                                                <a onclick="renamedata(`+result.active_rota[index]['id']+`,`+result.active_rota[index]['rota_name']+`)">Rename</a> 
                                              </li>
                                              <li>
                                                <span class="tick-icon dropdown_icon"><i class="fa fa-check" aria-hidden="true"></i></span>
                                                <a onclick="unpublishRotaEmployee(`+result.active_rota[index]['id']+`,`+result.active_rota[index]['rota_name']+`)">Unpublish</a>
                                              </li>
                                              <li>
                                                <span class="delete-icon dropdown_icon"><i class="fa fa-trash" aria-hidden="true"></i></span>
                                                <a onclick="DeleteRotaEmployee(`+result.active_rota[index]['id']+`,`+result.active_rota[index]['rota_name']+`)" class="delete_btn">Delete</a>
                                              </li>
                                          </ul>
                                        </div>
                                      </div>
                                    </div>
                                    <div class="d-flex">
                                      <div class="pe-3">Total:  (Incl. breaks)</div>
                                      <div class="order-1">`+result.active_rota[index]['rota_duration']+` days<span class="px-2"></span><span>
                                        {{ \App\RotaAssignEmployee::where(['rota_id' => `+result.active_rota[index]['id']+`, 'status'=> 1])->count() }} employees</span>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>`   
                      );  
                    }
                  }  
                  for (let index = 0; index < result.old_rota.length; index++) {
                    if(result.old_rota[index]['status'] === 1){
                      document.querySelector('#new_publish_rota').insertAdjacentHTML(
                      'afterbegin',
                          `  <div  class="parent_div my-2">
                              <div class="d-flex justify-content-between">
                                <div class="d-flex flex-column align-items-center justify-content-center col-md-2 date_of_shift_rota">
                                  <div>`+moment(result.old_rota[index]['rota_start_date']).format('ddd')+`</div>
                                  <div class="">`+moment(result.old_rota[index]['rota_start_date']).format('Do MMM ')+`</div>
                                </div>
                                <div class="col-md-10 px-2">
                                  <div class="d-flex justify-content-between align-items-center">
                                    <div>
                                      <a href="{{  url('/edit_rota/', `+result.old_rota[index]['id']+` ) }}" class="rota_shift_employee_name">`+result.old_rota[index]['rota_name']+`</a>
                                    </div>
                                    <div class="dropdown">
                                      <button class=" my-2 d-flex justify-content-center align-items-center three_dot_btn" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        <span class="dropbtn">
                                          <svg width="32" class="dropbtn" height="32" viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg">
                                            <circle cx="16" class="dropbtn" cy="24" r="2"></circle>
                                            <circle cx="16" class="dropbtn" cy="16" r="2"></circle>
                                            <circle cx="16" class="dropbtn" cy="8" r="2"></circle>
                                          </svg>
                                        </span>
                                      </button>
                                      <div class="dropdown-menu dropdown-content">
                                        <ul>
                                            <li>
                                              <span class="edit-icon dropdown_icon"><i class="fa fa-pencil" aria-hidden="true"></i></span>
                                              <a href="{{ url('/edit_rota/',`+result.old_rota[index]['id']+` ) }}">Edit</a>
                                            </li>
                                            <li>  
                                              <span class="i-icon dropdown_icon"><i class="fa fa-info-circle" aria-hidden="true"></i></span>
                                              <a onclick="RotaView(`+result.old_rota[index]['id']+`,`+result.old_rota[index]['rota_name']+`)">View</a>
                                            </li>
                                            <li>
                                              <span class="edit-icon dropdown_icon"><i class="fa fa-pencil" aria-hidden="true"></i></span>
                                              <a onclick="renamedata(`+result.old_rota[index]['id']+`,`+result.old_rota[index]['rota_name']+`)">Rename</a> 
                                            </li>
                                            <li>
                                              <span class="tick-icon dropdown_icon"><i class="fa fa-check" aria-hidden="true"></i></span>
                                              <a onclick="unpublishRotaEmployee(`+result.old_rota[index]['id']+`,`+result.old_rota[index]['rota_name']+`)">Unpublish</a>
                                            </li>
                                            <li>
                                              <span class="delete-icon dropdown_icon"><i class="fa fa-trash" aria-hidden="true"></i></span>
                                              <a onclick="DeleteRotaEmployee(`+result.old_rota[index]['id']+`,`+result.old_rota[index]['rota_name']+`)" class="delete_btn">Delete</a>
                                            </li>
                                        </ul>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="d-flex">
                                    <div class="pe-3">Total:  (Incl. breaks)</div>
                                    <div class="order-1">`+result.old_rota[index]['rota_duration']+` days<span class="px-2"></span><span>
                                      {{ \App\RotaAssignEmployee::where(['rota_id' => `+result.old_rota[index]['id']+`, 'status'=> 1])->count() }} employees</span>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>`   
                       ); 
                    }
                    if(result.old_rota[index]['status'] === 0) {
                      document.querySelector('#new_unpublish_rota').insertAdjacentHTML(
                        'afterbegin',
                            `  <div  class="parent_div my-2">
                                <div class="d-flex justify-content-between">
                                  <div class="d-flex flex-column align-items-center justify-content-center col-md-2 date_of_shift_rota">
                                    <div>`+moment(result.old_rota[index]['rota_start_date']).format('ddd')+`</div>
                                    <div class="">`+moment(result.old_rota[index]['rota_start_date']).format('Do MMM')+`</div>
                                  </div>
                                  <div class="col-md-10 px-2">
                                    <div class="d-flex justify-content-between align-items-center">
                                      <div>
                                        <a href="{{  url('/edit_rota/', `+result.old_rota[index]['id']+` ) }}" class="rota_shift_employee_name">`+result.old_rota[index]['rota_name']+`</a>
                                      </div>
                                      <div class="dropdown">
                                        <button class=" my-2 d-flex justify-content-center align-items-center three_dot_btn" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                          <span class="dropbtn">
                                            <svg width="32" class="dropbtn" height="32" viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg">
                                              <circle cx="16" class="dropbtn" cy="24" r="2"></circle>
                                              <circle cx="16" class="dropbtn" cy="16" r="2"></circle>
                                              <circle cx="16" class="dropbtn" cy="8" r="2"></circle>
                                            </svg>
                                          </span>
                                        </button>
                                        <div class="dropdown-menu dropdown-content">
                                          <ul>
                                              <li>
                                                <span class="edit-icon dropdown_icon"><i class="fa fa-pencil" aria-hidden="true"></i></span>
                                                <a href="{{ url('/edit_rota/',`+result.old_rota[index]['id']+` ) }}">Edit</a>
                                              </li>
                                              <li>  
                                                <span class="i-icon dropdown_icon"><i class="fa fa-info-circle" aria-hidden="true"></i></span>
                                                <a onclick="RotaView(`+result.old_rota[index]['id']+`,`+result.old_rota[index]['rota_name']+`)">View</a>
                                              </li>
                                              <li>
                                                <span class="edit-icon dropdown_icon"><i class="fa fa-pencil" aria-hidden="true"></i></span>
                                                <a onclick="renamedata(`+result.old_rota[index]['id']+`,`+result.old_rota[index]['rota_name']+`)">Rename</a> 
                                              </li>
                                              <li>
                                                <span class="tick-icon dropdown_icon"><i class="fa fa-check" aria-hidden="true"></i></span>
                                                <a onclick="unpublishRotaEmployee(`+result.old_rota[index]['id']+`,`+result.old_rota[index]['rota_name']+`)">Unpublish</a>
                                              </li>
                                              <li>
                                                <span class="delete-icon dropdown_icon"><i class="fa fa-trash" aria-hidden="true"></i></span>
                                                <a onclick="DeleteRotaEmployee(`+result.old_rota[index]['id']+`,`+result.old_rota[index]['rota_name']+`)" class="delete_btn">Delete</a>
                                              </li>
                                          </ul>
                                        </div>
                                      </div>
                                    </div>
                                    <div class="d-flex">
                                      <div class="pe-3">Total:  (Incl. breaks)</div>
                                      <div class="order-1">`+result.old_rota[index]['rota_duration']+` days<span class="px-2"></span><span>
                                        {{ \App\RotaAssignEmployee::where(['rota_id' => `+result.old_rota[index]['id']+`, 'status'=> 1])->count() }} employees</span>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>`   
                      );  
                    }
                  }  
              }
          });
      const source = document.getElementById('rota_name_search');
      const result = document.getElementById('result');

      const inputHandler = function(e) {
        var search_name = e.target.value;
        $.ajax({
              url:"{{ url('/get_record_of_rota') }}",    
              type: "post",    
              dataType: 'json',
              data: {search_name: search_name, _token:token},
              success:function(result){
                  console.log(result);   
              }
          });
        result.innerHTML = e.target.value;
      }

      source.addEventListener('input', inputHandler);
      source.addEventListener('propertychange', inputHandler); 

       
        
        $('#rename_save_btn').on('click', function(){
          var rota_id =  document.getElementById('renameid').value;
          var rota_name = document.getElementById('team-name').value;
          var token = "<?=csrf_token()?>";
          $.ajax({
              url:"{{ url('/update_rota_name') }}",    
              type: "post",    
              dataType: 'json',
              data: {rota_id: rota_id, rota_name: rota_name, _token:token},
              success:function(result){
                  console.log(result);     
              }
          });
        });
        $('#publish_model_btn').on('click', function(){
          var publish_rota_id =  document.getElementById('publish_rota_id').value;
         var token = "<?=csrf_token()?>";
          $.ajax({
              url:"{{ url('/publish_rota_employee') }}",    
              type: "post",    
              dataType: 'json',
              data: {publish_rota_id: publish_rota_id, _token:token},
              success:function(result){
                  console.log(result);   
                  location.reload();  
              }
          });
        });
        $('#unpublish_model_btn').on('click', function(){
          var unpublish_rota_id =  document.getElementById('unpublish_rota_id').value;
          var token = "<?=csrf_token()?>";
          $.ajax({
              url:"{{ url('/unpublish_rota_employee') }}",    
              type: "post",    
              dataType: 'json',
              data: {unpublish_rota_id: unpublish_rota_id, _token:token},
              success:function(result){
                  console.log(result);   
                  location.reload();  
              }
          });
        });
    });
     
    let viewMore = document.getElementById('viewPublish').style.display = "none";

    function lessRotaPublish() {
      let showLess = document.getElementById('lessPublish');
      let viewMore = document.getElementById('viewPublish');
      let contentPublish = document.getElementById('beforePublishRota');
      if(viewMore.style.display === "none") {
        showLess.style.display = "none";
        viewMore.style.display = "block";
        contentPublish.style.display = "none";
      }
    }

    function showRotaPublish() {
      let showLess = document.getElementById('lessPublish');
      let viewMore = document.getElementById('viewPublish');
      let contentPublish = document.getElementById('beforePublishRota');
      if(showLess.style.display === "none") {
        showLess.style.display = "block";
        viewMore.style.display = "none";
        contentPublish.style.display = "block";
      }
    }

    let unPublishViewMore = document.getElementById('viewUnpublish').style.display = "none"; 

    function unPublishless() {
      let unPublishViewMore = document.getElementById('viewUnpublish');
      let unPublishLess = document.getElementById('lessUnpublish');
      let contentUnpublish = document.getElementById('unpublish_rota_content_detail');
      if(unPublishViewMore.style.display === "none") {
        unPublishViewMore.style.display = "block";
        unPublishLess.style.display = "none";
        contentUnpublish.style.display = "none";
      }
    }

    function unPublishview() {
      let unPublishViewMore = document.getElementById('viewUnpublish');
      let unPublishLess = document.getElementById('lessUnpublish');
      let contentUnpublish = document.getElementById('unpublish_rota_content_detail');
      if(unPublishViewMore.style.display === "block") {
        unPublishViewMore.style.display = "none";
        unPublishLess.style.display = "block";
        contentUnpublish.style.display = "block";
      }
    }
  </script>
  <script>
    function renamedata(id,name){
      $('#team-name').val(name);
      $('#renameid').val(id);
      $('#renameModal').modal('show');    
    }

    function publishRotaEmployee(id, name){
        $('#publish_rota_id').val(id);
        document.getElementById('shift_name_for_publish').innerHTML = name;
        $('#publishModal').modal('show');
    }

    function unpublishRotaEmployee(id, name){
        $('#unpublish_rota_id').val(id);
        document.getElementById('shift_name_for_unpublish').innerHTML = name;
        $('#unpublishModal').modal('show');
    }

    function DeleteRotaEmployee(id, name){
      var token = "<?=csrf_token()?>";
      $.ajax({
              url:"{{ url('/delete_rota_employee') }}",    
              type: "post",    
              dataType: 'json',
              data: {id: id, _token:token},
              success:function(result){
                  console.log(result);   
                  location.reload();  
              }
          });
    }

    function RotaView(id, name){

      var token = "<?=csrf_token()?>";
      $.ajax({
              url:"{{ url('/get_all_shift') }}",    
              type: "post",    
              dataType: 'json',
              data: {id: id, _token:token},
              success:function(result){
                console.log(result); 
                $('#rota_starting_date').append("<option>Week 1 - "+result+"</option>");  
              }
          });


      $.ajax({
              url:"{{ url('/get_rota_employee') }}",    
              type: "post",    
              dataType: 'json',
              data: {id: id, _token:token},
              success:function(result){
                  console.log(result);   
                  var total_emp_hours = 0;  var total_emp_minutes = 0;
                  for (let index = 0; index < result.length; index++) {
                    console.log(result[index].name);
                    var startTime = moment(result[index].shift_start_time, 'HH:mm:ss');
                    var endTime = moment(result[index].shift_end_time, 'HH:mm:ss');

                    // calculate total duration
                    var duration = moment.duration(endTime.diff(startTime));
                    console.log(duration);
                    // duration in hours
                    var hours = parseInt(duration.asHours());
                    var total_emp_hours = total_emp_hours + hours;
                    // duration in minutes
                    var minutes = parseInt(duration.asMinutes()) % 60;  

                    total_emp_minutes = total_emp_minutes + minutes;

                    var totalhour = hours + ' hour and ' + minutes + ' minutes.';
                    document.querySelector('#add_emp_record').insertAdjacentHTML(
                        'afterbegin',
                            `<div class="d-flex align-items-center shrink_all">
                              <div class="w_19 py-2" style="overflow-x: scroll; overflow-y: hidden;">`+result[index].name+`</div>
                              <div class="w_19 py-2" style="overflow-x: scroll; overflow-y: hidden;">40 hrs</div>
                              <div class="w_19 py-2 ps-2">
                                <span class="d-flex">
                                  <p class="ms-2 fw-bolder" style="color:#ad005c;">F</p>
                                  <p class="ms-2 fw-bolder">S</p>
                                  <p class="ms-2 fw-bolder">S</p>
                                  <p class="ms-2 fw-bolder">M</p>
                                  <p class="ms-2 fw-bolder">T</p>
                                  <p class="ms-2 fw-bolder">W</p>
                                  <p class="ms-2 fw-bolder">T</p>
                                </span>
                              </div>
                              <div class="w_19 py-2">
                                <div class="w_full">`+result[index].break+` min</div>
                              </div>
                              <div class="w_19 py-2">
                                <div class="w_full">`+totalhour+`</div>
                              </div>
                            </div>`   
                        );    
                  }
                  var total_duration = total_emp_hours + ' hour and ' + total_emp_minutes + ' minutes.';
                  document.getElementById('total_emp_hour').innerHTML=  total_duration;
              }
          });
         
      $('#exampleModalViewDetail').modal('show');

    }
    // $('#break_check').click(function(){ alert("hello"); });

</script> 