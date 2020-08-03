<?php

$my_courses = $this->user_model->my_courses()->result_array();

$categories = array();
foreach ($my_courses as $my_course) {
    $course_details = $this->crud_model->get_course_by_id($my_course['course_id'])->row_array();
    if (!in_array($course_details['category_id'], $categories)) {
        array_push($categories, $course_details['category_id']);
    }
}
include 'dashboard-chart.php'; ?>

<section class="page-header-area my-course-area page_header">
    <div class="container">
        <div class="row">
            <div class="col">
                <h1 class="page-title"><?php echo get_phrase('dashboard'); ?></h1>
               
            </div>
        </div>
    </div>
</section>

<section class="page-header-area my-course-area">
    <div class="container">
        <div class="row">
            <div class="col">
               
                <ul>
                <li class="active"><a href="<?php echo site_url('home/my_dashboard'); ?>"><?php echo get_phrase('Dashboard'); ?></a></li>
                  <li><a href="<?php echo site_url('home/my_courses'); ?>"><?php echo get_phrase('all_courses'); ?></a></li>
                 <!-- <li><a href="<?php echo site_url('home/my_wishlist'); ?>"><?php echo get_phrase('wishlists'); ?></a></li> -->
                  <li><a href="<?php echo site_url('home/my_messages'); ?>"><?php echo get_phrase('my_messages'); ?></a></li>
                 <!-- <li><a href="<?php echo site_url('home/purchase_history'); ?>"><?php echo get_phrase('purchase_history'); ?></a></li> -->
                  <li><a href="<?php echo site_url('home/profile/user_profile'); ?>"><?php echo get_phrase('user_profile'); ?></a></li>
                </ul>
            </div>
        </div>
    </div>
</section>

<section class="my-courses-area">
    <div class="container">
    <?php
    $number_of_courses = count($this->user_model->my_courses()->result_array());
    $number_of_lessons = $this->crud_model->get_lessons()->num_rows();
    $lessons = $this->crud_model->get_lessons()->result_array();
    $completeLesDuration = 0;
    $course_id = 0;
    $completedCourseId=0;
     ?>
     <?php
 $totalDuration = 0;
                    $remainDuration = 0;
					foreach ($lessons as $index => $lesson):
						$temp = explode(':', $lesson['duration']);
						$totalDuration += intval($temp[2]); // Add the seconds
						$totalDuration += intval($temp[1]) * 60; // Add the minutes
                        $totalDuration += intval($temp[0]) * 60 * 60;	
                        $remainDuration = 	$totalDuration ;					
					endforeach;
					?>

     <?php

     foreach($lessons as $lesson):
     ?>
             <?php $course_id= $lesson['course_id'];
             ?>

     <?php
      if($lesson['read_status'] == 1):?>
       <?php   $temp = explode(':', $lesson['duration']);
					                 	$completeLesDuration += intval($temp[2]); // Add the seconds
					                 	$completeLesDuration += intval($temp[1]) * 60; // Add the minutes
                                        $completeLesDuration += intval($temp[0]) * 60 * 60;       
                                         $remainDuration =   $remainDuration -  $completeLesDuration;  ?> 
       <?php $completeLessonDuration++;
       ?> 
 <?php endif; ?>
 <?php endforeach; ?>
 

<div class="admin_main_content">
    <div class="">
        <div class="row">
            <div class="col-12">
                <div class="widget-inline">
                    <div class="mb-20">
                        <div class="row">
                            <div class="col-sm-6 col-xl-3">
                                <div>
                                    <a href="<?php echo site_url('home/my_courses'); ?>" class="admin_text_white">
                                        <div class="card dashboard_bg_primary shadow-none m-0">
                                            <div class="card-body text-center">
                                                <i class="dripicons-archive" style="font-size: 24px;"></i>
                                                <h3><span><?php echo $number_of_courses; ?></span></h3>
                                                <p class="font-15 mb-0"><?php echo get_phrase('number_courses'); ?></p>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>

                            <div class="col-sm-6 col-xl-3">
                                <div class="admin_text_white">
                                        <div class="card dashboard_bg_info shadow-none m-0">
                                            <div class="card-body text-center">
                                                <i class="dripicons-camcorder" style="font-size: 24px;"></i>
                                                <h3><span><?php echo $number_of_lessons; ?></span></h3>
                                                <p class="font-15 mb-0"><?php echo get_phrase('number_of_lessons'); ?></p>
                                            </div>
                                        </div>
                                    
                                </div>
                            </div>
                            <div class="col-sm-6 col-xl-3">
                                <div>
                                    <a href="<?php echo site_url('home/my_courses'); ?>" class="admin_text_white">
                                        <div class="card admin_bg_primary shadow-none m-0">
                                            <div class="card-body text-center">
                                                <i class="dripicons-network-3" style="font-size: 24px;"></i>
                                                <h3><span><?php echo $completedCourseId; ?></span></h3>
                                                <p class="font-15 mb-0"><?php echo get_phrase('number_complited_courses'); ?></p>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="col-sm-6 col-xl-3">
                                <div>
                                    <a href="<?php echo site_url('home/my_courses'); ?>" class="admin_text_white">
                                        <div class="card admin_bg_primary shadow-none m-0">
                                            <div class="card-body text-center">
                                                <i class="dripicons-blog" style="font-size: 24px;"></i>
                                                <h3><span><?php echo $completeLessonDuration; ?></span></h3>
                                                <p class="font-15 mb-0"><?php echo get_phrase('number_of_complited_lessons'); ?></p>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div> <!-- end row -->
                    </div>
                </div> <!-- end card-box-->
            </div> <!-- end col-->
        </div>
        <div class="row">
            <div class="col-xl-4">
                <div class="dashboard_card_border mt-3">
                    <div>
                        
                        <div class="my-4 chartjs-chart" style="height: 202px;">
                            <canvas id="project-status-chart"></canvas>
                        </div>
                        <div class="admin_card_footer">
                        <div class="row text-center mt-1 py-1">
                            <div class="col-6 setBorderRight">
                                <div>
                                    <i class="mdi mdi-trending-up text-success mt-3 h3"></i>
                                    <h3 class="font-weight-normal">
                                        <span><?php echo gmdate("H:i:s", $totalDuration); ?></span>
                                    </h3>
                                    <p class="text-muted mb-0"><?php echo get_phrase('Total Hours'); ?></p>
                                </div>
                            </div>
                            <div class="col-6">
                                <div>
                                    <i class="mdi mdi-trending-down text-warning mt-3 h3"></i>
                                    <h3 class="font-weight-normal">
                                        <span><?php echo gmdate("H:i:s", $remainDuration); ?></span>
                                    </h3>
                                    <p class="text-muted mb-0"> <?php echo get_phrase('Remaining Hours'); ?></p>
                                </div>
                            </div>
                        </div>
</div>
</section>

<!-- App css -->
<link href="<?php echo base_url('assets/backend/css/app.min.css') ?>" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url('assets/backend/css/icons.min.css'); ?>" rel="stylesheet" type="text/css" />

<script type="text/javascript">
function getCoursesByCategoryId(category_id) {
    $.ajax({
        type : 'POST',
        url : '<?php echo site_url('home/my_courses_by_category'); ?>',
        data : {category_id : category_id},
        success : function(response){
            $('#my_courses_area').html(response);
        }
    });
}

function getCoursesBySearchString(search_string) {
    $.ajax({
        type : 'POST',
        url : '<?php echo site_url('home/my_courses_by_search_string'); ?>',
        data : {search_string : search_string},
        success : function(response){
            $('#my_courses_area').html(response);
        }
    });
}

function getCourseDetailsForRatingModal(course_id) {
    $.ajax({
        type : 'POST',
        url : '<?php echo site_url('home/get_course_details'); ?>',
        data : {course_id : course_id},
        success : function(response){
            $('#course_title_1').append(response);
            $('#course_title_2').append(response);
            $('#course_thumbnail_1').attr('src', "<?php echo base_url().'uploads/thumbnails/course_thumbnails/';?>"+course_id+".jpg");
            $('#course_thumbnail_2').attr('src', "<?php echo base_url().'uploads/thumbnails/course_thumbnails/';?>"+course_id+".jpg");
            $('#course_id_for_rating').val(course_id);
            // $('#instructor_details').text(course_id);
            console.log(response);
        }
    });
}

! function(o) {
     "use strict";
     var t = function() {
         this.$body = o("body"), this.charts = []
     };
     t.prototype.respChart = function(r, a, n, e) {
         Chart.defaults.global.defaultFontColor = "#8391a2", Chart.defaults.scale.gridLines.color = "#8391a2";
         var i = r.get(0).getContext("2d"),
             s = o(r).parent();
         return function() {
             var t;
             switch (r.attr("width", o(s).width()), a) {
                 case "Line":
                     t = new Chart(i, {
                         type: "line",
                         data: n,
                         options: e
                     });
                     break;
                 case "Doughnut":
                     t = new Chart(i, {
                         type: "doughnut",
                         data: n,
                         options: e
                     })
             }
             return t
         }()
     }, t.prototype.initCharts = function() {
         var t = [];
         if (0 < o("#task-area-chart").length) {
             t.push(this.respChart(o("#task-area-chart"), "Line", {
                 labels: [
                      <?php foreach ($months as $month): ?>
                    "<?php echo ucfirst($month); ?>",
                    <?php endforeach; ?>
                 ],
                 datasets: [{
                     label: "<?php echo get_phrase('this_year'); ?>",
                     backgroundColor: "rgba(114, 124, 245, 0.3)",
                     borderColor: "#727cf5",
                     data: [
                         <?php foreach ($month_wise_income as $income): ?>
                        "<?php echo $income; ?>",
                        <?php endforeach; ?>
                     ]
                 }]
             }, {
                 maintainAspectRatio: !1,
                 legend: {
                     display: !1
                 },
                 tooltips: {
                     intersect: !1
                 },
                 hover: {
                     intersect: !0
                 },
                 plugins: {
                     filler: {
                         propagate: !1
                     }
                 },
                 scales: {
                     xAxes: [{
                         reverse: !0,
                         gridLines: {
                             color: "rgba(0,0,0,0.05)"
                         }
                     }],
                     yAxes: [{
                         ticks: {
                             stepSize: 10,
                             display: !1
                         },
                         min: 10,
                         max: 100,
                         display: !0,
                         borderDash: [5, 5],
                         gridLines: {
                             color: "rgba(0,0,0,0)",
                             fontColor: "#fff"
                         }
                     }]
                 }
             }))
         }
         if (0 < o("#project-status-chart").length) {
          //  $remainDuration =  gmdate("H:i:s", $remainDuration) ;
            //$totalDuration =  gmdate("H:i:s", $totalDuration) ;
             t.push(this.respChart(o("#project-status-chart"), "Doughnut", {
                 labels: ["<?php echo get_phrase('Total Hours'); ?>", "<?php echo get_phrase('Remaining Hours'); ?>"],
                 datasets: [{
                     data: [<?php echo $totalDuration; ?>, <?php echo $remainDuration; ?>],
                     backgroundColor: ["#0acf97", "#FFC107"],
                     borderColor: "transparent",
                     borderWidth: "2"
                 }]
             }, {
                 maintainAspectRatio: !1,
                 cutoutPercentage: 80,
                 legend: {
                     display: !1
                 }
             }))
         }
         return t
     }, t.prototype.init = function() {
         var r = this;
         Chart.defaults.global.defaultFontFamily = '-apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,Oxygen-Sans,Ubuntu,Cantarell,"Helvetica Neue",sans-serif', r.charts = this.initCharts(), o(window).on("resize", function(t) {
             o.each(r.charts, function(t, r) {
                 try {
                     r.destroy()
                 } catch (t) {}
             }), r.charts = r.initCharts()
         })
     }, o.ChartJs = new t, o.ChartJs.Constructor = t
 }(window.jQuery),
 function(t) {
     "use strict";
     window.jQuery.ChartJs.init()
 }();

</script>
