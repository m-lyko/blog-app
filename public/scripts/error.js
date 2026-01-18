document.addEventListener('DOMContentLoaded', function() {
    document.querySelectorAll('.message-error').forEach(function(el) {
        el.addEventListener('click', function() {
            el.style.display = 'none';
        });
    });
});