<?php

add_action('wp_ajax_file', 'upload_file');
add_action('wp_ajax_nopriv_file', 'upload_file');

add_action('wp_ajax_delete_file_from_wordpress', 'delete_file');
add_action('wp_ajax_nopriv_delete_file_from_wordpress', 'delete_file');

add_action('wp_ajax_send_post_to_wp', 'send_post_to_wp');
add_action('wp_ajax_nopriv_send_post_to_wp', 'send_post_to_wp');

add_action('wp_ajax_send_mail', 'send_mail');
add_action('wp_ajax_nopriv_send_mail', 'send_mail');

function upload_file(){

    $attachment_id = media_handle_upload( 'upload_file', 0 );

    if ( is_wp_error( $attachment_id ) ) {
        $result = array('result' => 'error');
    } else {
        $result = array
        (
            'result' => 'success',
            'id' => $attachment_id
        );
    }
    echo json_encode($result);
    die();
}

function delete_file(){
    $upload_file = $_POST['upload_file'];
    $deleted = wp_delete_attachment($upload_file, true);

    if (!$deleted) {
        $result = array('result' => 'error delete');
    } else {
        $result = array
        (
            'result' => 'success delete',
        );
    }
    echo json_encode($result);
    die();
}

function send_post_to_wp(){
    $number_phone = $_POST['number_phone'];
    if (isset($_POST['email'])){
        $email = $_POST['email'];
    } else{
        $email = '';
    }
    if (isset($_POST['name'])){
        $name = $_POST['name'];
    } else{
        $name = '';
    }
    $selected_option = $_POST['selected_option'];
    $textarea_site = $_POST['textarea_site'];

    if($textarea_site === 'empty')
        $textarea_site = '';

    if($number_phone === 'empty')
        $number_phone = '';

    if($email === 'empty')
        $email = '';

    if($name === 'empty')
        $name = '';

    $post_data = array(
        'post_title'    => 'Заказ',
        'post_status'   => 'publish',
        'post_type'     => 'orders',
        'post_author'   => 1,
        'meta_input'    => [
            'phone_number'  => $number_phone,
            'email_order'   => $email,
            'name_order'    => $name,
            'feed_back'     => $selected_option,
            'message'     => $textarea_site,
        ],
    );

    $post_id = wp_insert_post( wp_slash($post_data), true );

    $update_post_title = array(
        'ID'            => $post_id,
        'post_title'    => 'Заказ №' . $post_id,
    );

    wp_update_post( wp_slash($update_post_title), true );

    if(isset($_POST['orderWork'])){
        $orderWork = $_POST['orderWork'];
        $orderWork = str_replace('\\', '', $orderWork);
        $encodeJsonOrder = json_decode($orderWork, true);

        send_selected_work($encodeJsonOrder, $post_id);
    }

    if(isset($_POST['arrayAddFile'])){
        $arrayAddFile = $_POST['arrayAddFile'];
        echo '$arrayAddFile =' . $arrayAddFile . '|';
        send_file_to_wp($arrayAddFile, $post_id);
    }


//    echo json_encode($post_id);
//    var_export($encodeJsonOrder);
//    var_export($post_id);
//    echo $post_id;
    die();
}

function send_file_to_wp($arrayAddFile, $post_id){
    $arrayAddFile = explode(',', $arrayAddFile);
    var_export($arrayAddFile);
    $index_file = 0;
    foreach ($arrayAddFile as $file_id){
        $meta_key = "list_of_attached_files_" . $index_file . "_attached_file";
        $meta_value = $file_id;
        echo '+ ' . $index_file . '|';
        update_post_meta( $post_id, $meta_key, $meta_value );
        $index_file++;
    }
    $meta_key = "list_of_attached_files";
    $meta_value = $index_file;
    update_post_meta( $post_id, $meta_key, $meta_value );
}


function send_selected_work($encodeJsonOrder, $post_id){
    $title_iter = 0;
    foreach ($encodeJsonOrder as $key => $orders){
//'selected_menu_items_0_title_block'
        $meta_key = "selected_menu_items_" . $title_iter . "_title_block";
        $meta_value = $key;
        update_post_meta( $post_id, $meta_key, $meta_value );

        $value_iter = 0;
        foreach ($orders as $order){
//            selected_menu_items_0_block_items_0_selected_item
            $meta_key = "selected_menu_items_" . $title_iter . "_block_items_" . $value_iter . "_selected_item";
            $meta_value = $order;
            update_post_meta( $post_id, $meta_key, $meta_value );
            $value_iter++;
        }
//        selected_menu_items_0_block_items
        $meta_key = "selected_menu_items_" . $title_iter . "_block_items";
        $meta_value = $value_iter;
        update_post_meta( $post_id, $meta_key, $meta_value );
        $title_iter++;
    }
//    selected_menu_items
    $meta_key = "selected_menu_items";
    $meta_value = $title_iter;
    update_post_meta( $post_id, $meta_key, $meta_value );
}

function send_mail(){
    $number_phone = $_POST['send_phone_to_mail'];
    $mail = get_field('mail_address', 'option');


    $headers = 'From: My Name <myname@mydomain.com>' . "\r\n";
    $success = wp_mail($mail, 'Call back', $number_phone, $headers);

    if ($success){
        $result = array(
            'result'    => 'success send',
        );
    } else{
        $result = array(
            'result'    => 'error',
        );
    }
    echo json_encode($result);
    die();
}