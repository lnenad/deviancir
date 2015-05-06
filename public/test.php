<?php 
$new_likes = $_GET[ 'new_likes' ];

		$response = array(
            'status' => 'success',
            'msg' => 'Setting created successfully',
        );
 
        return json_encode($response);	

        ?>