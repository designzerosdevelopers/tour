
//rentail & tour list filter js start--------------------------------------------------

document.addEventListener('DOMContentLoaded', function () {
    // Initialize data object
    let filterData = {
        checkedVehicles: [],
        priceRange: [],
        checkedSeats: [],
        topfilter: ''
    };

    var route = window.location.pathname;

    // Make the initial HTTP request
    if (['/rentals', '/tours', '/activities'].includes(route)) {
        filterData.route = route;
        http(filterData);
    }

    if (['/tours', '/activities'].includes(route)) {
        const dropdownItems = document.querySelectorAll('.dropdown-item');
        const selectedSortOption = document.getElementById('selectedSortOption');

        // Loop through each dropdown item and add click event listener
        dropdownItems.forEach(item => {
            item.addEventListener('click', function (event) {
                event.preventDefault();

                // Get selected sort value and label
                const sortValue = this.getAttribute('data-sort');
                const sortLabel = this.textContent;

                // Update the button to show the selected option
                selectedSortOption.textContent = sortLabel;

                filterData.topfilter = sortValue;
                // Send the selected sort value using Axios
                http(filterData);
            });
        });
    }

    if (route === '/tours') {
        ['minPriceRange', 'maxPriceRange'].forEach(id => {
            document.getElementById(id).addEventListener('input', () => {
                const minInput = document.getElementById('minPriceRange');
                const maxInput = document.getElementById('maxPriceRange');

                let min = parseInt(minInput.value) || 0;
                let max = parseInt(maxInput.value) || 90000000;

                if (minInput.value && !maxInput.value) {
                    max = 90000000;
                } else if (!minInput.value && maxInput.value) {
                    min = 0;
                }

                if (minInput.value && maxInput.value) {
                    filterData.priceRange = [min, max];
                } else {
                    filterData.priceRange = [min, max];
                }

                http(filterData);
            });
        });


        document.getElementById('tourSearch').addEventListener('input', function () {
            const tourDropdown = document.getElementById('tourDropdown');

            const tourName = this.value;
            if (tourName.length >= 3) {
                axios.get('/tour-search-filter', {
                    params: {
                        search: tourName
                    }
                })
                    .then(function (response) {
                        tourDropdown.innerHTML = '';

                        if (response.data.length > 0) {
                            response.data.forEach(info => {
                                const li = document.createElement('li');
                                li.innerHTML =
                                    `<a class="dropdown-item" href="/tours/${info.slug}">${info.title}</a>`;
                                tourDropdown.appendChild(li);
                            });
                            tourDropdown.style.display = 'block';
                        } else {
                            tourDropdown.style.display = 'none';
                        }
                    })
                    .catch(function (error) {
                        console.error('There was an error fetching the locations:', error);
                    });
            } else {
                tourDropdown.style.display = 'none';
            }
        });

    }


    // Range code and 2nd HTTP request start
    if (route === '/rentals') {

        var target = document.getElementById('price_range');
        var observer = new MutationObserver(function (mutations) {
            for (let mutation of mutations) {
                if (mutation.attributeName === 'value') {
                    filterData.priceRange = target.value.split('-').map(Number);
                    http(filterData);
                }
            }
        });

        observer.observe(target, {
            attributes: true
        });

    }
    // Range code end

    // Checkbox type event listeners
    document.addEventListener('change', function (event) {
        if (event.target.classList.contains('vehicle-checkbox')) {
            if (event.target.checked) {
                filterData.checkedVehicles.push(event.target.value);
            } else {
                const index = filterData.checkedVehicles.indexOf(event.target.value);
                if (index > -1) {
                    filterData.checkedVehicles.splice(index, 1);
                }
            }
            http(filterData);
        }
    });


    // Checkbox seats event listeners
    document.addEventListener('change', function (event) {
        if (event.target.classList.contains('seats-checkbox')) {
            if (event.target.checked) {
                filterData.checkedSeats.push(event.target.value);
            } else {
                const index = filterData.checkedSeats.indexOf(event.target.value);
                if (index > -1) {
                    filterData.checkedSeats.splice(index, 1);
                }
            }
            http(filterData);
        }
    });



    function http(filterData, page = 1) {
        const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

        axios.post(filterData.route, {
            ...filterData,
            page: page
        }, {
            headers: {
                'X-CSRF-TOKEN': csrfToken
            }
        })
            .then(response => {
                if (filterData.route === '/tours') {
                    displayTours(response.data.tours);
                    AttractionList(response.data.attractions);
                    ActivityList(response.data.activities);
                    DestinationList(response.data.destinations);

                } else if (filterData.route === '/rentals') {

                    displayVehicles(response.data.vehicles);
                    if (filterData.checkedVehicles.length === 0) {
                        displayVehiclesTypes(response.data.vehicletypes);
                    }
                    if (filterData.checkedSeats.length === 0) {
                        displaySeats(response.data.vseats);
                    }
                } else {
                    displayActivities(response.data.activities);
                }
                updatePagination(response.data.pagination);

            })
            .catch(error => {
                console.error('Error fetching data:', error);
            });
    }

    function displayVehicles(vehicles) {
        const container = document.getElementById('vehicle-container');
        container.innerHTML = '';
        const port = window.location.port ? `:${window.location.port}` : '';
        const domain = window.location.protocol + '//' + window.location.hostname + port + '/';
        vehicles.forEach(vehicle => {
            const url = domain + 'rentals/' + encodeURIComponent(vehicle.slug);
            const vehicleCard = `
            <div class="col-lg-4 col-md-6 wow fadeInUp">
                <div class="card-journey-small card-grid-car background-card">
                    <div class="card-image">
                        <a class="wish" href="#">
                            <svg width="20" height="18" viewBox="0 0 20 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M17.071 10.1422L11.4141 15.7991C10.6331 16.5801 9.36672 16.5801 8.58568 15.7991L2.92882 10.1422C0.9762 8.1896 0.9762 5.02378 2.92882 3.07116C4.88144 1.11853 8.04727 1.11853 9.99989 3.07116C11.9525 1.11853 15.1183 1.11853 17.071 3.07116C19.0236 5.02378 19.0236 8.1896 17.071 10.1422Z" stroke="" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                            </svg>
                        </a>
                        <a href="${url}" target="_blank">
                          ${vehicle.images.length > 0 ? `<img style="width: 100%; height: 101%; object-fit: cover;" src="${domain}${vehicle.images[0].path}${vehicle.images[0].file}" alt="${vehicle.images[0].alt}" />` : ''}
                         </a>

                    </div>
                    <div class="card-info">
                        <div class="card-title">
                            <a class="text-lg-bold neutral-1000" href="${url}" target="_blank">${vehicle.title}</a>
                        </div>
                        <div class="card-program">
                            <div class="card-location">
                                <p class="text-location text-sm-medium neutral-500">${vehicle.location}</p>
                            </div>
                            <div class="card-facilities">
                                <div class="item-facilities">
                                    <p class="speed text-md-medium neutral-1000">${vehicle.vehicle_attributes.mileage}</p>
                                </div>
                                <div class="item-facilities">
                                    <p class="fuel text-md-medium neutral-1000">${vehicle.vehicle_attributes.fuel_type}</p>
                                </div>
                                <div class="item-facilities">
                                    <p class="seats text-md-medium neutral-1000">${vehicle.vehicle_attributes.seats}</p>
                                </div>
                            </div>
                            <div class="endtime">
                                <div class="card-price">
                                    <h4 class="heading-4 neutral-1000">${vehicle.price}
                                    <p class="text-md-medium neutral-500 mr-10">/ day</p>
                                    </h4>
                                </div>
                                <div class="card-button">
                                    <a class="btn btn-gray" href="${url}" target="_blank">Book Now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        `;
            container.innerHTML += vehicleCard;
        });
    }

    function displayVehiclesTypes(vehicletypes) {
        const container = document.getElementById('vehicle-types');
        container.innerHTML = '';

        vehicletypes.forEach(vehicletype => {
            const vehicleCard = `
        <li>
            <label class="cb-container">
                <input type="checkbox" value="${vehicletype.type_id}" class="vehicle-checkbox"><span class="text-sm-medium">${vehicletype.type_title}</span><span class="checkmark"></span>
            </label><span class="number-item">${vehicletype.count}</span>
        </li>
        `;
            container.innerHTML += vehicleCard;
        });
    }

    function displaySeats(seats) {
        const seatsContainer = document.getElementById('vehicle-seats');
        seatsContainer.innerHTML = '';

        seats.forEach(seat => {
            const seatItem = document.createElement('li');
            seatItem.innerHTML = `
    <label class="cb-container">
        <input type="checkbox" value="${seat}" class="seats-checkbox">
        <span class="text-sm-medium">${seat} Seater</span>
        <span class="checkmark"></span>
    </label>
`;
            seatsContainer.appendChild(seatItem);
        });
    }

    function updatePagination(pagination) {
        const paginationElement = document.querySelector('.pagination');
        if (pagination.lastPage > 1) {
            paginationElement.setAttribute('data-total-pages', pagination.lastPage);

            let pages = '';
            for (let i = 1; i <= pagination.lastPage; i++) {
                pages += `<li class="page-item ${i === pagination.currentPage ? '' : ''}">
            <a class="page-link" href="#" onclick="handlePageClick(event, ${i})">${i}</a>
          </li>`;
            }

            paginationElement.innerHTML = `
            <li class="page-item ${pagination.currentPage === 1 ? 'disabled' : ''}">
                <a class="page-link" href="#" aria-label="Previous" onclick="handlePageClick(event, ${pagination.currentPage - 1})">
                    <span aria-hidden="true">&laquo;</span>
                </a>
            </li>
            ${pages}
            <li class="page-item ${pagination.currentPage === pagination.lastPage ? 'disabled' : ''}">
                <a class="page-link" href="#" aria-label="Next" onclick="handlePageClick(event, ${pagination.currentPage + 1})">
                    <span aria-hidden="true">&raquo;</span>
                </a>
            </li>
            `;
        }
    }


    window.handlePageClick = function (event, page) {
        event.preventDefault();

        const filterData = {}; // Placeholder for your filter data
        const pagination = document.querySelector('.pagination');
        const totalPages = parseInt(pagination.getAttribute('data-total-pages'), 10);

        // Ensure page number is within valid bounds
        if (page >= 1 && page <= totalPages) {
            // Call your HTTP function with the necessary data and page number
            http(filterData, page);
        }
    }



    //Rental and tour list js end

    //All pages filter removes, when redirect from home search filter

    // Function to get URL parameters
    function getQueryParams() {
        const params = {};
        const queryString = window.location.search.substring(1);
        const queries = queryString.split('&');
        queries.forEach(query => {
            const [key, value] = query.split('=');
            params[key] = value || true; // Default value to true if not provided
        });
        return params;
    }

    // Get the query parameters from the URL
    const queryParams = getQueryParams();

    // Check if 'setting' parameter has the value 'no-filter'
    if (queryParams['setting'] === 'nofilters') {
        const filterContainer = document.querySelector('.filters-list');
        if (filterContainer) {
            filterContainer.classList.add('d-none');
        }
    }


    // Home page filers js 

    if (route === '/') {

        // HTML elements
        const locationSearch = document.getElementById('locationSearch');
        const locationDropdown = document.getElementById('locationDropdown');
        const categoryLinks = document.querySelectorAll('.category-link');
        const searchButton = document.getElementById('searchButton'); // Ensure you have this ID in your HTML

        let selectedCategory = 'tours'; // Default category

        // Add event listener to category links
        categoryLinks.forEach(link => {
            link.addEventListener('click', function (event) {
                event.preventDefault();

                categoryLinks.forEach(link => link.classList.remove('active'));

                this.classList.add('active');

                selectedCategory = this.getAttribute('data-category');
            });
        });

        // Add event listener to the input field
        locationSearch.addEventListener('keyup', function () {
            const query = this.value.trim();

            // Check if the input has more than 3 characters
            if (query.length >= 3) {
                axios.get('/home-search-filter', {
                    params: {
                        search: query,
                        category: selectedCategory
                    }
                })
                    .then(function (response) {
                        updateDropdown(response.data);
                    })
                    .catch(function (error) {
                        console.error('There was an error fetching the locations:', error);
                    });
            } else {
                locationDropdown.style.display = 'none';
            }


        });
        // Function to update the dropdown list
        function updateDropdown(infos) {
            locationDropdown.innerHTML = '';

            if (infos.length > 0) {
                infos.forEach(info => {
                    const li = document.createElement('li');
                    li.innerHTML =
                        `<a class="dropdown-item" href="/${selectedCategory}/${info.slug}">${info.title}</a>`;
                    locationDropdown.appendChild(li);
                });
                locationDropdown.style.display = 'block';
            } else {
                locationDropdown.style.display = 'none';
            }
        }

        // Handle search button click
        searchButton.addEventListener('click', function () {

            if (selectedCategory !== 'tickets') {
                window.location.href = `/${selectedCategory}?setting=nofilters`;
            }
        });

    }

    function ActivityList(activities) {
        const container = document.querySelector('.activity-list');
        container.innerHTML = '';

        activities.forEach(activity => {
            const listItem = `
            <li>
                <a href="/activities/${activity.slug}">
                <label class="cb-container">

                    <span class="text-sm-medium">${activity.title}</span>
                    </lable>
                </a>
            </li>
        `;

            // Append the new item to the container
            container.insertAdjacentHTML('beforeend', listItem);
        });
    }

    function AttractionList(attractions) {
        const container = document.querySelector('.attraction-list');
        container.innerHTML = '';

        attractions.forEach(attraction => {
            const listItem = `
            <li>
                <a href="/attractions/${attraction.slug}">
                <label class="cb-container">

                    <span class="text-sm-medium">${attraction.title}</span>
                    </lable>
                </a>
            </li>
        `;

            // Append the new item to the container
            container.insertAdjacentHTML('beforeend', listItem);
        });
    }

    function DestinationList(destinations) {
        const container = document.querySelector('.destination-list');
        container.innerHTML = '';

        destinations.forEach(destination => {
            const listItem = `
            <li>
                <a href="/destinations/${destination.slug}">
                <label class="cb-container">

                    <span class="text-sm-medium">${destination.title}</span>
                    </lable>
                </a>
            </li>
        `;

            // Append the new item to the container
            container.insertAdjacentHTML('beforeend', listItem);
        });
    }


    function displayTours(tours) {

        const container = document.getElementById('tour-container');
        container.innerHTML = '';
        const port = window.location.port ? `:${window.location.port}` : '';
        const domain = window.location.protocol + '//' + window.location.hostname + port + '/';
        tours.forEach(tour => {
            const url = domain + 'tours/' + encodeURIComponent(tour.slug);
            const imageHtml = Array.isArray(tour.images) && tour.images.length > 0
                ? `<img src="${domain}${tour.images[0].path}${tour.images[0].file}" alt="${tour.images[0].alt}" />`
                : '';
            const tourCard = `
            <div class="col-xl-4 col-lg-6 col-md-6">
                <a href="">
                    <div class="card-journey-small background-card">
                        <div class="card-image"> 
                            <a class="wish" href="#">
                                <svg width="20" height="18" viewbox="0 0 20 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M17.071 10.1422L11.4141 15.7991C10.6331 16.5801 9.36672 16.5801 8.58568 15.7991L2.92882 10.1422C0.9762 8.1896 0.9762 5.02378 2.92882 3.07116C4.88144 1.11853 8.04727 1.11853 9.99989 3.07116C11.9525 1.11853 15.1183 1.11853 17.071 3.07116C19.0236 5.02378 19.0236 8.1896 17.071 10.1422Z" stroke="" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                </svg>
                            </a>
                            <a href="${url}" target="_blank">
                                ${imageHtml}
                            </a>
                        </div>
                        <div class="card-info background-card">
                            
                            <div class="card-title">
                                <a class="text-lg-bold neutral-1000" href="${url}" target="_blank">${tour.title}</a>
                            </div>
                            <div class="card-program">
                                <div class="card-duration-tour">
                                    <p class="icon-duration text-sm-medium neutral-500">${tour.duration}</p>
                                    <p class="icon-guest text-sm-medium neutral-500">${tour.no_of_people} guest</p>
                                </div>
                                <div class="endtime">
                                    <div class="card-price">
                                        <h4 class="heading-4 neutral-1000">${tour.adult_price}
                                        <p class="text-sm-medium neutral-500">/person</p>
                                        </h4>
                                    </div>
                                    <div class="card-button">
                                        <a class="btn btn-gray" href="${url}">Book Now</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        `;
            container.innerHTML += tourCard;
        });
    }

    function displayActivities(activities) {

        const container = document.getElementById('activity-container');
        container.innerHTML = '';
        const port = window.location.port ? `:${window.location.port}` : '';
        const domain = window.location.protocol + '//' + window.location.hostname + port + '/';
        activities.forEach(activity => {
            const url = domain + 'activities/' + encodeURIComponent(activity.slug);
            const imageHtml = Array.isArray(activity.images) && activity.images.length > 0
                ? `<img src="${domain}${activity.images[0].path}${activity.images[0].file}" alt="${activity.images[0].alt}" />`
                : '';
            const activityCard = `
            <div class="col-xl-3 col-lg-6 col-md-6">
                <a href="">
                    <div class="card-journey-small background-card">
                        <div class="card-image"> 
                            <a class="wish" href="#">
                                <svg width="20" height="18" viewbox="0 0 20 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M17.071 10.1422L11.4141 15.7991C10.6331 16.5801 9.36672 16.5801 8.58568 15.7991L2.92882 10.1422C0.9762 8.1896 0.9762 5.02378 2.92882 3.07116C4.88144 1.11853 8.04727 1.11853 9.99989 3.07116C11.9525 1.11853 15.1183 1.11853 17.071 3.07116C19.0236 5.02378 19.0236 8.1896 17.071 10.1422Z" stroke="" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                </svg>
                            </a>
                            <a href="${url}" target="_blank">
                                ${imageHtml}
                            </a>
                        </div>
                        <div class="card-info background-card">
                            
                            <div class="card-title">
                                <a class="text-lg-bold neutral-1000" href="${url}" target="_blank">${activity.title}</a>
                            </div>
                            <div class="card-program">
                                <div class="card-duration-tour">
                                    <p class="icon-duration text-sm-medium neutral-500">${activity.duration}</p>
                                    <p class="icon-guest text-sm-medium neutral-500">${activity.no_of_people} guest</p>
                                </div>
                                <div class="endtime">
                                    <div class="card-price">
                                        <h4 class="heading-4 neutral-1000">${activity.adult_price}
                                        <p class="text-sm-medium neutral-500">/person</p>
                                        </h4>
                                    </div>
                                    <div class="card-button">
                                        <a class="btn btn-gray" href="${url}">Book Now</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        `;
            container.innerHTML += activityCard;
        });
    }

});

//==================== lazy load images ======================

$(function () {
    $("img.lazy").lazyload({
        effect: "fadeIn",
        threshold: 200
    });
});