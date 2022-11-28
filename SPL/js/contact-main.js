// Your web app's Firebase configuration
var firebaseConfig = {
    apiKey: "AIzaSyBjRQsxEt4kkX7SCxvC3X4e3m1201e10s0",
    authDomain: "spl-forms.firebaseapp.com",
    databaseURL: "https://spl-forms.firebaseio.com",
    projectId: "spl-forms",
    storageBucket: "spl-forms.appspot.com",
    messagingSenderId: "776709697882",
    appId: "1:776709697882:web:333f0a6f22e3fd8f140363",
    measurementId: "G-2MSR6B5VZC"
};
// Initialize Firebase
firebase.initializeApp(firebaseConfig);
firebase.analytics();

// Reference messages collection
var messagesRef = firebase.database().ref('messages');

// Listen for form submit
document.getElementById('contactForm').addEventListener('submit', submitForm);
// Submit form
function submitForm(e){
e.preventDefault();

//Get value
var firstName = getInputVal('f_name');
var lastName = getInputVal('l_name');
var email = getInputVal('email');
var phone = getInputVal('phone');
var message = getInputVal('message');

// console.log(firstName);
// console.log(messagesRef.key);

// Save message
saveMessage(firstName, lastName, email, phone, message);

// Show alert
document.querySelector('.toast-success-alert').style.display = 'block';

// Hide alert after 3 seconds
setTimeout(function(){
    document.querySelector('.toast-success-alert').style.display = 'none';
},3000);

// Clear form
document.getElementById('contactForm').reset();
}

// Function to get form value
function getInputVal(id){
    return document.getElementById(id).value;
}

// Save message to firebase
function saveMessage(firstName, lastName, email, phone, message){
    var newMessageRef = messagesRef.push();
    newMessageRef.set({
        firstName: firstName,
        lastName: lastName,
        email: email,
        phone: phone,
        message: message
    });
}