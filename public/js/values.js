var check = document.getElementsByClassName('box');
var resultjs = "";

for (var i = 0; i < check.length; i++) {
    if (check[i].checked) {
        resultjs += checkboxes[i].value
    }
};