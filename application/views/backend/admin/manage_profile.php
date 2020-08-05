<div class="row ">
	<div class="col-xl-12">
		<div class="admin_title_bg">
			<div class="card-body setPageTitle">
				<h4 class="page-title"> <i class="dripicons-user-group title_icon"></i> 
				<span style="vertical-align:middle;position:relative;top:2px;"><?php echo get_phrase('manage_profile'); ?></h4></span>
			</div> <!-- end card body-->
		</div> <!-- end card -->
	</div><!-- end col-->
</div>
<div class="admin_main_content">
	<div class="row">
		<div class="col-xl-7">
			<div class="card box-shadow-none">
				<div class="admin_card_border">
					<div class="admin_card_title">
						<h5 class="header-title mb-0"><?php echo get_phrase('basic_info'); ?></h5>
					</div>
					<div class="card-body">
					<?php
					foreach($edit_data as $row):
						$social_links = json_decode($row['social_links'], true);?>
						<?php echo form_open(site_url('admin/manage_profile/update_profile_info/'.$row['id']) , array('class' => 'form-horizontal form-groups-bordered validate','target'=>'_top' , 'enctype' => 'multipart/form-data'));?>

						<div class="form-group">
							<label><?php echo get_phrase('first_name');?></label>
							<input type="text" class="form-control form_control_bg" name="first_name" value="<?php echo $row['first_name'];?>" required/>
						</div>

						<div class="form-group">
							<label><?php echo get_phrase('last_name');?></label>
							<input type="text" class="form-control form_control_bg" name="last_name" value="<?php echo $row['last_name'];?>" required/>
						</div>

						<div class="form-group">
							<label><?php echo get_phrase('email');?></label>
							<input type="email" class="form-control form_control_bg" name="email" value="<?php echo $row['email'];?>" required/>
						</div>

						<div class="form-group">
							<label><?php echo get_phrase('facebook_link');?></label>
							<input type="text" class="form-control form_control_bg" name="facebook_link" value="<?php echo $social_links['facebook'];?>" required/>
						</div>

						<div class="form-group">
							<label><?php echo get_phrase('twitter_link');?></label>
							<input type="text" class="form-control form_control_bg" name="twitter_link" value="<?php echo $social_links['twitter'];?>" required/>
						</div>

						<div class="form-group">
							<label><?php echo get_phrase('linkedin_link');?></label>
							<input type="text" class="form-control form_control_bg" name="linkedin_link" value="<?php echo $social_links['linkedin'];?>" required/>
						</div>

						<div class="form-group">
							<label><?php echo get_phrase('a_short_title_about_yourself'); ?></label>
							<textarea rows="5" class="form-control form_control_bg" name="title" placeholder="<?php echo get_phrase('a_short_title_about_yourself'); ?>" required><?php echo $row['title']; ?></textarea>
						</div>

						<div class="form-group">
							<label><?php echo get_phrase('biography'); ?></label>
							<textarea rows="5" class="form-control form_control_bg" name="biography" placeholder="<?php echo get_phrase('biography'); ?>" required><?php echo $row['biography']; ?></textarea>
						</div>


						<div class="form-group">
							<label> <?php echo get_phrase('photo'); ?> <small>(<?php echo get_phrase('the_image_size_should_be_any_square_image'); ?>)</small> </label>
							<div class="d-flex mt-2">
								<div class="">
									<img class = "rounded-circle img-thumbnail" src="<?php echo base_url('uploads/user_image/'.$row['id'].'.jpg');?>" alt="" style="height: 50px; width: 50px;">
								</div>
								<div class="flex-grow-1 pl-2">
									<div class="input-group">
										<div class="custom-file">
											<input type="file" class="custom-file-input custom_file_bg" name = "user_image" id="user_image" onchange="changeTitleOfImageUploader(this)" accept="image/*">
											<label class="custom-file-label ellipsis custom_file_bg" for=""><?php echo get_phrase('choose_file'); ?></label>
										</div>
									</div>
								</div>
							</div>
						</div>

						<div class="row justify-content-center">
							<button type="submit" class="btn btn-primary shadow-none"><?php echo get_phrase('update_profile');?></button>
						</div>
					</form>
					<?php
					endforeach;
					?>
			</div>
		</div> <!-- end card body-->
	</div> <!-- end card -->
	</div>
	<div class="col-xl-5">
		<div class="card shadow-none">
			<div class="admin_card_border">
			<div class="card-body">
				<?php foreach($edit_data as $row): ?>
					<?php echo form_open(site_url('admin/manage_profile/change_password/'.$row['id']) , array('class' => 'form-horizontal form-groups-bordered validate','target'=>'_top'));?>
					<div class="form-group">
						<label><?php echo get_phrase('current_password');?></label>
						<input type="password" class="form-control form_control_bg" name="current_password" value="" required/>
					</div>
					<div class="form-group">
						<label><?php echo get_phrase('new_password');?></label>
						<input type="password" class="form-control form_control_bg" name="new_password" value="" required/>
					</div>
					<div class="form-group">
						<label><?php echo get_phrase('confirm_new_password');?></label>
						<input type="password" class="form-control form_control_bg" name="confirm_password" value="" required/>
					</div>
					<div class="row justify-content-center">
						<button type="submit" class="btn btn-primary shadow-none"><?php echo get_phrase('update_password');?></button>
					</div>
				</form>
				<?php endforeach; ?>
			</div>
				</div>
		</div>
	</div>
	</div>
</div>
