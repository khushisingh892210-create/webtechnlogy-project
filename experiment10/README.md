# Experiment 10 - Scientific Calculator

A fully functional scientific calculator built with HTML, CSS, JavaScript, and PHP.

## Features

### Basic Operations
- Addition, Subtraction, Multiplication, Division
- Decimal point support
- Sign toggle (+/-)
- Delete last digit

### Scientific Functions
- **Square Root** (√)
- **Trigonometric Functions**: sin, cos, tan (converts degrees to radians)
- **Logarithms**: log (base 10), ln (natural log)
- **Factorial** (n!)
- **Power**: x² (square)
- **Mathematical Constants**: π (pi)

### Additional Features
- **Calculation History**: Stores up to 10 calculations (uses HTML5 LocalStorage)
- **Click History Items**: Click any history item to use its result
- **Clear History**: Remove all history entries
- **Responsive Design**: Works on desktop and mobile
- **Real-time Display**: Shows expression and result

## Files

1. **experiment10.html** - Frontend calculator interface with JavaScript for interactivity
2. **calculator.php** - Backend for processing calculations and scientific functions

## How to Use

1. Open `experiment10.html` in a web browser
2. Enter numbers and operators using the buttons
3. Use scientific functions for advanced calculations
4. Click **=** to calculate the result
5. View calculation history on the right side
6. Click any history item to reuse its result

## Scientific Function Examples

| Function | Input | Result |
|----------|-------|--------|
| √ | 16 | 4 |
| sin | 90 | 1 |
| cos | 0 | 1 |
| log | 100 | 2 |
| ln | 2.71828 | 1 |
| n! | 5 | 120 |
| x² | 5 | 25 |

## Technical Details

### Frontend (JavaScript)
- Manages UI and user input
- Stores calculation history in LocalStorage
- Sends calculations to PHP backend via AJAX (Fetch API)

### Backend (PHP)
- Evaluates mathematical expressions
- Implements scientific functions:
  - `sqrt()` - Square root
  - `sin()`, `cos()`, `tan()` - Trigonometric functions
  - `log10()` - Base 10 logarithm
  - `log()` - Natural logarithm
  - `factorial()` - Factorial calculation
- Includes error handling for invalid inputs

## Browser Compatibility

- Chrome, Firefox, Safari, Edge (all modern versions)
- Requires JavaScript enabled
- Requires PHP backend support

## Notes

- Trigonometric functions work in degrees
- Factorial only supports integers up to 20
- Logarithm functions don't work with negative numbers
- History is stored locally in the browser (persistent across sessions)
- All calculations are rounded to 10 decimal places
