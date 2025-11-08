# Cat-Adoption-Website

A simple, responsive web application for a cat adoption agency, built with HTML, CSS and PHP/MySQL.

## 🎯 Project Overview  
This project simulates a basic cat-adoption website where prospective adopters can browse adoptable cats, read about the adoption process, contact the agency, and administrators can connect to a MySQL database to store contact form submissions.

## 🧰 Tech Stack  
- HTML (front-end pages: about, adoptables, FAQ, etc.)  
- CSS (styles.css)  
- PHP (server-side scripts: `db_connect.php`, `contact_form.php`)  
- MySQL (database script: `contacts.sql`)  
- Basic responsive design without any heavy frameworks  

## 📁 Repository Structure  
│ about-purrfect-pals.html
│ adoptables.html
│ adoption-journey.html
│ paws-faq.html
│ purrfect-home.html
│ say-meow.html
│ contact_form.php
│ db_connect.php
│ contacts.sql
│ styles.css
└ Pictures/ ← images of cats etc.

## 🚀 Getting Started  
### Prerequisites  
- A web server (e.g., Apache) supporting PHP  
- MySQL database  
- Basic PHP/MySQL setup  

### Installation  
1. Clone the repository:  
   ```bash
   git clone https://github.com/ayshegulkoca/Cat-Adoption-Website.git

2.  Set up the database:
Create a MySQL database (e.g., cat_adoption_db)
Import the contacts.sql file to create the contacts table

3. Configure database connection:
Open db_connect.php
Edit the $servername, $username, $password, $dbname variables to match your environment

4. Place the project folder in your web-server’s document root (e.g., htdocs for XAMPP)
   
5. Access the website via your browser (e.g., http://localhost/Cat-Adoption-Website/adoptables.html)


## ✅ Features
Browse adoptable cats (static HTML page)
View the adoption journey, FAQs, and “purrfect home” info
Contact form submits to MySQL database via PHP
Lightweight and easy to extend

## 📌 Possible Enhancements
Add dynamic listing of cats from database
Add user authentication for administrators
Add image upload and carousel for each cat
Make the UI fully responsive / mobile-first
Add email notifications when a contact form is submitted
Use a frontend framework (React/Vue) or backend framework (Laravel) for scalability

## 🤝 Contributing
Contributions are welcome! To contribute:
Fork the repository
Create a new branch for your changes (git checkout -b feature-xyz)
Make your changes, commit, and push your branch
Open a Pull Request describing your changes
