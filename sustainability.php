<?php include('header.php'); ?>

<!-- 🌍 SUSTAINABILITY HERO -->
<div class="hero-section py-5" style="background: linear-gradient(135deg, #2b1b18 0%, #6b3e2e 100%);">
    <div class="container py-5 position-relative">
        <div class="row align-items-center">
            <div class="col-md-6 reveal active">
                <h6 class="text-gold fw-bold mb-3 ls-2" style="color: var(--clr-gold)">COFFEE WITH COMMITMENT</h6>
                <h1 class="display-4 fw-bold text-white">Sustainability</h1>
                <p class="mt-3 text-white opacity-75">Our strategy aims to craft more sustainable coffee — from crop to cup. We focus on three pillars: our people, our coffee, and our planet.</p>
            </div>
            <div class="col-md-6 text-end reveal active">
                <div class="glass-card p-2 floating-anim d-inline-block">
                    <img src="beans-pour.png" class="img-fluid rounded-4" style="max-height: 350px;" alt="Sustainable Sourcing">
                </div>
            </div>
        </div>
        <!-- Decorative Leaf Icon -->
        <i class="bi bi-leaf position-absolute bottom-0 end-0 display-1 opacity-10 text-white m-5"></i>
    </div>
</div>

<main class="container py-5">

    <!-- 🍎 NUTRITION & WELLBEING -->
    <section id="nutrition" class="row g-0 rounded-5 overflow-hidden my-5 glass-card border-0 shadow-lg">
        <div class="col-md-6">
            <img src="nutrition-food.jpg" class="w-100 h-100 object-fit-cover" style="min-height: 400px;" alt="Nutrition">
        </div>
        <div class="col-md-6 p-lg-5 p-4 d-flex flex-column justify-content-center align-items-center text-center" style="background: rgba(187, 222, 251, 0.1);">
            <i class="bi bi-heart-pulse fs-1 text-gold mb-3" style="color: var(--clr-gold)"></i>
            <h3 class="fw-bold text-maroon">Nutrition & Wellbeing</h3>
            <p class="text-muted small px-lg-4">Your health is our priority. From allergen transparency to expanding our vegan-certified treats, we ensure every craving is met with responsibility.</p>
            <button class="btn btn-outline-gold rounded-pill px-4">View Nutrition Guide</button>
        </div>
    </section>

    <!-- 🎓 ROYAL FOUNDATION -->
    <section id="foundation" class="row g-0 rounded-5 overflow-hidden my-5 glass-card border-0 shadow-lg flex-md-row-reverse">
        <div class="col-md-6">
            <img src="school-building.jpg" class="w-100 h-100 object-fit-cover" style="min-height: 400px;" alt="Foundation">
        </div>
        <div class="col-md-6 p-lg-5 p-4 d-flex flex-column justify-content-center align-items-center text-center" style="background: rgba(209, 196, 233, 0.1);">
            <i class="bi bi-mortarboard fs-1 text-gold mb-3" style="color: var(--clr-gold)"></i>
            <h3 class="fw-bold text-maroon">Royal Foundation</h3>
            <p class="text-muted small px-lg-4">Education changes everything. Through our foundation, we invest in building and supporting schools in remote coffee-growing communities across the globe.</p>
            <button class="btn btn-outline-gold rounded-pill px-4">Our Impact Report</button>
        </div>
    </section>

    <!-- 🌎 RESPONSIBLE SOURCING -->
    <section id="sourcing" class="row g-0 rounded-5 overflow-hidden my-5 glass-card border-0 shadow-lg">
        <div class="col-md-6">
            <img src="coffee-cherries.jpg" class="w-100 h-100 object-fit-cover" style="min-height: 400px;" alt="Sourcing">
        </div>
        <div class="col-md-6 p-lg-5 p-4 d-flex flex-column justify-content-center align-items-center text-center" style="background: rgba(242, 139, 130, 0.1);">
            <i class="bi bi-globe-americas fs-1 text-gold mb-3" style="color: var(--clr-gold)"></i>
            <h3 class="fw-bold text-maroon">Responsible Sourcing</h3>
            <p class="text-muted small px-lg-4">Protecting the planet is not optional. We work directly with farmers to ensure biodiversity and fair labor practices in every hectare of coffee land.</p>
            <button class="btn btn-outline-gold rounded-pill px-4">Trace Our Beans</button>
        </div>
    </section>

</main>

<?php include('footer.php'); ?>