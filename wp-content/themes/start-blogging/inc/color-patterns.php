<?php
/**
 * Blogging: Color Patterns
 * Special thanks to the Twenty Seventeen theme
 * @package Start_Blogging
 * @since 1.0.0
 */

// Generate the CSS for the current custom color scheme.
function start_blogging_custom_colors_css() {
	$hue = absint( get_theme_mod( 'colorscheme_hue', 44 ) );

	/**
	 * Filter default saturation level.
	 * @param int $saturation Color saturation level.
	 */
	$saturation = absint( apply_filters( 'start_blogging_custom_colors_saturation', 52 ) );
	$reduced_saturation = ( .8 * $saturation ) . '%';
	$saturation = $saturation . '%';
	$alpha = $alpha . '1';
	$css = '
	
/**
 * Blogging: Color Patterns
 * Colors are ordered from dark to light.
 */

.colors-custom #top,
.colors-custom th,
.colors-custom .featured-post {
	color: hsl( ' . $hue . ', ' . $saturation . ', 100% ); /* base: #fff; */
}

.colors-custom #top,
.colors-custom th,
.colors-custom .featured-post,
.colors-custom .social-icons a {
	background-color: hsl( ' . $hue . ', ' . $saturation . ', 52% ); /* base: #deae2c; */
}

.colors-custom #error-label,
.colors-custom .more-link,
.colors-custom .block-post-info .entry-date span.block-day,
.colors-custom .navbar-default .navbar-nav > .current_page_item > a, 
.colors-custom .navbar-default .navbar-nav > .current_page_item > a:focus, 
.colors-custom .navbar-default .navbar-nav > .current_page_item > a:hover,
.colors-custom .navbar-default .navbar-nav > .active > a, 
.colors-custom .navbar-default .navbar-nav > .active > a:focus, 
.colors-custom .navbar-default .navbar-nav > .active > a:hover,
.colors-custom .navbar-default .navbar-nav > .open > a, 
.colors-custom .navbar-default .navbar-nav > .open > a:focus, 
.colors-custom .navbar-default .navbar-nav > .open > a:hover {
	color: hsl( ' . $hue . ', ' . $saturation . ', 52% ); /* base: #deae2c; */
}

.colors-custom .site-header,
.colors-custom #page {
	background-color: hsl( ' . $hue . ', ' . $saturation . ', 100% ); /* base: #fff; */
}

.colors-custom #site-title a, 
.colors-custom #site-title a:hover {
	color: hsl( ' . $hue . ', ' . $saturation . ', 0% ); /* base: #000; */
}

.colors-custom #site-description {
	color: hsl( ' . $hue . ', 0%, 59% ); /* base: #969696; */
}

.colors-custom #site-info,
.colors-custom #site-footer .widget-title  {
	color: hsla( ' . $hue . ', ' . $reduced_saturation . ', 100%, 0.75 ); /* base: #c1c1c1; */
}

body.colors-custom,
.colors-custom button,
.colors-custom input,
.colors-custom select,
.colors-custom textarea,
.colors-custom label,
.colors-custom .comment-body, {
	color: hsl( ' . $hue . ', ' . $reduced_saturation . ', 20% ); /* base: #333; */
}

.colors-custom .top-social-icons a,
.colors-custom .social-icons a,
.colors-custom .go-top  {
	color: hsl( ' . $hue . ', ' . $saturation . ', 100% ); /* base: #fff; */
}
.colors-custom .block-post-info,
.colors-custom .navbar-default {
	border-color: hsl( ' . $hue . ', 0%, 87% ); /* base: #dedede; */
}

.colors-custom .single-entry-meta, 
.colors-custom .single-entry-meta a, 
.colors-custom .single-entry-meta a:visited, 
.colors-custom .single-entry-meta a:hover {
	color: hsl( ' . $hue . ', 0%, 65% ); /* base: #aab0bb; */
}
.colors-custom .entry-content {
	color: hsl( ' . $hue . ', 0%, 44% ); /* base: #6f6f6f; */
}

.colors-custom h1,
.colors-custom h2,
.colors-custom h3,
.colors-custom h4,
.colors-custom h4,
.colors-custom h6,
.colors-custom .entry-title a {
	color: hsl( ' . $hue . ', ' . $reduced_saturation . ', 0% ); /* base: #000; */
}

.colors-custom a {
	color: hsl( ' . $hue . ', ' . $saturation . ', 45% ); /* base: #dca30a; */
}

.colors-custom blockquote,
.colors-custom pre {
	border-color: hsl( ' . $hue . ', ' . $saturation . ', 52% ); /* base: #deae2c; */
}

.colors-custom abbr,
.colors-custom acronym {
	border-bottom-color: hsl( ' . $hue . ', ' . $saturation . ', 40% ); /* base: #666; */
}

.colors-custom pre {
	background: hsl( ' . $hue . ', ' . $saturation . ', 99% ); /* base: #f9f7f2; */
}
.colors-custom mark,
.colors-custom ins {
	background-color: hsl( ' . $hue . ', ' . $saturation . ', 93% ); /* base: #eee; */
}

.colors-custom .table > thead > tr > th, 
.colors-custom .table > tbody > tr > th, 
.colors-custom .table > tfoot > tr > th, 
.colors-custom .table > thead > tr > td, 
.colors-custom .table > tbody > tr > td, 
.colors-custom .table > tfoot > tr > td {
	border-color: hsl( ' . $hue . ', ' . $saturation . ', 50% ); /* base: #dacba1; */
}

.colors-custom .widget li {
	border-color: hsla( ' . $hue . ', ' . $reduced_saturation . ', 0%, 0.08 ); /* base: #efefef; */
}
.colors-custom .widget li a, 
.colors-custom .widget li a:visited {
	color: hsla( ' . $hue . ', ' . $reduced_saturation . ', 0%, 0.6 ); /* base: #787d85; */
}

.colors-custom .go-top {
	background-color: hsl( ' . $hue . ', ' . $reduced_saturation . ', 40% ); /* base: #5e636a; */
}
.colors-custom #bottom-sidebar-wrapper {
	border-color: hsl( ' . $hue . ', ' . $reduced_saturation . ', 40% ); /* base: #5e636a; */
	background-color: hsl( ' . $hue . ', ' . $reduced_saturation . ', 40% ); /* base: #5e636a; */
}

.colors-custom #bottom-sidebar-wrapper, 
.colors-custom #bottom-sidebar-wrapper a, 
.colors-custom #bottom-sidebar-wrapper a:visited, 
.colors-custom #bottom-sidebar-wrapper .widget-title {
	color: hsl( ' . $hue . ', 0%, 92% ); /* base: #eaeaea; */
}

.colors-custom #sidebar-bottom .widget li, 
.colors-custom #sidebar-bottom .widget_categories .children, 
.colors-custom #sidebar-bottom .widget_nav_menu .sub-menu, 
.colors-custom #sidebar-bottom .widget_pages .children {
	border-color: hsla( ' . $hue . ', ' . $reduced_saturation . ', 92%, 0.25 ); /* base: #7d828a; */
}

.colors-custom .widget_search {
	background-color: hsl( ' . $hue . ', 0%, 94% ); /* base: #f1f1f1; */
}
.colors-custom .btn-search {
	background-color: hsl( ' . $hue . ', 0%, 85% ); /* base: #dedede; */	
}
.colors-custom .widget_tag_cloud a {
	color: hsl( ' . $hue . ', 0%, 0% ); /* base: #000; */
	background-color: hsl( ' . $hue . ', 0%, 90% ); /* base: #ddd; */
}
.colors-custom #bottom-sidebar-wrapper .widget_tag_cloud a {
	background-color: hsl( ' . $hue . ', 0%, 15% ); /* base: #8e949a; */
}

.colors-custom .navbar-default .navbar-toggle .icon-bar {
	background-color: hsl( ' . $hue . ', 0%, 50% ); /* base: #888; */
}


@media (max-width: 767px) {
	.colors-custom .navbar-default .navbar-collapse,
	.colors-custom .navbar-nav > li.search	{
		border-color: hsl( ' . $hue . ', 0%, 87% ); /* base: #7d828a; */
	}
}

';

	/**
	 * Filters forcustom colors CSS.
	 * @since Twenty Seventeen 1.0
	 */
	return apply_filters( 'start_blogging_custom_colors_css', $css, $hue, $saturation );
}
