<div class="admin-layout">

    <aside class="sidebar">

        <div class="logo">
            <a href="index.php" class="logo-link">
                <h2>Blog<span>CMS</span></h2>
                <small>Admin Panel</small>
            </a>
        </div>

        <nav class="sidebar-nav">

            <a href="index.php" class="nav-link" id="dashboardBtn">
                <i class="bi bi-grid-1x2-fill"></i>
                <span>Dashboard</span>
            </a>

            <button class="nav-link dropdown-toggle" type="button">
                <i class="bi bi-file-earmark-text"></i>
                <span>Blogs</span>
                <i class="bi bi-chevron-down arrow"></i>
            </button>

            <div class="submenu">
                <a href="index.php#allBlogsSection" id="allBlogsBtn">
                    <i class="bi bi-list-ul"></i>
                    <span>All Blogs</span>
                </a>

                <a href="index.php#addBlogSection" id="addBlogBtn">
                    <i class="bi bi-plus-circle"></i>
                    <span>Add Blog</span>
                </a>

                <a href="index.php#draftsSection" id="draftsBtn">
                    <i class="bi bi-file-earmark"></i>
                    <span>Drafts</span>
                </a>
            </div>

            <a href="index.php#categoriesSection" class="nav-link">
                <i class="bi bi-folder"></i>
                <span>Categories</span>
            </a>

            <a href="index.php#tagsSection" class="nav-link">
                <i class="bi bi-tags"></i>
                <span>Tags</span>
            </a>

            <p class="nav-title settings-title">SYSTEM</p>

            <a href="index.php#settingsSection" class="nav-link">
                <i class="bi bi-gear"></i>
                <span>Settings</span>
            </a>

            <a href="#" class="nav-link">
                <i class="bi bi-box-arrow-right"></i>
                <span>Logout</span>
            </a>

        </nav>

        <div class="sidebar-bottom">

            <div class="admin-mini">

                <div class="avatar">
                    SR
                </div>

                <div class="admin-mini-info">
                    <strong>Admin</strong>
                    <small>Administrator</small>
                </div>

                <i class="bi bi-three-dots"></i>

            </div>

        </div>

    </aside>

    <main class="main-content">

        <header class="topbar">

            <div class="mobile-logo">
                <a href="index.php">
                    Blog<span>CMS</span>
                </a>
            </div>

<div class="search-box">
    <i class="bi bi-search"></i>
    <input type="text" id="blogSearch" placeholder="Search blogs...">
</div>

            <div class="topbar-right">

                <button class="icon-btn" type="button">
                    <i class="bi bi-bell"></i>
                    <span class="notification"></span>
                </button>

                <div class="admin-profile">

                    <button class="top-admin" id="profileToggle" type="button">

                        <div class="avatar">
                            SR
                        </div>

                        <div class="admin-info">
                            <strong>Admin</strong>
                            <small>Administrator</small>
                        </div>

                        <i class="bi bi-chevron-down profile-arrow"></i>

                    </button>

                    <div class="profile-dropdown" id="profileDropdown">

                        <div class="profile-dropdown-header">

                            <div class="avatar">
                                SR
                            </div>

                            <div>
                                <strong>Admin</strong>
                                <small>Administrator</small>
                            </div>

                        </div>

                        <div class="profile-divider"></div>

                        <a href="#">
                            <i class="bi bi-person"></i>
                            <span>My Profile</span>
                        </a>

                        <a href="index.php#settingsSection">
                            <i class="bi bi-gear"></i>
                            <span>Settings</span>
                        </a>

                        <div class="profile-divider"></div>

                        <a href="#" class="logout-link">
                            <i class="bi bi-box-arrow-right"></i>
                            <span>Logout</span>
                        </a>

                    </div>

                </div>

            </div>

        </header>