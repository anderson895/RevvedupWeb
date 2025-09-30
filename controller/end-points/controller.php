<?php
include('../class.php');

$db = new global_class();

session_start();



if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['requestType'])) {
        if ($_POST['requestType'] == 'LoginCustomer') {
            $email = $_POST['email'];
            $password = $_POST['password'];
            $loginResult = $db->Login($email, $password);

            if ($loginResult['success']) {
                echo json_encode([
                    'status' => 'success',
                    'message' => $loginResult['message']
                ]);
            } else {
                echo json_encode([
                    'status' => 'error',
                    'message' => $loginResult['message']
                ]);
            }
        }else if ($_POST['requestType'] == 'RegisterCustomer') {
                $fullname = $_POST['fullname'];
                $email  = $_POST['email'];
                $password      = $_POST['password'];

                $result = $db->RegisterCustomer($fullname, $email, $password);

                if ($result['success']) {
                    echo json_encode([
                        'status' => 'success',
                        'message' => $result['message'],
                    ]);
                } else {
                    echo json_encode([
                        'status' => 'error',
                        'message' => $result['message']
                    ]);
                }

        }else if ($_POST['requestType'] == 'RequestAppointment') {

                $service          = $_POST['service'] ?? '';
                $employee_id      = $_POST['employee_id'] ?? '';
                $fullname         = $_POST['fullname'] ?? '';
                $contact          = $_POST['contact'] ?? '';
                $appointmentDate  = $_POST['appointmentDate'] ?? '';
                $appointmentTime  = $_POST['appointmentTime'] ?? '';
                $emergency        = isset($_POST['emergency']) ? $_POST['emergency'] : 0;

                if ($service === "other" && !empty($_POST['otherService'])) {
                    $service = $_POST['otherService'];
                }
                
                if (empty($service) || empty($employee_id) || empty($fullname) || empty($contact) || empty($appointmentDate) || empty($appointmentTime)) {
                    echo json_encode([
                        'status' => 'error',
                        'message' => 'Missing required fields.'
                    ]);
                    exit;
                }

                $result = $db->RequestAppointment($service, $employee_id, $fullname, $contact, $appointmentDate, $appointmentTime, $emergency);

                if ($result['success']) {
                    echo json_encode([
                        'status' => 'success',
                        'message' => $result['message'],
                    ]);
                } else {
                    echo json_encode([
                        'status' => 'error',
                        'message' => $result['message']
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