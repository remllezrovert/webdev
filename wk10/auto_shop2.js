// Define a car object using a constructor function
function Car() {
	this.stockid;
	this.make;
	this.model;
	this.year;
	this.type;
	this.color;
	this.price;
	this.mileage;
	this.display = function(){
		var this_str = "<td>" + this.stockid + "</td><td>" + this.make + "</td>";
		this_str += "<td>" + this.model + "</td><td>" + this.year + "</td><td>" + this.type + "</td>";
		this_str += "<td>" + this.color + "</td><td> $" + this.price + "</td>";
		this_str += "<td>" + this.mileage + "</td>";
		return this_str;
	}
}

// Declare an array of objects
var car_list = [];  // var car_list = new Array();

// step 2. Use a for loop to read car info from web page
// and then create the Car object instances and 
// add individual car objects to the car_list array
for (var i = 0; i < 12; i++) {
	var car = new Car();
	car.stockid = document.getElementById('id-' + i).innerText;
	car.make = document.getElementById('make-' + i).innerText;
	car.model = document.getElementById('model-' + i).innerText;
	car.year = document.getElementById('year-' + i).innerText;
	car.type = document.getElementById('type-' + i).innerText;
	car.color = document.getElementById('color-' + i).innerText;
	car.price = document.getElementById('price-' + i).innerText;
	car.mileage = document.getElementById('mileage-' + i).innerText;
	car_list.push(car);
}

//step 3. apply event delegation for Add buttons, 
//by registering event handler "addItem" function to the click event to <table id='car-list'> element 
document.getElementById('car-list').addEventListener('click', function(event) {
	if (event.target && event.target.classList.contains('add-item')) {
		addItem(event);
	}
});

// define an array to hold the index of the car added to the shopping cart
var cart = [];

//Step 4: add js code to complete addItem() function
function addItem(event){
	//(1) Define a car index by using the value of the value attribute in each Add button element.  
	//(2) Save that car index into cart array. 
	//(3) use the car index to find the corresponding car object in the car_list array and then call addNewItemtoCart function to add selected car info (make, type, and price) into the shopping cart table. 
	var carIndex = event.target.value;
	cart.push(carIndex);
	addNewItemtoCart(car_list[carIndex]);
}

//Step 4:(4) Add js code in addNewItemtoCart function to create three new <td> elements in shopping cart (‘mycart’) table and append them to a new table row in shopping cart table to display make, 
//type, and price of the selected car.
function addNewItemtoCart(item){
	var newTrElement = document.createElement('tr');
	newTrElement.appendChild(createNewTdElement(item.make));
	newTrElement.appendChild(createNewTdElement(item.model));
	newTrElement.appendChild(createNewTdElement(item.price));
	document.getElementById('mycart').appendChild(newTrElement);
}

function createNewTdElement(cell_content){
	var newTextNode = document.createTextNode(cell_content);
	var newTdElement = document.createElement('td');
	newTdElement.appendChild(newTextNode);
	return newTdElement;
}

//Step 5(1)Add js code to complete definition of the displayInvoice function
function displayInvoice()
{
	if (cart.length === 0) {
		alert("Your cart is empty!");
		return;
	}
	var totalItems = 0;
	var subtotal = 0;
	for (var i = 0; i < cart.length; i++) {
		var car = car_list[cart[i]];
		totalItems++;
		subtotal += parseFloat(car.price);
	}
	var taxes = subtotal * 0.06;
	var registration = subtotal * 0.05;
	var total = subtotal + taxes + registration;

	document.getElementById('total-items').innerText = totalItems;
	document.getElementById('sub-total').innerText = "$" + subtotal.toFixed(2);
	document.getElementById('taxes').innerText = "$" + taxes.toFixed(2);
	document.getElementById('registration').innerText = "$" + registration.toFixed(2);
	document.getElementById('total').innerText = "$" + total.toFixed(2);
}

//step 5(2)Add js code to Register displayInvoice function as the event handler to respond to the click event 
//fires on the Display Invoice button.
document.getElementById('p4').addEventListener('click', displayInvoice);

//Step 6 (1)Add js code to complete definition of the displaySedan function
function displaySedan()
{
	var sedanTable = document.getElementById('sedan-list').getElementsByTagName('tbody')[0];
	sedanTable.innerHTML = ''; 
	for (var i = 0; i < car_list.length; i++) {
		if (car_list[i].type === 'Sedan') {
			var newRow = document.createElement('tr');
			newRow.innerHTML = car_list[i].display();
			sedanTable.appendChild(newRow);
		}
	}
}

//step 6(2) Add js code to Register displaySedan function as the event handler 
//to respond to the click event fires on the Display all Sedans button.
document.getElementById('p2').addEventListener('click', displaySedan);
