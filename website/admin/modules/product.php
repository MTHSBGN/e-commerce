<?php
/* Check to avoid direct access by user with the url */
if ( $_SERVER['REQUEST_METHOD']=='GET' && realpath(__FILE__) == realpath( $_SERVER['SCRIPT_FILENAME'] ) ) {
    /* 
       Up to you which header to send, some prefer 404 even if 
       the files does exist for security
    */
    header( 'HTTP/1.0 403 Forbidden', TRUE, 403 );

    /* choose the appropriate page to redirect users */
    die( header( 'location: ../../errors/404.html' ) );

}

function tmp() {
    echo "testing function";
}
function addProduct($name, $fr, $en) {
    $cat_name      = mysqli_real_escape_string($connectDB, $name);
    $french_descr  = mysqli_real_escape_string($connectDB, $fr);
    $english_descr = mysqli_real_escape_string($connectDB, $en);
    $sql           = "INSERT INTO Description(french, english) VALUES('$french_descr', '$english_descr');
    INSERT INTO Category(description_id, name) VALUES(LAST_INSERT_ID(), '$cat_name')";
    $res = mysqli_multi_query($connectDB, $sql);
    //header('Location: ' . $_SERVER['PHP_SELF']); redirection must be done after
}
