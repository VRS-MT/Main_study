// Stores the data from the form
function SubForm() {
    $.ajax({
        url: atob('aHR0cHM6Ly9hcGkuYXBpc3ByZWFkc2hlZXRzLmNvbS9kYXRhL1NtN0pQWXA3amFaY3R6V0Iv'),
        type: 'post',
        data: $(".myForm").serializeArray(),
        success: function() {
            alert("Form Data Submitted :)")
        },
        error: function() {
            alert("There was an error :(")
        }
    });
}



//All next/previous functions are navigation buttons which will prevent the user from moving on if not all of the questions have been answered
function div1_next() {
    var checkRadio1 = document.querySelector(
        'input[name="likert"]:checked');
    var checkRadio2 = document.querySelector(
        'input[name="likert2"]:checked');
    var checkRadio3 = document.querySelector(
        'input[name="likert3"]:checked');
    var checkRadio4 = document.querySelector(
        'input[name="likert4"]:checked');

    if (checkRadio1 == null) {
        alert("You have to answer all the questions on this page in order to continue");
    } else if (checkRadio2 == null) {
        alert("You have to answer all the questions on this page in order to continue");
    } else if (checkRadio3 == null) {
        alert("You have to answer all the questions on this page in order to continue");
    } else if (checkRadio4 == null) {
        alert("You have to answer all the questions on this page in order to continue");
    } else {
        var x = document.getElementById("myDIV1");
        var y = document.getElementById("myDIV2");
        x.style.display = "none";
        y.style.display = "block";
    }
}

function div2_previous() {
    var x = document.getElementById("myDIV2");
    var y = document.getElementById("myDIV1");
    x.style.display = "none";
    y.style.display = "block";
}

function div2_next() {
    var x = document.getElementById("myDIV2");
    var y = document.getElementById("myDIV3");
    x.style.display = "none";
    y.style.display = "block";
}

function div3_previous() {
    var x = document.getElementById("myDIV3");
    var y = document.getElementById("myDIV2");
    x.style.display = "none";
    y.style.display = "block";
}


