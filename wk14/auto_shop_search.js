function Car(stockid, make, model, year, type, color, price, car_mileage) {
    this.stockid = stockid;
    this.make = make;
    this.model = model;
    this.year = year;
    this.type = type;
    this.color = color;
    this.price = price;
    this.mileage = car_mileage;
    
    this.display = function() {
        var this_str = "<td>" + this.stockid + "</td><td>" + this.make + "</td>";
        this_str += "<td>" + this.model + "</td><td>" + this.year + "</td><td>" + this.type + "</td>";
        this_str += "<td>" + this.color + "</td><td> $" + this.price + "</td>";
        this_str += "<td>" + this.mileage + "</td>";
        return this_str;
    };
}

var car_list = [];  

var numCars = $('#car-list tbody tr').length;
console.log(numCars);

for (var i = 0; i < numCars; i++) {
    var stockid = $('#id-' + i).text();
    var make = $('#make-' + i).text();
    var model = $('#model-' + i).text();
    var year = $('#year-' + i).text();
    var type = $('#type-' + i).text();
    var color = $('#color-' + i).text();
    var price = $('#price-' + i).text();
    var mileage = $('#mileage-' + i).text();

    var newCar = new Car(stockid, make, model, year, type, color, price, mileage);
    car_list.push(newCar);
}
console.log(car_list);

$('#visitdate').datepicker({
    minDate: +2
});

$('#p2').click(searchList);

function searchList() {
    var resultTableBody = $('#search-result tbody');
    resultTableBody.html("");

    var resultMessage = $('#message');
    resultMessage.text("");

    var resultList = "";
    var keyword = $('#searchbar').val().toLowerCase();

    if (keyword === "") {
        resultMessage.text("Please enter a search keyword before pressing the search button.");
    } else {
        var count = 0;
        var catSelect = $('#categorySelect').val();

        var matchedCars = car_list.filter(function(car) {
            var match = false;

            switch (catSelect) {
                case 'make':
                    match = car.make.toLowerCase().includes(keyword);
                    break;
                case 'stockid':
                    match = car.stockid.toLowerCase().includes(keyword);
                    break;
                case 'model':
                    match = car.model.toLowerCase().includes(keyword);
                    break;
                case 'year':
                    match = car.year === keyword;
                    break;
                case 'type':
                    match = car.type.toLowerCase().includes(keyword);
                    break;
                case 'color':
                    match = car.color.toLowerCase().includes(keyword);
                    break;
                case 'price':
                    match = parseFloat(car.price.replace('$', '').replace(',', '')) <= parseFloat(keyword);
                    break;
            }

            return match;
        });

        if (matchedCars.length > 0) {
            resultMessage.text("Found " + matchedCars.length + " matched cars.");

            matchedCars.forEach(function(car) {
                resultList += "<tr>" + car.display() + "</tr>";
            });

            resultTableBody.html(resultList);
        } else {
            resultMessage.text("No cars matched your search.");
        }
    }
}

$('#bookVisitBtn').click(function() {
    var visitDate = $('#visitdate').val();
    var visitMessage = $('#visitMessage');
    if (visitDate === "") {
        visitMessage.text("Please select a date to book a visit.");
    } else {
        visitMessage.text("Visit booked for " + visitDate + ".");
    }
});
