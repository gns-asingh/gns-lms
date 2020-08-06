<div class="row ">
    <div class="col-xl-12">
        <div class="instructor_title_bg">
            <div class="card-body setPageTitle">
                <h5 class="page-title setColorTitle"> 
                    <i class="dripicons-user-group title_icon setIconHead"></i> <?php echo get_phrase('trainee'); ?>
            <!--    <a href = "<?php echo site_url('instructor/user_form/add_user_form'); ?>" class="btn btn-outline-primary btn-rounded alignToTitle"><i class="mdi mdi-plus"></i><?php echo get_phrase('add_trainee'); ?></a> -->
                </h5>
            </div> <!-- end card body-->
        </div> <!-- end card -->
    </div><!-- end col-->
</div>
<div class="instructor_main_content">
    <div class="">
        <div class="row">
            <div class="col-xl-12">
                <div class="card box-shadow-none">
                    <div class="instructor_info_bg">
                        <div class="instructor_card_title">
                            <h5 class="mb-0 header-title setColorTitle"><?php echo get_phrase('trainee'); ?></h5>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive-sm mt-4 datatable_input">
                                <table id="basic-datatable" class="table table-bg table-centered mb-0">
                                    <thead>
                                        <tr>
                                        <th>#</th>
                                        <th><?php echo get_phrase('photo'); ?></th>
                                        <th><?php echo get_phrase('name'); ?></th>
                                        <th><?php echo get_phrase('email'); ?></th>
                                        <th><?php echo get_phrase('enrolled_courses'); ?></th>
                                        <!--  <th><?php echo get_phrase('actions'); ?></th> -->
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        foreach ($users->result_array() as $key => $user): ?>
                                            <tr>
                                                <td><?php echo $key+1; ?></td>
                                                <td>
                                                    <div class="table_img_set">
                                                        <img src="<?php echo $this->user_model->get_user_image_url($user['id']);?>" alt=""  class="img-fluid rounded-circle img-thumbnail">
                                                    </div>
                                                </td>
                                                <td><?php echo $user['first_name'].' '.$user['last_name']; ?></td>
                                                <td><?php echo $user['email']; ?></td>
                                                <td>
                                                    <?php
                                                        $enrolled_courses = $this->crud_model->enrol_history_by_user_id($user['id']);?>
                                                        <ul>
                                                            <?php foreach ($enrolled_courses->result_array() as $enrolled_course):
                                                                $course_details = $this->crud_model->get_course_by_id($enrolled_course['course_id'])->row_array();?>
                                                                <li><?php echo $course_details['title']; ?></li>
                                                            <?php endforeach; ?>
                                                        </ul>
                                                </td>
                                            <!--   <td>
                                                    <div class="dropright dropright">
                                                        <button type="button" class="btn btn-sm btn-outline-primary btn-rounded btn-icon" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            <i class="mdi mdi-dots-vertical"></i>
                                                        </button>
                                                        <ul class="dropdown-menu">
                                                            <li><a class="dropdown-item" href="<?php echo site_url('admin/user_form/edit_user_form/'.$user['id']) ?>"><?php echo get_phrase('edit'); ?></a></li>
                                                            <li><a class="dropdown-item" href="#" onclick="confirm_modal('<?php echo site_url('admin/users/delete/'.$user['id']); ?>');"><?php echo get_phrase('delete'); ?></a></li>
                                                        </ul>
                                                    </div>
                                                </td> -->
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div><!-- end card body-->
                    </div> 
                </div> <!-- end card -->
            </div><!-- end col-->
        </div>
    </div>                              
</div>
