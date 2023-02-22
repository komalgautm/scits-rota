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

.dropdown-content ul li a {}

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
                            <input type="text" placeholder="Select range..." class="form-control">
                          </div>
                          <div class="col-lg-3 col-md-3">
                            <input type="text" class="form-control form-select" placeholder="Rota name...">
                          </div>
                        </div>
                      </form>
                      <div class="col-md-12 my-5 publish_rota_content">
                        <div class="d-flex justify-content-between">
                          <div class="d-flex align-items-center">
                            <h4>Published rotas</h4>
                            <span class="no_of_rota_publish">{{ $active_publish_rota_count }}</span>
                          </div>
                          <div class="toggle_btns">
                            <button class="view_all_btn" onclick="showRotaPublish()" id="viewPublish">View all</button>
                            <button class="show_less_btn" onclick="lessRotaPublish()" id="lessPublish">Show less</button>
                          </div>
                        </div>
                        <div class="content_about_publish" id="beforePublishRota">
                          <h5>In progress</h5>
                          @foreach($active_rota as $rota_list_data)
                           @if($rota_list_data->status == 1)
                           <?php  $rota_id1 =  $rota_list_data->id; ?>
                            <div class="parent_div my-2">
                              <div class="d-flex justify-content-between">
                                <div class="d-flex flex-column align-items-center justify-content-center col-md-2 date_of_shift_rota">
                                  <div>{{ \Carbon\Carbon::parse($rota_list_data->rota_start_date)->format('D')}}</div>
                                  <div class="">{{ \Carbon\Carbon::parse($rota_list_data->rota_start_date)->format('jS M')}}</div>
                                </div>
                                <div class="col-md-10 px-2">
                                  <div class="d-flex justify-content-between align-items-center">
                                    <div>
                                      <input type="text" id="rota_id" value="{{ $rota_list_data->id }}">
                                      <a href="#" class="rota_shift_employee_name">{{ $rota_list_data->rota_name }}</a>
                                    </div>
                                    <div class="dropdown">
                                      <button class=" my-2 d-flex justify-content-center align-items-center three_dot_btn" type="button"  id="listing_button" data-bs-toggle="dropdown" aria-expanded="false">
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
                                              <a href="./timeline-view.html">Edit</a>
                                            </li>
                                            <li>  
                                              <span class="i-icon dropdown_icon"><i class="fa fa-info-circle" aria-hidden="true"></i></span>
                                              <a href="#">View</a>
                                            </li>
                                            <li>
                                              <span class="edit-icon dropdown_icon"><i class="fa fa-pencil" aria-hidden="true"></i></span>
                                              <a href="#"  data-bs-toggle="modal" data-bs-target="#exampleModal">Rename</a> 
                                            </li>
                                            <li>
                                              <span class="tick-icon dropdown_icon"><i class="fa fa-check" aria-hidden="true"></i></span>
                                              <a href="#" data-bs-toggle="modal" data-bs-target="#publishModal">Publish</a>
                                            </li>
                                            <li>
                                              <span class="delete-icon dropdown_icon"><i class="fa fa-trash-o" aria-hidden="true"></i></span>
                                              <a href="#" class="delete_btn">Delete</a>
                                            </li>
                                          </ul>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="d-flex">
                                    <div class="pe-3">Total: 0 hrs 0 mins (Incl. breaks)</div>
                                    <div class="order-1">{{ $rota_list_data->rota_duration }} days<span class="px-2"></span><span>0 employees</span>
                                  </div>
                                </div>
                              </div>
                              </div>
                            </div>
                            @endif
                        @endforeach
                          <p class="pb-8">Rotas that are currently active and in progress will appear here.</p>
                          <h5>Future rotas</h5>
                          <p class="pb-8">Rotas that are starting in the future will appear here.</p>
                        </div>
                      </div>
                      <div class="col-md-12 unpublish_rota_content">
                        <div class="d-flex justify-content-between">
                          <div class="d-flex align-items-center">
                            <h4>Unpublished rotas</h4>
                            <span class="no_of_rota_publish">{{ $active_unpublish_rota_count }}</span>
                          </div>
                          <div class="toggle_btns">
                            <button class="view_all_btn" onclick="unPublishview()" id="viewUnpublish">View all</button>
                            <button class="show_less_btn" onclick="unPublishless()" id="lessUnpublish">Show less</button>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-12 col-lg-12" id="unpublish_rota_content_detail">
                        @foreach($active_rota as $rota_list_data)
                          @if($rota_list_data->status == 0)
                          <?php  $rota_id2 = $rota_list_data->id; ?>
                          <div class="parent_div my-2">
                            <div class="d-flex justify-content-between">
                              <div class="d-flex flex-column align-items-center justify-content-center col-md-2 date_of_shift_rota">
                                <div>{{ \Carbon\Carbon::parse($rota_list_data->rota_start_date)->format('D')}} </div>
                                <div class="">{{ \Carbon\Carbon::parse($rota_list_data->rota_start_date)->format('jS M')}}</div>
                              </div>
                              <div class="col-md-10 px-2">
                                <div class="d-flex justify-content-between align-items-center">
                                  <div>
                                    <a href="./timeline-view.html" class="rota_shift_employee_name">{{ $rota_list_data->rota_name }}</a>
                                  </div>
                                  <div class="dropdown">
                                    <button class=" my-2 d-flex justify-content-center align-items-center three_dot_btn" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                      <span class="dropbtn">
                                        <svg width="32" class="dropbtn" height="32" viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg" class="">
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
                                            <a href="./timeline-view.html">Edit</a>
                                          </li>
                                          <li>  
                                            <span class="i-icon dropdown_icon"><i class="fa fa-info-circle" aria-hidden="true"></i></span>
                                            <a href="#">View</a>
                                          </li>
                                          <li>
                                            <span class="edit-icon dropdown_icon"><i class="fa fa-pencil" aria-hidden="true"></i></span>
                                            <a href="./timeline-view.html" data-bs-toggle="modal" data-bs-target="#exampleModal1" >Rename</a> 
                                          </li>
                                          <li>
                                            <span class="tick-icon dropdown_icon"><i class="fa fa-check" aria-hidden="true"></i></span>
                                            <a href="#" data-bs-toggle="modal" data-bs-target="#publishModal1">Publish</a>
                                          </li>
                                          <li>
                                            <span class="delete-icon dropdown_icon"><i class="fa fa-trash-o" aria-hidden="true"></i></span>
                                            <a href="#" class="delete_btn">Delete</a>
                                          </li>
                                        </ul>
                                    </div>
                                  </div>
                                </div>
                                <div class="d-flex">
                                  <div class="pe-3">Total: 0 hrs 0 mins (Incl. breaks)</div>
                                  <div class="order-1">{{ $rota_list_data->rota_duration }} days<span class="px-2"></span><span>0 employees</span>
                                </div>
                              </div>
                            </div>
                          </div>
                        @endif
                      @endforeach
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
                          <div class="col-lg-8 col-md-8">
                            <input type="text" placeholder="Select range..." class="form-control select-date">
                          </div>
                          <div class="col-lg-4 col-md-4">
                            <input type="text" class="form-control" placeholder="Rota name...">
                          </div>
                          <div class="col-md-12 my-5 publish_rota_content">
                            <div class="d-flex justify-content-between">
                              <div class="d-flex align-items-center">
                                <h4>Published rotas</h4>
                                <span class="no_of_rota_publish">1</span>
                              </div>
                              <div class="toggle_btns">
                                <button class="view_all_btn" onclick="showRotaPublish()" id="viewPublish" style="display: none;">View all</button>
                                <button class="show_less_btn" onclick="lessRotaPublish()" id="lessPublish">Show less</button>
                              </div>
                            </div>
                            <div class="content_about_publish" id="beforePublishRota">
                              <h5>In progress</h5>
                              @foreach($old_rota as $rota_list_data)
                                @if($rota_list_data->status == 1)
                                  <div class="parent_div my-2">
                                    <div class="d-flex justify-content-between">
                                      <div class="d-flex flex-column align-items-center justify-content-center col-md-2 date_of_shift_rota">
                                        <div>{{ \Carbon\Carbon::parse($rota_list_data->rota_start_date)->format('D')}} </div>
                                        <div class="">{{ \Carbon\Carbon::parse($rota_list_data->rota_start_date)->format('jS M')}}</div>
                                      </div>
                                      <div class="col-md-10 px-2">
                                        <div class="d-flex justify-content-between align-items-center">
                                          <div>
                                            <a href="./timeline-view.html" class="rota_shift_employee_name">{{ $rota_list_data->rota_name }}</a>
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
                                                    <a href="./timeline-view.html">Edit</a>
                                                  </li>
                                                  <li>  
                                                    <span class="i-icon dropdown_icon"><i class="fa fa-info-circle" aria-hidden="true"></i></span>
                                                    <a href="#">View</a>
                                                  </li>
                                                  <li>
                                                    <span class="edit-icon dropdown_icon"><i class="fa fa-pencil" aria-hidden="true"></i></span>
                                                    <a href="./timeline-view.html" data-bs-toggle="modal" data-bs-target="#exampleModal2">Rename</a> 
                                                  </li>
                                                  <li>
                                                    <span class="tick-icon dropdown_icon"><i class="fa fa-check" aria-hidden="true"></i></span>
                                                    <a href="#" data-bs-toggle="modal" data-bs-target="#publishModal2">Publish</a>
                                                  </li>
                                                  <li>
                                                    <span class="delete-icon dropdown_icon"><i class="fa fa-trash-o" aria-hidden="true"></i></span>
                                                    <a href="#" class="delete_btn">Delete</a>
                                                  </li>
                                                </ul>
                                            </div>
                                          </div>
                                      <div class="d-flex">
                                        <div class="pe-3">Total: 0 hrs 0 mins (Incl. breaks)</div>
                                        <div class="order-1">{{ $rota_list_data->rota_duration }} days<span class="px-2"></span><span>0 employees</span>
                                      </div>
                                    </div>
                                  </div>
                            </div>
                          </div>
                              @endif
                            @endforeach
                          <p class="pb-8">Rotas that are currently active and in progress will appear here.</p>
                        </div>
                      </div>
                      <div class="col-md-12 unpublish_rota_content">
                        <div class="d-flex justify-content-between">
                          <div class="d-flex align-items-center">
                            <h4>Unpublished rotas</h4>
                            <span class="no_of_rota_publish">1</span>
                          </div>
                          <div class="toggle_btns">
                            <button class="view_all_btn" onclick="unPublishview()" id="viewUnpublish" style="display: none;">View all</button>
                            <button class="show_less_btn" onclick="unPublishless()" id="lessUnpublish">Show less</button>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-12 col-lg-12" id="unpublish_rota_content_detail">
                        @foreach($old_rota as $rota_list_data)
                          @if($rota_list_data->status == 0)
                            <div class="parent_div my-2">
                              <div class="d-flex justify-content-between">
                              <div class="d-flex flex-column align-items-center justify-content-center col-md-2  date_of_shift_rota">
                                <div>{{ \Carbon\Carbon::parse($rota_list_data->rota_start_date)->format('D')}} </div>
                                <div class="">{{ \Carbon\Carbon::parse($rota_list_data->rota_start_date)->format('jS M')}}</div>
                              </div>
                              <div class="col-md-10 px-2">
                                <div class="d-flex justify-content-between align-items-center">
                                  <div>
                                    <a href="./timeline-view.html" class="rota_shift_employee_name">{{ $rota_list_data->rota_name }}</a>
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
                                            <a href="./timeline-view.html">Edit</a>
                                          </li>
                                          <li>  
                                            <span class="i-icon dropdown_icon"><i class="fa fa-info-circle" aria-hidden="true"></i></span>
                                            <a href="#">View</a>
                                          </li>
                                          <li>
                                            <span class="edit-icon dropdown_icon"><i class="fa fa-pencil" aria-hidden="true"></i></span>
                                            <a href="./timeline-view.html" data-bs-toggle="modal" data-bs-target="#exampleModal4">Rename</a> 
                                          </li>
                                          <li>
                                            <span class="tick-icon dropdown_icon"><i class="fa fa-check" aria-hidden="true"></i></span>
                                            <a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal">Publish</a>
                                          </li>
                                          <li>
                                            <span class="delete-icon dropdown_icon"><i class="fa fa-trash-o" aria-hidden="true"></i></span>
                                            <a href="#" class="delete_btn">Delete</a>
                                          </li>
                                      </ul>
                                    </div>
                                  </div>
                                </div> 
                                <div class="d-flex">
                                  <div class="pe-3">Total: 0 hrs 0 mins (Incl. breaks)</div>
                                  <div class="order-1">{{ $rota_list_data->rota_duration }} days<span class="px-2"></span><span>0 employees</span>
                                </div>
                              </div>
                            </div>
                      </div>
                          @endif
                        @endforeach
                          </div>
                        </div>
                        </div>
                      </form>
    
                    <div class="row">
                      <div class="no-rate-see">
                        <div class="row">
                          <div class="col-lg-4 col-md-4 col-sm-4">
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-lg-4 col-md-4 col-sm-4">
                          </div>
                        </div>
                          <!-- <h2>No rotas to see here yet...</h2> -->
                        </div>
                      </div>
                    </div>
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
                                and add notes before publishing. </p>
                            </div>
                          </div>
                        </div>
                        <form action="{{ url('/add-rota-data') }}" method="POST" class="select-rota formOne" id="createRota" style="display: none;">
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
                                <input type="text" id="select-date" name="start_date" class="form-control date_picker" placeholder="Select date" onkeyup="manage(this)">
                              </div>
                            </div>
                            <div class="col-md-12 mt-2">
                              <h3>Select your rota view</h3>
                            </div>
                            <div class="col-lg-4 select-rota">
                              <div class="box-createrota-boz card-btn card">
                                <input type="radio" name="rota_view" class="radio-btn" value="1">
                                <div class="bg-color">
                                  <i class="fa fa-th" aria-hidden="true"></i>
                                  <h3>Table view</h3>
                                  <p>Set your shift times and easily assign this across employees and dates at once, with a click.</p>
                                </div>
                              </div>
                            </div>
                            <div class="col-lg-4 select-rota">
                              <div class="box-createrota-boz card card-btn">
                                <input type="radio" name="rota_view"  class="radio-btn" value="2">
                                <div class="bg-color">
                                  <i class="fa fa-calendar"></i>
                                  <h3>Timeline view</h3>
                                  <p>Add your shift times and assign this to as many employees as you need, right then and there. </p>
                                </div>
                              </div>
                            </div>
                            <div class="col-lg-4 select-rota">
                              <div class="box-createrota-boz card-btn card">
                                <input type="radio" name="rota_view" class="radio-btn" value="3">
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
                                <input type="date" id="select-date" class="form-control" placeholder="Select date">
                              </div>
                            </div>
                            <div class="col-md-12 mt-2">
                              <h3>Select your rota view</h3>
                            </div>
                            <div class="col-lg-4 select-rota">
                              <div class="box-createrota-boz card-btn card">
                                <input type="radio" class="radio-btn" value="1" name="select-btn">
                                <div class="bg-color">
                                  <i class="fa fa-th" aria-hidden="true"></i>
                                  <h3>Table view</h3>
                                  <p>Set your shift times and easily assign this across employees and dates at once, with a click.</p>
                                </div>
                              </div>
                            </div>
                            <div class="col-lg-4 select-rota">
                              <div class="box-createrota-boz card card-btn">
                                <input type="radio" class="radio-btn" value="2" name="select-btn">
                                <div class="bg-color">
                                  <i class="fa fa-calendar"></i>
                                  <h3>Timeline view</h3>
                                  <p>Add your shift times and assign this to as many employees as you need, right then and there. </p>
                                </div>
                              </div>
                            </div>
                            <div class="col-lg-4 select-rota">
                              <div class="box-createrota-boz card-btn card">
                                <input type="radio" class="radio-btn" value="3" name="select-btn">
                                <div class="bg-color">
                                  <i class="fa fa-clone"></i>
                                  <h3>Drag and drop view</h3>
                                  <p>Drag and drop each employee onto the shift you'd like them to work.</p>
                                </div>
                              </div>
                            </div>
                            <div class="submit-btn my-3">
                              <button type="submit" >Create your rota</button>
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

  <!-- modal section -->
  <!-- Rename Modal -->
  <div class="modal fade" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Rename rota</h1>
          <button type="button" class="modal_close_btn" data-bs-dismiss="modal" aria-label="Close"> ✖ </button>
        </div>
        <div class="modal-body">
          <div class="col-md-5">
            <input type="text" value="">
            <input type="text" id="team-name" placeholder="Enter name..." class="form-control">
        </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="close_btn_modal" data-bs-dismiss="modal">Close</button>
          <button type="button" class="save_btn_modal">Save</button>
        </div>
      </div>
    </div>
  </div>

  <!-- publish Modal -->
  <div class="modal fade" id="publishModal1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Are you sure you want to publish this rota?</h1>
          <button type="button" class="modal_close_btn" data-bs-dismiss="modal" aria-label="Close"> ✖ </button>
        </div>
        <div class="modal-body">
          <div class="col-md-5">
          <p>This will show Shift 9 to your employees. They will be able to see their shifts and absence conflicts.</p>
        </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="close_btn_modal" data-bs-dismiss="modal">Close</button>
          <button type="button" id="rota_rename" class="save_btn_modal">Publish Rota</button>
        </div>
      </div>
    </div>
  </div>
   <!-- modal section -->
  @include('rotaStaff.components.footer')
<script>
  //  function addId(){
  //   var rota_id = document.getElementById('rota_id').value;
	// 		// alert(rota_id);
	// 	}
   
  $( document ).ready(function() {
      
   
    $('#rota_rename').on('click', function(){
        var rota_id =  document.getElementById('modal_rota_id').value;
        var rota_name = document.getElementById('rota_name').value;
        var token = "<?=csrf_token()?>";
        $.ajax({
            url:"{{ url('/update_rota_name') }}",    
            type: "post",    
            dataType: 'json',
            data: {rota_id: rota_id, rota_name: rota_name, _token:token},
            success:function(result){
                console.log(result);     
                $('#exampleModal').modal('hide');   
            }
        });
      });
   

      // $('#rota_rename').on('click', function(){
      //     var id = $('#modal_rota_id').val();
      //     var name = $('#rota_name').val();
      //     const element = document.getElementById("modal_rota_id"); 
      //     let text = element.getAttribute("attribute"); 


      //     alert(text);
      //     alert(name);
      // });
    
      
    console.log( "ready!" );
    // $('#listing_button').on('click', function(){
    //     var modal_rota_id;
    //     modal_rota_id =  document.getElementById('modal_rota_id').value = "";
    //     var rota_id = document.getElementById('rota_id').value;
    //     modal_rota_id =  document.getElementById('modal_rota_id').value = rota_id;
    //   });
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