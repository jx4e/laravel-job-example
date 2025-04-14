document.addEventListener("DOMContentLoaded", function() {
    const jobItems = document.querySelectorAll('.job-item');

    jobItems.forEach((item, index) => {
        // Calculate delay based on index
        item.style.animationDelay = `${(index + 1) * .1}s`;
    });
});
