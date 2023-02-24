
                                document.querySelector('#show_user_record'+shiftmodelid).insertAdjacentHTML(
                                    'afterbegin',
                                    `<div class="w_full" style="">`   
                                );  
                                        
                                for (let index = 0; index < 24; index++) {
                                    document.querySelector('#show_user_record'+shiftmodelid).insertAdjacentHTML(
                                        'afterbegin',
                                        ` <div class="hour_box" style="width: calc(4.16667%);">
                                        </div>`   
                                    );  
                                }

                                document.querySelector('#show_user_record'+shiftmodelid).insertAdjacentHTML(
                                    'afterbegin',
                                    `<!-- Button shift modal -->
                                        <button type="button" class="shift_timing_btn" onclick="view_user_data(`+result.rotaShift[0]['id']+`,`+result.user_name[i][0]['id']+`)"style="width: `+hours*4.16667+`%;  left: `+hours*4.16667+`%;" data-testid="Shift card">
                                            <div class="d-flex align-items-center">
                                                <div class="">
                                                    <div class="name_of_member">
                                                        <div class="">`+shortname+`</div>
                                                    </div>
                                                </div>
                                            <div class="">
                                                    <div class="d-flex align-items-center">
                                                        <div class="name_of_person">`+result.user_name[i][0]['name']+`</div>
                                                        <div class="shift_timeing_duration">`+start+`-`+end+`</div>
                                                    </div>
                                                    <div class=""></div>
                                                </div>
                                            </div>
                                        </button>
                                        <!-- Modal -->
                                    </div>`   
                                );  