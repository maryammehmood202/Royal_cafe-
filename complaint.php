<?php include('header.php'); ?>

<main class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="glass-card p-5 reveal active shadow-2xl">
                <div class="text-center mb-5">
                    <i class="bi bi-chat-left-heart fs-1 text-gold mb-3"></i>
                    <h2 class="fw-bold text-maroon">Guest Feedback</h2>
                    <p class="small text-muted">Your experience helps us maintain the Royal Standard.</p>
                </div>
                
                <form action="submit_feedback.php" method="POST">
                    <div class="mb-4">
                        <label class="small fw-bold mb-2 opacity-75">NAME</label>
                        <input type="text" name="name" class="form-control rounded-4 border-0 bg-light p-3" placeholder="John Doe" required>
                    </div>
                    <div class="mb-4">
                        <label class="small fw-bold mb-2 opacity-75">YOUR MESSAGE</label>
                        <textarea name="feedback" rows="4" class="form-control rounded-4 border-0 bg-light p-3" placeholder="Tell us about your coffee experience..." required></textarea>
                    </div>
                    <button type="submit" class="btn btn-royal w-100 py-3">Submit Review</button>
                </form>
            </div>
        </div>
    </div>
</main>

<?php include('footer.php'); ?>