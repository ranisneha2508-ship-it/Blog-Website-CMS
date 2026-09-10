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
