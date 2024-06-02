document.getElementById('enquiryForm').addEventListener('submit', function(event) {
    event.preventDefault();

    const name = document.getElementById('name').value;
    const email = document.getElementById('email').value;
    const contact = document.getElementById('contact').value;
    const course = document.getElementById('course').value;

    const enquiryData = {
        name: name,
        email: email,
        contact: contact,
        course: course
    };

    console.log('Enquiry Data:', enquiryData);

    // Here you can add your AJAX code to send the data to your server

    document.getElementById('successMsg').style.display = 'block';

    // Reset form fields
    document.getElementById('enquiryForm').reset();

    // Hide success message after 3 seconds
    setTimeout(function() {
        document.getElementById('successMsg').style.display = 'none';
    }, 3000);
});

// Find the "Contact Us" link element
const contactLink = document.querySelector('a[href="#contact us"]');
// Find the footer element
const footer = document.getElementById('footer');

// Add a click event listener to the "Contact Us" link
contactLink.addEventListener('click', function(event) {
    event.preventDefault(); // Prevent default link behavior (i.e., navigating to the link)

    // Scroll to the footer section
    footer.scrollIntoView({ behavior: 'smooth' });
});