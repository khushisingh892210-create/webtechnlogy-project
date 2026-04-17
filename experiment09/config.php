<?php
// Database Configuration - UPDATE THESE CREDENTIALS FOR YOUR SERVER

define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'webtechnology');

// For Infinity Free, use these instead:
// define('DB_HOST', 'localhost');
// define('DB_USER', 'your_username_dbuser');          // Get from Infinity Free
// define('DB_PASSWORD', 'your_database_password');    // Your password
// define('DB_NAME', 'your_username_webtechnology');   // Full database name from Infinity Free

// File upload settings
define('UPLOAD_DIR', 'uploads/');
define('MAX_FILE_SIZE', 5242880); // 5MB in bytes
define('ALLOWED_EXTENSIONS', array('jpg', 'jpeg', 'png', 'gif'));

// Error reporting
define('SHOW_ERRORS', true);
?>
