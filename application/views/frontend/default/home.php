<section>
    <div id="demo" class="carousel slide" data-ride="carousel">
        <ul class="carousel-indicators">
            <li data-target="#demo" data-slide-to="0" class="active"></li>
            <li data-target="#demo" data-slide-to="1"></li>
            <li data-target="#demo" data-slide-to="2"></li>
            <li data-target="#demo" data-slide-to="3"></li>
        </ul>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <div class="bannerHeight">
                    <div class="banner1"></div>
                </div>
            
                <div class="carousel-caption carouselTitle">
                    <div class="carouselInfo">
                        <h3><?php echo get_frontend_settings('banner_title'); ?></h3>
                        <p><?php echo get_frontend_settings('banner_sub_title'); ?></p>
                    </div>
                </div>   
            </div>
            <div class="carousel-item">
                <div class="bannerHeight">
                    <div class="banner2"></div>
                </div>
                <div class="carousel-caption carouselTitle">
                    <div class="carouselInfo">
                            <h3><?php echo get_frontend_settings('banner_title'); ?></h3>
                            <p><?php echo get_frontend_settings('banner_sub_title'); ?></p>
                    </div>
                </div>   
            </div>
            <div class="carousel-item">
                <div class="bannerHeight">
                    <div class="banner3"></div>
                </div>
                <div class="carousel-caption carouselTitle">
                    <div class="carouselInfo">
                            <h3><?php echo get_frontend_settings('banner_title'); ?></h3>
                            <p><?php echo get_frontend_settings('banner_sub_title'); ?></p>
                    </div>
                </div>   
            </div>
            <div class="carousel-item">
            <div class="bannerHeight">
                <div class="banner4"></div>
            </div>
            <div class="carousel-caption carouselTitle">
                <div class="carouselInfo">
                        <h3><?php echo get_frontend_settings('banner_title'); ?></h3>
                        <p><?php echo get_frontend_settings('banner_sub_title'); ?></p>
                </div>
            </div>  
            </div>
        </div>
        <a class="carousel-control-prev" href="#demo" data-slide="prev">
            <span class="carousel-control-prev-icon"></span>
        </a>
        <a class="carousel-control-next" href="#demo" data-slide="next">
            <span class="carousel-control-next-icon"></span>
        </a>
    </div>
</section>

<section class="home-fact-area">
    <div class="container-lg">
        <div class="row">
            <?php $courses = $this->crud_model->get_courses(); ?>
            <div class="col-md-4 d-flex">
                <div class="home-fact-box mr-md-auto ml-auto mr-auto">
                    <i class="fas fa-bullseye float-left"></i>
                    <div class="text-box">
                        <h4><?php
                        $status_wise_courses = $this->crud_model->get_status_wise_courses();
                        $number_of_courses = $status_wise_courses['active']->num_rows();
                        echo $number_of_courses.' '.get_phrase('online_courses'); ?></h4>
                        <p><?php echo get_phrase('explore_the_variety_of_courses'); ?></p>
                    </div>
                </div>
            </div>
            
            <div class="col-md-4 d-flex">
                <div class="home-fact-box mr-md-auto ml-auto mr-auto">
                    <i class="fa fa-users float-left"></i>
                    <div class="text-box">
                        <h4><?php $all_trainee_users = $this->user_model->get_user();
                        $number_of_trainee = $all_trainee_users->num_rows();
                        echo $number_of_trainee.' '.get_phrase('enrolled_trainees'); ?></h4>
                        <p><?php echo get_phrase('trainees_currently_enrolled_for_various_courses'); ?></p>
                    </div>
                </div>
            </div>

            <div class="col-md-4 d-flex">
                <div class="home-fact-box mr-md-auto ml-auto mr-auto">
                    <i class="fa fa-clock float-left"></i>
                    <div class="text-box">
                        <h4><?php echo get_phrase('scheduled courses'); ?></h4>
                        <p><?php echo get_phrase('attend_scheduled_courses_for_today'); ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section style="margin-bottom:20px;">
    <div class="container">
        <div class="row">
            <div class="col-sm-4">
                <div class="home_page_info">
                    <h6>Learning Management System</h6>
                    <p>
                        LMS (learning management system), an application that enables various sectors, companies, and
                        educational institutions to create, manage &amp; schedule courses, assignments, quizzes, group discussions
                        and reporting. A learning management system also assist the organization deliver training materials and
                        lessons to employees, students, or partners, which results in growth of company or institutions.
                    </p>
                </div>

                <div class="home_page_info">
                    <h6>Daily Online Learning</h6>
                    <p>
                        Build courses, assignments or quizzes from scratch and use it whenever required. This one-time activity
                        can reduce the rework and efforts. Share and schedule the courses and assignments on daily basis and
                        appear for it online. Whether on desktop or mobile, morning or night, your teams can easily access
                        training on their schedule. No matter the device, operating system, or connection stability.
                    </p>
                </div>
                <div class="home_page_info">
                    <h6>Better choice is LMS platform</h6>
                    <p>
                        GNS-LMS will make learning easy, interesting and progressive that every user choose an LMS will reach
                        the heights of success.
                    </p>
                </div>
                
                
            </div>
            <div class="col-sm-4">
                <div>
                    <img src="<?php echo base_url().'uploads/system/home_image.jpg'; ?>" style="max-width:100%;">
                </div>
            </div>
            <div class="col-sm-4">
                <div class="home_page_info">
                    <h6>Administration is so easy.</h6>
                    <p>
                        Why to put more efforts on managing manually?
                        GNS-LMS is great role-based solution for administrating the learning system. Admin user with ownership
                        of providing access can allow instructor user to create courses, assignments and uploading documents.
                        Instructor user has provided with option to keep watch on progress of courses for which trainee users
                        are enrolled.
                    </p>
                </div>
                <div class="home_page_info">
                    <h6>Judge progress by referring reports</h6>
                    <p>
                        Decision making is so simple that every user can see how online training works for them. Its path for
                        development and progress to reach the goals. Generate reports about everything that happens inside
                        your eLearning and have complete control over your training.
                    </p>
                </div>
                <div class="home_page_info">
                    <h6>Create &amp; schedule courses in a few clicks</h6>
                    <p>
                        No need to do any paperwork, just create online courses, assignments, or quizzes in few clicks. Add your
                        videos as a part of courses, just play and learn. Are you worried about conducting exams? Its very easy
                        to setup the assignments online using GNS-LMS. No more need to remember dates and time, just
                        schedule courses, assignments, quizzes and check progress online with ease.
                    </p>
                </div>
                
            </div>
		</div>
    </div>
</section>







<section class="home-banner-area" style="display:none;">
    <div class="container-lg">
        <div class="row">
            <div class="col">
                <div class="home-banner-wrap">
                    <h2><?php echo get_frontend_settings('banner_title'); ?></h2>
                    <p><?php echo get_frontend_settings('banner_sub_title'); ?></p>
                    <!--<form class="" action="<?php echo site_url('home/search'); ?>" method="get">
                        <div class="input-group">
                            <input type="text" class="form-control" name = "query" placeholder="<?php echo get_phrase('what_do_you_want_to_learn'); ?>?">
                            <div class="input-group-append">
                                <button class="btn" type="submit"><i class="fas fa-search"></i></button>
                            </div>
                        </div>
                    </form>-->
                </div>
            </div>
        </div>
    </div>
</section>
<section class="course-carousel-area" style="display:none;">
    <div class="container-lg">
     <!--   <div class="row">
            <div class="col">
                <h2 class="course-carousel-title"><?php echo get_phrase('top_courses'); ?></h2>
                <div class="course-carousel">
                    <?php $top_courses = $this->crud_model->get_top_courses()->result_array();
                    $cart_items = $this->session->userdata('cart_items');
                    foreach ($top_courses as $top_course):?>
                    <div class="course-box-wrap">
                        <a href="<?php echo site_url('home/course/'.slugify($top_course['title']).'/'.$top_course['id']); ?>" class="has-popover">
                            <div class="course-box">
                               
                                <div class="course-image">
                                    <img src="<?php echo $this->crud_model->get_course_thumbnail_url($top_course['id']); ?>" alt="" class="img-fluid">
                                </div>
                                <div class="course-details">
                                    <h5 class="title"><?php echo $top_course['title']; ?></h5>
                                    <p class="instructors"><?php echo $top_course['short_description']; ?></p>
                                    <div class="rating">
                                        <?php
                                        $total_rating =  $this->crud_model->get_ratings('course', $top_course['id'], true)->row()->rating;
                                        $number_of_ratings = $this->crud_model->get_ratings('course', $top_course['id'])->num_rows();
                                        if ($number_of_ratings > 0) {
                                            $average_ceil_rating = ceil($total_rating / $number_of_ratings);
                                        }else {
                                            $average_ceil_rating = 0;
                                        }

                                        for($i = 1; $i < 6; $i++):?>
                                        <?php if ($i <= $average_ceil_rating): ?>
                                            <i class="fas fa-star filled"></i>
                                        <?php else: ?>
                                            <i class="fas fa-star"></i>
                                        <?php endif; ?>
                                    <?php endfor; ?>
                                    <span class="d-inline-block average-rating"><?php echo $average_ceil_rating; ?></span>
                                </div>
                                <?php if ($top_course['is_free_course'] == 1): ?>
                                    <p class="price text-right"><?php echo get_phrase('free'); ?></p>
                                <?php else: ?>
                                    <?php if ($top_course['discount_flag'] == 1): ?>
                                        <p class="price text-right"><small><?php echo currency($top_course['price']); ?></small><?php echo currency($top_course['discounted_price']); ?></p>
                                    <?php else: ?>
                                        <p class="price text-right"><?php echo currency($top_course['price']); ?></p>
                                    <?php endif; ?>
                                <?php endif; ?>
                            </div>
                        </div>
                    </a>

                    <div class="webui-popover-content">
                        <div class="course-popover-content">
                            <?php if ($top_course['last_modified'] == ""): ?>
                                <div class="last-updated"><?php echo get_phrase('last_updater').' '.date('D, d-M-Y', $top_course['date_added']); ?></div>
                            <?php else: ?>
                                <div class="last-updated"><?php echo get_phrase('last_updater').' '.date('D, d-M-Y', $top_course['last_modified']); ?></div>
                            <?php endif; ?>

                            <div class="course-title">
                                <a href="<?php echo site_url('home/course/'.slugify($top_course['title']).'/'.$top_course['id']); ?>"><?php echo $top_course['title']; ?></a>
                            </div>
                            <div class="course-meta">
                                <span class=""><i class="fas fa-play-circle"></i>
                                    <?php echo $this->crud_model->get_lessons('course', $top_course['id'])->num_rows().' '.get_phrase('lessons'); ?>
                                </span>
                                <span class=""><i class="far fa-clock"></i>
                                    <?php
                                    $total_duration = 0;
                                    $lessons = $this->crud_model->get_lessons('course', $top_course['id'])->result_array();
                                    foreach ($lessons as $lesson) {
                                        if ($lesson['lesson_type'] != "other") {
                                            $time_array = explode(':', $lesson['duration']);
                                            $hour_to_seconds = $time_array[0] * 60 * 60;
                                            $minute_to_seconds = $time_array[1] * 60;
                                            $seconds = $time_array[2];
                                            $total_duration += $hour_to_seconds + $minute_to_seconds + $seconds;
                                        }
                                    }
                                    echo gmdate("H:i:s", $total_duration).' '.get_phrase('hours');
                                    ?>
                                </span>
                                <span class=""><i class="fas fa-closed-captioning"></i><?php echo ucfirst($top_course['language']); ?></span>
                            </div>
                            <div class="course-subtitle"><?php echo $top_course['short_description']; ?></div>
                            <div class="what-will-learn">
                                <ul>
                                    <?php
                                    $outcomes = json_decode($top_course['outcomes']);
                                    foreach ($outcomes as $outcome):?>
                                    <li><?php echo $outcome; ?></li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                        <div class="popover-btns">
                            <?php if (is_purchased($top_course['id'])): ?>
                                <div class="purchased">
                                    <a href="<?php echo site_url('home/my_courses'); ?>"><?php echo get_phrase('already_purchased'); ?></a>
                                </div>
                            <?php else: ?>
                                <?php if ($top_course['is_free_course'] == 1):
                                    if($this->session->userdata('user_login') != 1) {
                                        $url = "#";
                                    }else {
                                        $url = site_url('home/get_enrolled_to_free_course/'.$top_course['id']);
                                    }?>
                                    <a href="<?php echo $url; ?>" class="btn add-to-cart-btn big-cart-button" onclick="handleEnrolledButton()"><?php echo get_phrase('get_enrolled'); ?></a>
                                <?php else: ?>
                                    <button type="button" class="btn add-to-cart-btn <?php if(in_array($top_course['id'], $cart_items)) echo 'addedToCart'; ?> big-cart-button-<?php echo $top_course['id'];?>" id = "<?php echo $top_course['id']; ?>" onclick="handleCartItems(this)">
                                        <?php
                                        if(in_array($top_course['id'], $cart_items))
                                        echo get_phrase('added_to_cart');
                                        else
                                        echo get_phrase('add_to_cart');
                                        ?>
                                    </button>
                                    <button type="button" class="wishlist-btn <?php if($this->crud_model->is_added_to_wishlist($top_course['id'])) echo 'active'; ?>" title="Add to wishlist" onclick="handleWishList(this)" id = "<?php echo $top_course['id']; ?>"><i class="fas fa-heart"></i></button>
                                <?php endif; ?>
                            <?php endif; ?>

                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div> -->
</div>
</div>
</div>
</section>

<section class="course-carousel-area" style="display:none;">
    <div class="container-lg">
      <!--  <div class="row">
            <div class="col">
                <h2 class="course-carousel-title"><?php echo get_phrase('top').' 10 '.get_phrase('latest_courses'); ?></h2>
                <div class="course-carousel">
                    <?php
                    $latest_courses = $this->crud_model->get_latest_10_course();
                    foreach ($latest_courses as $latest_course):?>
                    <div class="course-box-wrap">
                        <a href="<?php echo site_url('home/course/'.slugify($latest_course['title']).'/'.$latest_course['id']); ?>">
                            <div class="course-box">
                                <div class="course-image">
                                    <img src="<?php echo $this->crud_model->get_course_thumbnail_url($latest_course['id']); ?>" alt="" class="img-fluid">
                                </div>
                                <div class="course-details">
                                    <h5 class="title"><?php echo $latest_course['title']; ?></h5>
                                    <p class="instructors">
                                        <?php
                                        $instructor_details = $this->user_model->get_all_user($latest_course['user_id'])->row_array();
                                        echo $instructor_details['first_name'].' '.$instructor_details['last_name']; ?>
                                    </p>
                                    <div class="rating">
                                        <?php
                                        $total_rating =  $this->crud_model->get_ratings('course', $latest_course['id'], true)->row()->rating;
                                        $number_of_ratings = $this->crud_model->get_ratings('course', $latest_course['id'])->num_rows();
                                        if ($number_of_ratings > 0) {
                                            $average_ceil_rating = ceil($total_rating / $number_of_ratings);
                                        }else {
                                            $average_ceil_rating = 0;
                                        }

                                        for($i = 1; $i < 6; $i++):?>
                                        <?php if ($i <= $average_ceil_rating): ?>
                                            <i class="fas fa-star filled"></i>
                                        <?php else: ?>
                                            <i class="fas fa-star"></i>
                                        <?php endif; ?>
                                    <?php endfor; ?>
                                    <span class="d-inline-block average-rating"><?php echo $average_ceil_rating; ?></span>
                                </div>
                                <?php if ($latest_course['is_free_course'] == 1): ?>
                                    <p class="price text-right"><?php echo get_phrase('free'); ?></p>
                                <?php else: ?>
                                    <?php if ($latest_course['discount_flag'] == 1): ?>
                                        <p class="price text-right"><small><?php echo currency($latest_course['price']); ?></small><?php echo currency($latest_course['discounted_price']); ?></p>
                                    <?php else: ?>
                                        <p class="price text-right"><?php echo currency($latest_course['price']); ?></p>
                                    <?php endif; ?>
                                <?php endif; ?>
                            </div>
                        </div>
                    </a>
                </div>
            <?php endforeach; ?>
        </div> -->
    </div>
</div>
</div>
</section>

<script type="text/javascript">
function handleWishList(elem) {

    $.ajax({
        url: '<?php echo site_url('home/handleWishList');?>',
        type : 'POST',
        data : {course_id : elem.id},
        success: function(response)
        {
            if (!response) {
                window.location.replace("<?php echo site_url('login'); ?>");
            }else {
                if ($(elem).hasClass('active')) {
                    $(elem).removeClass('active')
                }else {
                    $(elem).addClass('active')
                }
                $('#wishlist_items').html(response);
            }
        }
    });
}

function handleCartItems(elem) {
    url1 = '<?php echo site_url('home/handleCartItems');?>';
    url2 = '<?php echo site_url('home/refreshWishList');?>';
    $.ajax({
        url: url1,
        type : 'POST',
        data : {course_id : elem.id},
        success: function(response)
        {
            $('#cart_items').html(response);
            if ($(elem).hasClass('addedToCart')) {
                $('.big-cart-button-'+elem.id).removeClass('addedToCart')
                $('.big-cart-button-'+elem.id).text("<?php echo get_phrase('add_to_cart'); ?>");
            }else {
                $('.big-cart-button-'+elem.id).addClass('addedToCart')
                $('.big-cart-button-'+elem.id).text("<?php echo get_phrase('added_to_cart'); ?>");
            }
            $.ajax({
                url: url2,
                type : 'POST',
                success: function(response)
                {
                    $('#wishlist_items').html(response);
                }
            });
        }
    });
}

function handleEnrolledButton() {
    $.ajax({
        url: '<?php echo site_url('home/isLoggedIn');?>',
        success: function(response)
        {
            if (!response) {
                window.location.replace("<?php echo site_url('login'); ?>");
            }
        }
    });
}
</script>
