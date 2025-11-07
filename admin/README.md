# AgroGuide Admin Panel

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
