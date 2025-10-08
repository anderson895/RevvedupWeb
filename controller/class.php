

<?php

    include ('config.php');

    date_default_timezone_set('Asia/Manila');

    class global_class extends db_connect
    {
        public function __construct()
        {
            $this->connect();
        }









        public function RequestAppointment($service, $employee_id, $fullname, $contact, $appointmentDate, $appointmentTime, $emergency,$customer_id,$city,$street) {

            // Generate unique reference number
            do {
                $reference_number = rand(100000, 999999); // 6-digit number
                $checkQuery = "SELECT COUNT(*) as count FROM appointments WHERE reference_number = ?";
                $checkStmt = $this->conn->prepare($checkQuery);
                $checkStmt->bind_param("i", $reference_number);
                $checkStmt->execute();
                $result = $checkStmt->get_result()->fetch_assoc();
            } while ($result['count'] > 0); // repeat if number already exists

            // Build query (with reference_number)
            $query = "INSERT INTO appointments 
                    (reference_number, service, employee_id, fullname, contact, appointmentDate, appointmentTime, emergency, status,appointment_customer_id,city,street) 
                    VALUES (?, ?, ?, ?, ?, ?, ?, ?, 'pending',?,?,?)";

            // Prepare statement
            $stmt = $this->conn->prepare($query);
            if ($stmt === false) {
                return [
                    'success' => false,
                    'message' => 'Query preparation failed: ' . $this->conn->error
                ];
            }

           $stmt->bind_param(
                "isissssiiss", 
                $reference_number,
                $service, 
                $employee_id, 
                $fullname, 
                $contact, 
                $appointmentDate, 
                $appointmentTime, 
                $emergency,
                $customer_id,
                $city,
                $street
            );


            // Execute and check
            if ($stmt->execute()) {
                return [
                    'success' => true,
                    'message' => 'Appointment booked successfully. Pending for approval.',
                    'reference_number' => $reference_number
                ];
            } else {
                return [
                    'success' => false,
                    'message' => 'Appointment failed: ' . $stmt->error
                ];
            }
        }






        
    public function Login($email, $password)
{
    $query = $this->conn->prepare("SELECT * FROM `customer` WHERE `customer_email` = ?");
    $query->bind_param("s", $email);

    if ($query->execute()) {
        $result = $query->get_result();
        if ($result->num_rows > 0) {
            $user = $result->fetch_assoc();

            if (password_verify($password, $user['customer_password'])) {

                if (session_status() == PHP_SESSION_NONE) {
                    session_start();
                }
                $_SESSION['customer_id'] = $user['customer_id'];

                $query->close();
                return [
                    'success' => true,
                    'message' => 'Login successful.',
                    'data' => [
                        'customer_id' => $user['customer_id']
                    ]
                ];
            } else {
                $query->close();
                return ['success' => false, 'message' => 'Incorrect password.'];
            }
        } else {
            $query->close();
            return ['success' => false, 'message' => 'Email not exist on the record.'];
        }
    } else {
        $query->close();
        return ['success' => false, 'message' => 'Database error during execution.'];
    }
}























    public function RegisterCustomer($fullname, $email, $password) {

        $checkQuery = "SELECT customer_id FROM `customer` WHERE `customer_email` = ?";
        $checkStmt = $this->conn->prepare($checkQuery);
        $checkStmt->bind_param("s", $email);
        $checkStmt->execute();
        $checkStmt->store_result();

        if ($checkStmt->num_rows > 0) {
            return [
                'success' => false,
                'message' => 'Email already registered.'
            ];
        }

        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        $query = "INSERT INTO `customer`(`customer_fullname`, `customer_email`, `customer_password`) 
                VALUES (?, ?, ?)";

        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("sss", $fullname,$email, $hashedPassword);

        if ($stmt->execute()) {
            return [
                'success' => true,
                'message' => 'Registration successful.'
            ];
        } else {
            return [
                'success' => false,
                'message' => 'Registration failed. Please try again.'
            ];
        }
    }













    
        // Fetch all users with position 'user', without password or pin
        public function fetch_appointment($customer_id) {
            $sql = "SELECT appointments.*
                    FROM appointments 
                    WHERE appointment_customer_id = '$customer_id'
                    ORDER BY appointment_id DESC";
            $result = $this->conn->query($sql);

            $users = [];
            if ($result && $result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $users[] = $row;
                }
            }
            return $users;
        }

       public function cancel_appointment($appointment_id) {
            // Prepare statement
            $stmt = $this->conn->prepare("UPDATE appointments SET status = 'request canceled' WHERE appointment_id = ?");
            
            if ($stmt) {
                // Bind parameter
                $stmt->bind_param("i", $appointment_id); // "i" means integer
                
                // Execute statement
                if ($stmt->execute()) {
                    $stmt->close();
                    return [
                        'success' => true,
                        'message' => 'Appointment canceled successfully.'
                    ];
                } else {
                    $stmt->close();
                    return [
                        'success' => false,
                        'message' => 'Failed to cancel appointment. Please try again.'
                    ];
                }
            } else {
                return [
                    'success' => false,
                    'message' => 'Failed to prepare the statement.'
                ];
            }
        }



}

?>