<!DOCTYPE html>
<!--[if IE 8]><html class="no-js lt-ie9" lang="en" > <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" lang="en">
<!--<![endif]-->

<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
<title><?php if (is_home()) { echo bloginfo('name'); } else { echo bloginfo('name')." ~ "; wp_title(''); } ?></title>
<link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/favicon.ico" type="image/x-icon" />
<link rel="apple-touch-icon" href="<?php echo get_template_directory_uri(); ?>/images/apple-touch-icon.png" />
<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/stylesheets/app.css">
<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/stylesheets/cwol.css">
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

%header_html%