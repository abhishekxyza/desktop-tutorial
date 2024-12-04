// scripts.js
document.getElementById('explore-btn').addEventListener('click', function() {
    alert('Get ready to explore the world!');
});

// Contact form submission (for demonstration, it won't send emails)
document.getElementById('contact-form').addEventListener('submit', function(event) {
    event.preventDefault(); // Prevent form from submitting
    alert('Your message has been sent!');
});
