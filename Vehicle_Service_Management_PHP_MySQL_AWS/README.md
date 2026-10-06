# Vehicle Service Management System

A PHP and MySQL based web application for managing vehicle service records, customers, vehicles, and service requests.

## Technologies
- PHP
- MySQL
- HTML
- CSS
- Apache
- AWS EC2
- AWS RDS

## Features
- Customer Registration
- Vehicle Management
- Service Request
- Service Status Tracking
- Customer Records
- Vehicle Records
- MySQL Database
- AWS EC2 & RDS Deployment

## Project Structure

```text
Vehicle_Service_Management_System/
├── index.php
├── login.php
├── register.php
├── dashboard.php
├── db.php
├── css/
├── images/
├── database/
│   └── vehicle_service.sql
└── README.md
```

## AWS Deployment

### Install Apache & PHP

```bash
sudo dnf update -y
sudo dnf install httpd php php-mysqli -y
sudo systemctl enable httpd
sudo systemctl start httpd
```

### Deploy Project

```bash
sudo cp -r Vehicle_Service_Management_System /var/www/html/
sudo chown -R apache:apache /var/www/html/Vehicle_Service_Management_System
```

### Configure Database

Edit:

```bash
sudo nano /var/www/html/Vehicle_Service_Management_System/db.php
```

Add your RDS details:

```php
$host = "YOUR_RDS_ENDPOINT";
$user = "admin";
$password = "YOUR_PASSWORD";
$dbname = "vehicle_service";
```

### Import SQL

```bash
mysql -h YOUR_RDS_ENDPOINT -u admin -p vehicle_service < database/vehicle_service.sql
```

### Test Database

```bash
php -r 'include "/var/www/html/Vehicle_Service_Management_System/db.php"; echo "Database connection OK
";'
```

### Restart Apache

```bash
sudo systemctl restart httpd
```

## Open in Browser

```text
http://YOUR_EC2_PUBLIC_IP/Vehicle_Service_Management_System/
```

## Security Groups

### EC2
- HTTP: `80`
- SSH: `22`

### RDS
- MySQL: `3306`
- Source: EC2 Security Group

## GitHub

```bash
git init
git add .
git commit -m "Vehicle Service Management System"
git branch -M main
git remote add origin YOUR_GITHUB_REPOSITORY_URL
git push -u origin main
```

## Author

**Siddhant Dnyaneshwar Haravane**

## Purpose

This project is created for learning and practicing PHP, MySQL, Linux, AWS EC2, AWS RDS, Apache, and GitHub.
