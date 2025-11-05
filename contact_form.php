<?php
// Start session to store form data for later use if needed
session_start(); // Initialize PHP session handling at the start of the request
// Include your database connection file (expects $conn to be available)
include 'db_connect.php'; // Brings in DB connection ($conn) so we can run queries
?>
<!DOCTYPE html> <!-- HTML5 doctype declaration -->
<html lang="en"> <!-- Document language is English -->
<head>
  <meta charset="utf-8" /> <!-- Use UTF-8 character encoding -->
  <meta name="viewport" content="width=device-width, initial-scale=1" /> <!-- Responsive scaling for mobile devices -->
  <title>Contact — Submission</title> <!-- Page title shown in browser tab -->
  <!-- Preconnects and font to match your existing pages -->
  <link rel="preconnect" href="https://fonts.googleapis.com"> <!-- Hint browser to establish early connection to Google Fonts -->
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin> <!-- Preconnect to fonts static domain with CORS -->
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700;800&display=swap" rel="stylesheet"> <!-- Load Poppins font weights -->
  <!-- Use the same stylesheet to keep consistent branding -->
  <link rel="stylesheet" href="styles.css" /> <!-- Main stylesheet for consistent styling -->
</head>
<body>
  <!-- Header matches your site's header so the page looks consistent -->
  <header class="site-header"> <!-- Top site header wrapper -->
    <div class="container nav"> <!-- Container with navigation layout -->
      <a class="logo" href="purrfect-home.html"> <!-- Logo link back to home -->
        <span class="heart">💗</span> <!-- Decorative heart icon -->
        Purrfect Pals <!-- Site name text -->
      </a>
      <nav> <!-- Primary navigation links -->
        <a href="purrfect-home.html">Home</a> <!-- Link to home page -->
        <a href="adoptables.html">Adopt</a> <!-- Link to adoptables page -->
        <a href="adoption-journey.html">How It Works</a> <!-- Link to process info -->
        <a href="about-purrfect-pals.html">About</a> <!-- Link to about page -->
        <a href="paws-faq.html">FAQ</a> <!-- Link to FAQ page -->
        <!-- Keep Contact as active to reflect current context -->
        <a class="btn active" href="say-meow.html">Contact Us</a> <!-- Highlight current section -->
      </nav>
    </div>
  </header>

  <main> <!-- Main content area of the page -->
    <!-- Hero section for consistency with your page structure -->
    <section class="hero"> <!-- Hero/banner section -->
      <div class="container"> <!-- Centered content wrapper -->
        <span class="badge">Message received ✨</span> <!-- Status badge text -->
        <h1>Contact submission</h1> <!-- Page heading -->
        <p class="lead">Thanks for reaching out. Here’s the status of your request.</p> <!-- Supporting lead text -->
      </div>
    </section>

    <!-- Main content area to show success/error inside a styled card -->
    <section> <!-- Section for submission result card -->
      <div class="container"> <!-- Constrains width and centers content -->
        <!-- Single column grid to center the feedback card -->
        <div class="grid" style="grid-template-columns: 1fr;"> <!-- Use one-column grid layout -->
          <!-- Using your .feature card style for a consistent look -->
          <div class="feature" style="padding: 24px;"> <!-- Styled card container -->
            <?php
            // Only handle POST submissions (form posts)
            if($_SERVER["REQUEST_METHOD"] == "POST") { // Ensure this is a POST request before processing

                // Fetch raw inputs
                $raw_name    = $_POST['name']    ?? ''; // Get 'name' field or default to empty string
                $raw_email   = $_POST['email']   ?? ''; // Get 'email' field or default to empty string
                $raw_phone   = $_POST['phone']   ?? ''; // Get 'phone' field or default to empty string
                $raw_type    = $_POST['cat']     ?? ''; // Get selected cat type or default to empty string
                $raw_message = $_POST['message'] ?? ''; // Get message field or default to empty string

                // Basic backend "required" validation (trim to avoid spaces-only)
                $errors = []; // Collect validation error messages here
                if (trim($raw_name)    === '') $errors[] = "Name is required."; // Require name
                if (trim($raw_email)   === '') $errors[] = "Email is required."; // Require email
                if (trim($raw_phone)   === '') $errors[] = "Phone is required."; // Require phone
                if (trim($raw_type)    === '') $errors[] = "Please select a cat."; // Require cat selection
                if (trim($raw_message) === '') $errors[] = "Message is required."; // Require message

                // If there are validation errors, show them and stop
                if (!empty($errors)) { // When there are validation problems
                    echo "<div class='center'>"; // Center the feedback block
                    echo "<h2>Almost there 🐾</h2>"; // Friendly heading for errors
                    echo "<p>Please fill in all required fields:</p>"; // Prompt to complete form
                    echo "<ul style='text-align:left; display:inline-block;'>"; // Left-aligned list within centered block
                    foreach ($errors as $e) { // Loop through each error
                      echo "<li>" . htmlspecialchars($e) . "</li>"; // Safely output error text
                    }
                    echo "</ul>"; // Close error list
                    echo "<p><a class='pill' href='say-meow.html'>Go back to Contact Form</a></p>"; // Link to form
                    echo "</div>"; // Close centered container
                } else {
                    // Sanitize inputs using your existing mysqli real_escape_string
                    $user_name = $conn->real_escape_string($raw_name); // Escape name for DB safety
                    $email     = $conn->real_escape_string($raw_email); // Escape email
                    $ph_no     = $conn->real_escape_string($raw_phone); // Escape phone number
                    $type      = $conn->real_escape_string($raw_type); // Escape cat type
                    $message   = $conn->real_escape_string($raw_message); // Escape message text

                    // Store values in session for potential reuse
                    $_SESSION['form_data'] = [
                        'name'    => $user_name, // Persist sanitized name
                        'email'   => $email, // Persist sanitized email
                        'ph_no'   => $ph_no, // Persist sanitized phone
                        'type'    => $type, // Persist sanitized type
                        'message' => $message // Persist sanitized message
                    ];

                    // Set a cookie for user_name for 7 days
                    setcookie("user_name", $user_name, time() + (7 * 24 * 60 * 60), "/"); // Cookie accessible site-wide

                    // Prepare INSERT query with placeholders
                    $stmt = $conn->prepare("INSERT INTO contacts (user_name, email, ph_no, type, message) VALUES(?,?,?,?,?)"); // Create prepared statement
                    // Bind parameters to statement (all strings)
                    $stmt->bind_param("sssss", $user_name, $email, $ph_no, $type, $message); // Bind sanitized values to placeholders

                    // Execute and show a styled message based on result
                    if($stmt->execute()) { // If database insert succeeds
                        // Centered success state with your styles
                        echo "<div class='center'>"; // Start success message container
                        // Escape user output to prevent XSS while preserving your message
                        echo "<h2>Thank you, " . htmlspecialchars($user_name) . " 💖</h2>"; // Personalized thank-you, safely escaped
                        echo "<p>Your message has been saved. We’ll get back to you soon.</p>"; // Confirmation text
                        // Provide a styled link back using your .pill style
                        echo "<p><a class='pill' href='say-meow.html'>Go back to Contact Form</a></p>"; // Back link to contact form
                        echo "</div>"; // End success container
                    } else {
                        // Centered error state with safe error output
                        echo "<div class='center'>"; // Start error container
                        echo "Error: " . htmlspecialchars($stmt->error); // Show DB error safely (no raw output)
                        echo "<p><a class='pill' href='say-meow.html'>Try again</a></p>"; // Link to retry
                        echo "</div>"; // End error container
                    }

                    // Cleanup database resources
                    $stmt->close(); // Close prepared statement to free resources
                }

                // Close the connection (safe to call even if errors occurred)
                $conn->close(); // Close database connection
            } else {
                // If accessed directly, prompt user to go to the contact form
                echo "<div class='center'>"; // Start info container
                echo "<p>Please submit the form from the Contact page.</p>"; // Guidance for direct access
                echo "<p><a class='pill' href='say-meow.html'>Go to Contact Form</a></p>"; // Link to contact form
                echo "</div>"; // End info container
            }
            ?>
          </div> <!-- End feature card -->
        </div> <!-- End grid -->
      </div> <!-- End container -->
    </section> <!-- End main result section -->
  </main> <!-- End main area -->

  <!-- Footer matches your site footer styles -->
  <footer> <!-- Site footer area -->
    <div class="container"> <!-- Footer content container -->
      <small>We’ll reply within 1–2 business days. 💖</small> <!-- Small print message -->
    </div>
  </footer>
</body>
</html> <!-- End of HTML document -->
