// Requires jQuery

// Initialize slider:
$(document).ready(function () {
    $(".noUi-handle").on("click", function () {
        $(this).width(50);
    });
    var rangeSlider = document.getElementById("slider-range");
    var rangeSlider2 = $("#slider-range");
    if (rangeSlider2.length > 0) {
        var moneyFormat = wNumb({
            decimals: 0,
            prefix: ""
        });
        noUiSlider.create(rangeSlider, {
            start: [100, 20000],  // Minimum and Maximum starting points
            tooltips: [wNumb({ decimals: 0 }), wNumb({ decimals: 0 })],
            step: 100,
            range: {
                min: 100,
                max: 20000
            },
            format: moneyFormat,
            connect: true,  // Connect the range between handles
        });

        // Set visual min and max values and also update value hidden form inputs
        rangeSlider.noUiSlider.on("change", function (values, handle) {
          
            console.log(`${values[0]}-${values[1]}`);
            // Combine min and max values into a single string with a separator
            $("#price_range").val(`${values[0]}-${values[1]}`);
        });

    }
});