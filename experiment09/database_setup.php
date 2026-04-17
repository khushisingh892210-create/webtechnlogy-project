<?php
// Database Setup Script
require_once 'db_connection.php';

$result = createDatabase();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Database Setup</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: linear-gradient(to right, #667eea, #764ba2);
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
            padding: 20px;
        }
        
        .container {
            background: #fff;
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 10px 25px rgba(0,0,0,0.2);
            max-width: 600px;
            text-align: center;
        }
        
        .success {
            background: #d4edda;
            color: #155724;
            padding: 20px;
            border-radius: 5px;
            margin: 20px 0;
        }
        
        .error {
            background: #f8d7da;
            color: #721c24;
            padding: 20px;
            border-radius: 5px;
            margin: 20px 0;
        }
        
        .info {
            text-align: left;
            background: #e7f3ff;
            padding: 15px;
            border-left: 4px solid #2196F3;
            margin: 20px 0;
            border-radius: 3px;
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
        
        h2 {
            color: #333;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <div class="container">
        <?php if ($result === "success"): ?>
            <div class="success">
                <h2>✓ Setup Successful!</h2>
                <p>Database and table have been initialized successfully.</p>
            </div>
            
            <div class="info">
                <strong>Database Information:</strong><br>
                Database Name: <code><?php echo DB_NAME; ?></code><br>
                Host: <code><?php echo DB_HOST; ?></code><br>
                User: <code><?php echo DB_USER; ?></code>
            </div>
            
            <p>You can now use the registration form.</p>
            <a href="experiment9.html" class="btn">Go to Registration Form</a>
        <?php else: ?>
            <div class="error">
                <h2>✗ Setup Failed!</h2>
                <p><?php echo $result; ?></p>
            </div>
            
            <p>Please check your database configuration in <code>config.php</code></p>
            <a href="database_setup.php" class="btn">Try Again</a>
        <?php endif; ?>
    </div>
</body>
</html>
<?php
?>
