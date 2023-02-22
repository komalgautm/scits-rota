@include('rotaStaff.components.header')           
                <div class="col-lg-11">
                    <div class="row">
                        <div class="container" id="timeline">
                            <div class="row">
                            @foreach($rota as $rota_data)
                                @if($rota_data->status == 0 || $rota_data->rota_view == 2)
                            <div class="accordion accordion-flush" id="accordionFlushExample">
                            <div class="accordion" id="accordionPanelsStayOpenExample">
                                <div class="col-md-12">
                                    <div class="rota_name">
                                        <p class="breadcrum"> <a href="./rota-planner.html"> <span class="rota-link">
                                            All Rota</span> </a>  {{ $rota_data->rota_name }} </p>
                                        <h3>{{ $rota_data->rota_name }}</h3>
                                    </div>
                                    <input type="hidden" value="{{ $rota_data->id }}" id="new_rota">
                                    <div class="d-flex justify-content-between">
                                        <div class="date-info">
                                        <p>  {{ date("D j M", strtotime($rota_data->rota_start_date)) }} - {{ date("D j M", strtotime($rota_data->rota_end_date)) }} | {{ $rota_data->rota_duration }} days | <span id="shift_count1"></span> staff members</p>
                                        </div>
                                        <div class="shift-patern">
                                            <div class="select-shift">
                                                Show shifts for:
                                                <input type="radio" class="input_custom_btn" id="everyone"
                                                    name="select">
                                                <div class="label">
                                                    <label for="everyone" class="label_custom every">Everyone</label>
                                                </div>
                                                <input type="radio" id="me" class="input_custom_btn" name="select">
                                                <div class="label">
                                                    <label for="me" class="label_custom me">Me</label>
                                                </div>
                                                <input type="radio" id="specific" class="input_custom_btn"
                                                    name="select">
                                                <div class="label">
                                                    <label for="specific" class="label_custom specific">Specific
                                                        people...</label>
                                                </div>
                                            </div>
                                            <div class="select-yes-no">
                                                Show notes:
                                                <input type="radio" class="input_custom_btn" id="yes" name="yes_no">
                                                <div class="label">
                                                    <label for="yes" class="label_custom yes">Yes</label>
                                                </div>
                                                <input type="radio" id="no" class="input_custom_btn" name="yes_no">
                                                <div class="label">
                                                    <label for="no" class="label_custom no">No</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-between">
                                        <div class="d-none">
                                            <p>Once a shift has been added you can publish this rota.</p>
                                        </div>
                                        <div class="d-flex print_and_publish_button">
                                            <div>
                                                <!-- Button trigger modal -->
                                                @if($rota_data->status === 1)
                                                    <button type="button" onclick="renamedata(<?=$rota_data->id?>,'<?=$rota_data->rota_name?>',<?=$rota_data->status?>)" class="publish_btn" >
                                                        Unpublish
                                                    </button>
                                                @endif
                                                @if($rota_data->status === 0)
                                                    <button type="button" onclick="renamedata(<?=$rota_data->id?>,'<?=$rota_data->rota_name?>',<?=$rota_data->status?>)" class="publish_btn" >
                                                        Publish
                                                    </button>
                                                @endif
                                                
                                                <!-- Publish/Unpublish Modal -->
                                                <div class="modal fade" id="exampleModalPublish" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                           <h1 class="modal-title fs-5" id="exampleModalLabel">Are you sure you want to    @if($rota_data->status === 1)
                                                                    Publish
                                                                @endif
                                                                @if($rota_data->status === 0)
                                                                    Unpublish
                                                                @endif this rota?</h1>
                                                            <button type="button" class="modal_close_btn" data-bs-dismiss="modal" aria-label="Close"> &#10006; </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="publish_modal">
                                                                <input type="hidden" id="rota_id">
                                                                <input type="hidden" id="rota_status">
                                                                <div class="content_publish_rota">This will show <span id="rota_name_model"></span> to your employees. They will be able to see their shifts and absence conflicts.</div>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer justify-content-between">
                                                            <button type="button" class="cancel_btn" data-bs-dismiss="modal">Close</button>
                                                            <button type="button" class="publish_btn_footer" id="publish_unpublish_btn">
                                                                @if($rota_data->status === 1)
                                                                    Publish
                                                                @endif
                                                                @if($rota_data->status === 0)
                                                                    Unpublish
                                                                @endif
                                                                </button>
                                                        </div>
                                                    </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div>
                                                <button type="button" class="print_btn" onclick="window.print()">Print rota</button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="d-flex time-for-shift">
                                        <div class="add-color"
                                            style="border-bottom: 1px solid rgb(232, 234, 236); width: calc(4.16667%); border-left: 1px solid rgb(161, 169, 179);">
                                            0:00
                                        </div>
                                        <div class="add-color"
                                            style="border-bottom: 1px solid rgb(232, 234, 236); width: calc(4.16667%); border-left: 1px solid rgb(232, 234, 236);">
                                        </div>
                                        <div class="add-color"
                                            style="border-bottom: 1px solid rgb(232, 234, 236); width: calc(4.16667%); border-left: 1px solid rgb(232, 234, 236);">
                                        </div>
                                        <div class="add-color"
                                            style="border-bottom: 1px solid rgb(232, 234, 236); width: calc(4.16667%); border-left: 1px solid rgb(232, 234, 236);">
                                        </div>
                                        <div class="add-color"
                                            style="border-bottom: 1px solid rgb(232, 234, 236); width: calc(4.16667%); border-left: 1px solid rgb(161, 169, 179);">
                                            4:00</div>
                                        <div class="add-color"
                                            style="border-bottom: 1px solid rgb(232, 234, 236); width: calc(4.16667%); border-left: 1px solid rgb(232, 234, 236);">
                                        </div>
                                        <div class="add-color"
                                            style="border-bottom: 1px solid rgb(232, 234, 236); width: calc(4.16667%); border-left: 1px solid rgb(232, 234, 236);">
                                        </div>
                                        <div class="add-color"
                                            style="border-bottom: 1px solid rgb(232, 234, 236); width: calc(4.16667%); border-left: 1px solid rgb(232, 234, 236);">
                                        </div>
                                        <div class="add-color"
                                            style="border-bottom: 1px solid rgb(232, 234, 236); width: calc(4.16667%); border-left: 1px solid rgb(161, 169, 179);">
                                            8:00</div>
                                        <div class="add-color"
                                            style="border-bottom: 1px solid rgb(232, 234, 236); width: calc(4.16667%); border-left: 1px solid rgb(232, 234, 236);">
                                        </div>
                                        <div class="add-color"
                                            style="border-bottom: 1px solid rgb(232, 234, 236); width: calc(4.16667%); border-left: 1px solid rgb(232, 234, 236);">
                                        </div>
                                        <div class="add-color"
                                            style="border-bottom: 1px solid rgb(232, 234, 236); width: calc(4.16667%); border-left: 1px solid rgb(232, 234, 236);">
                                        </div>
                                        <div class="add-color"
                                            style="border-bottom: 1px solid rgb(232, 234, 236); width: calc(4.16667%); border-left: 1px solid rgb(161, 169, 179);">
                                            12:00</div>
                                        <div class="add-color"
                                            style="border-bottom: 1px solid rgb(232, 234, 236); width: calc(4.16667%); border-left: 1px solid rgb(232, 234, 236);">
                                        </div>
                                        <div class="add-color"
                                            style="border-bottom: 1px solid rgb(232, 234, 236); width: calc(4.16667%); border-left: 1px solid rgb(232, 234, 236);">
                                        </div>
                                        <div class="add-color"
                                            style="border-bottom: 1px solid rgb(232, 234, 236); width: calc(4.16667%); border-left: 1px solid rgb(232, 234, 236);">
                                        </div>
                                        <div class="add-color"
                                            style="border-bottom: 1px solid rgb(232, 234, 236); width: calc(4.16667%); border-left: 1px solid rgb(161, 169, 179);">
                                            16:00</div>
                                        <div class="add-color"
                                            style="border-bottom: 1px solid #e8eaec; width: calc(4.16667%); border-left: 1px solid rgb(232, 234, 236);">
                                        </div>
                                        <div class="add-color"
                                            style="border-bottom: 1px solid rgb(232, 234, 236); width: calc(4.16667%); border-left: 1px solid rgb(232, 234, 236);">
                                        </div>
                                        <div class="add-color"
                                            style="border-bottom: 1px solid rgb(232, 234, 236); width: calc(4.16667%); border-left: 1px solid rgb(232, 234, 236);">
                                        </div>
                                        <div class="add-color"
                                            style="border-bottom: 1px solid rgb(232, 234, 236); width: calc(4.16667%); border-left: 1px solid rgb(161, 169, 179);">
                                            20:00</div>
                                        <div class="add-color"
                                            style="border-bottom: 1px solid rgb(232, 234, 236); width: calc(4.16667%); border-left: 1px solid rgb(232, 234, 236);">
                                        </div>
                                        <div class="add-color"
                                            style="border-bottom: 1px solid rgb(232, 234, 236); width: calc(4.16667%); border-left: 1px solid rgb(232, 234, 236);">
                                        </div>
                                        <div class="add-color"
                                            style="border-bottom: 1px solid rgb(232, 234, 236); width: calc(4.16667%); border-left: 1px solid rgb(232, 234, 236);">
                                        </div>
                                    </div>
                                    <div class="accordion" id="accordionPanelsStayOpenExample">
                                        <div class="accordion-item">
                                            <h2 class="accordion-header" id="panelsStayOpen-headingOne">
                                                <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                                    data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="true"
                                                    aria-controls="panelsStayOpen-collapseOne">
                                                    {{ date("D j M Y", strtotime($rota_data->rota_start_date)) }} - {{ date("D j M Y", strtotime($rota_data->rota_end_date)) }}
                                                </button>
                                            </h2>
                                            <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse"
                                                aria-labelledby="panelsStayOpen-headingOne">
                                                <div class="accordion-body">
                                                    <?php
                                                        $period = \carbon\CarbonPeriod::create( date("Y-m-d", strtotime($rota_data->rota_start_date)), date("Y-m-d", strtotime($rota_data->rota_end_date)));
                                                        $i = 1;
                                                        // Iterate over the period
                                                        foreach ($period as $date) {
                                                             $date->format('D j M')."<br>";
                                                            ?>
                                                            <div class="d-flex">
                                                                <div class="date-of-shift">
                                                                    <strong>{{$date->format('D j M')}}</strong>
                                                                </div>
                                                                <div class="amount-of-shift">
                                                                    <p><span id="shift_count"></span> shifts</p>
                                                                </div>
                                                                <div class="add-shift-btn">
                                                                    <!-- Button trigger modal -->
                                                                    <button type="button" class="modal-btn" onclick="view_shift_model('<?=$date->format('l d F')?>','<?=$date->format('D j M')?>',<?=$i?>)">
                                                                        Add shift
                                                                    </button>
                                                                </div>
                                                            </div>
                                                            <input type="hidden" id="match_date" value="{{ $date->format('l d F') }}">
                                                            <div id="show_user_record<?=$i?>">
                                                            </div>
                                                            <?php
                                                            $i++;
                                                        }

                                                    // Convert the period to an array of dates
                                                    $dates = $period->toArray();
                                                ?>
                                                <br>
                                                @endif
                                            @endforeach
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>
     <!-- Modal -->
     <div class="modal fade addShift" id="exampleModalAddShift" tabindex="-1" aria-labelledby="exampleModalLabel" style="display: none;" aria-hidden="true">
        <div class="modal-dialog" style="display: block; max-width: 50rem;">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="container remove-padding M-right" id="multiForm" style="display: block;">
                        <form action="" method="post" id="form1select">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="follow-step">
                                      
                                        <ul class="employees-detail d-flex">
                                            <li class="Employees-details detail">
                                                <?php 
                                                    if(isset($pass_rota_id)){

                                                        echo "<input type='hidden' id='edit_rota_id' value=".$pass_rota_id. ">";
                                                    }
                                                ?>
                                            
                                                <span class="s-font">Create shift</span>
                                            </li>
                                            <li class="Address-details detail" id="bg1" style="color: rgb(153, 153, 153); background-color: rgb(255, 255, 255);">
                                                <span class="s-font">Assign
                                                    Employees</span>
                                            </li>
                                            <li class="Employment-details detail" id="bg2" style="color: rgb(153, 153, 153); background-color: rgb(255, 255, 255);">
                                                <span class="s-font">Summary</span>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="row" id="form1" style="display: block;">
                                        <div class="col-md-12">
                                            <div class="employees-info">
                                                <div class="add-margin col-md-12">
                                                    <h4>Create new shift</h4>
                                                    <span class="date-of-weak-shift" id="rota_shift_day_show"></span>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12" id="showDiv">
                                                        <form class="employees-data" onsubmit="return validateform()">
                                                            <div class="row">
                                                                <input type="hidden" id="rota_shift_day_date">
                                                                <label for="firstName" class="col-sm-2 col-form-label">Shift time</label>
                                                                    <!-- <div class="col-sm-5"> -->
                                                                    <div class="col-auto mb-3">
                                                                        <input type="datetime-local" class="col-sm-2 form-control" id="start_time" aria-describedby="emailHelp" value="09:00" placeholder="">
                                                                    </div>
                                                                    <div class="col-auto">
                                                                        <span class="btew-time">to</span>
                                                                    </div>
                                                                    <div class="col-auto mb-3">
                                                                        <input type="datetime-local" class="col-sm-2 form-control" id="end_time" value="17:00" aria-describedby="emailHelp" placeholder="">
                                                                    </div>
                                                                <!-- </div> -->
                                                            </div>
                                                            <div class="row">
                                                                <label for="lastName" class="col-sm-2 col-form-label">Break duration</label>
                                                                <div class="col-auto">
                                                                    <input type="number" id="break_time" class="form-control" id="lastName" placeholder="Minutes">
                                                                    <p id="lastNamError">
                                                                    </p>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <label for="emailAdd" class="col-sm-2 col-form-label">Add a note</label>
                                                                <div class="col-md-4">
                                                                    <textarea name="" class="form-control" id="shift_notes" cols="40" rows="5"></textarea>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <p>This shift is <strong>8 hour with no break </strong></p>
                                                            </div>
                                                            <div class="form-group col-md-12 d-flex justify-content-end">
                                                                <button type="button" id="next1" onclick="next({id:'next',form:'form',count:1})" class="save-btn nxt1">Next
                                                                    step</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="container remove-padding">
                                        <div class="row" id="form2" style="display: none;">
                                            <div class="col-md-12">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <h4>Assign employees to <span id="assign_emp_date"></span>, <span id="shift_time_show"></span></h4>
                                                        <span class="date-of-weak-shift">Find an employee or a team</span>
                                                    </div>
                                                    <div class="col-sm-3 col-md-4">
                                                        <select class="form-select form-control" aria-label="Default select example">
                                                            <option selected="" value="1">Search by name
                                                            </option>
                                                            <option value="2">Search by
                                                                group</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-sm-3 col-md-4">
                                                        <input type="text" class="form-control" placeholder="Enter name">
                                                    </div>
                                                    <div class="col-md-4 d-flex justify-content-end">
                                                        <button type="button" class="select-employee">Select
                                                            all</button>
                                                        <button type="button" class="select-employee">Deselect
                                                            all</button>
                                                    </div>
                                                </div>
                                                <div class="row employee-name my-4" id="employee_list">
                                                   
                                                </div>
                                                <div class="row">
                                                    <p>This shift has<strong> 1 employee </strong>working <strong>8 hrs</strong></p>
                                                </div>
                                                <div class="address-detail">
                                                    <div class="row my-2">
                                                        <div class="col-md-12 d-flex justify-content-end">
                                                            <div class="previous m-2">
                                                                <button type="button" id="back1" onclick="back({id:'back',form:'form',count:2})" class="previous_btn">Back</button>
                                                            </div>
                                                            <div class="continue_save m-2">
                                                                <button type="button" class="continue_btn" id="next2" onclick="next({id:'next',form:'form',count:2})">Next
                                                                    step
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <form action="" class="row contract-detaial" style="display: none;">
                                                            <div class="form-group col-md-2">
                                                                <label for="exampleInputEmail1">Name</label>
                                                                <div class="name">
                                                                    <span>Sagar
                                                                        &nbsp;
                                                                        Pawar</span>
                                                                </div>
                                                            </div>
                                                            <div class="form-group col-md-2 my-3">
                                                                <label for="exampleInputEmail1">Entitlement
                                                                    unit
                                                                    in</label>
                                                                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="">
                                                            </div>
                                                            <div class="form-group col-md-2 my-3">
                                                                <label for="exampleInputLastname1" style="margin-bottom: 20px;">Full
                                                                    time
                                                                    annual
                                                                    leave
                                                                    entitlement
                                                                    equivalent</label>
                                                                <input type="text" class="form-control" id="exampleInputLastname1" placeholder="">
                                                            </div>
                                                            <div class="form-group col-md-2 my-3">
                                                                <label for="staticEmail">Leave
                                                                    year
                                                                    start
                                                                    date</label>
                                                                <input type="email" placeholder="" class="form-control" id="staticEmail" value="">
                                                            </div>
                                                            <div class="form-group col-md-1">
                                                                <label class="form-check-label">Copy</label>
                                                                <p class="folder-icon">
                                                                    <i class="fa fa-folder-o" aria-hidden="true"></i>
                                                                </p>
                                                            </div>
                                                            <div class="col-md-2 d-flex align-items-center justify-content-center">
                                                                <button class="save-btn">save</button>
                                                                <button class="cancel-btn">cancel</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="container remove-padding">
                                        <div class="row" id="form3" style="display: none;">
                                            <div class="col-md-12">
                                                <div class="employment-details">
                                                    <div class="row my-2">
                                                        <div class="col-md-12">
                                                            <h4>Shift summary</h4>
                                                            <p>Shift will be created for <strong> <span id="show_shift_date"></span>, <span id="show_shift_time"></span>.</strong></p>
                                                        </div>
                                                        <div class="col-md-12 d-flex justify-content-end">
                                                            <div class="previous m-2">
                                                                <button type="button" id="back2" onclick="back({id:'back',form:'form',count:3})" class="previous_btn">Back</button>
                                                            </div>
                                                            <div class="continue_save m-2   ">
                                                                <input type="hidden" id="shiftmodelid"/>
                                                                <button type="button" class="continue_btn" id="next4" onclick="next({id:'next',form:'form',count:3})">Add shift</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="modal-footer justify-content-start">
                    <button type="button" class="btn-footer-modal" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
     <!-- shift  Modal start here-->
     <div class="modal fade" id="exampleModalShiftModal"  tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">Shift details</h1>
            <button type="button" class="btn_close" data-bs-dismiss="modal" aria-label="Close">&#10006;</button>
            </div>
            <div class="modal-body">
                <div class="container remove-padding M-right" id="multiForm" style="display: block;">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="row" id="form1" style="display: block;">
                                <div class="col-md-12">
                                    <div class="employees-info">
                                        <div class="row">
                                            <div class="col-md-12" id="showDiv">
                                                <form class="employees-data" onsubmit="return validateform()">
                                                    <input type="hidden" id="edit_rota_id">
                                                    <input type="hidden" id="edit_shift_id">
                                                    <input type="hidden" id="edit_user_id">
                                                    <input type="hidden" id="assigned_user_id">  
                                                    <input type="hidden" id="rota_shift_id">  
                                                    <div class="row my-2">
                                                        <label for="assign_work" class="col-sm-3 col-form-label">Assigned worker</label>
                                                        <div class="col-sm-4">
                                                            <select name="" id="add_employess_for_edit" class="form-select form-control">
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="row my-2">
                                                        <label for="date_of_shift" class="col-sm-3 col-form-label">Shift day</label>
                                                        <div class="col-md-4">
                                                            <input type="date" class="form-control" id="date_of_shift">
                                                        </div>
                                                    </div>
                                                    <div class="row my-2">
                                                        <label for="edit_start_time" class="col-sm-3 col-form-label">Shift time</label>
                                                            <!-- <div class="col-sm-5"> -->
                                                            <div class="col-auto">
                                                                <input type="time" class="col-sm-2 form-control" id="edit_start_time" aria-describedby="emailHelp" value="9:00" placeholder="">
                                                            </div>
                                                            <div class="col-auto">
                                                                <span class="btew-time">to</span>
                                                            </div>
                                                            <div class="col-auto">
                                                                <input type="time" class="col-sm-2 form-control" id="edit_end_time" value="9:00" aria-describedby="emailHelp" placeholder="">
                                                            </div>
                                                        <!-- </div> -->
                                                    </div>
                                                    <div class="row my-2">
                                                        <label for="edit_break_time" class="col-sm-3 col-form-label">Break duration</label>
                                                        <div class="col-auto">
                                                            <input type="number" class="form-control" id="edit_break_time" placeholder="Last name" min="1" max="60">
                                                            <p id="lastNamError">
                                                            </p>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <label for="emailAdd" class="col-sm-12">Add a note</label>
                                                        <div class="col-md-12">
                                                            <textarea name="" class="form-control" id="description" cols="40" rows="3"></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <small class="my-2">Notes are visible to everyone</small>
                                                        <div class="d-flex col-md-4 align-items-center my-3">
                                                            <b>On this day</b>
                                                        </div>
                                                        <div class="col-md-4 my-3" style="opacity: 0.7; font-weight: 500;">No event on this day</div>
                                                        <p>This shift is <strong><span id="duration_of_shift"></span> </strong></p>
                                                    </div>
                                                    <div class="form-group col-md-12 d-flex justify-content-end">
                                                        <button type="button" class="delete_modal_btn">Delete</button>
                                                        <button type="button" id="update_shift" onclick="next({id:'next',form:'form',count:1})" class="save-btn">Update shift</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer justify-content-start">
                <button type="button" class="close_modal_btn" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
        </div>
    </div>
    <!-- shift modal end here -->
    @include('rotaStaff.components.footer')
 
    <script>

        function view_user_data(shift_id,user_id){
            alert(shift_id);
            var token = "<?=csrf_token()?>";
            var rota_id =$('#new_rota').val();
            $.ajax({
                    url:"{{ url('/get-all-users') }}",    
                    type: "get",    
                    dataType: 'json',
                    success:function(result){
                        console.log(result);
                        $('#add_employess_for_edit').find('option').remove();
                        for(i = 1; i <= result.length; i++){
                            if(result[i]['id'] == user_id){
                                $('#add_employess_for_edit').append("<option selected value='" + result[i]['id'] + "'>" + result[i]['name'] + "</option>");
                            } else {
                                $('#add_employess_for_edit').append("<option value='" + result[i]['id'] + "'>" + result[i]['name'] + "</option>");
                            }
                          
                        }
                    }
                });
            $.ajax({
                    url:"{{ url('/edit_shift_data_get') }}",    
                    type: "post",    
                    dataType: 'json',
                    data: {rota_id: rota_id, user_id: user_id, shift_id: shift_id, _token:token},
                    success:function(result){
                        console.log(result);
                        console.log(result[0]['rota_day_date']);
                        $('#edit_rota_id').val(rota_id);
                        $('#edit_shift_id').val(shift_id);
                        $('#edit_user_id').val(user_id);
                        $('#assigned_user_id').val(result[0]['assigned_id']); 
                        $('#rota_shift_id').val(result[0]['rota_shift_id']); 
                        $('#date_of_shift').val(result[0]['rota_day_date']);
                        $('#edit_start_time').val(result[0]['shift_start_time']); 
                        $('#edit_end_time').val(result[0]['shift_end_time']);
                        $('#edit_break_time').val(result[0]['break']);
                        $('#description').val(result[0]['description']);
                        var start = moment(result[0]['shift_start_time'], "HH:mm:ss").format("HH:mm");
                        var end = moment(result[0]['shift_end_time'], "HH:mm:ss").format("HH:mm");
                        console.log(start);
                        console.log(end);
                        d1 = start.split(':')[0];
                        d2 = end.split(':')[0];
                        hours = d2-d1;
                        document.getElementById('duration_of_shift').innerHTML = hours +" hour with " + result[0]['break'] + " mins break";
                    }
                });
            $('#exampleModalShiftModal').modal('show'); 
        }
    
        function view_shift_model(date1, date2, id){
            var token = "<?=csrf_token()?>";
            $.ajax({
                    url:"{{ url('/get-all-users') }}",    
                    type: "get",    
                    dataType: 'json',
                    success:function(result){
                        console.log(result);
                        for(i = 1; i <= result.length; i++){
                            document.querySelector('#employee_list').insertAdjacentHTML(
                                'afterbegin',
                                `<div class="col-md-6">
                                    <input type="checkbox" class="custom_checkbox" name="mycheckboxes" value="`+result[i]['id']+`" id="select_checkbox_`+i+`">
                                    <label for="select_checkbox_`+i+`" class="name">
                                        <p>`+result[i]['name']+`</p>
                                        <p class="select_tick"><span class="right_tick"><i class="fa fa-check" aria-hidden="true"></i></span></p>
                                    </label>
                                </div>`      
                            );
                        }
                    }
                });
            console.log(date1);
            console.log(date2);
            $("#form1").css("display","block")
            $('#form1select').trigger("reset");
            document.getElementById('rota_shift_day_show').innerHTML= date1;
            document.getElementById('assign_emp_date').innerHTML= date2;
            document.getElementById('show_shift_date').innerHTML= date2;
            $('#shiftmodelid').val(id);
            $('#rota_shift_day_date').val(date1);
            $('#exampleModalAddShift').modal('show'); 
        }

        function next(id) {
            const element = document.getElementById("next1"); 
            let text = element.getAttribute("class"); 
            console.log(text);
            if(text == 'save-btn'){
                var start_time = $("#start_time").val(); 
                var end_time = $("#end_time").val();
                document.getElementById('shift_time_show').innerHTML =  start_time+'-'+end_time;
                document.getElementById('show_shift_time').innerHTML =  start_time+'-'+end_time;
            }
            let bg = document.getElementById('bg' + id.count)
            let currentForm = document.getElementById(id.form + id.count);
            let nextForm = document.getElementById(id.form + parseInt((id.count + 1)));
            setTimeout(() => {
                currentForm.style.display = 'none';
                nextForm.style.display = 'block';
                bg.style = 'none';
            }, 200);
        }

        function back(id) {
            let bg = document.getElementById('bg' + parseInt(id.count - 1))
            let currentForm = document.getElementById(id.form + id.count);
            let prevForm = document.getElementById(id.form + parseInt((id.count - 1)));
            setTimeout(() => {
                currentForm.style.display = 'none';
                prevForm.style.display = 'block';
                bg.style.color = '#999';
                bg.style.backgroundColor = '#fff';
            }, 200);
        }

        function renamedata(id,name, status){
            $('#rota_name_model').text(name);
            $('#rota_id').val(id);
            $('#rota_status').val(status);
            $('#exampleModalPublish').modal('show');    
        }

        function hasWhiteSpace(s) {
            return (/\s/).test(s);
        }
        $(document).ready(function(){
            var token = "<?=csrf_token()?>";
            $('#update_shift').on('click', function(){
                var edit_rota_id  = $('#edit_rota_id').val();
                var edit_shift_id =  $('#edit_shift_id').val();
                var update_user_id = $('#edit_user_id').val();
                var updtate_date_of_shift = $('#date_of_shift').val();
                var update_shift_start_time = $('#edit_start_time').val(); 
                var update_shift_end_time = $('#edit_end_time').val();
                var update_break = $('#edit_break_time').val();
                var description = $('#description').val();
                var assigned_user_id = $('#assigned_user_id').val();
                var rota_shift_id = $('#rota_shift_id').val();
                $.ajax({
                    url:"{{ url('/update-shift-data') }}",    
                    type: "post",    
                    dataType: 'json',
                    data: {edit_rota_id: edit_rota_id, edit_shift_id: edit_shift_id, update_user_id: update_user_id, updtate_date_of_shift: updtate_date_of_shift, update_shift_start_time: update_shift_start_time, update_shift_end_time:update_shift_end_time, update_break: update_break, description: description,
                        assigned_user_id: assigned_user_id, rota_shift_id:rota_shift_id, _token:token},
                    success:function(result){
                        console.log(result);
                        if(result === 1){
                            $('#exampleModalShiftModal').modal('hide'); 
                        }

                    }
                });
            });
            $(".w_full").hide();
            $('#next4').on('click', function(){
                var rota_id =$('#new_rota').val();
                var rota_shift_day_date = $('#rota_shift_day_date').val();
                var start_date = $("#start_time").val(); 
                var end_date = $("#end_time").val(); 
                var break_time = $("#break_time").val();
                var shift_notes = $("#shift_notes").val();
                var edit_rota_id = $('#edit_rota_id').val();
                var shiftmodelid = $('#shiftmodelid').val();
                let user_ids = new Array();
                var checkedValue = null; 
                var inputElements = document.getElementsByClassName('custom_checkbox');
                for(var i=0; inputElements[i]; ++i){
                    if(inputElements[i].checked){
                        checkedValue = inputElements[i].value;
                        user_ids.push(checkedValue);
                    }
                }
                console.log("emp_id=>"+user_ids);
                var token = "<?=csrf_token()?>";
                    $.ajax({
                        url:"{{ url('/assign_rota_users') }}",    
                        type: "post",    
                        dataType: 'json',
                        data: {rota_id:rota_id, user_ids: user_ids, rota_shift_day_date: rota_shift_day_date, start_date: start_date, end_date: end_date, break_time: break_time, shift_notes: shift_notes, edit_rota_id: edit_rota_id, _token:token},
                        success:function(result){
                            console.log(result);
                            console.log(result.rotaShift);
                            console.log(result.user_name);
                            console.log(result.user_name.length);
                            for(i = 0; i < (result.user_name).length; i++){
                                var start = moment(result.rotaShift[0]['shift_start_time']).format("HH");
                                var end = moment(result.rotaShift[0]['shift_end_time']).format("HH");
                                // console.log(start);
                                // console.log(end);
                                // d1 = start.split(':')[0];
                                // d2 = end.split(':')[0];
                                // console.log(d1);
                                // hours = d2-d1;
                                // console.log(d2-d1);


                                let a = moment(result.rotaShift[0]['shift_start_time']).format("DDMMYYYY");
                                let b = moment(result.rotaShift[0]['shift_end_time']).format("DDMMYYYY");
                                console.log(a);
                                console.log('time check',a == b, typeof a)
                                console.log('end, start', end, start)
                                if(a === b) {
                                    result.user_name[i][0]['hours'] = parseInt(end - start);
                                    result.user_name[i][0]['start'] = start;
                                } else {
                                    let newUser;
                                    if(result.user_name[i].length === 1) {
                                        result.user_name[i][0]['start'] = start;
                                        result.user_name[i][0]['hours'] = 24 - start;
                                        newUser = JSON.parse(JSON.stringify(result.user_name[i][0])); 
                                    } else {
                                        result.user_name[i][1]['start'] = start;
                                        result.user_name[i][1]['hours'] = 24 - start;
                                        newUser = JSON.parse(JSON.stringify(result.user_name[i][1]));  
                                    }
                                    console.log(result.user_name[i][0])
                                    newUser['start'] = 0;
                                    newUser['hours'] = end;

                                    if(result.user_name.length === i+1) {
                                        result.user_name[i+1].push(newUser)
                                    } else {
                                        result.user_name[i+1].unshift(newUser);
                                    }
                                    console.log(result.user_name)
                                
                                }


                                var name = result.user_name[i][0]['name'];
                                var get_name = hasWhiteSpace(name);

                                console.log(get_name);
                                if(get_name == true){
                                    var names = name.split(' ');
                                    var fname = names[0].charAt(0);
                                    var lname = names[1].charAt(0);
                                    shortname = fname+lname;
                                }
                                if( get_name == false ){
                                    fname = name.charAt(0);
                                    shortname = fname;
                                }

                                function loopDataFunction() {
                                    let loopData = '';
                                    for(let k = 0; k < 24; k++) {
                                        loopData += `<div class="hour_box" style="width: calc(4.16667%);"></div>`;
                                    }
                                    return loopData;
                                }

                                function userTimeData() {
                                    let user;

                                    result.user_name[i].forEach(oneUser => {
                                        console.log(oneUser.hours, typeof oneUser.hours)
                                        user = `<button type="button" class="shift_timing_btn" onclick="view_user_data(`+result.rotaShift[0]['id']+`,`+oneUser['id']+`) "style="width: `+oneUser.hours*4.16667+`%;  left: `+oneUser.start*4.16667+`%;" data-testid="Shift card">
                                            <div class="d-flex align-items-center">
                                                <div class="">
                                                    <div class="name_of_member">
                                                        <div class="">`+shortname+`</div>
                                                    </div>
                                                </div>
                                            <div class="">
                                                    <div class="d-flex align-items-center">
                                                        <div class="name_of_person">${oneUser.name}</div>
                                                        <div class="shift_timeing_duration">${a+'-'+b}</div>
                                                    </div>
                                                    <div class=""></div>
                                                </div>
                                            </div>
                                        </button>`
                                        
                                    });
                                    
                                    return user;
                                }
                                document.querySelector('#show_user_record'+shiftmodelid).insertAdjacentHTML(
                                    'afterbegin',
                                    `<div class="w_full" style="">
                                        ${loopDataFunction()}

                                        <!-- Button shift modal -->
                                        ${userTimeData()}
                                        <!-- Modal -->
                                    </div>`   
                                );  
                            }
                            document.getElementById('shift_count').innerHTML =  result.user_name.length; 
                            document.getElementById('shift_count1').innerHTML =  result.user_name.length; 
                        }
                    });
                    $('#exampleModalAddShift').modal('hide'); 
            });
            $('#publish_unpublish_btn').on('click', function(){
                var rota_id = $('#rota_id').val();
                var rota_status = $('#rota_status').val();
                var token = "<?=csrf_token()?>";
                $.ajax({
                    url:"{{ url('/publish_unpublish_rota') }}",    
                    type: "post",    
                    dataType: 'text',
                    data: {rota_id: rota_id, rota_status: rota_status, _token:token},
                    success:function(result){
                        console.log(result);
                        location.reload();
                    }
                });
            });
        });
    </script>


