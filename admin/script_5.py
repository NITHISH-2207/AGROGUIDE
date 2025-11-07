
# Create SQL setup file and README

sql_setup = '''-- Database Setup for AgroGuide Admin Panel
-- Run this SQL in phpMyAdmin or MySQL Workbench

-- 1. Create admin table
CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Insert default admin (username: admin, password: admin123)
INSERT INTO `admin` (`username`, `password`) VALUES 
('admin', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi');

-- 2. Create or modify farmers table
CREATE TABLE IF NOT EXISTS `farmers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `state` varchar(50) DEFAULT NULL,
  `district` varchar(50) DEFAULT NULL,
  `phone` varchar(15) NOT NULL,
  `soil` varchar(50) DEFAULT NULL,
  `land` decimal(10,2) DEFAULT NULL,
  `pesticides` varchar(50) DEFAULT NULL,
  `reg_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- 3. Create messages table
CREATE TABLE IF NOT EXISTS `messages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `phone` varchar(15) NOT NULL,
  `message` text NOT NULL,
  `date_sent` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- 4. Create tips table
CREATE TABLE IF NOT EXISTS `tips` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Sample crop tips
INSERT INTO `tips` (`title`, `description`) VALUES
('Best Time to Plant Rice', 'Plant rice during monsoon season (June-July) when soil moisture is optimal. Ensure field is properly leveled and flooded before transplanting seedlings.'),
('Organic Pest Control for Cotton', 'Use neem oil spray mixed with water (1:10 ratio) to control cotton bollworms. Apply early morning or evening for best results.'),
('Soil Testing Importance', 'Test your soil every 2-3 years to check pH levels and nutrient content. This helps optimize fertilizer use and improve crop yield.');
'''

readme = '''# AgroGuide Admin Panel

## Installation Instructions

### Step 1: Database Setup
1. Open phpMyAdmin (http://localhost/phpmyadmin)
2. Create a new database called `smartcrop` (or use your existing database name)
3. Import the `setup.sql` file or run the SQL commands from it

### Step 2: Configure Database Connection
1. Open `admin/db_connect.php`
2. Update these lines with your database credentials:
   ```php
   $host = 'localhost';
   $dbname = 'smartcrop';  // Your database name
   $username = 'root';      // Your MySQL username
   $password = '';          // Your MySQL password
   ```

### Step 3: Copy Admin Folder
1. Copy the entire `/admin/` folder to your project root directory
2. Your structure should look like:
   ```
   SMARTCROP/
   ├── index.php (your main website)
   ├── admin/
   │   ├── db_connect.php
   │   ├── auth_check.php
   │   ├── login.php
   │   ├── dashboard.php
   │   ├── farmers.php
   │   ├── messages.php
   │   ├── tips.php
   │   └── logout.php
   ```

### Step 4: Access Admin Panel
1. Start XAMPP (Apache & MySQL)
2. Open browser: http://localhost/SMARTCROP/admin/login.php
3. Default login credentials:
   - **Username:** admin
   - **Password:** admin123

### Step 5: Change Password (Important!)
After first login, change the default password:
1. Go to phpMyAdmin
2. Open `admin` table
3. Update password field with a new bcrypt hash
   - To generate hash, use: https://bcrypt-generator.com/
   - Or use PHP: `password_hash('your_new_password', PASSWORD_DEFAULT)`

## Features

### 1. Dashboard
- View total farmers, messages sent, and most common soil type
- See recent farmer registrations
- Display latest crop advisory tips

### 2. Farmer Management
- View all registered farmers
- Search and filter by name or crop
- Delete farmer entries
- Responsive table with pagination

### 3. Messaging Center
- Send WhatsApp messages to individual farmers
- Send bulk messages to all farmers
- View message history
- Uses WhatsApp Web API (wa.me links)

### 4. Crop Tips Management
- Add new agricultural advisory tips
- Edit existing tips
- Delete outdated tips
- Tips display on dashboard

### 5. Security Features
- Password hashing with bcrypt
- Session-based authentication
- PDO prepared statements (SQL injection protection)
- Protected pages (redirect to login if not authenticated)

## Technology Stack
- **Backend:** PHP with PDO
- **Database:** MySQL
- **Frontend:** HTML5, Tailwind CSS
- **Icons:** Font Awesome 6

## Customization

### Change Theme Colors
Edit Tailwind classes in any PHP file:
- `bg-green-600` → Change primary color
- `from-green-50 to-green-100` → Change gradient

### Add More Features
- Use the same sidebar structure in new pages
- Copy authentication check from existing pages
- Follow PDO prepared statement pattern for queries

## Troubleshooting

### Can't login?
- Check database connection in `db_connect.php`
- Verify admin table has default user
- Clear browser cookies/cache

### Messages not showing?
- Ensure `messages` table exists
- Check table structure matches setup.sql

### WhatsApp not opening?
- Verify phone numbers have correct format (10 digits)
- Check browser allows popups

## Support
For issues or customization, contact your development team.

---
**AgroGuide Admin Panel v1.0**
Built for Smart Crop Advisory System
'''

with open('admin_panel/setup.sql', 'w', encoding='utf-8') as f:
    f.write(sql_setup)
    
with open('admin_panel/README.md', 'w', encoding='utf-8') as f:
    f.write(readme)

print("Created: setup.sql, README.md")
print("\n✅ Admin Panel Complete!")
print("\nFiles created in 'admin_panel' folder:")
print("- db_connect.php (Database connection)")
print("- auth_check.php (Session protection)")
print("- login.php (Admin login)")
print("- dashboard.php (Main dashboard)")
print("- farmers.php (Farmer management)")
print("- messages.php (WhatsApp messaging)")
print("- tips.php (Crop tips management)")
print("- logout.php (Logout handler)")
print("- setup.sql (Database setup)")
print("- README.md (Installation guide)")
