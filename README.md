# 🏥 NSACP Hospital Management System

![NSACP Hospital](/Images/readme_image.png)

NSACP Hospital Management System is a web-based application designed to streamline hospital operations, manage patient records, appointments, and medical staff. The system helps hospitals efficiently handle patient information, doctor schedules.

# 📌 Features
- [x] Admin Dashboard – Manage hospital operations, staff, and patient records.
- [x] Doctor Panel – View appointments.
- [x] Patient Portal – Book appointments.
- [x] Appointment Management – Schedule and cancel appointments.
- [x] User Role Management – Admin, doctors, normal.

# 🛠️ Technologies Used
- Frontend: HTML, CSS, Bootstrap, JavaScript
- Backend: PHP (Core PHP / Laravel)
- Database: MySQL
- Version Control: Git & GitHub

# 🚀 Installation Guide
```sh
## Clone the repository
git clone https://github.com/nuwanthaDilshan/HospitalWebSite.git

## Navigate to the project directory
cd HospitalWebSite

##  Import the database
- Open phpMyAdmin
- Create a database (e.g., hospital_db)
- Import database.sql file

## Configure Database Connection
Edit connect.php with your database credentials:

$servername = "localhost";
$username = "root";
$password = "";
$database = "hospital";

```

```sh
##  Start the server
- If using XAMPP, place the project folder in htdocs.
- Start Apache & MySQL from XAMPP Control Panel.
- Open your browser and go to:
http://localhost/HospitalWebSite

```

```sh
### admin

user name: admin
password: 111

### normal

user name: normal@gmail.com
password: 111


### doctor

user name: doctor@gmail.com
password: 111

```