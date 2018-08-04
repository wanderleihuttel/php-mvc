<?php
    /*
    * Helper to format date/time
    */
    function helper_format_date($date, $format = APP_DATE_TIME_FORMAT){
        return date( $format, strtotime($date) );
    }
