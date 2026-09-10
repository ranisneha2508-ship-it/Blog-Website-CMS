
// Blog Dropdown

const blogDropdown = document.querySelector(".dropdown-toggle");
const submenu = document.querySelector(".submenu");

blogDropdown.onclick = function () {
    submenu.classList.toggle("show");
    blogDropdown.classList.toggle("open");
};


// Profile Dropdown

const profileToggle = document.querySelector("#profileToggle");
const adminProfile = document.querySelector(".admin-profile");

profileToggle.onclick = function (e) {
    e.stopPropagation();
    adminProfile.classList.toggle("open");
};

document.onclick = function () {
    adminProfile.classList.remove("open");
};


// Dashboard

const dashboardSection = document.querySelector("#dashboardSection");
const addBlogSection = document.querySelector("#addBlogSection");


// Add New Blog - Dashboard

const addNewBlogBtn = document.querySelector(".add-blog-btn");

addNewBlogBtn.onclick = function (e) {
    e.preventDefault();

    dashboardSection.style.display = "none";
    addBlogSection.style.display = "block";
};


// Add Blog - Sidebar

const addBlogBtn = document.querySelector("#addBlogBtn");

addBlogBtn.onclick = function (e) {
    e.preventDefault();

    dashboardSection.style.display = "none";
    addBlogSection.style.display = "block";
};


// Dashboard Button

const dashboardBtn = document.querySelector("#dashboardBtn");

dashboardBtn.onclick = function (e) {
    e.preventDefault();

    addBlogSection.style.display = "none";
    dashboardSection.style.display = "block";
};

// Quick Action - Add New Blog

const quickAddBlog = document.querySelector(".quick-action");

quickAddBlog.onclick = function (e) {
    e.preventDefault();

    dashboardSection.style.display = "none";
    addBlogSection.style.display = "block";
};
