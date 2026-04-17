<?php
// Include database configuration and connection handler
require_once 'config.php';
require_once 'db_connection.php';

// Create database connection
$db = new Database();
$conn = $db->getConnection();

// Check connection
if (!$conn) {
    die($db->getError());
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $fullname = htmlspecialchars($_POST['fullname']);
    $email = htmlspecialchars($_POST['email']);
    $phone = htmlspecialchars($_POST['phone']);
    $password = htmlspecialchars($_POST['password']);
    $dob = htmlspecialchars($_POST['dob']);
    $gender = htmlspecialchars($_POST['gender']);
    $course = htmlspecialchars($_POST['course']);
    $address = htmlspecialchars($_POST['address']);
    
    // Handle file upload
    $profilepic = "";
    if (isset($_FILES['profilepic']) && $_FILES['profilepic']['size'] > 0) {
        $target_dir = UPLOAD_DIR;
        
        // Create uploads directory if it doesn't exist
        if (!is_dir($target_dir)) {
            mkdir($target_dir, 0755, true);
        }
        
        // Check file size
        if ($_FILES['profilepic']['size'] > MAX_FILE_SIZE) {
            echo "Error: File size exceeds maximum limit of 5MB.";
            exit;
        }
        
        $file_name = basename($_FILES['profilepic']['name']);
        $file_type = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));
        
        if (!in_array($file_type, ALLOWED_EXTENSIONS)) {
            echo "Error: Only " . implode(", ", ALLOWED_EXTENSIONS) . " files are allowed.";
            exit;
        }
        
        $target_file = $target_dir . time() . "_" . $file_name;
        
        if (move_uploaded_file($_FILES['profilepic']['tmp_name'], $target_file)) {
            $profilepic = $target_file;
        } else {
            echo "Error uploading file.";
            exit;
        }
    }
    
    // Validate email
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Invalid email format";
        exit;
    }
    
    // Prepare and bind SQL statement to prevent SQL injection
    $stmt = $conn->prepare("INSERT INTO registrations (fullname, email, phone, password, dob, gender, course, address, profilepic) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssssssss", $fullname, $email, $phone, $password, $dob, $gender, $course, $address, $profilepic);
    
    // Execute statement
    if ($stmt->execute()) {
        ?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Success</title>
            <style>
                body {
                    font-family: Arial, sans-serif;
                    background: linear-gradient(to right, #667eea, #764ba2);
                    display: flex;
                    justify-content: center;
                    align-items: center;
                    height: 100vh;
                    margin: 0;
                }
                
                .success-container {
                    background: #fff;
                    padding: 40px;
                    border-radius: 10px;
                    box-shadow: 0 10px 25px rgba(0,0,0,0.2);
                    text-align: center;
                    max-width: 500px;
                }
                
                .success-container h2 {
                    color: #28a745;
                    margin-bottom: 20px;
                }
                
                .success-container p {
                    color: #555;
                    margin: 10px 0;
                    line-height: 1.6;
                }
                
                .btn {
                    display: inline-block;
                    margin-top: 20px;
                    padding: 12px 30px;
                    background: #667eea;
                    color: white;
                    text-decoration: none;
                    border-radius: 5px;
                    transition: 0.3s;
                    border: none;
                    cursor: pointer;
                    font-size: 16px;
                }
                
                .btn:hover {
                    background: #764ba2;
                }
            </style>
        </head>
        <body>
            <div class="success-container">
                <h2>✓ Registration Successful!</h2>
                <p>Thank you for registering. Your data has been saved to the database.</p>
                <p><strong>Name:</strong> <?php echo $fullname; ?></p>
                <p><strong>Email:</strong> <?php echo $email; ?></p>
                <p><strong>Course:</strong> <?php echo $course; ?></p>
                <a href="experiment9.html" class="btn">Register Another</a>
                <a href="../webtechnlogy-project/index.html" class="btn">Back to Home</a>
            </div>
        </body>
        </html>
        <?php
    } else {
        echo "Error: " . $stmt->error;
 db
    
    $stmt->close();
}

$conn->close();
?>
