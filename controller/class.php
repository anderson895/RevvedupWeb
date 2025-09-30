

<?php

    include ('config.php');

    date_default_timezone_set('Asia/Manila');

    class global_class extends db_connect
    {
        public function __construct()
        {
            $this->connect();
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

}

?>