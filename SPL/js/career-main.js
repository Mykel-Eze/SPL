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
var messagesRef = firebase.database().ref('career');

// Listen for form submit
document.getElementById('careerForm').addEventListener('submit', submitForm);
// Submit form
function submitForm(e){
e.preventDefault();

//Get value
var name = getInputVal('name');
var email = getInputVal('email');
var phone = getInputVal('phone');
var cvUpload = getInputVal('cv_upload');

// console.log(firstName);
// console.log(messagesRef.key);

// Save message
saveMessage(name, email, phone, cvUpload);

// Show alert
document.querySelector('.toast-success-alert').style.display = 'block';

// Hide alert after 3 seconds
setTimeout(function(){
    document.querySelector('.toast-success-alert').style.display = 'none';
},3000);

// Clear form
document.getElementById('careerForm').reset();
document.getElementById('cv_btn').innerHTML= "Upload CV";
}

// Function to get form value
function getInputVal(id){
    return document.getElementById(id).value;
}

// Save message to firebase
function saveMessage(name, email, phone, cvUpload){
    var newMessageRef = messagesRef.push();
    newMessageRef.set({
        name: name,
        email: email,
        phone: phone,
        cvUpload: cvUpload
    });
}


//FILE UPLOAD HERE
var submitButton = document.getElementById("submit-btn");
var uploadField = document.getElementById("cv_upload");
submitButton.addEventListener('click', function(e){
    var file = uploadField.files[0];
    var storageRef = firebase.storage().ref(file.name);
    storageRef.put(file);
});  