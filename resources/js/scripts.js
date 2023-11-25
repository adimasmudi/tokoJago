document.addEventListener('DOMContentLoaded', function() {
    // Get radio buttons and hidden list
    var option1 = document.getElementById('option1');
    var option2 = document.getElementById('option2');
    var hiddenList = document.getElementById('hiddenList');

    // Add event listeners to radio buttons
    option1.addEventListener('change', function() {
        if (option1.checked) {
            hiddenList.style.display = 'none';
        }
    });

    option2.addEventListener('change', function() {
        if (option2.checked) {
            hiddenList.style.display = 'block';
        }
    });
});s