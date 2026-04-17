<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Built-in Server Info</title>
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
        }
        code {
            background: #f0f0f0;
            padding: 5px 10px;
            border-radius: 3px;
            font-family: 'Courier New', monospace;
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
        pre {
            background: #2d2d2d;
            color: #f8f8f2;
            padding: 15px;
            border-radius: 5px;
            overflow-x: auto;
        }
    </style>
</head>
<body>

<div class="container">
    <h1>🚀 Built-in Server Guide</h1>

    <h2>How to Run PHP Built-in Server:</h2>
    <pre>
php -S localhost:8000
    </pre>

    <p>Run this command in your terminal in the project folder, then open:</p>
    <code>http://localhost:8000</code>

    <h2>Exercise 2 Instructions:</h2>
    <ol>
        <li>Open Terminal/Command Prompt</li>
        <li>Navigate to your phptest folder: <code>cd phptest</code></li>
        <li>Run: <code>php -S localhost:8000</code></li>
        <li>Visit: <code>http://localhost:8000</code></li>
        <li>Watch the terminal for request logs</li>
        <li>Press Ctrl+C to stop the server</li>
    </ol>

    <h2><?php echo '<h1>Built-in server works!</h1>'; echo '<p>PHP version: ' . PHP_VERSION . '</p>'; ?></h2>

    <div class="footer">
        <a href="index.php">← Back to Exercises</a>
    </div>
</div>

</body>
</html>
