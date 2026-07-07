<?php 
include('header.php'); 

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// 🔐 CSRF TOKEN
$_SESSION['csrf_token'] = bin2hex(random_bytes(32));
?>

<style>
:root{
    --gold:#D4AF37;
    --gold-hover:#b88a10;
    --dark:#0f0f0f;
    --dark2:#171717;
    --glass:rgba(255,255,255,0.06);
    --border:rgba(255,255,255,0.1);
    --text:rgba(255,255,255,0.68);
    --transition:all .35s ease;
}

/* =========================
🌌 BACKGROUND
========================= */
.contact-wrapper{
    min-height:100vh;
    padding:100px 0;
    position:relative;
    overflow:hidden;
    background:
    radial-gradient(circle at top left,#3b261f 0%,transparent 30%),
    radial-gradient(circle at bottom right,#242424 0%,transparent 30%),
    linear-gradient(135deg,#0f0f0f,#181818,#101010);
    color:#fff;
}

.contact-wrapper::before{
    content:'';
    position:absolute;
    width:500px;
    height:500px;
    background:rgba(212,175,55,0.06);
    border-radius:50%;
    filter:blur(100px);
    top:-150px;
    right:-100px;
}

/* =========================
✨ TITLES
========================= */
.main-title{
    font-size:clamp(3rem,7vw,5.5rem);
    font-weight:900;
    line-height:1;
    letter-spacing:-2px;
    background:linear-gradient(to bottom,#fff,#8d8d8d);
    -webkit-background-clip:text;
    -webkit-text-fill-color:transparent;
}

.sub-title{
    max-width:700px;
    margin:auto;
    color:var(--text);
    font-size:1.08rem;
}

/* =========================
🧊 GLASS CARD
========================= */
.glass-card{
    background:var(--glass);
    border:1px solid var(--border);
    border-radius:30px;
    backdrop-filter:blur(20px);
    -webkit-backdrop-filter:blur(20px);
    transition:var(--transition);
    overflow:hidden;
    position:relative;
}

.glass-card:hover{
    transform:translateY(-5px);
    border-color:rgba(212,175,55,0.35);
    box-shadow:
    0 15px 40px rgba(0,0,0,0.55),
    0 0 30px rgba(212,175,55,0.08);
}

/* =========================
⭐ FEATURE BADGES
========================= */
.badge-feature{
    display:inline-flex;
    align-items:center;
    gap:8px;
    padding:11px 18px;
    border-radius:50px;
    background:rgba(255,255,255,0.05);
    border:1px solid rgba(255,255,255,0.08);
    margin:5px;
    color:#fff;
    font-size:.92rem;
}

/* =========================
📌 CONTACT INFO
========================= */
.info-box{
    display:flex;
    gap:15px;
    margin-bottom:28px;
}

.info-icon{
    width:55px;
    height:55px;
    border-radius:18px;
    background:rgba(212,175,55,0.1);
    color:var(--gold);
    display:flex;
    align-items:center;
    justify-content:center;
    font-size:1.25rem;
    border:1px solid rgba(212,175,55,0.2);
    flex-shrink:0;
}

.info-box h6{
    font-weight:700;
    margin-bottom:4px;
}

.info-box p,
.info-box a{
    margin:0;
    color:var(--text);
    text-decoration:none;
}

/* =========================
📱 SOCIAL ICONS
========================= */
.socials{
    display:flex;
    gap:12px;
    flex-wrap:wrap;
}

.socials a{
    width:48px;
    height:48px;
    border-radius:16px;
    display:flex;
    align-items:center;
    justify-content:center;
    background:rgba(255,255,255,0.05);
    border:1px solid rgba(255,255,255,0.08);
    color:#fff;
    transition:var(--transition);
    text-decoration:none;
}

.socials a:hover{
    background:var(--gold);
    color:#111;
    transform:translateY(-4px);
}

/* =========================
📝 FORM
========================= */
.form-floating>.form-control,
.form-floating>.form-select{
    background:rgba(0,0,0,0.25);
    border:1px solid rgba(255,255,255,0.08);
    color:#fff;
    border-radius:18px;
}

.form-floating>.form-control:focus,
.form-floating>.form-select:focus{
    background:rgba(0,0,0,0.4);
    border-color:var(--gold);
    color:#fff;
    box-shadow:0 0 0 .25rem rgba(212,175,55,0.15);
}

.form-floating>label{
    color:rgba(255,255,255,0.55);
}

/* =========================
🟡 BUTTON
========================= */
.btn-gold{
    border:none;
    background:linear-gradient(135deg,var(--gold),#f4d76a);
    color:#111;
    font-weight:800;
    padding:16px;
    border-radius:18px;
    transition:var(--transition);
    letter-spacing:1px;
}

.btn-gold:hover{
    transform:translateY(-2px);
    background:linear-gradient(135deg,var(--gold-hover),var(--gold));
    box-shadow:0 10px 25px rgba(212,175,55,0.28);
}

/* =========================
⚡ QUICK SUPPORT CARD
========================= */
.support-card{
    margin-top:30px;
    padding:22px;
    border-radius:24px;
    background:linear-gradient(135deg,
    rgba(212,175,55,0.15),
    rgba(255,255,255,0.03));
    border:1px solid rgba(212,175,55,0.15);
}

.support-card h5{
    font-weight:800;
}

/* =========================
✨ FLOATING DOTS
========================= */
.dot{
    position:absolute;
    border-radius:50%;
    background:rgba(212,175,55,0.1);
    animation:float 6s infinite ease-in-out;
}

.dot1{
    width:120px;
    height:120px;
    top:20%;
    left:5%;
}

.dot2{
    width:80px;
    height:80px;
    bottom:15%;
    right:10%;
}

@keyframes float{
    0%,100%{
        transform:translateY(0px);
    }
    50%{
        transform:translateY(-20px);
    }
}

/* =========================
📱 RESPONSIVE
========================= */
@media(max-width:768px){

    .contact-wrapper{
        padding:70px 0;
    }

    .glass-card{
        border-radius:24px;
    }

    .main-title{
        font-size:2.8rem;
    }
}
</style>

<section class="contact-wrapper">

<div class="dot dot1"></div>
<div class="dot dot2"></div>

<div class="container">

    <!-- HERO -->
    <div class="text-center mb-5">

        <div class="mb-4">
            <span class="badge-feature">☕ Luxury Coffee</span>
            <span class="badge-feature">⚡ Fast Response</span>
            <span class="badge-feature">🔒 Secure Contact</span>
        </div>

        <h1 class="main-title">
            Contact Royal Cafe
        </h1>

        <p class="sub-title mt-4">
            We’d love to hear from you. Whether it’s feedback, custom orders, 
            partnerships, or support — our premium cafe team is ready to help.
        </p>

    </div>

    <div class="row g-4">

        <!-- LEFT -->
        <div class="col-lg-4">

            <div class="glass-card p-4 h-100">

                <h3 class="fw-bold mb-4">
                    Contact Details
                </h3>

                <!-- PHONE -->
                <div class="info-box">
                    <div class="info-icon">
                        <i class="bi bi-telephone-fill"></i>
                    </div>

                    <div>
                        <h6>Phone Number</h6>
                        <a href="tel:+923001234567">
                            +92 300 1234567
                        </a>
                    </div>
                </div>

                <!-- EMAIL -->
                <div class="info-box">
                    <div class="info-icon">
                        <i class="bi bi-envelope-fill"></i>
                    </div>

                    <div>
                        <h6>Email Address</h6>
                        <a href="mailto:maryam@royalcafe.com">
                            maryam@royalcafe.com
                        </a>
                    </div>
                </div>

                <!-- LOCATION -->
                <div class="info-box">
                    <div class="info-icon">
                        <i class="bi bi-geo-alt-fill"></i>
                    </div>

                    <div>
                        <h6>Location</h6>
                        <p>Lahore, Pakistan</p>
                    </div>
                </div>

                <!-- HOURS -->
                <div class="info-box">
                    <div class="info-icon">
                        <i class="bi bi-clock-fill"></i>
                    </div>

                    <div>
                        <h6>Opening Hours</h6>
                        <p>Mon - Sun</p>
                        <p>09:00 AM - 11:00 PM</p>
                    </div>
                </div>

                <!-- WHATSAPP -->
                <a href="https://wa.me/923001234567"
                target="_blank"
                class="btn btn-success w-100 rounded-4 py-3 fw-bold">

                    <i class="bi bi-whatsapp me-2"></i>
                    Live WhatsApp Support

                </a>

                <!-- ADVANCED FEATURE -->
                <div class="support-card mt-4">

                    <h5 class="mb-2">
                        ⚡ Priority Support
                    </h5>

                    <p style="color:var(--text)">
                        Premium customers receive replies within 
                        <strong style="color:var(--gold)">15 minutes</strong>.
                    </p>

                    <div class="progress mt-3"
                    style="height:10px;background:rgba(255,255,255,0.08);">

                        <div class="progress-bar"
                        style="width:95%;background:linear-gradient(to right,#D4AF37,#f5d76e);">
                        </div>

                    </div>

                    <small style="color:var(--text)">
                        Customer Satisfaction 95%
                    </small>

                </div>

                <!-- SOCIAL -->
                <div class="mt-5">

                    <h6 class="fw-bold mb-3">
                        Follow Us
                    </h6>

                    <div class="socials">

                        <a href="#"><i class="bi bi-facebook"></i></a>
                        <a href="#"><i class="bi bi-instagram"></i></a>
                        <a href="#"><i class="bi bi-twitter-x"></i></a>
                        <a href="#"><i class="bi bi-youtube"></i></a>
                        <a href="#"><i class="bi bi-tiktok"></i></a>

                    </div>

                </div>

            </div>

        </div>

        <!-- RIGHT -->
        <div class="col-lg-8">

            <div class="glass-card p-4 p-lg-5">

                <div class="d-flex justify-content-between align-items-center flex-wrap gap-3 mb-4">

                    <div>

                        <h2 class="fw-bold mb-2">
                            Send Message
                        </h2>

                        <p style="color:var(--text)">
                            Fill the form below and our team will contact you shortly.
                        </p>

                    </div>

                    <span class="badge-feature">
                        🔒 SSL Protected
                    </span>

                </div>

                <form action="process_contact.php"
                method="POST"
                id="contactForm">

                    <input type="hidden"
                    name="csrf_token"
                    value="<?php echo $_SESSION['csrf_token']; ?>">

                    <div class="row">

                        <!-- NAME -->
                        <div class="col-md-6 mb-4">

                            <div class="form-floating">

                                <input type="text"
                                name="name"
                                class="form-control"
                                placeholder="Full Name"
                                required>

                                <label>
                                    Full Name
                                </label>

                            </div>

                        </div>

                        <!-- EMAIL -->
                        <div class="col-md-6 mb-4">

                            <div class="form-floating">

                                <input type="email"
                                name="email"
                                class="form-control"
                                placeholder="Email"
                                required>

                                <label>
                                    Email Address
                                </label>

                            </div>

                        </div>

                        <!-- PHONE -->
                        <div class="col-md-6 mb-4">

                            <div class="form-floating">

                                <input type="tel"
                                name="phone"
                                class="form-control"
                                placeholder="Phone">

                                <label>
                                    Phone Number
                                </label>

                            </div>

                        </div>

                        <!-- SUBJECT -->
                        <div class="col-md-6 mb-4">

                            <div class="form-floating">

                                <select name="subject"
                                class="form-select"
                                required>

                                    <option value="">Select Subject</option>
                                    <option>General Inquiry</option>
                                    <option>Feedback</option>
                                    <option>Complaint</option>
                                    <option>Business Partnership</option>
                                    <option>Custom Order</option>

                                </select>

                                <label>
                                    Subject
                                </label>

                            </div>

                        </div>

                    </div>

                    <!-- MESSAGE -->
                    <div class="form-floating mb-2">

                        <textarea
                        name="message"
                        class="form-control"
                        id="messageBox"
                        placeholder="Message"
                        style="height:180px"
                        required></textarea>

                        <label>
                            Write Your Message
                        </label>

                    </div>

                    <!-- LIVE COUNTER -->
                    <div class="d-flex justify-content-between mb-4">

                        <small id="charCount"
                        style="color:var(--text)">
                            0 / 500 Characters
                        </small>

                        <small id="typingStatus"
                        style="color:var(--gold)">
                        </small>

                    </div>

                    <!-- CHECKBOX -->
                    <div class="form-check mb-4">

                        <input class="form-check-input"
                        type="checkbox"
                        required
                        id="agree">

                        <label class="form-check-label"
                        for="agree">

                            I agree to the privacy policy.

                        </label>

                    </div>

                    <!-- BUTTON -->
                    <button type="submit"
                    class="btn btn-gold w-100"
                    id="submitBtn">

                        <span id="btnText">
                            Send Message
                        </span>

                    </button>

                </form>

            </div>

        </div>

    </div>

</div>
</section>

<script>

// ===============================
// 🚀 BUTTON LOADING
// ===============================
document.getElementById('contactForm')
.addEventListener('submit', function(){

    const btn = document.getElementById('submitBtn');

    btn.innerHTML = `
    <span class="spinner-border spinner-border-sm me-2"></span>
    Sending Message...
    `;

    btn.disabled = true;
    btn.style.opacity = '.85';

});

// ===============================
// ✨ LIVE CHARACTER COUNTER
// ===============================
const messageBox = document.getElementById('messageBox');
const charCount = document.getElementById('charCount');
const typingStatus = document.getElementById('typingStatus');

messageBox.addEventListener('input', function(){

    let len = this.value.length;

    charCount.innerHTML = `${len} / 500 Characters`;

    typingStatus.innerHTML = "Typing...";

    clearTimeout(window.typingTimer);

    window.typingTimer = setTimeout(()=>{
        typingStatus.innerHTML = "Done typing";
    },1000);

    if(len > 500){
        charCount.style.color = "red";
    }else{
        charCount.style.color = "rgba(255,255,255,0.7)";
    }

});

// ===============================
// 🌟 AUTO GREETING
// ===============================
window.addEventListener('load', ()=>{

    const hour = new Date().getHours();

    let greeting = "Welcome";

    if(hour < 12){
        greeting = "Good Morning ☀️";
    }
    else if(hour < 18){
        greeting = "Good Afternoon 🌤️";
    }
    else{
        greeting = "Good Evening 🌙";
    }

    console.log(greeting + " to Royal Cafe");

});

</script>

<?php include('footer.php'); ?>