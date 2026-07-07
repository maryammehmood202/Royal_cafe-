<?php
include('config/db.php');

$msg = "";
$error = "";

$full_name = "";
$email     = "";
$username  = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $full_name = trim($_POST['full_name']);
    $email     = trim($_POST['email']);
    $username  = trim($_POST['username']);
    $password  = trim($_POST['password']);

    if (empty($full_name) || empty($email) || empty($username) || empty($password)) {
        $error = "All fields are required!";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error = "Invalid email format!";
    } else {
        $emailCheck = $conn->prepare("SELECT id FROM users WHERE email = ?");
        $emailCheck->bind_param("s", $email);
        $emailCheck->execute();
        $emailResult = $emailCheck->get_result();

        $userCheck = $conn->prepare("SELECT id FROM users WHERE username = ?");
        $userCheck->bind_param("s", $username);
        $userCheck->execute();
        $userResult = $userCheck->get_result();

        if ($emailResult->num_rows > 0) {
            $error = "Yeh Email ($email) pehle se registered hai!";
        } elseif ($userResult->num_rows > 0) {
            $error = "Yeh Username ($username) pehle se kisi ne liya hua hai!";
        } else {
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
            $insertQuery = "INSERT INTO users (full_name, email, username, password, role) VALUES (?, ?, ?, ?, 'user')";
            $stmt = $conn->prepare($insertQuery);

            if ($stmt === false) { die("Insert Query Error: " . $conn->error); }

            $stmt->bind_param("ssss", $full_name, $email, $username, $hashedPassword);

            if ($stmt->execute()) {
                header("Location: login.php?msg=success");
                exit;
            } else {
                $error = "Registration Failed! Error: " . $stmt->error;
            }
            $stmt->close();
        }
        $emailCheck->close();
        $userCheck->close();
    }
}
include('header.php');
?>

<link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@600;700&family=Inter:wght@300;400;500;600&display=swap" rel="stylesheet">

<style>
/* 🌑 PREMIUM GLOBAL LOOK */
.signup-section {
    min-height: 100vh;
    display: flex;
    align-items: center;
    justify-content: center;
    font-family: 'Inter', sans-serif;
    background: 
        radial-gradient(circle at 10% 20%, rgba(212, 175, 55, 0.05), transparent 40%),
        radial-gradient(circle at 90% 80%, rgba(255, 255, 255, 0.02), transparent 40%),
        #0b0908;
    overflow: hidden;
    position: relative;
    padding: 40px 15px;
}

.signup-section::before {
    content: "";
    position: absolute;
    width: 600px;
    height: 600px;
    background: rgba(212, 175, 55, 0.04);
    filter: blur(130px);
    top: -120px;
    left: -120px;
    border-radius: 50%;
}

/* 🧊 HIGH-END GLASS CARD */
.glass-card {
    background: rgba(22, 17, 15, 0.75);
    border: 1px solid rgba(212, 175, 55, 0.15);
    backdrop-filter: blur(25px);
    -webkit-backdrop-filter: blur(25px);
    border-radius: 24px;
    padding: 45px 40px;
    width: 100%;
    max-width: 440px;
    box-shadow: 0 20px 50px rgba(0, 0, 0, 0.7);
    transition: all 0.4s cubic-bezier(0.25, 1, 0.5, 1);
}

.glass-card:hover {
    border-color: rgba(212, 175, 55, 0.35);
    box-shadow: 0 30px 60px rgba(212, 175, 55, 0.05), 0 20px 50px rgba(0, 0, 0, 0.8);
    transform: translateY(-4px);
}

/* 🏷️ EDITORIAL HEADINGS */
/* 🏷️ EDITORIAL HEADINGS WITH METALLIC GOLD GRADIENT */
.editorial-title {
    font-family: 'Playfair Display', serif;
    font-weight: 700;
    font-size: 2.4rem;
    letter-spacing: -0.5px;
    background: linear-gradient(135deg, #f7d774 0%, #D4AF37 50%, #aa7c11 100%);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
    display: inline-block;
    width: 100%;
}

.text-gold { 
    color: #D4AF37 !important; 
}

.text-visible-muted { 
    color: rgba(255, 255, 255, 0.6) !important; 
    font-size: 0.95rem;
    font-weight: 300;
}

/* 📝 LUXURY INPUT FIELDS */
.form-group-custom {
    position: relative;
    margin-bottom: 18px;
}

.form-control {
    background: rgba(11, 9, 8, 0.6) !important;
    border: 1px solid rgba(212, 175, 55, 0.2) !important;
    color: #ffffff !important;
    border-radius: 12px !important;
    padding: 15px 18px !important;
    font-size: 0.95rem !important;
    transition: all 0.3s ease !important;
}

.form-control::placeholder {
    color: rgba(255, 255, 255, 0.35);
}

.form-control:focus {
    border-color: #D4AF37 !important;
    background: rgba(11, 9, 8, 0.8) !important;
    box-shadow: 0 0 0 4px rgba(212, 175, 55, 0.15) !important;
    outline: none;
}

.form-control:-webkit-autofill,
.form-control:-webkit-autofill:hover, 
.form-control:-webkit-autofill:focus {
    -webkit-text-fill-color: #ffffff !important;
    -webkit-box-shadow: 0 0 0px 1000px #16110f inset !important;
}

/* 🔘 ROYAL BUTTON */
.btn-royal {
    background: linear-gradient(135deg, #D4AF37, #b8860b);
    color: #0b0908 !important;
    font-weight: 600;
    letter-spacing: 0.5px;
    border: none;
    border-radius: 12px;
    padding: 15px;
    font-size: 1rem;
    transition: all 0.3s ease;
    box-shadow: 0 8px 20px rgba(212, 175, 55, 0.15);
}

.btn-royal:hover {
    background: linear-gradient(135deg, #f7d774, #D4AF37);
    transform: translateY(-2px);
    box-shadow: 0 12px 25px rgba(212, 175, 55, 0.25);
}

/* 👁️ TOGGLE ICON */
.eye {
    position: absolute;
    right: 18px;
    top: 50%;
    transform: translateY(-50%);
    cursor: pointer;
    color: rgba(255, 255, 255, 0.4);
    font-size: 1.1rem;
    transition: color 0.2s;
}
.eye:hover { color: #D4AF37; }

/* 🚨 CUSTOM ALERTS */
.custom-alert-danger {
    background: rgba(231, 76, 60, 0.1);
    border: 1px solid rgba(231, 76, 60, 0.2);
    color: #ff6b6b;
    border-radius: 12px;
    font-size: 0.9rem;
    padding: 12px;
}

@media(max-width: 576px) {
    .glass-card { padding: 35px 24px; }
}
</style>

<section class="signup-section">
    <div class="glass-card">

        <div class="text-center mb-4">
            <h2 class="editorial-title">Join Royal Coffee</h2>
            <p class="text-visible-muted mt-1">Create your premium café identity</p>
        </div>

        <?php if($error): ?>
            <div class="custom-alert-danger mb-4 text-center">
                <i class="bi bi-exclamation-triangle-fill me-2"></i> <?php echo $error; ?>
            </div>
        <?php endif; ?>

        <form method="POST" autocomplete="off">
            <div class="form-group-custom">
                <input type="text" name="full_name" class="form-control" placeholder="Full Name" value="<?php echo htmlspecialchars($full_name); ?>" required>
            </div>

            <div class="form-group-custom">
                <input type="email" name="email" class="form-control" placeholder="Email Address" value="<?php echo htmlspecialchars($email); ?>" required>
            </div>

            <div class="form-group-custom">
                <input type="text" name="username" class="form-control" placeholder="Username" value="<?php echo htmlspecialchars($username); ?>" required>
            </div>

            <div class="form-group-custom">
                <input type="password" id="password" name="password" class="form-control" placeholder="Password" required>
                <span class="eye" onclick="togglePass()">👁️</span>
            </div>

            <button type="submit" class="btn btn-royal w-100">Become a Member</button>
        </form>

        <p class="text-center mt-4 mb-0 text-visible-muted">
            Already a member? 
            <a href="login.php" class="text-gold fw-semibold text-decoration-none ms-1">Login</a>
        </p>

    </div>
</section>

<script>
function togglePass(){
    const pass = document.getElementById("password");
    pass.type = (pass.type === "password") ? "text" : "password";
}
</script>

<?php include('footer.php'); ?>