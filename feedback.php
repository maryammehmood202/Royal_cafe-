<?php 
include('header.php'); 
?>

<style>

/* =========================================================
   👑 ROYAL ULTRA PRO FEEDBACK UI
========================================================= */

:root{
    --gold:#D4AF37;
    --gold-dark:#8a6e2f;
    --bg:#050505;
    --glass:rgba(255,255,255,0.05);
    --border:rgba(255,255,255,0.10);
    --text:rgba(255,255,255,0.72);
}

/* =========================================================
   SECTION
========================================================= */

#reviews{
    padding:120px 0;
    background:
    radial-gradient(circle at top right, rgba(212,175,55,0.12), transparent 35%),
    radial-gradient(circle at bottom left, rgba(255,255,255,0.03), transparent 35%),
    linear-gradient(to bottom,#0b0b0b,#000);
    overflow:hidden;
    position:relative;
}

/* GOLD GLOW */

#reviews::before{
    content:"";
    position:absolute;
    width:500px;
    height:500px;
    background:rgba(212,175,55,0.08);
    border-radius:50%;
    filter:blur(90px);
    top:-220px;
    right:-150px;
}

/* =========================================================
   HEADER
========================================================= */

.section-tag{
    color:var(--gold);
    letter-spacing:3px;
    text-transform:uppercase;
    font-size:13px;
    font-weight:800;
}

.section-title{
    color:#fff;
    font-size:62px;
    font-weight:900;
    line-height:1.1;
    margin-top:12px;
}

.section-sub{
    color:var(--text);
    font-size:17px;
}

/* =========================================================
   MINI STATS
========================================================= */

.stats-wrapper{
    display:flex;
    gap:15px;
    flex-wrap:wrap;
    margin-bottom:25px;
}

.mini-stat{
    background:rgba(255,255,255,0.04);
    border:1px solid rgba(255,255,255,0.08);
    border-radius:20px;
    padding:18px 22px;
    min-width:120px;
    backdrop-filter:blur(18px);
    transition:0.3s;
}

.mini-stat:hover{
    transform:translateY(-5px);
    border-color:rgba(212,175,55,0.35);
}

.mini-stat h3{
    color:var(--gold);
    font-size:28px;
    margin:0;
    font-weight:900;
}

.mini-stat span{
    color:rgba(255,255,255,0.6);
    font-size:14px;
}

/* =========================================================
   REVIEW CARD
========================================================= */

.review-card{
    background:linear-gradient(145deg, rgba(255,255,255,0.06), rgba(255,255,255,0.02));
    border:1px solid rgba(255,255,255,0.08);
    border-radius:32px;
    padding:45px;
    position:relative;
    overflow:hidden;
    transition:0.35s;
}

.review-card:hover{
    transform:translateY(-8px);
    border-color:rgba(212,175,55,0.35);
    box-shadow:0 25px 70px rgba(0,0,0,0.55);
}

.quote{
    position:absolute;
    top:15px;
    right:25px;
    font-size:85px;
    color:rgba(212,175,55,0.08);
}

.rating-view{
    color:var(--gold);
    letter-spacing:4px;
    font-size:20px;
}

.review-text{
    color:#fff;
    font-size:20px;
    line-height:1.8;
}

.avatar{
    width:65px;
    height:65px;
    border-radius:50%;
    border:2px solid var(--gold);
}

/* =========================================================
   FORM
========================================================= */

.form-box{
    background:rgba(255,255,255,0.04);
    border:1px solid rgba(255,255,255,0.10);
    border-radius:32px;
    padding:40px;
    backdrop-filter:blur(22px);
    position:sticky;
    top:100px;
}

.form-title{
    color:#fff;
    font-weight:800;
}

.form-sub{
    color:var(--text);
    margin-bottom:25px;
}

/* INPUTS */

.form-control{
    background:rgba(0,0,0,0.35)!important;
    border:1px solid rgba(212,175,55,0.18)!important;
    color:#fff!important;
    border-radius:18px!important;
    padding:15px 18px!important;
    margin-bottom:18px;
    transition:0.3s;
}

.form-control::placeholder{
    color:rgba(255,255,255,0.45);
}

.form-control:focus{
    border-color:var(--gold)!important;
    box-shadow:0 0 0 0.25rem rgba(212,175,55,0.12)!important;
    background:rgba(0,0,0,0.55)!important;
}

textarea.form-control{
    min-height:150px;
    resize:none;
}

/* =========================================================
   STAR SELECTOR
========================================================= */

.rating-select{
    display:flex;
    flex-direction:row-reverse;
    justify-content:flex-end;
    gap:8px;
    margin-bottom:25px;
}

.rating-select input{
    display:none;
}

.rating-select label{
    font-size:34px;
    color:rgba(255,255,255,0.2);
    cursor:pointer;
    transition:0.3s;
}

.rating-select label:hover,
.rating-select label:hover ~ label,
.rating-select input:checked ~ label{
    color:var(--gold);
    transform:scale(1.1);
}

/* =========================================================
   BUTTON
========================================================= */

.btn-royal{
    width:100%;
    border:none;
    border-radius:18px;
    padding:15px;
    background:linear-gradient(135deg,var(--gold),var(--gold-dark));
    color:#111;
    font-weight:900;
    letter-spacing:1px;
    transition:0.35s;
    position:relative;
}

.btn-royal:hover{
    transform:translateY(-4px);
    box-shadow:0 25px 60px rgba(212,175,55,0.35);
}

/* =========================================================
   SUCCESS MESSAGE
========================================================= */

.success-box{
    display:none;
    background:rgba(25,135,84,0.12);
    border:1px solid rgba(25,135,84,0.3);
    color:#8cffbf;
    padding:15px;
    border-radius:15px;
    margin-bottom:20px;
}

/* =========================================================
   LIVE BADGE
========================================================= */

.live-badge{
    display:inline-flex;
    align-items:center;
    gap:10px;
    background:rgba(212,175,55,0.10);
    border:1px solid rgba(212,175,55,0.25);
    color:var(--gold);
    padding:10px 18px;
    border-radius:50px;
    margin-top:22px;
    font-size:14px;
}

.live-dot{
    width:10px;
    height:10px;
    background:#00ff88;
    border-radius:50%;
    animation:pulse 1s infinite;
}

@keyframes pulse{
    0%{transform:scale(1);}
    50%{transform:scale(1.5);}
    100%{transform:scale(1);}
}

/* =========================================================
   RESPONSIVE
========================================================= */

@media(max-width:768px){

    #reviews{
        padding:80px 0;
    }

    .section-title{
        font-size:38px;
    }

    .review-card,
    .form-box{
        padding:28px;
    }

    .mini-stat{
        flex:1;
        min-width:100px;
    }
}

</style>

<section id="reviews">

<div class="container">

    <!-- HEADER -->
    <div class="row mb-5 align-items-end">

        <div class="col-lg-7">

            <div class="section-tag">
                Royal Customer Stories
            </div>

            <h2 class="section-title">
                Share Your <br> Royal Experience
            </h2>

        </div>

        <div class="col-lg-5 text-lg-end">

            <p class="section-sub">
                Every review helps Royal Cafe improve its premium customer experience.
            </p>

            <div class="live-badge">
                <span class="live-dot"></span>
                18 Reviews Submitted Today
            </div>

        </div>

    </div>

    <div class="row g-5">

        <!-- LEFT SIDE -->
        <div class="col-lg-7">

            <!-- MINI STATS -->
            <div class="stats-wrapper">

                <div class="mini-stat">
                    <h3>4.9★</h3>
                    <span>Average Rating</span>
                </div>

                <div class="mini-stat">
                    <h3>12K+</h3>
                    <span>Happy Customers</span>
                </div>

                <div class="mini-stat">
                    <h3>98%</h3>
                    <span>Satisfaction</span>
                </div>

            </div>

            <!-- REVIEW CARD -->
            <div class="review-card">

                <div class="quote">❝</div>

                <div class="rating-view mb-3">
                    ★★★★★
                </div>

                <p class="review-text mb-4">
                    “Royal Cafe has one of the best luxury environments for students. 
                    Their coffee quality and premium atmosphere feel international.”
                </p>

                <div class="d-flex align-items-center gap-3">

                    <img 
                    src="https://ui-avatars.com/api/?name=Zeeshan+Ali&background=D4AF37&color=111"
                    class="avatar">

                    <div>

                        <h6 class="mb-0 fw-bold text-white">
                            Zeeshan Ali
                        </h6>

                        <small style="color:rgba(255,255,255,0.6)">
                            COMSATS Student
                        </small>

                    </div>

                </div>

            </div>

        </div>

        <!-- RIGHT FORM -->
        <div class="col-lg-5">

            <div class="form-box">

                <div class="success-box" id="successBox">
                    ✅ Feedback submitted successfully.
                </div>

                <h3 class="form-title">
                    Write Feedback
                </h3>

                <p class="form-sub">
                    Tell us about your Royal Cafe experience.
                </p>

                <form id="feedbackForm" method="POST">

                    <input 
                    type="text"
                    name="name"
                    class="form-control"
                    placeholder="Your Full Name"
                    required>

                    <input 
                    type="email"
                    name="email"
                    class="form-control"
                    placeholder="Your Email Address"
                    required>

                    <!-- STAR SELECT -->

                    <label class="text-white fw-bold mb-3">
                        Choose Rating
                    </label>

                    <div class="rating-select">

                        <input type="radio" name="rating" id="star5" value="5" required>
                        <label for="star5">★</label>

                        <input type="radio" name="rating" id="star4" value="4" required>
                        <label for="star4">★</label>

                        <input type="radio" name="rating" id="star3" value="3" required>
                        <label for="star3">★</label>

                        <input type="radio" name="rating" id="star2" value="2" required >
                        <label for="star2">★</label>

                        <input type="radio" name="rating" id="star1" value="1" required >
                        <label for="star1">★</label>

                    </div>

                    <textarea
                    name="message"
                    id="message"
                    maxlength="300"
                    minlength="05"
                    class="form-control"
                    placeholder="Write your experience..."
                    required></textarea>

                    <div class="d-flex justify-content-between mb-4">

                        <small style="color:rgba(255,255,255,0.45)">
                            Max 300 characters
                        </small>

                        <small style="color:rgba(255,255,255,0.45)">
                            <span id="charNum">0</span>/300
                        </small>

                    </div>

                    <button type="submit" class="btn-royal" id="submitBtn">

                        Submit Feedback 🚀

                    </button>

                </form>

            </div>

        </div>

    </div>

</div>

</section>

<script>

/* =========================================================
   CHARACTER COUNTER
========================================================= */

const message = document.getElementById("message");
const charNum = document.getElementById("charNum");

message.addEventListener("input", function(){

    charNum.innerText = this.value.length;

});

/* =========================================================
   AJAX SUBMIT
========================================================= */

document.getElementById("feedbackForm")
.addEventListener("submit", function(e){

    e.preventDefault();

    const btn = document.getElementById("submitBtn");

    btn.innerHTML = `
        <span class="spinner-border spinner-border-sm me-2"></span>
        Submitting...
    `;

    btn.disabled = true;

    let formData = new FormData(this);

    fetch("process_feedback.php",{

        method:"POST",
        body:formData

    })

    .then(res => res.json())

    .then(data => {

        if(data.status === "success"){

            document.getElementById("successBox").style.display = "block";

            document.getElementById("feedbackForm").reset();

            charNum.innerText = "0";

            setTimeout(() => {

                document.getElementById("successBox").style.display = "none";

            }, 4000);

        }
        else{

            alert(data.message);

        }

        btn.innerHTML = "Submit Feedback 🚀";

        btn.disabled = false;

    })

    .catch(error => {

        console.log(error);

        alert("Something went wrong!");

        btn.innerHTML = "Submit Feedback 🚀";

        btn.disabled = false;

    });

});

</script>

<?php include('footer.php'); ?>