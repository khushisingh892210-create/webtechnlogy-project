<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Profile</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            max-width: 600px;
            margin: 50px auto;
            background: #f5f5f5;
            padding: 20px;
        }
        .profile {
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
        h1 {
            color: #667eea;
            text-align: center;
        }
        .info {
            background: #f0f0f0;
            padding: 15px;
            margin: 10px 0;
            border-radius: 5px;
            border-left: 4px solid #667eea;
        }
        pre {
            background: #2d2d2d;
            color: #f8f8f2;
            padding: 15px;
            border-radius: 5px;
            overflow-x: auto;
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
        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

<div class="profile">
    <h1>👤 My Profile</h1>

    <?php
    // Exercise 3: Variables
    $name = "Admin";
    $age = 20;
    $city = "Pakistan";
    $language = "PHP";
    
    echo "<div class='info'>";
    echo "<strong>Name:</strong> " . $name . "<br>";
    echo "<strong>Age:</strong> " . $age . "<br>";
    echo "<strong>City:</strong> " . $city . "<br>";
    echo "<strong>Favorite Language:</strong> " . $language;
    echo "</div>";
    
    echo "<h2>Variable Dump:</h2>";
    echo "<pre>";
    var_dump($name);
    var_dump($age);
    var_dump($city);
    echo "</pre>";
    
    // String comparison
    echo "<h2>String Comparison:</h2>";
    echo "<div class='info'>";
    echo "Single quotes: '$language is great' → ";
    echo '<strong>' . '$language is great' . '</strong>' . "<br>";
    echo "Double quotes: \"$language is great\" → ";
    echo "<strong>$language is great</strong>";
    echo "</div>";
    
    // Associative array
    echo "<h2>Personal Details (Array):</h2>";
    $details = array(
        "Name" => $name,
        "Age" => $age,
        "City" => $city,
        "Language" => $language,
        "Experience" => "Learning"
    );
    echo "<pre>";
    print_r($details);
    echo "</pre>";
    ?>

    <div class="footer">
        <a href="index.php">← Back to Exercises</a>
    </div>
</div>

</body>
</html>
