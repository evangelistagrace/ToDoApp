// to-do list checkbox and progess bar
var checkboxes = Array.from(document.querySelectorAll('.fa-check-square')).length;
document.querySelector('.completed').innerHTML = checkboxes;
var totalCheckbox = Array.from(document.querySelectorAll('.reminder-check')).length;
document.querySelector('.total').innerHTML = totalCheckbox;
var progressPercentage = 0;
var progressBar = document.querySelector('#progress');
progressPercentage = checkboxes * (1/totalCheckbox) * 100;
progressBar.style.width = progressPercentage + '%';