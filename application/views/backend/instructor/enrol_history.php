<div class="row ">
    <div class="col-xl-12">
        <div class="instructor_title_bg">
            <div class="card-body setPageTitle">
                <h5 class="page-title setColorTitle"> 
                    <i class="dripicons-network-3 title_icon setIconHead"></i> <?php echo get_phrase('enrol_history'); ?></h5>
            </div> <!-- end card body-->
        </div> <!-- end card -->
    </div><!-- end col-->
</div>
<div class="instructor_main_content">
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="instructor_info_bg">
                    <div class="instructor_card_title">
                        <h5 class="header-title setColorTitle mb-0"><?php echo get_phrase('enrol_histories'); ?></h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-xl-6">
                                <form class="form-inline" action="<?php echo site_url('admin/enrol_history/filter_by_date_range') ?>" method="get">
                                    <div class="row">
                                        <div class="col-xl-10">
                                            <div class="form-group">
                                                <div id="reportrange" class="form-control form_control_bg" data-toggle="date-picker-range" data-target-display="#selectedValue"  data-cancel-class="btn-light" style="width: 100%;">
                                                    <i class="mdi mdi-calendar"></i>&nbsp;
                                                    <span id="selectedValue"><?php echo date("F d, Y" , $timestamp_start) . " - " . date("F d, Y" , $timestamp_end);?></span> <i class="mdi mdi-menu-down"></i>
                                                </div>
                                                <input id="date_range" type="hidden" name="date_range" value="<?php echo date("d F, Y" , $timestamp_start) . " - " . date("d F, Y" , $timestamp_end);?>">
                                            </div>
                                        </div>
                                        <div class="col-xl-2">
                                            <button type="submit" class="btn btn-info box-shadow-none" id="submit-button" onclick="update_date_range();"> <?php echo get_phrase('filter');?></button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="table-responsive-sm mt-4 datatable_input">
                            <?php if (count($enrol_history->result_array()) > 0): ?>
                                <table class="table table-bg table-centered mb-0">
                                    <thead>
                                        <tr>
                                        <th><?php echo get_phrase('photo'); ?></th>
                                            <th><?php echo get_phrase('user_name'); ?></th>
                                            <th><?php echo get_phrase('enrolled_course'); ?></th>
                                            <th><?php echo get_phrase('enrolment_date'); ?></th>
                                            <th><?php echo get_phrase('duration'); ?></th>
                                            <th><?php echo get_phrase('start_date'); ?></th>
                                            <th><?php echo get_phrase('end_date'); ?></th>                                  
                                            <th><?php echo get_phrase('actions'); ?></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php foreach ($enrol_history->result_array() as $enrol):
                                            $user_data = $this->db->get_where('users', array('id' => $enrol['user_id']))->row_array();
                                            $course_data = $this->db->get_where('course', array('id' => $enrol['course_id']))->row_array();?>
                                            <tr class="gradeU">
                                                <td>
                                                    <div class="table_img_set">
                                                        <img src="<?php echo $this->user_model->get_user_image_url($enrol['user_id']); ?>" alt=""  class="img-fluid rounded-circle img-thumbnail">
                                                    </div>
                                                </td>
                                                <td>
                                                    <b><?php echo $user_data['first_name'].' '.$user_data['last_name']; ?></b><br>
                                                    <small><?php echo get_phrase('email').': '.$user_data['email']; ?></small>
                                                </td>
                                                <td><strong><a href="<?php echo site_url('admin/course_form/course_edit/'.$course_data['id']); ?>" target="_blank"><?php echo ellipsis($course_data['title']); ?></a></strong></td>
                                                
                                                <td><?php echo date('D, d-M-Y', $enrol['date_added']); ?></td>
                                                
                                                <td><?php echo $enrol['duration_period'];?> <?php echo get_phrase('days'); ?></td>
                                                <td><?php echo date('D, d-M-Y', $enrol['start_date']); ?></td>
                                                
                                                <td><?php $endDate = strtotime('+'.$enrol['duration_period'].' days', $enrol['start_date']);
                                                $endDate = $endDate - 1;
                                                echo date('D, d-M-Y', $endDate); ?></td>
                                                
                                                <td>
                                                    <button type="button" class="btn btn-outline-danger btn-icon btn-rounded btn-sm" onclick="confirm_modal('<?php echo site_url('instructor/enrol_history_delete/'.$enrol['id']); ?>');"> <i class="dripicons-trash"></i> </button>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            <?php endif; ?>
                            <?php if (count($enrol_history->result_array()) == 0): ?>
                                <div class="img-fluid w-100 text-center">
                                    <img style="opacity: 1; width: 100px;" src="<?php echo base_url('assets/backend/images/file-search.svg'); ?>"><br>
                                    <?php echo get_phrase('no_data_found'); ?>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div> <!-- end card body-->
                </div>
            </div> <!-- end card -->
        </div><!-- end col-->
    </div>

<div class="row" style="display:none;">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">
              <h4 class="mb-3 header-title"><?php echo get_phrase('enrol_histories'); ?></h4>
              <div class="row justify-content-md-center">
                  <div class="col-xl-6">
                      <form class="form-inline" action="<?php echo site_url('instructor/enrol_history/filter_by_date_range') ?>" method="get">
                          <div class="col-xl-10">
                              <div class="form-group">
                                  <div id="reportrange" class="form-control" data-toggle="date-picker-range" data-target-display="#selectedValue"  data-cancel-class="btn-light" style="width: 100%;">
                                      <i class="mdi mdi-calendar"></i>&nbsp;
                                      <span id="selectedValue"><?php echo date("F d, Y" , $timestamp_start) . " - " . date("F d, Y" , $timestamp_end);?></span> <i class="mdi mdi-menu-down"></i>
                                  </div>
                                  <input id="date_range" type="hidden" name="date_range" value="<?php echo date("d F, Y" , $timestamp_start) . " - " . date("d F, Y" , $timestamp_end);?>">
                              </div>
                          </div>
                          <div class="col-xl-2">
                              <button type="submit" class="btn btn-info" id="submit-button" onclick="update_date_range();"> <?php echo get_phrase('filter');?></button>
                          </div>
                      </form>
                  </div>
              </div>
              <div class="table-responsive-sm mt-4">
                  <?php if (count($enrol_history->result_array()) > 0): ?>
                      <table class="table table-striped table-centered mb-0">
                          <thead>
                              <tr>
                                  <th><?php echo get_phrase('photo'); ?></th>
                                  <th><?php echo get_phrase('user_name'); ?></th>
                                  <th><?php echo get_phrase('enrolled_course'); ?></th>
                                  <th><?php echo get_phrase('enrolment_date'); ?></th>
								  <th><?php echo get_phrase('duration'); ?></th>
								  <th><?php echo get_phrase('start_date'); ?></th>
								  <th><?php echo get_phrase('end_date'); ?></th>  
                                  <th><?php echo get_phrase('actions'); ?></th>
                              </tr>
                          </thead>
                          <tbody>
                              <?php foreach ($enrol_history->result_array() as $enrol):
                                  $user_data = $this->db->get_where('users', array('id' => $enrol['user_id']))->row_array();
                                  $course_data = $this->db->get_where('course', array('id' => $enrol['course_id']))->row_array();?>
                                  <tr class="gradeU">
                                      <td>
                                          <img src="<?php echo $this->user_model->get_user_image_url($enrol['user_id']); ?>" alt="" height="50" width="50" class="img-fluid rounded-circle img-thumbnail">
                                      </td>
                                      <td>
                                          <b><?php echo $user_data['first_name'].' '.$user_data['last_name']; ?></b><br>
                                          <small><?php echo get_phrase('email').': '.$user_data['email']; ?></small>
                                      </td>
                                      <td><strong><a href="<?php echo site_url('instructor/course_form/course_edit/'.$course_data['id']); ?>" target="_blank"><?php echo ellipsis($course_data['title']); ?></a></strong></td>
                                      <td><?php echo date('D, d-M-Y', $enrol['date_added']); ?></td>
									  
									  <td><?php echo $enrol['duration_period'];?> <?php echo get_phrase('days'); ?></td>
									  <td><?php echo date('D, d-M-Y', $enrol['start_date']); ?></td>
									  
									  <td><?php $endDate = strtotime('+'.$enrol['duration_period'].' days', $enrol['start_date']);
									  echo date('D, d-M-Y', $endDate); ?></td>
									  
                                      <td>
                                          <button type="button" class="btn btn-outline-danger btn-icon btn-rounded btn-sm" onclick="confirm_modal('<?php echo site_url('instructor/enrol_history_delete/'.$enrol['id']); ?>');"> <i class="dripicons-trash"></i> </button>
                                      </td>
                                  </tr>
                              <?php endforeach; ?>
                          </tbody>
                      </table>
                  <?php endif; ?>
                  <?php if (count($enrol_history->result_array()) == 0): ?>
                      <div class="img-fluid w-100 text-center">
                        <img style="opacity: 1; width: 100px;" src="<?php echo base_url('assets/backend/images/file-search.svg'); ?>"><br>
                        <?php echo get_phrase('no_data_found'); ?>
                      </div>
                  <?php endif; ?>
              </div>
            </div> <!-- end card body-->
        </div> <!-- end card -->
    </div><!-- end col-->
</div>
<script type="text/javascript">
    function update_date_range()
    {
        var x = $("#selectedValue").html();
        $("#date_range").val(x);
    }
</script>
