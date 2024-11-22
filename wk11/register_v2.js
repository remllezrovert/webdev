const $ = function (id) { return document.getElementById(id); };

const emailEle = $("email_address");
const phoneEle = $("phone");
const countryEle = $("country");
const termsCheckBox = $("terms");
const mailingAddressEle = $('mailingAddress');
const commentsBox = $("comments");


const processEntries = function () {
	let isValid = true;
	// get values for user entries   
	let email = emailEle.value;
	let phone = phoneEle.value;
	let country = countryEle.value;
	let terms = termsCheckBox.checked;
	// check user entries for validity
	if (email === "") {
		emailEle.nextElementSibling.textContent = "This field is required.";
		isValid = false;
	}
	else {
		emailEle.nextElementSibling.textContent = "";
	}
	if (phone === "") {
		phoneEle.nextElementSibling.textContent = "This field is required.";
		isValid = false;
	}
	else {
		phoneEle.nextElementSibling.textContent = "";
	}
	if (country === "no-option") {
		countryEle.nextElementSibling.textContent = "Please select a country.";
		isValid = false;
	}
	else {
		countryEle.nextElementSibling.textContent = "";
	}
	if (terms === false) {
		termsCheckBox.nextElementSibling.textContent = "This box must be checked.";
		isValid = false;
	}
	else {
		termsCheckBox.nextElementSibling.textContent = "";
		termsCheckBox.value = "yes";
	}
	if (isValid) {
		$("registration_form").submit();
	}
};

const radioChanged = function () {
	$('addressLabel').className = $("mail").checked ? '' : 'hide';
	mailingAddressEle.className = $("mail").checked ? '' : 'hide';
}

const resetForm = function () {
	$("registration_form").reset();
	$('addressLabel').className = 'hide';
	$('mailingAddress').className = 'hide';
	$("email_address").nextElementSibling.textContent = "*";
	$("phone").nextElementSibling.textContent = "*";
	$("country").nextElementSibling.textContent = "*";
	$("terms").nextElementSibling.textContent = "*";
	$("email_address").focus();

	//step 4: reset form data in the local storage as well.
	//add js code here

};

$("register").addEventListener('click', processEntries);
$("reset_form").addEventListener('click', resetForm);
$("email_address").focus();

let options = document.querySelectorAll("input[name='contact']");
console.log(options);
options.forEach(option => option.addEventListener('click', radioChanged));

//step 1: define function writeToStorage()
function writeToStorage() {
    const formData = {
        email: emailEle.value,
        phone: phoneEle.value,
        country: countryEle.value,
        contact: document.querySelector("input[name='contact']:checked")?.id,
        terms: termsCheckBox.checked,
        mailingAddress: mailingAddressEle.value,
        comments: commentsBox.value
    };
    localStorage.setItem("formData", JSON.stringify(formData));
}


//step 2: define function retrieveData()
function retrieveData() {
    const formData = JSON.parse(localStorage.getItem("formData"));
    if (!formData) return;

    emailEle.value = formData.email || "";
    phoneEle.value = formData.phone || "";
    countryEle.value = formData.country || "no-option";

    if (formData.contact) {
        const contactRadio = $(formData.contact);
        if (contactRadio) contactRadio.checked = true;
    }

    termsCheckBox.checked = formData.terms || false;
    mailingAddressEle.value = formData.mailingAddress || "";
    commentsBox.value = formData.comments || "";
}

//step 3: add js code to check whether the web page is loaded to browser window for the first time
//If yes, then call writeToStorage function to save data into the local storage. 
//If no, then call retrieveData function to retrieve data from the local storage. 
//add js code here
if (!localStorage.getItem("formData")) {
    alert("First-time load page.");
    writeToStorage();
} else {
    alert("Reload page.");
    retrieveData();
}


//step 5: add js code here to apply event delegation approach by 
//adding event listener to the 'change' and 'input' events and 
//writeToStorage event handler to the <form> element.
//add js code here
$("registration_form").addEventListener("change", writeToStorage);
$("registration_form").addEventListener("input", writeToStorage);



//Note: do not remove or change radioChanged() function call here.
//leave it as the last statement in the JS program here.
radioChanged();
//end of the JS program










