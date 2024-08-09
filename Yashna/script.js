function showThankYouPopup(event) {
    event.preventDefault(); // Prevent default form submission
    var form = document.getElementById('contact-form');
    var formData = new FormData(form);

    fetch(form.action, {
        method: 'POST',
        body: formData
    })
    .then(response => {
        if (response.ok) {
            alert('Thank you for getting in touch! We will respond to you shortly.');
            form.reset(); // Clear the form
        } else {
            alert('There was a problem with your submission. Please try again.');
        }
    })
    .catch(error => {
        console.error('Error:', error);
        alert('There was a problem with your submission. Please try again.');
    });
}
