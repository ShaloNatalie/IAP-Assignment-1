<?php
class PageBuilder {

    // Load the document head
    public function Head($config) {
        ?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <meta name="description" content="Take control of your everyday!">
            <meta name="author" content="Site Admin">
            <title><?php echo htmlspecialchars($config['page_title'] ?? 'Task App'); ?></title>
            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
            <meta name="theme-color" content="#0d6efd">
        </head>
        <?php
    }

    // Navigation bar
    public function Navbar($config) {
        ?>
        <body>
        <header>
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow-sm">
                <div class="container-fluid">
                    <a class="navbar-brand fw-bold" href="./">
                        <?php echo htmlspecialchars($config['site_name'] ?? 'MySite'); ?>
                    </a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNav"
                            aria-controls="mainNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="mainNav">
                        <ul class="navbar-nav me-auto">
                            <li class="nav-item">
                                <a class="nav-link active" href="./">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="register.php">Sign Up</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="login.php">Sign In</a>
                            </li>
                        </ul>

                        <form class="d-flex" role="search" method="GET" action="search.php">
                            <input class="form-control me-2" type="search" name="query" placeholder="Search here" aria-label="Search">
                            <button class="btn btn-outline-light" type="submit">Search</button>
                        </form>
                    </div>
                </div>
            </nav>
        </header>
        <main class="container py-4">
        <?php
    }

    // Banner Section
    public function Banner($config) {
        ?>
        <section class="bg-light p-5 rounded-3 mb-4 text-center">
            <div class="container">
                <h1 class="display-4 fw-semibold">
                    <?php echo htmlspecialchars($config['banner_title'] ?? 'Welcome to Our Site'); ?>
                </h1>
                <p class="lead">
                    <?php echo htmlspecialchars($config['banner_text'] ?? 'Create responsive designs easily with Bootstrap and PHP.'); ?>
                </p>
                <a href="#content" class="btn btn-primary btn-lg">Learn More</a>
            </div>
        </section>
        <?php
    }

  // General Content Section
    public function Content($config) {
        ?>
        <section id="content" class="row g-4">
            <div class="col-md-6">
                <div class="p-4 bg-dark text-white rounded shadow-sm h-100">
                    <h2 class="fw-bold">Flexible Styling</h2>
                    <p>Change text colors and backgrounds to create unique layouts. Combine Bootstrap utilities for quick customization.</p>
                    <button class="btn btn-outline-light">Explore</button>
                </div>
            </div>

            <div class="col-md-6">
                <div class="p-4 bg-light border rounded shadow-sm h-100">
                    <h2 class="fw-bold">Border Options</h2>
                    <p>Add subtle borders to separate content visually. Use spacing utilities to keep designs consistent and clean.</p>
                    <button class="btn btn-outline-secondary">See Details</button>
                </div>
            </div>
        </section>
        <?php
    }

    // Form Display Section (Signup/Login dynamically)
    public function FormSection($config, $ObjAuthForms) {
        ?>
        <section class="row g-4">
            <div class="col-md-6">
                <div class="p-4 bg-white rounded shadow-sm">
                    <?php
                    $currentPage = basename($_SERVER['PHP_SELF']);
                    if ($currentPage === 'register.php') {
                        $ObjAuthForms->registerForm();
                    } else {
                       $ObjAuthForms->loginForm();
                    }
                    ?>
                </div>
            </div>

            <div class="col-md-6">
                <div class="p-4 bg-light border rounded shadow-sm">
                    <h2 class="fw-bold">Additional Information</h2>
                    <p>Here you can include some tips or instructions related to registration or signing in. Customize this section to fit your needs.</p>
                    <button class="btn btn-outline-dark">More Info</button>
                </div>
            </div>
        </section>
        <?php
    }

    // Page footer
    public function Footer($config) {
        ?>
        <footer class="mt-5 pt-4 border-top text-center text-muted">
            <p class="mb-0">
                &copy; <?php echo date('Y'); ?> 
                <?php echo htmlspecialchars($config['site_name'] ?? 'MySite'); ?>. 
                All Rights Reserved.
            </p>
        </footer>
        </main>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
        </body>
        </html>
        <?php
    }
   public function displayUsers($config) {
    try {
        // Connect to database
        $pdo = new PDO(
            "mysql:host={$config['db_host']};dbname={$config['db_name']}",
            $config['db_user'],
            $config['db_pass']
        );
        
        // Get users in ascending order
        $stmt = $pdo->query("SELECT * FROM users ORDER BY id ASC");
        $users = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        if (empty($users)) {
            echo '<p>No users found.</p>';
            return;
        }
        
        // Display numbered list
        echo '<ol>';
        foreach ($users as $user) {
            echo '<li>' . htmlspecialchars($user['fullname'] ?? $user['username']) . ' (' . htmlspecialchars($user['email']) . ')</li>';
        }
        echo '</ol>';
        
    } catch (PDOException $e) {
        echo '<p>Error loading users: ' . htmlspecialchars($e->getMessage()) . '</p>';
    }
}
}
?>
