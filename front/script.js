

function addToDisplay(add) {
    let chars = ['V', '^', '/', '*', '+', '-']
    let display = document.getElementById('display').innerHTML;
    let last = display.slice(-1);
    if (display == '0' && !chars.includes(add)) {
        document.getElementById('display').innerHTML = add;
    } else if(!chars.includes(add)) {
        document.getElementById('display').innerHTML = display + add;
    } else if(!chars.includes(last)) {
        document.getElementById('display').innerHTML = display + add;
    }
}

function deleteLast() {
    let display = document.getElementById('display').innerHTML;
    let todisplay = '0';
    if (display.length > 1) {
        todisplay = display.slice(0, -1);
    }
    document.getElementById('display').innerHTML = todisplay;
}

function clearDisplay() {
    if (confirm('juSiur?')) {
        document.getElementById('display').innerHTML = 0;
    }
}

function sum() {
    math = document.getElementById('display').innerHTML;
    script = 'index.php?math=' + btoa(math);
    var xhttp = new XMLHttpRequest();
    xhttp.open("GET", script, true);
    xhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {

        // Response
        document.getElementById('display').innerHTML = this.responseText; 

        }
    };
    xhttp.send();
}