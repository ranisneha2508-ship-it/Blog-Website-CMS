<<<<<<< HEAD

// Blog Dropdown

const blogDropdown = document.querySelector(".dropdown-toggle");
const submenu = document.querySelector(".submenu");

blogDropdown.onclick = function () {
    submenu.classList.toggle("show");
    blogDropdown.classList.toggle("open");
};


// Profile Dropdown
=======
const blogDropdown = document.querySelector(".dropdown-toggle");
const submenu = document.querySelector(".submenu");

if (blogDropdown && submenu) {
    blogDropdown.onclick = function () {
        submenu.classList.toggle("show");
        blogDropdown.classList.toggle("open");
    };
}
>>>>>>> 372b0a4 (Update Blog CMS admin dashboard and blog management features)

const profileToggle = document.querySelector("#profileToggle");
const adminProfile = document.querySelector(".admin-profile");

<<<<<<< HEAD
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
=======
if (profileToggle && adminProfile) {
    profileToggle.onclick = function (e) {
        e.stopPropagation();
        adminProfile.classList.toggle("open");
    };

    document.onclick = function () {
        adminProfile.classList.remove("open");
    };
}

const dashboardSection = document.querySelector("#dashboardSection");
const addBlogSection = document.querySelector("#addBlogSection");
const allBlogsSection = document.querySelector("#allBlogsSection");

const dashboardBtn = document.querySelector("#dashboardBtn");
const allBlogsBtn = document.querySelector("#allBlogsBtn");
const openAddBlogBtns = document.querySelectorAll(".open-add-blog");
const viewAllBlogs = document.querySelector("#viewAllBlogs");

function showSection(section) {
    if (dashboardSection) {
        dashboardSection.style.display = "none";
    }

    if (addBlogSection) {
        addBlogSection.style.display = "none";
    }

    if (allBlogsSection) {
        allBlogsSection.style.display = "none";
    }

    if (section) {
        section.style.display = "block";
    }
}

if (window.location.hash == "#allBlogsSection") {
    showSection(allBlogsSection);
}

if (window.location.hash == "#addBlogSection") {
    showSection(addBlogSection);
}

if (dashboardBtn) {
    dashboardBtn.addEventListener("click", function (e) {
        e.preventDefault();
        showSection(dashboardSection);
        window.location.hash = "";
    });
}

if (allBlogsBtn) {
    allBlogsBtn.addEventListener("click", function (e) {
        e.preventDefault();
        showSection(allBlogsSection);
        window.location.hash = "allBlogsSection";
    });
}

openAddBlogBtns.forEach(function (button) {
    button.addEventListener("click", function (e) {
        e.preventDefault();
        showSection(addBlogSection);
        window.location.hash = "addBlogSection";
    });
});

if (viewAllBlogs) {
    viewAllBlogs.addEventListener("click", function (e) {
        e.preventDefault();
        showSection(allBlogsSection);
        window.location.hash = "allBlogsSection";
    });
}

const successModal = document.querySelector("#successModal");
const successModalBtn = document.querySelector("#successModalBtn");

if (successModal && successModalBtn) {
    successModalBtn.addEventListener("click", function () {
        successModal.style.display = "none";
        window.history.pushState({}, "", "index.php#allBlogsSection");
    });
}

const deleteBlogBtns = document.querySelectorAll(".deleteBlogBtn");
const deleteModal = document.querySelector("#deleteModal");
const cancelDeleteBtn = document.querySelector("#cancelDeleteBtn");
const confirmDeleteBtn = document.querySelector("#confirmDeleteBtn");

let deleteLink = "";

deleteBlogBtns.forEach(function (button) {
    button.addEventListener("click", function (e) {
        e.preventDefault();

        deleteLink = button.href;

        if (deleteModal) {
            deleteModal.style.display = "flex";
        }
    });
});

if (cancelDeleteBtn && deleteModal) {
    cancelDeleteBtn.addEventListener("click", function () {
        deleteModal.style.display = "none";
    });
}

if (confirmDeleteBtn) {
    confirmDeleteBtn.addEventListener("click", function () {
        window.location.href = deleteLink;
    });
}


const blogSearch = document.querySelector("#blogSearch");

if (blogSearch) {
    blogSearch.addEventListener("input", function () {

        const searchText = blogSearch.value.trim();

        const rows = document.querySelectorAll(
            "#dashboardSection .blogs-table-body .blogs-table-row, #allBlogsSection .blogs-table-body .blogs-table-row"
        );

        rows.forEach(function (row) {

            const title = row.querySelector(".blog-title");
            const author = row.querySelector(".blog-author");
            const category = row.querySelector(".category");

            const elements = [title, author, category];

            elements.forEach(function (element) {

                if (element) {

                    if (!element.dataset.original) {
                        element.dataset.original = element.textContent;
                    }

                    element.innerHTML = element.dataset.original;

                }

            });

            const rowText = row.innerText.toLowerCase();

            if (
                searchText == "" ||
                rowText.includes(searchText.toLowerCase())
            ) {
                row.style.display = "";
            } else {
                row.style.display = "none";
            }

            if (searchText != "" && row.style.display != "none") {

                elements.forEach(function (element) {

                    if (element) {

                        const originalText = element.dataset.original;

                        const regex = new RegExp("(" + searchText + ")", "gi");

                        element.innerHTML = originalText.replace(
                            regex,
                            "<mark>$1</mark>"
                        );

                    }

                });

            }

        });

    });
}
>>>>>>> 372b0a4 (Update Blog CMS admin dashboard and blog management features)
