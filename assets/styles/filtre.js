document.addEventListener('DOMContentLoaded', function () {
    let filtreForm = document.getElementById("filtre-form");
    if (filtreForm !== null) {
        let yearMinFiltreInput = document.getElementById('year-min-filtre');
        let yearMaxFiltreInput = document.getElementById('year-max-filtre');
        let kilometerMinFiltreInput = document.getElementById('kilometer-min-filtre');
        let kilometerMaxFiltreInput = document.getElementById('kilometer-max-filtre');
        let priceMinFiltreInput = document.getElementById('price-min-filtre');
        let priceMaxFiltreInput = document.getElementById('price-max-filtre');
        let userCars = document.querySelectorAll('.cars-filtre');

        if (priceMinFiltreInput !== null) {
            filtreForm.addEventListener('submit', function (event) {
                event.preventDefault();
                let yearMinFiltre = parseInt(yearMinFiltreInput.value);
                let yearMaxFiltre = parseInt(yearMaxFiltreInput.value);
                let kilometerMinFiltre = parseInt(kilometerMinFiltreInput.value);
                let kilometerMaxFiltre = parseInt(kilometerMaxFiltreInput.value);
                let priceMinFiltre = parseInt(priceMinFiltreInput.value);
                let priceMaxFiltre = parseInt(priceMaxFiltreInput.value);

                for (let i = 0; i < userCars.length; i++) {
                    let userCar = userCars[i];
                    let year = parseInt(userCar.getAttribute('data-year'));
                    let kilometer = parseInt(userCar.getAttribute('data-kilometer'));
                    let price = parseInt(userCar.getAttribute('data-price'));

                    if (year < yearMinFiltre || year > yearMaxFiltre || kilometer < kilometerMinFiltre || kilometer > kilometerMaxFiltre || price < priceMinFiltre || price > priceMaxFiltre) {
                        userCar.style.display = 'none';
                    } else {
                        userCar.style.display = 'block';
                    }
                }
            });

            let resetButton = document.getElementById('reset-button');
            resetButton.addEventListener('click', function () {
                yearMinFiltreInput.value = '';
                yearMaxFiltreInput.value = '';
                kilometerMinFiltreInput.value = '';
                kilometerMaxFiltreInput.value = '';
                priceMinFiltreInput.value = '';
                priceMaxFiltreInput.value = '';

                for (let i = 0; i < userCars.length; i++) {
                    userCars[i].style.display = 'block';
                }
            });
        }
    }
});

