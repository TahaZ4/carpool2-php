# 🚗 Coventry University Egypt - Campus Carpool System

A simple web app for students to share rides around campus.

---

##  WHAT IS THIS?

This is my PHP project. It's a carpool system where Coventry students can find rides, book seats, and save money on transportation. Think Uber but just for our campus

I built this because I was tired of paying for Uber alone every day .

---

## WHAT CAN IT DO?

✅ User accounts – Sign up, login, logout. Passwords are hashed so they're secure (no one can steal your password!)

✅ Browse rides – See all available rides from different locations around campus (Dorms, Library, Engineering building, etc.)

✅ Book a seat – Click book, confirm, and the seat count goes down automatically

✅ My Bookings – See all the rides you've booked

✅ Driver demo – Added a fake driver "Abdo Mohamed" so it looks real

✅ Clean design – Made it look modern with Coventry Egypt colors (orange + dark blue)


##  HOW I BUILT IT

- Frontend: HTML, CSS (no frameworks, just raw coding)
- Backend: PHP (no frameworks, raw mysqli)
- Database: MySQL (phpMyAdmin)
- Server: XAMPP localhost

No  React, no Bootstrap. Just pure code.
---

## 🗄️ DATABASE STRUCTURE

I kept it simple. 3 tables:

users
- id, name, email, password, created_at

rides
- id, driver_id, from_location, to_location, price, time, seats

bookings
- id, ride_id, user_id, booked_at


---

## 🔐 PASSWORD SECURITY

This was confusing at first but I figured it out:

- When you register, password_hash() turns your password into a long random string
- That string gets stored in the database, NOT your real password
- When you login, password_verify() checks if your typed password matches the hash

No plain text passwords in my database 

---

## DESIGN CHOICES


- Orange (#ff5e1a) – Coventry's brand color
- Dark blue (#1e1e2f) – Looks professional
- Split screen login – Added a pic of Coventry Egypt on the left
- Cards – Each ride is a card with shadow and border
- Simple – No weird animations, just clean

---

## 📁 FILE STRUCTURE 

## HOW TO RUN IT ON YOUR LAPTOP

If you want to test this yourself:

1. Download and install XAMPP
2. Start Apache and MySQL
3. Put this folder in C:\xampp\htdocs\
4. Open phpMyAdmin, create database carpool_system
5. Import database.sql
6. Open browser, go to http://localhost/carpool-system/index.php
7. Register an account or use demo: student@campus.edu / 123456

---

## 🧪 TESTING ACCOUNT


Email: student@campus.edu  
Password: 123456

The password is hashed in the database but 123456 still works because of password_verify().

---

##  THINGS I LEARNED (THE HARD WAY)

- SQL injection is real but I didn't fix it fully 
- Password hashing 
- Don't change your database structure in the middle of coding

## MADE BY

Abdullah Taha  
Coventry University Egypt  
Cyber security student
2026

---

## 📝 FINAL NOTE

This is my first real PHP project. It's not perfect, there's probably bugs but im planning on developing it to a real world scenario.


🚗 Ride safe!
