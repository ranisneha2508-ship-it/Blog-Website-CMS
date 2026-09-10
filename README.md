# Blog Website CMS

A dynamic Blog Content Management System built using PHP, MySQL, HTML, CSS, JavaScript, Bootstrap, jQuery and SCSS.

This project allows an admin to create, manage, edit, delete and search blog posts through a custom admin dashboard. The frontend displays blog content dynamically from the MySQL database.

## Features

### Frontend

- Dynamic blog listing
- Blog details page
- Categories section
- Responsive layout
- Blog images and author information
- Dynamic content fetched from MySQL

### Admin Dashboard

- Custom admin dashboard
- Dashboard statistics
- Recent Blogs section
- All Blogs management
- Add New Blog
- Edit Blog
- Delete Blog
- Delete confirmation modal
- Success popup messages
- Search blogs
- Search by title, author and category
- Search keyword highlighting
- Reusable master header and sidebar navigation

## CRUD Operations

The project currently supports:

- Create Blog
- Read Blogs
- Update Blog
- Delete Blog

Each blog contains:

- Blog Title
- Blog Image
- Category
- Author
- Description
- Blog Content

## Search Functionality

The admin dashboard includes a live search feature built with JavaScript.

The search system can filter blogs using:

- Blog Title
- Author
- Category

The searched keyword is also highlighted inside the matching result.

## Technologies Used

- HTML5
- CSS3
- SCSS
- Bootstrap 5
- JavaScript
- jQuery
- PHP
- MySQL
- phpMyAdmin
- WAMP / XAMPP
- Git
- GitHub

## Database

Database Name:

`blog_cms`

Main Blog Table:

`blogs`

Fields:

| Field | Purpose |
|------|---------|
| id | Unique blog ID |
| title | Blog title |
| image | Blog image |
| category | Blog category |
| author | Blog author |
| description | Short description |
| content | Complete blog content |

## Project Structure

```text
blog website cms/
│
├── admin/
│   ├── uploads/
│   ├── add-blog.php
│   ├── edit-blog.php
│   ├── delete-blog.php
│   ├── index.php
│   ├── admin.css
│   └── admin.js
│
├── assets/
│   ├── css/
│   ├── images/
│   ├── js/
│   └── masters/
│
├── about.php
├── blog.php
├── blog-details.php
├── categories.php
├── connection.php
└── index.php
How It Works
Admin creates a blog using the Add Blog form.
PHP receives the form data.
The uploaded image is stored inside the uploads folder.
Blog information is inserted into the MySQL database.
Blogs are dynamically displayed on the website.
Admin can edit or delete existing blogs.
JavaScript provides section navigation, search, highlighting and confirmation popups.
Running the Project Locally
Install WAMP or XAMPP.
Place the project folder inside the www or htdocs directory.
Start Apache and MySQL.
Open phpMyAdmin.
Create the blog_cms database.
Create/import the required blogs table.
Configure the database connection inside connection.php.
Open the project in your browser.

Example:

http://localhost/blog-website-cms/
Upcoming Features
Admin Login and Registration
PHP Sessions
Protected Admin Dashboard
Logout System
Draft Blog Management
Categories Management
Tags Management
Admin Profile and Settings
Project Purpose

This project was created to practice and demonstrate full-stack web development concepts including:

Frontend development
PHP backend development
MySQL database integration
CRUD operations
File uploading
JavaScript DOM manipulation
Dynamic search
Admin dashboard development
Git and GitHub version control
Author

Sneha Rani

Frontend Developer / Junior Full-Stack Developer

GitHub:
https://github.com/ranisneha2508-ship-it

Behance:
https://www.behance.net/sneharani4
