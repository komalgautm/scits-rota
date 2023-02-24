<style>
  .current_select{
    transform: scale(1.3);
  }

</style>
@include('rotaStaff.components.header')
<div class="col-lg-11">
          <div class="row">
            <!-- Top Bar Info Section Start Here -->
         
            <!-- Top Bar Info Section End Here -->
            <div class="col-lg-8">
              <div class="main-shodw-box">
                <div class="row">
                  <div class="col-lg-6 over-title-top">
                    <h2>Overview</h2> </div>
                  <div class="col-lg-6 add-btn-top">
                    <h4><a href="{{ url('/absence/type=1') }}">+ Add time off</a></h4></div>
                </div>
                <div class="flx-box">
                  <div class="crical-part-info-main">
                    <div class="cricat-up-text">
                      <h3 class="entry-title"> {{ \Carbon\Carbon::parse('Now -3 days')->format('D d M') }}</a></h3></div>
                    <div class="crical-info-prt"> </div>
                    <a onclick="change_leaves_data('<?php echo \Carbon\Carbon::parse('Now -3 days')->format('D d M'); ?>')" >
                    <div class="stock-crical-info">
                      <h2>{{ $total_leave_min_three }} </h2></div></a>
                  </div>
                  <div class="crical-part-info-main">
                    <div class="cricat-up-text">
                      <h3 >{{ \Carbon\Carbon::parse('Now -2 days')->format('D d M') }}</h3> </div>
                    <div class="crical-info-prt"> </div>
                    <a onclick="change_leaves_data('<?php echo \Carbon\Carbon::parse('Now -2 days')->format('D d M'); ?>')" >
                    <div class="stock-crical-info">
                      <h2>{{ $total_leave_min_two }}</h2></div> </a>
                  </div>
                  <div class="crical-part-info-main">
                    <div class="cricat-up-text">
                      <h3>{{ \Carbon\Carbon::parse('Now -1 days')->format('D d M') }}</h3> </div> 
                    <div class="crical-info-prt"> </div>
                    <a onclick="change_leaves_data('<?php echo \Carbon\Carbon::parse('Now -1 days')->format('D d M'); ?>')">
                    <div class="stock-crical-info">
                      <h2>{{ $total_leave_min_one }}</h2>
                    </div> </a>
                  </div>
                  <div class="crical-part-info-main current_select">
                    <div class="cricat-up-text">
                      <h3 > {{ \Carbon\Carbon::now()->format('D d M') }}</h3> </div>
                    <div class="crical-info-prt"> </div>
                    <a onclick="change_leaves_data('<?php echo \Carbon\Carbon::now()->format('D d M'); ?>')">
                    <div class="stock-crical-info">
                      <h2>{{ $total_leave_current }}</h2></div> </a>
                  </div>
                  <div class="crical-part-info-main">
                    <div class="cricat-up-text">
                      <h3>{{ \Carbon\Carbon::parse('Now +1 days')->format('D d M') }}</h3> </div>
                    <div class="crical-info-prt"> </div>
                    <a onclick="change_leaves_data('<?php echo \Carbon\Carbon::parse('Now +1 days')->format('D d M'); ?>')">
                    <div class="stock-crical-info">
                      <h2>{{ $total_leave_plus_one }}</h2></div> </a>
                  </div>
                  <div class="crical-part-info-main">
                    <div class="cricat-up-text">
                      <h3>{{ \Carbon\Carbon::parse('Now +2 days')->format('D d M') }}</h3> </div>
                    <div class="crical-info-prt"> </div>
                    <a onclick="change_leaves_data('<?php echo \Carbon\Carbon::parse('Now +2 days')->format('D d M'); ?>')">
                      <div class="stock-crical-info">
                      <h2>{{ $total_leave_plus_two }}</h2></div></a>
                  </div>
                  <div class="crical-part-info-main">
                    <div class="cricat-up-text">
                      <h3>{{ \Carbon\Carbon::parse('Now +3 days')->format('D d M') }}</h3> </div>
                    <div class="crical-info-prt"> </div>
                    <a onclick="change_leaves_data('<?php echo \Carbon\Carbon::parse('Now +3 days')->format('D d M'); ?>')">
                    <div class="stock-crical-info">
                      <h2>{{ $total_leave_plus_three }}</h2></div></a>
                  </div>
                </div>
                <div class="col-lg-12">
                  <div class="line-hr"></div>
                </div>
                <div class="my-summary-info">
                  <div class="row">
                    <div class="col-lg-12 col-md-12">
                      <h4 class="my-summry-part">My summary</h4> </div>
                    <div class="col-lg-3">
                      <div class="main-white-crical"></div>
                      <div class="main-summery-box-strock">
                        <h2><span id="all_leave"></span></h2> </div>
                    </div>
                    <div class="col-lg-9 col-md-9">
                      <form>
                        <div class="from-equal">
                          <div class="from-group">
                            <a href="{{ url('/calender') }}" class="first-from"><span ><span id="annual_leave"></span> Annual leave</span></a>
                          </div>
                          <div class="from-group">
                            <a href="{{ url('/calender') }}" class="secound-from"><span ><span id="other_leave"></span> Other leave</span></a> 
                          </div>
                        </div>
                        <div class="from-equal">
                          <div class="from-group">
                            <a href="{{ url('/calender') }}" class="three-from"><span ><span id="sickness_leave"></span> Sickness leave</span></a> 
                           </div>
                          <div class="from-group">
                            <a href="{{ url('/calender') }}" class="four-from"><span ><span id="lateness_leave"></span> lateness leave</span></a> 
                          </div>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- Right Side Bar Info Start Here -->
            <div class="col-lg-4 col-md-3">
              <aside class="right-side-info">
                <div class="right-side-info-bar">
                  <h2>My Summary</h2>
                  <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                      <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">Absence</button>
                    </li>
                    <li class="nav-item" role="presentation">
                      <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">Overtime</button>
                    </li>
                  </ul>
                </div>
                <div class="tab-content" id="myTabContent">
                  <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                    <div class="tab-first-infos">
                      <h3><a href="#">Request time off</a></h3>
                      <h4><a href="#">Request time off</a></h4> </div>
                    <div class="main-equal-side">
                      <div class="main-sidebar-crial">
                        <div class="crical-onw-white"></div>
                        <div class="crical-strok"> </div>
                      </div>
                      <div class="crical-content-bar">
                        <h4><strong>-5 hrs 0 mins</strong> remaining</h4>
                        <h4><strong>0 hrs 0 mins</strong> allowance</h4> </div>
                    </div>
                    <p class="next">Next up - No absences coming up</p>
                    <div class="btn-info-sep">
                      <p>You've also taken</p>
                      <div class="ntn-prt">
                        <h5><a href="#">{{ $sickness }} Lateness</a></h5>
                        <h6><a href="#">{{ $lateness }} Sickness</a></h6> </div>
                    </div>
                  </div>
                  <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                     <div class="tab-first-infos">
                      <h3><a href="#">Request time off</a></h3>
                      <h4><a href="#">Request time off</a></h4> </div>
                    <div class="main-equal-side">
                      <div class="main-sidebar-crial">
                        <div class="crical-onw-white"></div>
                        <div class="crical-strok"> </div>
                      </div>
                      <div class="crical-content-bar">
                        <h4><strong>-5 hrs 0 mins</strong> remaining</h4>
                        <h4><strong>0 hrs 0 mins</strong> allowance</h4> </div>
                    </div>
                    <p class="next">Next up - No absences coming up</p>
                    <div class="btn-info-sep">
                      <p>You've also taken</p>
                      <div class="ntn-prt">
                        <h5><a href="#">0 Lateness</a></h5>
                        <h6><a href="#">0 Sickness</a></h6> </div>
                    </div>


                  </div>
                  <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">...</div>
                </div>
              </aside>
            </div>
            <!-- Right Side Bar Info end Here -->
            <!-- Card information start here -->
            <div class="row my-3">
              <div class="col-md-4 my-2">
                <div class="card">
                  <div class="detail-area">
                    <div>
                      <h2 class="heading">Payroll</h2>
                    </div>
                    <div>
                      <p class="sub-heading">navigator</p>
                    </div>
                  </div>
                  <div class="detail">
                    <div class="headline">
                      <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit.</p>
                    </div>
                    <div class="more-headline">
                      <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Praesentium amet sint deserunt. Non mollitia labore explicabo! <span class="see-more-card"><a href="#" style="text-decoration: none;">See More</a></span></p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-4 my-2">
                <div class="card">
                  <div class="payroll">
                    <div>
                      <h2 class="heading">Turbotalent</h2>
                    </div>
                    <div>
                      <p class="sub-heading">navigator</p>
                    </div>
                  </div>
                  <div class="detail">
                    <div class="headline">
                      <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit.</p>
                    </div>
                    <div class="more-headline">
                      <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Praesentium amet sint deserunt. Non mollitia labore explicabo! <span class="see-more-card"><a href="#" style="text-decoration: none;">See More</a></span></p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-4 my-2">
                <div class="card">
                  <div class="turbotalent">
                    <div>
                      <h2 class="heading">backtowork</h2>
                    </div>
                    <div>
                      <p class="sub-heading">navigator</p>
                    </div>
                  </div>
                  <div class="detail">
                    <div class="headline">
                      <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit.</p>
                    </div>
                    <div class="more-headline">
                      <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Praesentium amet sint deserunt. Non mollitia labore explicabo! <span class="see-more-card"><a href="#" style="text-decoration: none;">See More</a></span></p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-4 my-2">
                <div class="card">
                  <div class="turbotalent">
                    <div>
                      <h2 class="heading">Turbotalent</h2>
                    </div>
                    <div>
                      <p class="sub-heading">navigator</p>
                    </div>
                  </div>
                  <div class="detail">
                    <div class="headline">
                      <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit.</p>
                    </div>
                    <div class="more-headline">
                      <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Praesentium amet sint deserunt. Non mollitia labore explicabo! <span class="see-more-card"><a href="#" style="text-decoration: none;">See More</a></span></p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-4 my-2">
                <div class="card">
                  <div class="detail-area">
                    <div>
                      <h2 class="heading">payroll</h2>
                    </div>
                    <div>
                      <p class="sub-heading">navigator</p>
                    </div>
                  </div>
                  <div class="detail">
                    <div class="headline">
                      <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit.</p>
                    </div>
                    <div class="more-headline">
                      <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Praesentium amet sint deserunt. Non mollitia labore explicabo! <span class="see-more-card"><a href="#" style="text-decoration: none;">See More</a></span></p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-4 my-2">
                <div class="card">
                  <div class="backtowork">
                    <div>
                      <h2 class="heading">backtowork</h2>
                    </div>
                    <div>
                      <p class="sub-heading">navigator</p>
                    </div>
                  </div>
                  <div class="detail">
                    <div class="headline">
                      <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit.</p>
                    </div>
                    <div class="more-headline">
                      <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Praesentium amet sint deserunt. Non mollitia labore explicabo! <span class="see-more-card"><a href="#" style="text-decoration: none;">See More</a></span></p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- Card information end here -->
          </div>
        </div>
      </div>
    </div>
  </section>
  @include('rotaStaff.components.footer')
  <script>
    function change_leaves_data(date){
      var token = "<?=csrf_token()?>";
      $.ajax({
          url:"{{ url('/get_leave_record_for_1_week') }}",    
          type: "post",    
          dataType: 'json',
          data: {date: date, _token:token},
          success:function(result){
              console.log(result);
              document.getElementById('all_leave').innerHTML = "";
              document.getElementById('other_leave').innerHTML = result.other;
              document.getElementById('annual_leave').innerHTML = result.annual;
              document.getElementById('sickness_leave').innerHTML = result.sickness;
              document.getElementById('lateness_leave').innerHTML = result.lateness;
              document.getElementById('all_leave').innerHTML = parseInt(result.lateness)+parseInt(result.other)+parseInt(result.sickness)+parseInt(result.annual);
              
          }
      });
    } 
    $(document).ready(function(){
      var token = "<?=csrf_token()?>";
      var date = moment().format('YYYY-MM-DD');
      $.ajax({
          url:"{{ url('/get_leave_record_for_1_week') }}",    
          type: "post",    
          dataType: 'json',
          data: {date: date, _token:token},
          success:function(result){
              console.log(result);
              document.getElementById('other_leave').innerHTML = result.other;
              document.getElementById('annual_leave').innerHTML = result.annual;
              document.getElementById('sickness_leave').innerHTML = result.sickness;
              document.getElementById('lateness_leave').innerHTML = result.lateness;
              document.getElementById('all_leave').innerHTML = parseInt(result.lateness)+parseInt(result.other)+parseInt(result.sickness)+parseInt(result.annual);
          }
      });
    });
  </script>