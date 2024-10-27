<div class="box-heading">
    <div class="box-heading-left">
        <div class="box-title">
            <h4 class="neutral-1000 mb-15">Media</h4>
        </div>
        <div class="box-breadcrumb">
            <div class="breadcrumbs">
                <ul>
                    <li><a class="icon-home" href="{{route('admin.index')}}">Dashboard</a></li>
                    <li><span>Media upload</span></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="box-heading-right" style="display: flex; align-items: center; gap: 15px;">
        <span>
            <input type="text" placeholder="Search Image" id="searchMedia"
                style="padding-left: 20px; font-size: 14px;">
        </span>
        <a class="btn btn-brand-secondary" href="#" id="chooseImagesBtn"
            style="display: flex; align-items: center; gap: 5px;">
            <svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path
                    d="M11 0C8.82441 0 6.69767 0.645139 4.88873 1.85383C3.07979 3.06253 1.66989 4.78049 0.83733 6.79048C0.00476617 8.80047 -0.213071 11.0122 0.211367 13.146C0.635804 15.2798 1.68345 17.2398 3.22183 18.7782C4.76021 20.3166 6.72022 21.3642 8.85401 21.7886C10.9878 22.2131 13.1995 21.9952 15.2095 21.1627C17.2195 20.3301 18.9375 18.9202 20.1462 17.1113C21.3549 15.3023 22 13.1756 22 11C21.9966 8.08367 20.8365 5.28778 18.7744 3.22563C16.7122 1.16347 13.9163 0.00344047 11 0ZM16 12H12V16C12 16.2652 11.8946 16.5196 11.7071 16.7071C11.5196 16.8946 11.2652 17 11 17C10.7348 17 10.4804 16.8946 10.2929 16.7071C10.1054 16.5196 10 16.2652 10 16V12H6C5.73479 12 5.48043 11.8946 5.2929 11.7071C5.10536 11.5196 5 11.2652 5 11C5 10.7348 5.10536 10.4804 5.2929 10.2929C5.48043 10.1054 5.73479 10 6 10H10V6C10 5.73478 10.1054 5.48043 10.2929 5.29289C10.4804 5.10536 10.7348 5 11 5C11.2652 5 11.5196 5.10536 11.7071 5.29289C11.8946 5.48043 12 5.73478 12 6V10H16C16.2652 10 16.5196 10.1054 16.7071 10.2929C16.8946 10.4804 17 10.7348 17 11C17 11.2652 16.8946 11.5196 16.7071 11.7071C16.5196 11.8946 16.2652 12 16 12Z"
                    fill="black"></path>
            </svg>
            Upload
        </a>
        <input type="file" id="imageUploadInput" multiple style="display: none;" accept="image/*">
    </div>

</div>

<div class="section-box">
    <div class="">
        <div class="row">
            <div class="col-6 col-sm-6 col-md-9 col-lg-9">
                <div class="row" id="imageContainer">

                </div>
            </div>

            <!-- Details Column -->
            <div id="detailsColumn" class="col-6 col-sm-6 col-md-3 col-lg-3 d-none">
                <div id="imageDetails" class="border p-3 position-relative">
                    <!-- Close Button -->
                    <button id="closeDetails" class="btn-close position-absolute top-0 end-0 mt-3 me-3"></button>
                    <form id="imageDetailsForm">
                        <input type="hidden" name="_method" value="PUT">
                        <img id="detailImage" src="" alt="" class="img-fluid mb-3">
                        <div class="mb-3">
                            <label for="imageAltInput" class="form-label">Alt</label>
                            <input type="text" id="imageAltInput" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="imageNameInput" class="form-label">Name:</label>
                            <span id="imageNameInput"></span>
                        </div>
                        <div class="mb-3">
                            <label for="imageNameInput" class="form-label">Size:</label>
                            <span id="imageSizeInput"></span>
                        </div>
                        <div class="mb-3">
                            <label for="imageNameInput" class="form-label">Resolution:</label>
                            <span id="imageResInput"></span>
                        </div>
                        <input type="hidden" id="imageId">
                        <button type="button" onclick="updateImage()" class="btn btn-black py-2">Update</button>
                        <button type="button" onclick="deleteImage()" class="btn btn-danger py-2">Delete</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        mediaIndex();
    });

    function mediaIndex() {

        function showImageDetails(image) {
            document.getElementById('detailsColumn').classList.remove('d-none');
            document.getElementById('detailImage').src = `/${image.path}${image.file}`;
            document.getElementById('imageAltInput').value = image.alt;
            document.getElementById('imageNameInput').textContent = image.file;
            document.getElementById('imageSizeInput').textContent = image.size;
            document.getElementById('imageResInput').textContent = image.resolution;
            document.getElementById('imageId').value = image.id;
        }

        // Close button event listener
        document.getElementById('closeDetails').addEventListener('click', function() {
            document.getElementById('detailsColumn').classList.add('d-none');
        });

        // Function to render images
        function renderImages(images) {
            const imageContainer = document.getElementById('imageContainer');
            imageContainer.innerHTML = ''; // Clear the container

            images.forEach(image => {
                const colDiv = document.createElement('div');
                colDiv.className = 'col-12 col-sm-6 col-md-4 col-lg-3 p-2 position-relative';

                const mediaItemDiv = document.createElement('div');
                mediaItemDiv.className =
                    'd-flex align-items-center justify-content-center border rounded overflow-hidden media-item';

                const imgElement = document.createElement('img');
                imgElement.src = `/${image.path}${image.file}`;
                imgElement.alt = image.alt;
                imgElement.className = 'img-fluid';
                imgElement.dataset.file_name = image.file;
                imgElement.dataset.name = image.alt;
                imgElement.dataset.id = image.id;
                imgElement.dataset.size = image.size;
                imgElement.dataset.res = image.resolution;

                // Add click event to show image details
                imgElement.addEventListener('click', function() {
                    showImageDetails(image);
                });

                mediaItemDiv.appendChild(imgElement);
                colDiv.appendChild(mediaItemDiv);
                imageContainer.appendChild(colDiv);
            });
        }

        imageRequest();

        function imageRequest() {
            axios.get("{{ route('media.create') }}")
                .then(function(response) {
                    const images = response.data;
                    renderImages(images);
                })
                .catch(function(error) {
                    console.error('There was an error fetching the images:', error);
                });
        }
        document.getElementById('searchMedia').addEventListener('input', function() {
            const searchValue = this.value.trim();

            if (searchValue.length > 2) {
                axios.get("{{ route('media.create') }}", {
                        params: {
                            search: searchValue
                        }
                    })
                    .then(function(response) {
                        const images = response.data;
                        renderImages(images);
                    })
                    .catch(function(error) {
                        console.error('There was an error fetching the images:', error);
                    });
            } else if (searchValue.length === 0) {
                imageRequest();
            }
        });
    }



    document.getElementById('chooseImagesBtn').addEventListener('click', function(event) {
        event.preventDefault(); // Prevent the default action of the anchor tag
        document.getElementById('imageUploadInput').click(); // Trigger the hidden file input
    });

    document.getElementById('imageUploadInput').addEventListener('change', function(event) {
        const files = event.target.files;
        let formData = new FormData();

        for (let i = 0; i < files.length; i++) {
            formData.append('images[]', files[i]);
        }

        // Make the Axios POST request
        axios.post("{{ route('media.store') }}", formData, {
                headers: {
                    'Content-Type': 'multipart/form-data'
                }
            })
            .then(function(response) {
                mediaIndex();
            })
            .catch(function(error) {
                console.error(error);
            });
    });

    function updateImage() {
        const imageAltInput = document.getElementById('imageAltInput').value;
        const imageId = document.getElementById('imageId').value;

        // Construct data object
        const data = {
            alt: imageAltInput // Send data with the correct key
        };

        // Send request via Axios
        axios.put("{{ route('media.update', ':id') }}".replace(':id', imageId), data, {
                headers: {
                    'Content-Type': 'application/json' // Ensure the content type is correct
                }
            })
            .then(response => {
                const detailsColumn = document.getElementById('detailsColumn');
                detailsColumn.classList.add('d-none');
                alert('Image details updated successfully!');
                mediaIndex();
            })
            .catch(error => {
                if (error.response && error.response.data.errors) {
                    // Handle validation errors or other specific errors
                    console.log('Validation errors:', error.response.data.errors);
                    alert('Validation failed. Check the console for errors.');
                } else {
                    // Handle general errors
                    console.error('Update failed:', error);
                    alert('Failed to update image details.');
                }
            });
    }

    function deleteImage(imageId) {
        if (confirm('Are you sure you want to delete this image?')) {
            const imageId = document.getElementById('imageId').value;

            axios.delete(`{{ route('media.destroy', '') }}/${imageId}`)
                .then(response => {

                    // Remove the deleted image from the UI
                    const imageElement = document.querySelector(`img[data-id="${imageId}"]`).closest('.col-12');
                    if (imageElement) {
                        imageElement.remove();
                    }

                    const detailsColumn = document.getElementById('detailsColumn');
                    detailsColumn.classList.add('d-none');

                })
                .catch(error => {
                    console.error('Delete failed:', error);
                    alert('Failed to delete image.');
                });
        }
    }
</script>
