const blogDropdown = document.querySelector(".dropdown-toggle");
const submenu = document.querySelector(".submenu");

if (blogDropdown && submenu) {
    blogDropdown.addEventListener("click", function () {
        submenu.classList.toggle("show");
        blogDropdown.classList.toggle("open");
    });
}

const profileToggle = document.querySelector("#profileToggle");
const adminProfile = document.querySelector(".admin-profile");

if (profileToggle && adminProfile) {
    profileToggle.addEventListener("click", function (e) {
        e.stopPropagation();
        adminProfile.classList.toggle("open");
    });

    document.addEventListener("click", function (e) {
        if (!adminProfile.contains(e.target)) {
            adminProfile.classList.remove("open");
        }
    });
}

const dashboardSection = document.querySelector("#dashboardSection");
const addBlogSection = document.querySelector("#addBlogSection");
const allBlogsSection = document.querySelector("#allBlogsSection");

const dashboardBtn = document.querySelector("#dashboardBtn");
const allBlogsBtn = document.querySelector("#allBlogsBtn");
const viewAllBlogs = document.querySelector("#viewAllBlogs");

const addBlogButtons = document.querySelectorAll(
    ".open-add-blog, .add-blog-btn, #addBlogBtn, #quickAddBlog, .quick-add-blog"
);

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

function loadSectionFromHash() {
    if (!dashboardSection && !addBlogSection && !allBlogsSection) {
        return;
    }

    if (window.location.hash === "#allBlogsSection") {
        showSection(allBlogsSection);
    } else if (window.location.hash === "#addBlogSection") {
        showSection(addBlogSection);
    } else {
        showSection(dashboardSection);
    }
}

loadSectionFromHash();

window.addEventListener("hashchange", loadSectionFromHash);

if (dashboardBtn) {
    dashboardBtn.addEventListener("click", function (e) {
        if (dashboardSection) {
            e.preventDefault();

            showSection(dashboardSection);

            window.history.pushState(
                {},
                "",
                "index.php"
            );
        }
    });
}

if (allBlogsBtn) {
    allBlogsBtn.addEventListener("click", function (e) {
        if (allBlogsSection) {
            e.preventDefault();

            showSection(allBlogsSection);

            window.location.hash = "allBlogsSection";
        }
    });
}

addBlogButtons.forEach(function (button) {
    button.addEventListener("click", function (e) {
        if (addBlogSection) {
            e.preventDefault();

            showSection(addBlogSection);

            window.location.hash = "addBlogSection";
        }
    });
});

if (viewAllBlogs) {
    viewAllBlogs.addEventListener("click", function (e) {
        if (allBlogsSection) {
            e.preventDefault();

            showSection(allBlogsSection);

            window.location.hash = "allBlogsSection";
        }
    });
}

const successModal = document.querySelector("#successModal");
const successModalBtn = document.querySelector("#successModalBtn");

if (successModal && successModalBtn) {
    successModalBtn.addEventListener("click", function () {
        successModal.style.display = "none";

        if (allBlogsSection) {
            showSection(allBlogsSection);
        }

        window.history.pushState(
            {},
            "",
            "index.php#allBlogsSection"
        );
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

        deleteLink = "";
    });
}

if (confirmDeleteBtn) {
    confirmDeleteBtn.addEventListener("click", function () {
        if (deleteLink !== "") {
            window.location.href = deleteLink;
        }
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

            const elements = [
                title,
                author,
                category
            ];

            elements.forEach(function (element) {

                if (element) {

                    if (!element.dataset.original) {
                        element.dataset.original =
                            element.textContent;
                    }

                    element.textContent =
                        element.dataset.original;
                }

            });

            const rowText =
                row.innerText.toLowerCase();

            if (
                searchText === "" ||
                rowText.includes(
                    searchText.toLowerCase()
                )
            ) {
                row.style.display = "";
            } else {
                row.style.display = "none";
            }

            if (
                searchText !== "" &&
                row.style.display !== "none"
            ) {

                const safeSearchText =
                    searchText.replace(
                        /[.*+?^${}()|[\]\\]/g,
                        "\\$&"
                    );

                const regex =
                    new RegExp(
                        "(" + safeSearchText + ")",
                        "gi"
                    );

                elements.forEach(function (element) {

                    if (element) {

                        const originalText =
                            element.dataset.original;

                        element.innerHTML =
                            originalText.replace(
                                regex,
                                "<mark>$1</mark>"
                            );
                    }

                });
            }

        });
    });
}