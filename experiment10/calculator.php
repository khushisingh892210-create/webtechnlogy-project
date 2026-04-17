<?php
header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    // Handle scientific functions
    if (isset($_POST['function']) && isset($_POST['value'])) {
        $function = $_POST['function'];
        $value = $_POST['value'];
        
        // Replace π with pi value
        $value = str_replace('π', pi(), $value);
        
        $result = null;
        $error = null;
        
        try {
            switch($function) {
                case 'sqrt':
                    if ($value < 0) {
                        $error = "Cannot calculate square root of negative number";
                    } else {
                        $result = sqrt($value);
                    }
                    break;
                    
                case 'sin':
                    $result = sin(deg2rad($value));
                    break;
                    
                case 'cos':
                    $result = cos(deg2rad($value));
                    break;
                    
                case 'tan':
                    $result = tan(deg2rad($value));
                    break;
                    
                case 'log':
                    if ($value <= 0) {
                        $error = "Logarithm undefined for values <= 0";
                    } else {
                        $result = log10($value);
                    }
                    break;
                    
                case 'ln':
                    if ($value <= 0) {
                        $error = "Natural log undefined for values <= 0";
                    } else {
                        $result = log($value);
                    }
                    break;
                    
                case 'factorial':
                    $num = intval($value);
                    if ($num < 0) {
                        $error = "Factorial not defined for negative numbers";
                    } else if ($num > 20) {
                        $error = "Factorial too large";
                    } else {
                        $result = factorial($num);
                    }
                    break;
                    
                default:
                    $error = "Unknown function";
            }
            
            if ($error) {
                echo json_encode(['success' => false, 'error' => $error]);
            } else {
                echo json_encode(['success' => true, 'result' => round($result, 10)]);
            }
            
        } catch (Exception $e) {
            echo json_encode(['success' => false, 'error' => $e->getMessage()]);
        }
    }
    
    // Handle expression evaluation
    elseif (isset($_POST['expression'])) {
        $expression = $_POST['expression'];
        
        try {
            // Replace symbols for calculation
            $expression = str_replace('π', strval(pi()), $expression);
            $expression = str_replace('×', '*', $expression);
            $expression = str_replace('÷', '/', $expression);
            
            // Validate expression (basic security check)
            if (!preg_match('/^[0-9+\-*\/().\s]*$/', $expression)) {
                echo json_encode(['success' => false, 'error' => "Invalid characters in expression"]);
                exit;
            }
            
            // Use eval safely (in production, use a proper math parser like EvalMath)
            $result = @eval('return ' . $expression . ';');
            
            if ($result === false) {
                echo json_encode(['success' => false, 'error' => "Calculation error"]);
            } else {
                echo json_encode(['success' => true, 'result' => round($result, 10)]);
            }
            
        } catch (Exception $e) {
            echo json_encode(['success' => false, 'error' => $e->getMessage()]);
        }
    }
}

// Helper function for factorial
function factorial($n) {
    if ($n <= 1) {
        return 1;
    }
    return $n * factorial($n - 1);
}
?>
