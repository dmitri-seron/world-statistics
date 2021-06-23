function loadXMLDoc(order, direction) {
    var xmlhttp = new XMLHttpRequest();

    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == XMLHttpRequest.DONE) {
            if (xmlhttp.status == 200) {
                document.getElementById("statistics-table-container").innerHTML = xmlhttp.responseText;
                setEvents();
            } else if (xmlhttp.status == 400) {
                alert('There was a "Not found" error returned.');
            } else {
                alert('Error response returned.');
            }
        }
    };

    xmlhttp.open("GET", "/ajax_sorting/?order=" + order + "&direction=" + direction, true);
    xmlhttp.send();
}

function setEvents() {
    var inputElem = document.getElementsByClassName('sortable');

    for (let item of inputElem) {
        item.addEventListener('click', function () {
            if (item.classList.contains('asc')) {
                var direction = 'desc';
            } else {
                var direction = 'asc';
            }
            loadXMLDoc(item.getAttribute('id'), direction);
        }, false);
    }
}

setEvents();


