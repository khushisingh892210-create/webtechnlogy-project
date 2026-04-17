<?php
// Handle AJAX requests for calculator
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action'])) {
    header('Content-Type: application/json');
    
    $action = $_POST['action'];
    
    if ($action === 'calculate' && isset($_POST['expression'])) {
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
            
            // Use eval safely
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
    
    elseif ($action === 'function' && isset($_POST['function']) && isset($_POST['value'])) {
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
    exit;
}

// Helper function for factorial
function factorial($n) {
    if ($n <= 1) {
        return 1;
    }
    return $n * factorial($n - 1);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Scientific Calculator</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            padding: 20px;
        }

        .container {
            display: flex;
            gap: 20px;
            flex-wrap: wrap;
            justify-content: center;
        }

        .calculator {
            background: #fff;
            border-radius: 15px;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3);
            overflow: hidden;
            width: 400px;
        }

        .display-area {
            background: #222;
            color: #fff;
            padding: 20px;
            text-align: right;
        }

        .display {
            font-size: 24px;
            margin-bottom: 10px;
            word-wrap: break-word;
            word-break: break-all;
            min-height: 40px;
            line-height: 40px;
        }

        .result {
            font-size: 32px;
            font-weight: bold;
            min-height: 50px;
            line-height: 50px;
        }

        .buttons {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 1px;
            background: #ddd;
            padding: 1px;
        }

        button {
            padding: 20px;
            border: none;
            font-size: 18px;
            cursor: pointer;
            background: #f0f0f0;
            transition: all 0.2s;
            font-weight: 600;
        }

        button:hover {
            background: #e0e0e0;
            transform: scale(0.98);
        }

        button:active {
            transform: scale(0.95);
        }

        .number {
            background: #fff;
        }

        .operator {
            background: #667eea;
            color: white;
        }

        .operator:hover {
            background: #5568d3;
        }

        .equals {
            background: #27ae60;
            color: white;
            grid-column: 3 / 5;
        }

        .equals:hover {
            background: #229954;
        }

        .clear {
            background: #e74c3c;
            color: white;
            grid-column: 1 / 3;
        }

        .clear:hover {
            background: #c0392b;
        }

        .scientific {
            background: #f39c12;
            color: white;
        }

        .scientific:hover {
            background: #d68910;
        }

        .history {
            background: #fff;
            border-radius: 15px;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3);
            width: 300px;
            max-height: 500px;
            overflow-y: auto;
        }

        .history-title {
            background: #667eea;
            color: white;
            padding: 15px;
            font-size: 18px;
            font-weight: bold;
            text-align: center;
        }

        .history-items {
            padding: 0;
            list-style: none;
        }

        .history-item {
            padding: 12px 15px;
            border-bottom: 1px solid #eee;
            cursor: pointer;
            transition: 0.2s;
        }

        .history-item:hover {
            background: #f5f5f5;
        }

        .history-item-expression {
            font-size: 12px;
            color: #999;
            margin-bottom: 5px;
        }

        .history-item-result {
            font-size: 16px;
            font-weight: bold;
            color: #667eea;
        }

        .clear-history {
            width: 100%;
            padding: 12px;
            background: #e74c3c;
            color: white;
            border: none;
            cursor: pointer;
            font-weight: bold;
            transition: 0.2s;
        }

        .clear-history:hover {
            background: #c0392b;
        }

        @media (max-width: 768px) {
            .container {
                flex-direction: column;
                align-items: center;
            }

            .history {
                width: 100%;
                max-width: 400px;
            }
        }

        .error {
            color: #e74c3c;
        }
    </style>
</head>
<body>

<div class="container">
    <!-- Calculator -->
    <div class="calculator">
        <div class="display-area">
            <div class="display" id="display">0</div>
            <div class="result" id="result">0</div>
        </div>

        <div class="buttons">
            <!-- Row 1 - Clear and Settings -->
            <button class="clear" onclick="clearDisplay()">C</button>
            <button class="operator" onclick="addValue('/')">/</button>
            <button class="operator" onclick="addValue('*')">×</button>
            <button class="operator" onclick="deleteLast()">DEL</button>

            <!-- Row 2 - Numbers and Basic -->
            <button class="number" onclick="addValue('7')">7</button>
            <button class="number" onclick="addValue('8')">8</button>
            <button class="number" onclick="addValue('9')">9</button>
            <button class="operator" onclick="addValue('-')">-</button>

            <!-- Row 3 -->
            <button class="number" onclick="addValue('4')">4</button>
            <button class="number" onclick="addValue('5')">5</button>
            <button class="number" onclick="addValue('6')">6</button>
            <button class="operator" onclick="addValue('+')">+</button>

            <!-- Row 4 -->
            <button class="number" onclick="addValue('1')">1</button>
            <button class="number" onclick="addValue('2')">2</button>
            <button class="number" onclick="addValue('3')">3</button>
            <button class="scientific" onclick="addValue('.')">.</button>

            <!-- Row 5 -->
            <button class="number" onclick="addValue('0')" style="grid-column: 1 / 3;">0</button>
            <button class="scientific" onclick="calculatePower()">x²</button>
            <button class="operator" onclick="toggleSign()">+/-</button>

            <!-- Row 6 - Scientific Functions -->
            <button class="scientific" onclick="calculateFunction('sqrt')">√</button>
            <button class="scientific" onclick="calculateFunction('sin')">sin</button>
            <button class="scientific" onclick="calculateFunction('cos')">cos</button>
            <button class="scientific" onclick="calculateFunction('tan')">tan</button>

            <!-- Row 7 - More Scientific -->
            <button class="scientific" onclick="calculateFunction('log')">log</button>
            <button class="scientific" onclick="calculateFunction('ln')">ln</button>
            <button class="scientific" onclick="calculateFunction('factorial')">n!</button>
            <button class="scientific" onclick="addValue('π')">π</button>

            <!-- Row 8 - Equals -->
            <button class="equals" onclick="calculate()">=</button>
        </div>
    </div>

    <!-- History Panel -->
    <div class="history">
        <div class="history-title">History</div>
        <ul class="history-items" id="historyList"></ul>
        <button class="clear-history" onclick="clearHistory()">Clear History</button>
    </div>
</div>

<script>
    let display = '0';
    let result = '0';
    let history = JSON.parse(localStorage.getItem('calcHistory')) || [];

    function updateDisplay() {
        document.getElementById('display').textContent = display;
        document.getElementById('result').textContent = result;
    }

    function addValue(value) {
        if (display === '0' && value !== '.') {
            display = value;
        } else {
            display += value;
        }
        updateDisplay();
    }

    function clearDisplay() {
        display = '0';
        result = '0';
        updateDisplay();
    }

    function deleteLast() {
        if (display.length > 1) {
            display = display.slice(0, -1);
        } else {
            display = '0';
        }
        updateDisplay();
    }

    function toggleSign() {
        if (display !== '0') {
            display = display.startsWith('-') ? display.slice(1) : '-' + display;
            updateDisplay();
        }
    }

    function calculatePower() {
        try {
            const num = parseFloat(display);
            result = (num * num).toString();
            display = result;
            updateDisplay();
        } catch {
            display = 'Error';
            updateDisplay();
        }
    }

    function calculateFunction(func) {
        fetch('index.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded'
            },
            body: 'action=function&function=' + func + '&value=' + encodeURIComponent(display)
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                result = data.result;
                display = data.result;
                updateDisplay();
            } else {
                display = 'Error: ' + data.error;
                updateDisplay();
            }
        });
    }

    function calculate() {
        fetch('index.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded'
            },
            body: 'action=calculate&expression=' + encodeURIComponent(display)
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                result = data.result;
                addToHistory(display, result);
                display = data.result;
                updateDisplay();
            } else {
                display = 'Error: ' + data.error;
                updateDisplay();
            }
        });
    }

    function addToHistory(expression, result) {
        history.unshift({
            expression: expression,
            result: result,
            timestamp: new Date().toLocaleTimeString()
        });
        if (history.length > 10) {
            history.pop();
        }
        localStorage.setItem('calcHistory', JSON.stringify(history));
        updateHistory();
    }

    function updateHistory() {
        const historyList = document.getElementById('historyList');
        historyList.innerHTML = '';
        history.forEach((item, index) => {
            const li = document.createElement('li');
            li.className = 'history-item';
            li.innerHTML = `
                <div class="history-item-expression">${item.expression}</div>
                <div class="history-item-result">${item.result}</div>
            `;
            li.onclick = () => {
                display = item.result;
                updateDisplay();
            };
            historyList.appendChild(li);
        });
    }

    function clearHistory() {
        history = [];
        localStorage.removeItem('calcHistory');
        updateHistory();
    }

    updateHistory();
</script>

</body>
</html>
