<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>System Information</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            max-width: 800px;
            margin: 0 auto;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            padding: 20px;
            min-height: 100vh;
        }
        .container {
            background: white;
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.3);
        }
        h1 {
            color: #667eea;
            text-align: center;
            margin-bottom: 30px;
        }
        .info-box {
            background: #f0f0f0;
            padding: 15px;
            margin: 15px 0;
            border-radius: 5px;
            border-left: 4px solid #667eea;
        }
        .info-box strong {
            color: #667eea;
        }
        .clock {
            background: #667eea;
            color: white;
            padding: 10px 20px;
            border-radius: 5px;
            display: inline-block;
            font-size: 18px;
            font-weight: bold;
        }
        .tech-list {
            list-style-type: none;
            padding-left: 0;
        }
        .tech-list li {
            background: #667eea;
            color: white;
            padding: 10px 15px;
            margin: 10px 0;
            border-radius: 5px;
            transition: 0.2s;
        }
        .tech-list li:hover {
            background: #764ba2;
            transform: translateX(10px);
        }
        .note {
            background: #ffeaa7;
            border-left: 4px solid #f39c12;
            padding: 15px;
            margin-top: 30px;
            border-radius: 5px;
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
    <h1>⚙️ System Information</h1>

    <?php
    // PHP Version
    echo "<div class='info-box'>";
    echo "<strong>PHP Version:</strong> " . PHP_VERSION;
    echo "</div>";
    
    // Operating System
    echo "<div class='info-box'>";
    echo "<strong>Operating System:</strong> " . PHP_OS;
    echo "</div>";
    
    // Maximum Integer
    echo "<div class='info-box'>";
    echo "<strong>Maximum Integer:</strong> " . PHP_INT_MAX;
    echo "</div>";
    
    // End of Line
    echo "<div class='info-box'>";
    echo "<strong>End of Line Character:</strong> PHP_EOL (Line Break)";
    echo "</div>";
    
    // Today's Date
    echo "<div class='info-box'>";
    echo "<strong>Today's Date:</strong> " . date('l, d F Y');
    echo "</div>";
    
    // Current Time
    echo "<div class='info-box'>";
    echo "<strong>Current Time:</strong> <span class='clock' id='clock'>" . date('H:i:s') . "</span>";
    echo "</div>";
    
    // Server Information
    echo "<div class='info-box'>";
    echo "<strong>Document Root:</strong> " . $_SERVER['DOCUMENT_ROOT'];
    echo "</div>";
    
    echo "<div class='info-box'>";
    echo "<strong>Current Script:</strong> " . $_SERVER['SCRIPT_FILENAME'];
    echo "</div>";
    
    // Favorite Technologies
    echo "<h2>Favorite Technologies:</h2>";
    $technologies = array("PHP", "JavaScript", "MySQL");
    echo "<ul class='tech-list'>";
    foreach ($technologies as $tech) {
        echo "<li>✓ " . $tech . "</li>";
    }
    echo "</ul>";
    
    // Note
    echo "<div class='note'>";
    echo "<strong>📌 Remember:</strong> This page refreshes each request — PHP re-runs every time you load it!";
    echo "</div>";
    ?>

    <div class="footer">
        <a href="index.php">← Back to Exercises</a>
    </div>
</div>

<script>
    // Update clock every second
    setInterval(function() {
        const now = new Date();
        const hours = String(now.getHours()).padStart(2, '0');
        const minutes = String(now.getMinutes()).padStart(2, '0');
        const seconds = String(now.getSeconds()).padStart(2, '0');
        document.getElementById('clock').textContent = hours + ':' + minutes + ':' + seconds;
    }, 1000);
</script>

</body>
</html>
