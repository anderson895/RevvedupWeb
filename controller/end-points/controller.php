<?php
include('../class.php');

$db = new global_class();

session_start();



if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['requestType'])) {
         if ($_POST['requestType'] == 'Login_admin') {
            $username = $_POST['username'];
            $password = $_POST['password'];
            $loginResult = $db->Login_admin($username, $password);

            if ($loginResult['success']) {
                echo json_encode([
                    'status' => 'success',
                    'message' => $loginResult['message'],
                    'position' => $loginResult['data']['position']
                ]);
            } else {
                echo json_encode([
                    'status' => 'error',
                    'message' => $loginResult['message']
                ]);
            }
    
        }else {
                echo "<pre>";
                print_r($_POST);
                echo "</pre>";
                echo "No Request Type";
            }

    }else {
        echo 'No POST REQUEST';
    }

} elseif ($_SERVER['REQUEST_METHOD'] === 'GET') {

   if (isset($_GET['requestType']))
    {
        if ($_GET['requestType'] == 'fetch_all_product') {
            $result = $db->fetch_all_product();
            echo json_encode([
                'status' => 200,
                'data' => $result
            ]);
        }else{
            echo "<pre>";
            print_r($_GET);
            echo "</pre>";
            echo "No Request Type";
        }


    }else {
        echo 'No GET REQUEST';
    }
}
?>