<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Learning Exercises</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f5f5f5;
            padding: 20px;
            max-width: 1200px;
            margin: 0 auto;
        }
        h1 {
            color: #333;
            text-align: center;
            border-bottom: 3px solid #667eea;
            padding-bottom: 10px;
        }
        .exercises {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
            margin-top: 30px;
        }
        .exercise-box {
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            transition: transform 0.2s;
        }
        .exercise-box:hover {
            transform: translateY(-5px);
            box-shadow: 0 5px 20px rgba(0,0,0,0.2);
        }
        .exercise-box h3 {
            color: #667eea;
            margin-top: 0;
        }
        .exercise-box p {
            color: #666;
            margin: 10px 0;
        }
        .exercise-box a {
            display: inline-block;
            background: #667eea;
            color: white;
            padding: 10px 15px;
            border-radius: 5px;
            text-decoration: none;
            margin-top: 10px;
            transition: background 0.2s;
        }
        .exercise-box a:hover {
            background: #764ba2;
        }
        .info {
            background: #e3f2fd;
            padding: 15px;
            border-left: 4px solid #667eea;
            margin: 20px 0;
            border-radius: 4px;
        }
    </style>
</head>
<body>

<h1>🐘 PHP Learning Exercises</h1>

<div class="info">
    <strong>📌 Note:</strong> Run these files using XAMPP. Open XAMPP Control Panel, start Apache, then navigate to:
    <code>http://localhost/experiment07/</code>
</div>

<div class="exercises">
    <div class="exercise-box">
        <h3>✅ Exercise 2: Built-in Server</h3>
        <p>Learn to run PHP without XAMPP using built-in server</p>
        <a href="built_in_server.php">View Details</a>
    </div>

    <div class="exercise-box">
        <h3>📝 Exercise 3: Basics</h3>
        <p>Output methods, variables, and data types</p>
        <a href="profile.php">View Profile</a>
    </div>

    <div class="exercise-box">
        <h3>🔧 Challenge: System Info</h3>
        <p>Create a polished system information page</p>
        <a href="sysinfo.php">View System Info</a>
    </div>

    <div class="exercise-box">
        <h3>💾 Constants Learning</h3>
        <p>Define and use PHP constants</p>
        <a href="constants.php">View Constants</a>
    </div>

    <div class="exercise-box">
        <h3>📊 Data Types</h3>
        <p>Learn all PHP data types and verify them</p>
        <a href="data_types.php">View Data Types</a>
    </div>
</div>

</body>
</html>
