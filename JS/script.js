var add = document.getElementById('add');
var update = document.getElementById('update');
var updatemodal = document.getElementById('update-modal');
var addmodal = document.getElementById('add-modal');
var close = document.getElementById('close');
add.addEventListener("click", function () {
    addmodal.classList.add('show');
});
update.addEventListener("click", function () {
    updatemodal.classList.add('show');
});
close.addEventListener("click", function () {
    addmodal.classList.remove('show');
});

