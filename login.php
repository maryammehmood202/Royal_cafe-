<?php
session_start();
ob_start();

include('config/db.php');

$error = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $email    = trim($_POST['email']);
    $password = $_POST['password'];

    if (empty($email) || empty($password)) {
        $error = "Please fill all fields!";
    } else {

        $stmt = $conn->prepare("SELECT id, full_name, username, password, role FROM users WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {

            $user = $result->fetch_assoc();

            if (password_verify($password, $user['password'])) {

                $_SESSION['user_id']   = $user['id'];
                $_SESSION['full_name'] = $user['full_name'];
                $_SESSION['username']  = $user['username'];
                $_SESSION['role']      = $user['role'];

                header("Location: " . ($user['role'] == 'admin' ? "admin.php" : "index.php"));
                exit;

            } else {
                $error = "Invalid password!";
            }

        } else {
            $error = "No account found with this email!";
        }
    }
}
?>

<?php include('header.php'); ?>

<link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@600;700;800&family=Inter:wght@300;400;500;600&display=swap" rel="stylesheet">

<style>
:root{
    --gold:#C5A059;
    --gold2:#f5d76e;
    --dark:#0b0908;
}

/* =========================
 GLOBAL BACKGROUND (INDEX STYLE+)
========================= */
.auth-wrapper{
    min-height:100vh;
    display:flex;
    align-items:center;
    justify-content:center;
    padding:80px 15px;
    position:relative;
    overflow:hidden;

    background:
        radial-gradient(circle at 20% 20%, rgba(197,160,89,0.10), transparent 45%),
        radial-gradient(circle at 80% 80%, rgba(255,255,255,0.04), transparent 45%),
        linear-gradient(180deg,#0b0908,#120d0c,#0b0908);
}

/* FLOATING GLOW (SMOOTHER) */
.auth-wrapper::before,
.auth-wrapper::after{
    content:"";
    position:absolute;
    width:500px;
    height:500px;
    border-radius:50%;
    background:rgba(197,160,89,0.08);
    filter:blur(140px);
    animation:float 7s infinite ease-in-out;
}

.auth-wrapper::before{ top:-120px; left:-150px; }
.auth-wrapper::after{ bottom:-150px; right:-150px; }

@keyframes float{
    0%,100%{ transform:translateY(0px) scale(1); }
    50%{ transform:translateY(-30px) scale(1.05); }
}

/* =========================
 GLASS CARD (PREMIUM)
========================= */
.auth-card{
    width:100%;
    max-width:480px;
    padding:50px 42px;
    border-radius:28px;

    background:rgba(255,255,255,0.06);
    border:1px solid rgba(255,255,255,0.12);
    backdrop-filter:blur(28px);
    -webkit-backdrop-filter:blur(28px);

    box-shadow:0 30px 80px rgba(0,0,0,0.65);
    transition:0.35s ease;
    position:relative;
    z-index:2;
}

.auth-card:hover{
    transform:translateY(-6px);
    border-color:rgba(197,160,89,0.45);
    box-shadow:0 35px 100px rgba(0,0,0,0.75);
}

/* =========================
 TITLE (MORE PREMIUM)
========================= */
.title{
    font-family:'Playfair Display', serif;
    font-size:2.6rem;
    font-weight:800;
    text-align:center;

    background:linear-gradient(135deg,#ffffff,#C5A059);
    -webkit-background-clip:text;
    -webkit-text-fill-color:transparent;
}

/* SUB TEXT */
.subtitle{
    text-align:center;
    color:rgba(255,255,255,0.65);
    margin-top:6px;
    font-size:0.95rem;
}

/* =========================
 INPUT SYSTEM (CLEAN UX)
========================= */
.form-control{
    background:rgba(0,0,0,0.35) !important;
    border:1px solid rgba(255,255,255,0.12) !important;
    color:#fff !important;
    border-radius:14px !important;
    padding:14px 16px !important;
    transition:0.3s;
}

.form-control:focus{
    border-color:var(--gold) !important;
    box-shadow:0 0 0 4px rgba(197,160,89,0.15) !important;
}

/* PASSWORD ICON */
.eye-btn{
    position:absolute;
    right:16px;
    top:50%;
    transform:translateY(-50%);
    cursor:pointer;
    color:rgba(255,255,255,0.55);
    font-size:18px;
}

.eye-btn:hover{
    color:var(--gold);
}

/* =========================
 BUTTON (LOADING READY)
========================= */
.btn-gold{
    width:100%;
    padding:14px;
    border-radius:14px;
    border:none;
    font-weight:800;
    cursor:pointer;

    background:linear-gradient(135deg,var(--gold),var(--gold2));
    color:#111;

    transition:0.3s;
    box-shadow:0 12px 28px rgba(197,160,89,0.25);
}

.btn-gold:hover{
    transform:translateY(-3px);
    box-shadow:0 18px 40px rgba(197,160,89,0.35);
}

.btn-gold:active{
    transform:scale(0.98);
}

/* ERROR */
.alert-box{
    background:rgba(255,0,0,0.08);
    border:1px solid rgba(255,0,0,0.2);
    color:#ff6b6b;
    padding:12px;
    border-radius:12px;
    text-align:center;
    margin-bottom:15px;
}

/* FOOT TEXT */
.small-text{
    color:rgba(255,255,255,0.6);
    font-size:0.9rem;
}

.small-text a{
    color:var(--gold);
    text-decoration:none;
    font-weight:600;
}

.small-text a:hover{
    text-decoration:underline;
}

/* LOADING STATE */
.loading{
    opacity:0.7;
    pointer-events:none;
}
</style>

<section class="auth-wrapper">

    <div class="auth-card">

        <h2 class="title">Welcome Back</h2>
        <p class="subtitle">Sign in to continue your Royal Coffee experience</p>

        <br>

        <?php if($error): ?>
            <div class="alert-box">
                <?= htmlspecialchars($error); ?>
            </div>
        <?php endif; ?>

        <form method="POST" id="loginForm">

            <div class="mb-3">
                <input type="email" name="email" class="form-control" placeholder="Email Address" required>
            </div>

            <div class="mb-3 position-relative">
                <input type="password" id="password" name="password" class="form-control" placeholder="Password" required>
                <span class="eye-btn" onclick="togglePassword()">👁</span>
            </div>

            <button type="submit" class="btn-gold" id="loginBtn">
                Login
            </button>

        </form>

        <p class="text-center mt-4 small-text">
            Don’t have an account?
            <a href="register.php">Create Account</a>
        </p>

    </div>

</section>

<script>
function togglePassword(){
    const pass = document.getElementById("password");
    pass.type = pass.type === "password" ? "text" : "password";
}

// Better UX loading state
document.getElementById("loginForm").addEventListener("submit", function(){
    const btn = document.getElementById("loginBtn");
    btn.innerText = "Signing in...";
    btn.classList.add("loading");
});
</script>

<?php include('footer.php'); ?>