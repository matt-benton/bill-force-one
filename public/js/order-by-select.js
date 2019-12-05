const form = document.querySelector('.bills-order-form');
const select = document.querySelector('.bills-order-select');

select.addEventListener('change', function () {
    form.submit();
});