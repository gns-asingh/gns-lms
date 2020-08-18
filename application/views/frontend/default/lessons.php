<?php
$course_details = $this->crud_model->get_course_by_id($course_id)->row_array();
?>
 <?php
                $section_counter = 0;
                $totalCourseDuration = 0;

                foreach ($sections as $section):
                    $section_counter++;

                    $lessons = $this->crud_model->get_lessons('section', $section['id'])->result_array();

                    $totalDuration = 0;
                    $remainDuration = 0;
					foreach ($lessons as $index => $lesson):
						$temp = explode(':', $lesson['duration']);
						$totalDuration += intval($temp[2]); // Add the seconds
						$totalDuration += intval($temp[1]) * 60; // Add the minutes
                        $totalDuration += intval($temp[0]) * 60 * 60;	
                        $remainDuration = 	$totalDuration ;
                    endforeach;
                    $totalCourseDuration = $totalCourseDuration + $totalDuration;
                endforeach;
                    ?>
<section class="category-header-area page_header">
    <div class="container-lg">
        <div class="row">
            <div class="col-sm-12">
                <div>
                    <h1 class="category-name"><?php echo $course_details['title']; ?></h1>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="lession_bg">
<div class="container">
    <div class="time_display_bg">
    <div class="row">
        <div class="col-sm-12">
            <div>
				<div class="row">
                                        
						<div class="col-sm-6">
							<div>
								<label>Total hours:</label>
								<?php echo gmdate("H:i:s", $totalCourseDuration); ?> Hours
							</div>
						</div>
						<div class="col-sm-6">
							<label>Remaining hours:</label>
							<?php 
                            $completeLesDurationOfLess = 0;
                            $totalRemainDuration = 0;
                            foreach ($sections as $section):
                            $lessons = $this->crud_model->get_lessons('section', $section['id'])->result_array();

								foreach ($lessons as $lesson): 	
									$completeLesDuration  = 0;								
							?>

							<?php if($lesson['read_status'] == 1):?>
								<?php   $temp = explode(':', $lesson['duration']);
								$completeLesDuration += intval($temp[2]); // Add the seconds
								$completeLesDuration += intval($temp[1]) * 60; // Add the minutes
								$completeLesDuration += intval($temp[0]) * 60 * 60;    
								$completeLesDurationOfLess  = $completeLesDurationOfLess  +   $completeLesDuration
								 ?>
										<?php else: ?>
									   <?php endif; ?>
                                       <?php endforeach; ?>
                                       <?php $totalRemainDuration =   $totalCourseDuration -  $completeLesDurationOfLess;  ?>  
									   <?php endforeach; ?>
                                       <?php echo gmdate("H:i:s", $totalRemainDuration) ; ?> Hours


							<!-- <?php echo $section['title']; ?> -->
						</div>
				</div>
            </div>
        </div>
    </div>
                                </div>

	
    <div class="row">
        <div class="col-lg-4 pr-0">
            <!-- <div class="text-center" style="margin-top: 10px;">
                <h4><?php echo $course_details['title']; ?></h4>
            </div> -->
            <div class="accordion" id="accordionExample">
                <?php
                $section_counter = 0;
                $totalCourseDuration = 0;

                foreach ($sections as $section):
                    $section_counter++;
                    $totalCourseDuration = $totalCourseDuration + $totalDuration;

                    $lessons = $this->crud_model->get_lessons('section', $section['id'])->result_array();
					
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
                    
                    <div class="card lesson_section">
                        <div class="card-header lesson_header" id="<?php echo 'heading-'.$section['id']; ?>">

                            <div class="mb-0">
                                
                                <div class="lesson_accordian_header" type="button" data-toggle="collapse" data-target="<?php echo '#collapse-'.$section['id']; ?>" aria-expanded="true" aria-controls="<?php echo 'collapse-'.$section['id']; ?>">
                                    <div style="display:flex;">
                                        <div>
                                        <!-- <h6 style="color: #fff; font-size: 15px;margin-bottom:0;">Section<?php echo $section_counter;?> -->
                                        </div>
                                        
                                    </div>
                                    
                                     <h6 style="color: #fff; font-size: 15px;margin-bottom:0;">Section<?php echo $section_counter;?> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo gmdate("H:i:s", $totalDuration); ?> Hours<br> 
                                    
                                </div>
                            </div>
                        </div>

                        <div id="<?php echo 'collapse-'.$section['id']; ?>" class="collapse <?php if($section_id == $section['id']) echo 'show'; ?>" aria-labelledby="<?php echo 'heading-'.$section['id']; ?>" data-parent="#accordionExample">
                            <div class="card-body"  style="padding:0px;">
                                <table style="width: 100%;">
                                    <?php 
                                        //$readStatus = '';
                                        
										foreach ($lessons as $lesson): 										
										/*if($lesson['read_status'] == 1):
											$readStatus = 'disabled';
										endif;*/
									?>

                                        <tr class="lesson_info">
											<td style="padding-left:7px;">
												<?php if($lesson['read_status'] == 1):?>
                                                   
													<input type="checkbox" name="lesson-<?php echo $lesson['id'];?>" checked="checked" onclick="return false" disabled >
												<?php else: ?>
									                <input type="checkbox" name="lesson-<?php echo $lesson['id'];?>" id="lesson-<?php echo $lesson['id'];?>"  onclick="confirm_read_modal('<?php echo site_url('home/read_lesson/'.slugify($course_details['title']).'/'.$course_id.'/'.$lesson['id']); ?>','<?php echo $lesson['id']; ?>');">
												<?php endif; ?>
											</td>
                                            <td style="text-align: left;">
                                                <a style="color:#d0d0d0" href="<?php echo site_url('home/lesson/'.slugify($course_details['title']).'/'.$course_id.'/'.$lesson['id']); ?>" id = "<?php echo $lesson['id']; ?>">
                                                    <i class="fa fa-play" style="font-size: 12px;color: #909090;padding: 3px;"></i>
                                                    <span class="font-size:14px;">
                                                    <?php if ($lesson['lesson_type'] != 'other'):?>
                                                        <?php echo $lesson['title']; ?>
                                                    <?php else: ?>
                                                        <?php echo $lesson['title']; ?> <i class="fa fa-paperclip"></i>
                                                    <?php endif; ?>
                                                    </span>
                                                </a>
													<?php echo nbs(2);?><span style="font-size:12px; color: #909090;"><?php echo $lesson['duration']; ?></span>
                                            </td>
                                            <td style="text-align: right; padding:5px;">
                                                <span class="lesson_duration">
                                                    <?php if ($lesson['lesson_type'] == 'video' || $lesson['lesson_type'] == '' || $lesson['lesson_type'] == NULL): ?>
                                                        <!-- <?php echo $lesson['duration']; ?> -->
                                                    <?php elseif($lesson['lesson_type'] == 'quiz'): ?>
                                                        <i class="far fa-question-circle"></i>
                                                    <?php else:
                                                        $tmp           = explode('.', $lesson['attachment']);
                                                        $fileExtension = strtolower(end($tmp));?>

                                                        <?php if ($fileExtension == 'jpg' || $fileExtension == 'jpeg' || $fileExtension == 'png' || $fileExtension == 'bmp' || $fileExtension == 'svg'): ?>
                                                            <i class="fas fa-camera-retro"></i>
                                                        <?php elseif($fileExtension == 'pdf'): ?>
                                                            <i class="far fa-file-pdf"></i>
                                                        <?php elseif($fileExtension == 'doc' || $fileExtension == 'docx'): ?>
                                                            <i class="far fa-file-word"></i>
                                                        <?php elseif($fileExtension == 'txt'): ?>
                                                            <i class="far fa-file-alt"></i>
                                                        <?php else: ?>
                                                            <i class="fa fa-file"></i>
                                                        <?php endif; ?>

                                                    <?php endif; ?>
                                                </span>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </table>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
        <?php if (isset($lesson_id)): ?>
            <div class="col-lg-8" id = "video_player_area">
                <div class="display_video_bg">
                <!-- <div class="" style="background-color: #333;"> -->
                <div>
                    <?php
                    $lesson_details = $this->crud_model->get_lessons('lesson', $lesson_id)->row_array();
                    $lesson_thumbnail_url = $this->crud_model->get_lesson_thumbnail_url($lesson_id);

                    // If the lesson type is video
                    // i am checking the null and empty values because of the existing users does not have video in all video lesson as type
                    if($lesson_details['lesson_type'] == 'video' || $lesson_details['lesson_type'] == '' || $lesson_details['lesson_type'] == NULL):
                        $video_url = $lesson_details['video_url'];
                        $provider = $lesson_details['video_type'];
                        ?>

                        <!-- If the video is youtube video -->
                        <?php if (strtolower($provider) == 'youtube'): ?>
                            <!------------- PLYR.IO ------------>
                            <link rel="stylesheet" href="<?php echo base_url();?>assets/global/plyr/plyr.css">

                            <div class="plyr__video-embed" id="player">
                                <iframe height="500" src="<?php echo $video_url;?>?origin=https://plyr.io&amp;iv_load_policy=3&amp;modestbranding=1&amp;playsinline=1&amp;showinfo=0&amp;rel=0&amp;enablejsapi=1" allowfullscreen allowtransparency allow="autoplay"></iframe>
                            </div>

                            <script src="<?php echo base_url();?>assets/global/plyr/plyr.js"></script>
                            <script>const player = new Plyr('#player');</script>
                            <!------------- PLYR.IO ------------>

                        <!-- If the video is vimeo video -->
                        <?php elseif (strtolower($provider) == 'vimeo'):
                            $video_details = $this->video_model->getVideoDetails($video_url);
                            $video_id = $video_details['video_id'];?>
                            <!------------- PLYR.IO ------------>
                            <link rel="stylesheet" href="<?php echo base_url();?>assets/global/plyr/plyr.css">
                            <div class="plyr__video-embed" id="player">
                                <iframe height="500" src="https://player.vimeo.com/video/<?php echo $video_id; ?>?loop=false&amp;byline=false&amp;portrait=false&amp;title=false&amp;speed=true&amp;transparent=0&amp;gesture=media" allowfullscreen allowtransparency allow="autoplay"></iframe>
                            </div>

                            <script src="<?php echo base_url();?>assets/global/plyr/plyr.js"></script>
                            <script>const player = new Plyr('#player');</script>
                            <!------------- PLYR.IO ------------>

                        <!-- If the video is html5 video -->
                        <?php else :?>
                            <!------------- PLYR.IO ------------>
                            <link rel="stylesheet" href="<?php echo base_url();?>assets/global/plyr/plyr.css">
                            <video poster="<?php echo $lesson_thumbnail_url;?>" id="player" playsinline controls>
                            <?php if (get_video_extension($video_url) == 'mp4'): ?>
                                <source src="<?php echo $video_url; ?>" type="video/mp4">
                                <?php elseif (get_video_extension($video_url) == 'webm'): ?>
                                    <source src="<?php echo $video_url; ?>" type="video/webm">
                                    <?php else: ?>
                                        <h4><?php get_phrase('video_url_is_not_supported'); ?></h4>
                                    <?php endif; ?>
                                </video>

                                <script src="<?php echo base_url();?>assets/global/plyr/plyr.js"></script>
                                <script>const player = new Plyr('#player');</script>
                                <!------------- PLYR.IO ------------>
                            <?php endif; ?>
                    <?php elseif ($lesson_details['lesson_type'] == 'quiz'): ?>
                        <div>
                            <?php include 'quiz_view.php'; ?>
                        </div>
                    <?php else: ?>
                        <div>
                            <a href="<?php echo base_url().'uploads/lesson_files/'.$lesson_details['attachment']; ?>" class="btn btn-primary btn-sign-up" download style="color: #fff;">
                                <i class="fa fa-download" style="font-size: 15px;"></i> <?php echo get_phrase('download').' '.$lesson_details['title']; ?>
                            </a>
                        </div>
                    <?php endif; ?>
                </div>

                        <div style="margin: 15px 0;" id = "lesson-summary">
                            <div class="card display_video_note">
                                <div>
                                    <h5 class="card-title video_note_header"><?php echo $lesson_details['lesson_type'] == 'quiz' ? get_phrase('instruction') : get_phrase("note"); ?>:</h5>
                                    <div class="card-body">
                                        <?php if ($lesson_details['summary'] == ""): ?>
                                            <p class="card-text"><?php echo $lesson_details['lesson_type'] == 'quiz' ? get_phrase('no_instruction_found') : get_phrase("no_summary_found"); ?></p>
                                        <?php else: ?>
                                            <p class="card-text"><?php echo $lesson_details['summary']; ?></p>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
    </div>
</div>
 
</section>
<script>
var checkboxes = document.getElementsByTagName('unchecked');

for (var i=0; i<checkboxes.length; i++)  {
  if (checkboxes[i].type == 'checkbox')   {
    checkboxes[i].checked = false;
  }
}
function ajax_get_video_details(video_url) {
        $('#perloader').show();
        if(checkURLValidity(video_url)){
            $.ajax({
                url: '<?php echo site_url('admin/ajax_get_video_details');?>',
                type : 'POST',
                data : {video_url : video_url},
                success: function(response)
                {
                    jQuery('#duration').val(response);
                    $('#perloader').hide();
                    $('#invalid_url').hide();
                }
            });
        }else {
            $('#invalid_url').show();
            $('#perloader').hide();
            jQuery('#duration').val('');

        }
</script>