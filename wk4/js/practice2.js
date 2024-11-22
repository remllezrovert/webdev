    
    function first() {
        alert('From embedded JavaScript');

    }


    function second() {
        alert('From embedded JavaScript!');
    }
    let elem = document.getElementById("about");
    elem.addEventListener("click", second);




    window.onload = function () {
        let elem1 = document.getElementById("ticket");
        elem1.addEventListener("click", first);
    }






