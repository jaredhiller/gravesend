<?php 

if( is_page_template('template-home.php') || is_singular('portfolio') || is_tax('skill-type') ) {
    // Display the Home/Portfolio Sidebar
   dynamic_sidebar('Main Sidebar');
} 

if( is_page_template('template-full-width.php') || is_singular('portfolio') || is_tax('skill-type') ) {
    // Display the Home/Portfolio Sidebar
   dynamic_sidebar('Main Sidebar');
} 

// else {
    // Display the Blog/Page Sidebar
//     dynamic_sidebar('Portfolio Sidebar');
//}