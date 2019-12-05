const showDeleteDialogButton = document.querySelector("#show-delete-dialog-button");
const hideDeleteDialogButton = document.querySelector("#hide-delete-dialog-button");
const deleteBillDialog = document.querySelector('#delete-bill-dialog');

const showDeleteBillDialog = function () {
    deleteBillDialog.style.display = 'block';
};

const hideDeleteBillDialog = function () {
    deleteBillDialog.style.display = 'none';
};

showDeleteDialogButton.addEventListener('click', showDeleteBillDialog);
hideDeleteDialogButton.addEventListener('click', hideDeleteBillDialog);