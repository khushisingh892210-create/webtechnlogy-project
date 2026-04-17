# Experiment 09 - Registration Form with Database

This experiment demonstrates saving form data to a MySQL database using PHP.

## Files Included

1. **experiment9.html** - Registration form (based on Experiment 6)
2. **save_data.php** - PHP script to handle form submission and save data to database
3. **database_setup.php** - PHP script to create the database and table
4. **README.md** - This file

## Setup Instructions

### Prerequisites
- XAMPP/WAMP/LAMP (or any PHP server with MySQL)
- MySQL running

### Steps to Set Up

1. **Run Database Setup**
   - Open `database_setup.php` in your browser
   - This will create the database and the `registrations` table

2. **Access the Form**
   - Open `experiment9.html` in your browser
   - Fill out the registration form
   - Submit the form

3. **View Saved Data**
   - Open phpMyAdmin
   - Navigate to `webtechnology` database
   - View the `registrations` table to see your submitted data

## Form Fields

- Full Name (required)
- Email (required)
- Phone Number (required)
- Password (required)
- Date of Birth (required)
- Gender (required)
- Course (required)
- Address (optional)
- Profile Picture (optional)

## Database Configuration

Default configuration in `save_data.php`:
- Server: localhost
- Username: root
- Password: (empty)
- Database: webtechnology

**Note:** Modify these credentials if your MySQL configuration is different.

## Security Features

- Input sanitization using `htmlspecialchars()`
- Prepared statements to prevent SQL injection
- Email validation
- File type validation for image uploads
- File upload directory protection

## Notes

- Profile pictures are saved in the `uploads/` folder with timestamp prefix
- Passwords are stored as plain text (for demo only - use password hashing in production)
- Each registration gets a unique ID and creation timestamp
