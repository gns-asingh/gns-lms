<div class="row ">
    <div class="col-xl-12">
        <div class="admin_title_bg">
            <div class="card-body setPageTitle">
                <h4 class="page-title"> <i class="dripicons-toggles title_icon"></i> 
                    <span style="vertical-align:middle;position:relative;top:2px;"><?php echo get_phrase('roles'); ?></span>
                    <a href="<?php echo site_url('admin/role_form/add_role'); ?>" class="btn btn-primary add_btn_set box-shadow-none btn-rounded alignToTitle"><i class="mdi mdi-plus"></i><?php echo get_phrase('add_new_role'); ?></a>
                </h4>
            </div> <!-- end card body-->
        </div> <!-- end card -->
    </div><!-- end col-->
</div>

<div class="admin_main_content">
    <div class="row">
        <div class="col-xl-12">
            <div class="card box-shadow-none">
                <div class="admin_card_border">
                    <div class="admin_card_title">
                        <h5 class="mb-0 header-title"><?php echo get_phrase('role_list'); ?></h5>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive-sm mt-4 datatable_input">
                            <table id="basic-datatable" class="table table-bg table-centered mb-0">
                                <thead>
                                    <tr>
                                    <th>#</th>
                                    <th><?php echo get_phrase('name'); ?></th>
                                    <th><?php echo get_phrase('date_added'); ?></th>
                                    <th><?php echo get_phrase('last_modified'); ?></th>
                                    <th><?php echo get_phrase('actions'); ?></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    foreach ($roles as $key => $name): ?>
                                        <tr>
                                            <td><?php echo $key+1; ?></td>
                                            
                                            <td><?php echo $name['name']; ?></td>
                                            <td><?php echo $name['date_added']; ?></td>
                                            <td><?php echo $name['last_modified']; ?></td>
                                            
                                            <td>
                                                <div class="dropright dropright">
                                                    <button type="button" class="btn btn-sm btn-outline-primary btn-rounded btn-icon" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        <i class="mdi mdi-dots-vertical"></i>
                                                    </button>
                                                    <ul class="dropdown-menu">
                                                        <li><a class="dropdown-item" href="<?php echo site_url('admin/role_form/role_edit/'.$name['id']) ?>"><?php echo get_phrase('edit'); ?></a></li>
                                                        <li><a class="dropdown-item" href="#" onclick="confirm_modal('<?php echo site_url('admin/role_actions/delete/'.$name['id']); ?>');"><?php echo get_phrase('delete'); ?></a></li>
                                                    </ul>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div> <!-- end card body-->
            </div> <!-- end card -->
        </div><!-- end col-->
    </div>
</div>
