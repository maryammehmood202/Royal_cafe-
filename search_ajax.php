<?php
include('header.php');
include('config/db.php');

/* 🔍 INPUTS */
$search   = trim($_GET['search'] ?? '');
$category = trim($_GET['category'] ?? '');
$min      = $_GET['min'] ?? '';
$max      = $_GET['max'] ?? '';

$query = "SELECT * FROM products WHERE 1=1";
$params = [];
$types = "";

/* 🔎 SEARCH */
if ($search !== '') {
    $query .= " AND name LIKE ?";
    $params[] = "%$search%";
    $types .= "s";
}

/* 📂 CATEGORY */
if ($category !== '') {
    $query .= " AND category = ?";
    $params[] = $category;
    $types .= "s";
}

/* 💰 PRICE RANGE */
if ($min !== '') {
    $query .= " AND price >= ?";
    $params[] = (int)$min;
    $types .= "i";
}

if ($max !== '') {
    $query .= " AND price <= ?";
    $params[] = (int)$max;
    $types .= "i";
}

$stmt = $conn->prepare($query);

if (!empty($params)) {
    $stmt->bind_param($types, ...$params);
}

$stmt->execute();
$result = $stmt->get_result();
?>

<style>

/* 🌌 BACKGROUND (INDEX STYLE) */
body{
    background: radial-gradient(circle at top, #2b1b1a, #120a09);
    overflow-x: hidden;
}

/* 🌫 GLASS SYSTEM */
.glass-card{
    background: rgba(255,255,255,0.05);
    backdrop-filter: blur(14px);
    border: 1px solid rgba(197,160,89,0.12);
    border-radius: 18px;
    transition: all .4s ease;
}

/* 🧠 3D CARD HOVER */
.product-card{
    transform-style: preserve-3d;
    transition: all .4s ease;
}

.product-card:hover{
    transform: perspective(1000px) rotateX(4deg) rotateY(-4deg) translateY(-10px);
    border-color: var(--coffee-gold);
}

/* 🖼 IMAGE EFFECT */
.product-img img{
    transition: .4s ease;
}

.product-card:hover img{
    transform: scale(1.08);
}

/* 💎 BUTTON */
.btn-royal{
    background: var(--coffee-gold);
    color:#000;
    font-weight:700;
    border-radius:12px;
    transition:.3s;
}

.btn-royal:hover{
    transform: scale(1.05);
}

/* ✨ REVEAL */
.reveal{
    opacity:0;
    transform:translateY(40px);
    transition:1s ease;
}

.reveal.active{
    opacity:1;
    transform:translateY(0);
}

/* 🔍 FILTER BAR */
.filter-bar input,
.filter-bar select{
    background: rgba(255,255,255,0.05);
    border: 1px solid rgba(255,255,255,0.1);
    color:#fff;
}

/* 💎 EMPTY STATE */
.empty-box{
    padding:60px;
    text-align:center;
    border-radius:20px;
}

</style>

<main class="container py-5">

<!-- 🔍 FILTER SECTION (INDEX STYLE GLASS) -->
<div class="glass-card p-4 mb-5 reveal">

    <form method="GET" class="row g-3 filter-bar align-items-center">

        <div class="col-md-4">
            <input type="text" name="search" value="<?= htmlspecialchars($search) ?>"
                class="form-control" placeholder="Search cafe items...">
        </div>

        <div class="col-md-3">
            <input type="text" name="category" value="<?= htmlspecialchars($category) ?>"
                class="form-control" placeholder="Category">
        </div>

        <div class="col-md-2">
            <input type="number" name="min" value="<?= htmlspecialchars($min) ?>"
                class="form-control" placeholder="Min">
        </div>

        <div class="col-md-2">
            <input type="number" name="max" value="<?= htmlspecialchars($max) ?>"
                class="form-control" placeholder="Max">
        </div>

        <div class="col-md-1">
            <button class="btn btn-royal w-100">Go</button>
        </div>

    </form>
</div>

<!-- 🧾 PRODUCT GRID -->
<div class="row">

<?php if ($result->num_rows === 0): ?>

    <div class="col-12">
        <div class="glass-card empty-box reveal active">
            <h3 class="text-white">No Item Found</h3>
            <p class="text-muted">Try adjusting filters or explore our menu.</p>
        </div>
    </div>

<?php else: ?>

<?php while ($row = $result->fetch_assoc()): ?>

<div class="col-md-4 mb-4 reveal">

    <div class="glass-card product-card text-center p-4 h-100">

        <!-- IMAGE -->
        <div class="product-img mb-3">
            <img src="images/<?= htmlspecialchars($row['image']) ?>"
                 class="img-fluid" style="max-height:180px;">
        </div>

        <!-- CATEGORY -->
        <span class="badge mb-2"
            style="background:rgba(197,160,89,0.15); color:#C5A059;">
            <?= htmlspecialchars($row['category']) ?>
        </span>

        <!-- NAME -->
        <h5 class="text-white fw-bold">
            <?= htmlspecialchars($row['name']) ?>
        </h5>

        <!-- PRICE -->
        <div class="mb-3">
            <span style="color:#C5A059; font-weight:700; font-size:1.2rem;">
                Rs <?= $row['price'] ?>
            </span>
        </div>

        <!-- BUTTON -->
        <a href="add_to_cart.php?id=<?= $row['id'] ?>"
           class="btn btn-royal w-100">
            Add to Cart
        </a>

    </div>
</div>

<?php endwhile; ?>

<?php endif; ?>

</div>
</main>

<?php include('footer.php'); ?>

<!-- ✨ SCROLL REVEAL SCRIPT -->
<script>
const observer = new IntersectionObserver(entries => {
    entries.forEach(e => {
        if (e.isIntersecting) {
            e.target.classList.add('active');
        }
    });
});

document.querySelectorAll('.reveal').forEach(el => {
    observer.observe(el);
});
</script>