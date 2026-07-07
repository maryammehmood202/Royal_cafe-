<footer class="royal-footer pt-5 mt-5">

<style>

/* =======================================================
   ROYAL FOOTER PREMIUM UI
======================================================= */

.royal-footer{
    background:
    linear-gradient(rgba(8,8,8,0.95), rgba(8,8,8,0.98)),
    url('images/footer-bg.jpg');
    background-size:cover;
    background-position:center;
    color:#fff;
    position:relative;
    overflow:hidden;
    border-top:1px solid rgba(255,255,255,0.08);
}

/* GLOW */
.royal-footer::before{
    content:"";
    position:absolute;
    width:450px;
    height:450px;
    background:radial-gradient(circle, rgba(212,175,55,0.12), transparent 70%);
    top:-150px;
    right:-120px;
    pointer-events:none;
}

/* CONTAINER */
.footer-container{
    position:relative;
    z-index:2;
}

/* LOGO */
.footer-logo{
    font-size:38px;
    font-weight:800;
    text-decoration:none;
    color:white;
    letter-spacing:2px;
}

.footer-logo span{
    color:#D4AF37;
}

/* TEXT */
.footer-text{
    color:rgba(255,255,255,0.65);
    line-height:1.8;
    margin-top:18px;
    max-width:340px;
}

/* HEADINGS */
.footer-heading{
    color:#D4AF37;
    font-weight:700;
    margin-bottom:25px;
    letter-spacing:1px;
}

/* LINKS */
.footer-links{
    list-style:none;
    padding:0;
    margin:0;
}

.footer-links li{
    margin-bottom:12px;
}

.footer-links a{
    text-decoration:none;
    color:rgba(255,255,255,0.75);
    transition:0.3s;
    position:relative;
}

.footer-links a:hover{
    color:#D4AF37;
    padding-left:6px;
}

/* SOCIAL ICONS */
.social-icons{
    display:flex;
    flex-wrap:wrap;
    gap:14px;
    margin-top:25px;
}

.social-icons a{
    width:45px;
    height:45px;
    border-radius:14px;
    display:flex;
    align-items:center;
    justify-content:center;
    background:rgba(255,255,255,0.06);
    color:#fff;
    font-size:18px;
    transition:0.35s;
    backdrop-filter:blur(10px);
    border:1px solid rgba(255,255,255,0.06);
}

.social-icons a:hover{
    transform:translateY(-5px) scale(1.05);
    background:#D4AF37;
    color:#000;
    box-shadow:0 10px 25px rgba(212,175,55,0.35);
}

/* ================= NEWSLETTER ================= */

.newsletter-card{
    background:rgba(255,255,255,0.05);
    border:1px solid rgba(255,255,255,0.08);
    border-radius:28px;
    padding:35px;
    backdrop-filter:blur(18px);
    position:relative;
    overflow:hidden;
}

.newsletter-card::before{
    content:"";
    position:absolute;
    width:250px;
    height:250px;
    background:radial-gradient(circle, rgba(212,175,55,0.12), transparent 70%);
    top:-80px;
    right:-80px;
}

.newsletter-title{
    font-size:32px;
    font-weight:800;
    margin-bottom:10px;
}

.newsletter-title span{
    color:#D4AF37;
}

.newsletter-subtitle{
    color:rgba(255,255,255,0.7);
    margin-bottom:25px;
    line-height:1.7;
}

/* INPUT */
.newsletter-form{
    display:flex;
    gap:12px;
    flex-wrap:wrap;
}

.newsletter-input{
    flex:1;
    min-width:220px;
    height:58px;
    border:none;
    outline:none;
    border-radius:16px;
    padding:0 20px;
    background:rgba(255,255,255,0.08);
    color:white;
    font-size:15px;
    border:1px solid rgba(255,255,255,0.08);
}

.newsletter-input::placeholder{
    color:rgba(255,255,255,0.45);
}

/* BUTTON */
.newsletter-btn{
    height:58px;
    border:none;
    padding:0 28px;
    border-radius:16px;
    background:linear-gradient(135deg,#D4AF37,#8A6E2F);
    color:white;
    font-weight:700;
    letter-spacing:1px;
    transition:0.35s;
    box-shadow:0 8px 25px rgba(212,175,55,0.25);
}

.newsletter-btn:hover{
    transform:translateY(-3px);
    box-shadow:0 12px 30px rgba(212,175,55,0.4);
}

/* MESSAGE */
#message{
    margin-top:18px;
    font-weight:600;
    color:#D4AF37;
}

/* COPYRIGHT */
.footer-bottom{
    border-top:1px solid rgba(255,255,255,0.08);
    margin-top:60px;
    padding:25px 0;
    text-align:center;
    color:rgba(255,255,255,0.55);
    font-size:14px;
}

/* RESPONSIVE */
@media(max-width:991px){

    .newsletter-card{
        margin-top:40px;
    }

}

@media(max-width:576px){

    .newsletter-title{
        font-size:26px;
    }

    .newsletter-form{
        flex-direction:column;
    }

    .newsletter-btn{
        width:100%;
    }

}

</style>

<div class="container footer-container py-5">

    <div class="row g-5 align-items-start">

        <!-- LEFT SIDE -->
        <div class="col-lg-7">

            <div class="row g-5">

                <!-- BRAND -->
                <div class="col-md-6">

                    <a href="index.php" class="footer-logo">
                        <span>ROYAL</span> CAFE
                    </a>

                    <p class="footer-text">
                        A premium coffee experience crafted for modern food lovers.
                        Enjoy luxury taste, elite ambiance, and unforgettable moments.
                    </p>

                    <!-- SOCIAL -->
                    <div class="social-icons">

                        <a href="#"><i class="bi bi-instagram"></i></a>

                        <a href="https://wa.me/92301234567" target="_blank">
                            <i class="bi bi-whatsapp"></i>
                        </a>

                        <a href="#"><i class="bi bi-facebook"></i></a>

                        <a href="#"><i class="bi bi-twitter-x"></i></a>

                        <a href="#"><i class="bi bi-linkedin"></i></a>

                        <a href="#"><i class="bi bi-github"></i></a>

                    </div>

                </div>

                <!-- MENU LINKS -->
                <div class="col-6 col-md-3">

                    <h5 class="footer-heading">
                        MENU
                    </h5>

                    <ul class="footer-links">

                        <li><a href="menu.php">Main Menu</a></li>

                        <li><a href="campus-special.php">Campus Special</a></li>

                        <li><a href="offers.php">Offers & Deals</a></li>

                        <li><a href="locations.php">Locations</a></li>

                        <li><a href="contact.php">Contact</a></li>

                    </ul>

                </div>

                <!-- COMPANY -->
                <div class="col-6 col-md-3">

                    <h5 class="footer-heading">
                        COMPANY
                    </h5>

                    <ul class="footer-links">

                        <li><a href="story.php">Our Story</a></li>

                        <li><a href="history.php">Heritage</a></li>

                        <li><a href="feedback.php">Feedback</a></li>

                        <li><a href="roastery.php">Roastery</a></li>

                        <li><a href="sustainability.php">Sustainability</a></li>

                    </ul>

                </div>

            </div>

        </div>

        <!-- RIGHT SIDE NEWSLETTER -->
        <div class="col-lg-5">

            <div class="newsletter-card">

                <h2 class="newsletter-title">
                    Join <span>Royal VIP</span> Club
                </h2>

                <p class="newsletter-subtitle">
                    Subscribe now and receive exclusive food deals,
                    premium discounts, secret offers, and weekly updates.
                </p>

                <div class="newsletter-form">

                    <input
                        type="email"
                        id="email"
                        class="newsletter-input"
                        placeholder="Enter your email address"
                    >

                    <button id="subscribeBtn" class="newsletter-btn">
                        JOIN NOW
                    </button>

                </div>

                <p id="message"></p>

            </div>

        </div>

    </div>

    <!-- COPYRIGHT -->
    <div class="footer-bottom">
        © 2026 Royal Cafe — Crafted with Luxury & Passion.
    </div>

</div>

</footer>
<script>

document.addEventListener("DOMContentLoaded", () => {

    const btn =
    document.getElementById("subscribeBtn");

    btn.addEventListener("click", () => {

        let email =
        document.getElementById("email").value;

        let message =
        document.getElementById("message");

        // EMPTY CHECK
        if(email === ""){

            message.innerHTML =
            "❌ Please enter email";

            return;
        }

        // BUTTON LOADING
        btn.innerHTML = "Sending...";

        // FETCH REQUEST
        fetch("newsletter_subscribe.php", {

            method: "POST",

            headers: {
                "Content-Type":
                "application/x-www-form-urlencoded"
            },

            body:
            "email=" + encodeURIComponent(email)

        })

        .then(response => response.text())

        .then(data => {

            message.innerHTML = data;

            btn.innerHTML = "JOIN NOW";

            document.getElementById("email").value = "";

        })

        .catch(error => {

            console.log(error);

            message.innerHTML =
            "❌ Something went wrong";

            btn.innerHTML = "JOIN NOW";

        });

    });

});

</script>