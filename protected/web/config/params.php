<?php
    return array(
        'facebook_sdk_path'     => dirname(__DIR__) . '/../../vendors/facebook-sdk/autoload.php',
        'facebook'              => array(
            'app_id'     => '1102943073067888',
            'app_secret' => 'a9d5b9059484c4559cf3d55d5a6677a8',
            'cookie'     => true
        ),
        'facebookPermissions'   => array('email', 'public_profile', 'user_birthday', 'user_friends'),
        'collection_categories' => array(
            'uncategory' => 0,
        ),

        'telco_list' => array(
            'VIETTEL'      => 'Viettel',
            'MOBIFONE'     => 'Mobifone',
            'VINAPHONE'    => 'Vinaphone',
            'VIETNAMOBILE' => 'Vietnam Mobile',
            'ZING'         => 'Zing',
            'FPT'          => 'FPT Gate',
            'ONCASH'       => 'On Cash',
            'MEGACARD'     => 'Megacard',
        ),

        'telco_rules' => array(
            'VIETTEL'      => array('serial' => array(11, 15), 'pin' => array(13, 15)),
            'MOBIFONE'     => array('serial' => 3, 'pin' => 14),
            'VINAPHONE'    => array('serial' => 3, 'pin' => 12),
            'VIETNAMOBILE' => array('serial' => 3, 'pin' => 12),
            'ZING'         => array('serial' => 3, 'pin' => 12),
            'FPT'          => array('serial' => 3, 'pin' => 10),
            'ONCASH'       => array('serial' => 3, 'pin' => 12),
            'MEGACARD'     => array('serial' => 0, 'pin' => 12),
        ),

        'url_payment_centech' => 'http://pay.centech.com.vn',
        'cp_id'               => '015',
        'upload_dir'          => 'uploads/',
        'verify_config'       => array(
            'verify_number' => 2,
            'times_reset'   => 3,
        ),
        'sendEmail'   => array(
            'host'     => 'mail.centech.com.vn',
            'username' => 'linh.btk@centech.com.vn',
            'password' => '',
            'port'     => 465,
            'type'     => 'ssl',
        ),
    );