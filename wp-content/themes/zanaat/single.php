<?php

/**
 *
 * single.php
 *
 * The single post template. Used when a single post is queried.
 * 
 */
if(in_category('zhitiya')) {
        include 'single-zhitiya.php'; 
    }
    else {
        include 'single-all.php'; 
}