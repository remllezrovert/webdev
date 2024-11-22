var elList, addLink, counter;      // Declare variables
var $ = function(id) { return document.getElementById(id); };
elList  = $('list');               // Get <ul> list                   
addLink = $('add');				   // Get add item button
counter = $('counter');            // Get item counter

function updateCount() {           // Define updateCount function
  var listItems;
  listItems = elList.getElementsByTagName('li').length;
  counter.innerHTML = listItems;                        
}

function addItem() {
  var newItem = prompt("add new item as " + (parseInt(counter.innerHTML) + 1) + "th item");
  
  if (newItem === null || newItem === "" || newItem === "add new item as " + (parseInt(counter.innerHTML) + 1) + "th item") {
    alert("Failed to enter an item");
    return; 
  }

  var li = document.createElement('li');
  li.textContent = newItem;
  var deleteLink = document.createElement('a');
  deleteLink.href = "#";
  deleteLink.className = "delete";
  deleteLink.textContent = "Delete";
  li.appendChild(deleteLink);
  elList.appendChild(li);
  updateCount();
}

function removeItem(event) {
  if (event.target && event.target.className === 'delete') {
    var li = event.target.parentNode;
    elList.removeChild(li);
    updateCount();
  }
}

addLink.addEventListener('click', addItem, false);
elList.addEventListener('click', removeItem, false);
