document.addEventListener('DOMContentLoaded', function () {
    let filtreForm = document.getElementById('filtre-form');
    let yearMinFilterInput = document.getElementById('year-min-filtre');
    let yearMaxFilterInput = document.getElementById('year-max-filtre');
    let kilometerMinFilterInput = document.getElementById('kilometer-min-filtre');
    let kilometerMaxFilterInput = document.getElementById('kilometer-max-filtre');
    let priceMinFilterInput = document.getElementById('price-min-filtre');
    let priceMaxFilterInput = document.getElementById('price-max-filtre');
    let userCars = document.querySelectorAll('.cars-filtre');

    filtreForm.addEventListener('submit', function (event) {
        event.preventDefault();
        let yearMinFilter = parseInt(yearMinFilterInput.value);
        let yearMaxFilter = parseInt(yearMaxFilterInput.value);
        let kilometerMinFilter = parseInt(kilometerMinFilterInput.value);
        let kilometerMaxFilter = parseInt(kilometerMaxFilterInput.value);
        let priceMinFilter = parseInt(priceMinFilterInput.value);
        let priceMaxFilter = parseInt(priceMaxFilterInput.value);

        for (let i = 0; i < userCars.length; i++) {
            let userCar = userCars[i];
            let year = parseInt(userCar.getAttribute('data-year'));
            let kilometer = parseInt(userCar.getAttribute('data-kilometer'));
            let price = parseInt(userCar.getAttribute('data-price'));

            if (year < yearMinFilter || year > yearMaxFilter || kilometer < kilometerMinFilter || kilometer > kilometerMaxFilter || price < priceMinFilter || price > priceMaxFilter) {
                userCar.style.display = 'none';
            } else {
                userCar.style.display = 'block';
            }
        }
    });

    let resetButton = document.getElementById('reset-button');
    resetButton.addEventListener('click', function () {
        yearMinFilterInput.value = '';
        yearMaxFilterInput.value = '';
        kilometerMinFilterInput.value = '';
        kilometerMaxFilterInput.value = '';
        priceMinFilterInput.value = '';
        priceMaxFilterInput.value = '';

        for (let i = 0; i < userCars.length; i++) {
            userCars[i].style.display = 'block';
        }
    });
});