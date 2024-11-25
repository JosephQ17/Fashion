const signUpButton = document.getElementById('signUp');
const signInButton = document.getElementById('signIn');
const container = document.getElementById('container');

// When the "Sign Up" button is clicked, show the sign-up form
signUpButton.addEventListener('click', () => {
    container.classList.add("right-panel-active");
});

// When the "Sign In" button is clicked, show the sign-in form
signInButton.addEventListener('click', () => {
    container.classList.remove("right-panel-active");
});

// Prevent the form from resetting and hide the animation if the user tries to submit an incomplete sign-up form
document.querySelector('.sign-up-container form').addEventListener('submit', function(event) {
    const fname = document.querySelector('[name="fname"]').value;
    const email = document.querySelector('[name="email"]').value;
    const password = document.querySelector('[name="password"]').value;

    // Check if all fields are filled in
    if (fname === "" || email === "" || password === "") {
        event.preventDefault();  // Prevent the form from submitting
        // Optionally, you can also add a class to show the message
        document.querySelector('.sign-up-container p').style.color = "red";
        document.querySelector('.sign-up-container p').innerText = "Please fill in all the fields.";
    }
});