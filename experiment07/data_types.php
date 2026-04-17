<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Data Types</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            max-width: 700px;
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
        .data-type {
            background: #f0f0f0;
            padding: 15px;
            margin: 10px 0;
            border-radius: 5px;
            border-left: 4px solid #27ae60;
        }
        .data-type strong {
            color: #667eea;
        }
        pre {
            background: #2d2d2d;
            color: #f8f8f2;
            padding: 10px;
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
    </style>
</head>
<body>

<div class="container">
    <h1>📊 PHP Data Types</h1>

    <?php
    // String
    $string_var = "Hello PHP";
    echo "<div class='data-type'>";
    echo "<strong>String:</strong> $string_var<br>";
    echo "Type: " . gettype($string_var) . "<br>";
    echo "Is String? " . (is_string($string_var) ? "Yes" : "No");
    echo "</div>";
    
    // Integer
    $int_var = 42;
    echo "<div class='data-type'>";
    echo "<strong>Integer:</strong> $int_var<br>";
    echo "Type: " . gettype($int_var) . "<br>";
    echo "Is Integer? " . (is_int($int_var) ? "Yes" : "No");
    echo "</div>";
    
    // Float
    $float_var = 3.14159;
    echo "<div class='data-type'>";
    echo "<strong>Float:</strong> $float_var<br>";
    echo "Type: " . gettype($float_var) . "<br>";
    echo "Is Float? " . (is_float($float_var) ? "Yes" : "No");
    echo "</div>";
    
    // Boolean
    $bool_var = true;
    echo "<div class='data-type'>";
    echo "<strong>Boolean:</strong> " . ($bool_var ? "true" : "false") . "<br>";
    echo "Type: " . gettype($bool_var) . "<br>";
    echo "Is Boolean? " . (is_bool($bool_var) ? "Yes" : "No");
    echo "</div>";
    
    // Null
    $null_var = null;
    echo "<div class='data-type'>";
    echo "<strong>Null:</strong> (empty value)<br>";
    echo "Type: " . gettype($null_var) . "<br>";
    echo "Is Null? " . (is_null($null_var) ? "Yes" : "No");
    echo "</div>";
    
    // Array
    $array_var = array("Apple", "Banana", "Cherry");
    echo "<div class='data-type'>";
    echo "<strong>Array:</strong><br>";
    echo "Type: " . gettype($array_var) . "<br>";
    echo "Is Array? " . (is_array($array_var) ? "Yes" : "No");
    echo "<pre>";
    print_r($array_var);
    echo "</pre>";
    echo "</div>";
    ?>

    <div class="footer">
        <a href="index.php">← Back to Exercises</a>
    </div>
</div>

</body>
</html>
