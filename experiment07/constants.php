<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Constants</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            max-width: 600px;
            margin: 50px auto;
            background: #f5f5f5;
            padding: 20px;
        }
        .container {
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
        h1 {
            color: #667eea;
            text-align: center;
        }
        .constant {
            background: #f0f0f0;
            padding: 15px;
            margin: 10px 0;
            border-radius: 5px;
            border-left: 4px solid #f39c12;
        }
        .constant strong {
            color: #667eea;
        }
        .footer {
            text-align: center;
            margin-top: 20px;
            color: #999;
        }
        a {
            color: #667eea;
            text-decoration: none;
        }
    </style>
</head>
<body>

<div class="container">
    <h1>⚙️ PHP Constants</h1>

    <?php
    // Exercise 3: Define constants
    define('SITE_NAME', 'Web Technology Learning');
    define('SITE_VERSION', '1.0.0');
    define('MAX_ITEMS_PER_PAGE', 10);
    
    echo "<div class='constant'>";
    echo "<strong>SITE_NAME:</strong> " . SITE_NAME;
    echo "</div>";
    
    echo "<div class='constant'>";
    echo "<strong>SITE_VERSION:</strong> " . SITE_VERSION;
    echo "</div>";
    
    echo "<div class='constant'>";
    echo "<strong>MAX_ITEMS_PER_PAGE:</strong> " . MAX_ITEMS_PER_PAGE;
    echo "</div>";
    
    // PHP Built-in Constants
    echo "<h2>Built-in Constants:</h2>";
    
    echo "<div class='constant'>";
    echo "<strong>PHP_VERSION:</strong> " . PHP_VERSION;
    echo "</div>";
    
    echo "<div class='constant'>";
    echo "<strong>PHP_OS:</strong> " . PHP_OS;
    echo "</div>";
    
    echo "<div class='constant'>";
    echo "<strong>PHP_INT_MAX:</strong> " . PHP_INT_MAX;
    echo "</div>";
    
    echo "<div class='constant'>";
    echo "<strong>PHP_EOL (End of Line):</strong> Represents line break";
    echo "</div>";
    ?>

    <div class="footer">
        <a href="index.php">← Back to Exercises</a>
    </div>
</div>

</body>
</html>
