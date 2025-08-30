# Car Care Management System

## Overview
The **Car Care Management System** is a web application designed to manage client appointments for car services. It allows users to book appointments with available mechanics, while the admin can manage appointments, mechanics, and modify appointment details. The system is built using PHP, MySQL, HTML, CSS, and JavaScript. and built for a assigment problem in my undergrad learning period. So the featers are very much limited and not that much well appearance.

## Features
- **Client Booking**: Users can book appointments for car servicing by entering personal and car details.
- **Admin Panel**:
  - Manage mechanics (add/remove).
  - View and manage appointments (change date, mechanic, etc.).
- **AJAX Mechanic Selection**: Dynamically fetches available mechanics for appointment booking.
- **Validation**: Phone number, car engine number, and appointment date are validated before submission.

## Project Structure
- **`admin.php`**: Admin panel for managing appointments and mechanics.
- **`admin_style.css`**: Custom styles for the admin panel.
- **`appointment.php`**: Handles the client appointment booking logic.
- **`appointment.js`**: JavaScript for validating the appointment form before submission.
- **`book_appointment.html`**: The front-end form where users can book appointments.
- **`style.css`**: Styles for the booking page.
- **`config.php`**: Database connection (not included here for security purposes).
- **`fetch_mechanics.php`**: Fetches available mechanics via AJAX for the booking form (not included).

## Technologies Used
- **PHP**: Backend for handling form submissions and database interactions.
- **MySQL**: Database for storing client and appointment data.
- **HTML/CSS**: Frontend structure and styling.
- **JavaScript**: Frontend validation and AJAX functionality.
- **jQuery**: Used for AJAX requests and dynamic content loading.

## Setup Instructions
1. Clone or download the repository.
2. Ensure you have a PHP environment set up (e.g., XAMPP, WAMP, LAMP).
3. Import the database schema from the provided SQL file into your MySQL database.
4. Configure `config.php` with your MySQL database credentials.
5. Place the files in the root directory of your web server.
6. Access the `book_appointment.html` page to book an appointment and use the admin panel for management.
 
### Appointment Booking
- Users can fill out a form to schedule an appointment and select a mechanic.

## Contact
Developed by **Pravakar Das**  
For inquiries or issues, please reach out via email: pravakar459@email.com
