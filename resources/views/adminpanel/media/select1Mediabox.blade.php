<div class="box-heading">
    <div class="box-heading-left">
        <div class="box-title">
            <h4 class="neutral-1000 mb-15">Media Single Select</h4>
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

    <div class="box-heading-right">
        <a class="btn btn-brand-secondary mb-10" href="#" id="selectImagesBtn">
            <svg width="22" height="22" viewbox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path
                    d="M11 0C8.82441 0 6.69767 0.645139 4.88873 1.85383C3.07979 3.06253 1.66989 4.78049 0.83733 6.79048C0.00476617 8.80047 -0.213071 11.0122 0.211367 13.146C0.635804 15.2798 1.68345 17.2398 3.22183 18.7782C4.76021 20.3166 6.72022 21.3642 8.85401 21.7886C10.9878 22.2131 13.1995 21.9952 15.2095 21.1627C17.2195 20.3301 18.9375 18.9202 20.1462 17.1113C21.3549 15.3023 22 13.1756 22 11C21.9966 8.08367 20.8365 5.28778 18.7744 3.22563C16.7122 1.16347 13.9163 0.00344047 11 0ZM16 12H12V16C12 16.2652 11.8946 16.5196 11.7071 16.7071C11.5196 16.8946 11.2652 17 11 17C10.7348 17 10.4804 16.8946 10.2929 16.7071C10.1054 16.5196 10 16.2652 10 16V12H6C5.73479 12 5.48043 11.8946 5.2929 11.7071C5.10536 11.5196 5 11.2652 5 11C5 10.7348 5.10536 10.4804 5.2929 10.2929C5.48043 10.1054 5.73479 10 6 10H10V6C10 5.73478 10.1054 5.48043 10.2929 5.29289C10.4804 5.10536 10.7348 5 11 5C11.2652 5 11.5196 5.10536 11.7071 5.29289C11.8946 5.48043 12 5.73478 12 6V10H16C16.2652 10 16.5196 10.1054 16.7071 10.2929C16.8946 10.4804 17 10.7348 17 11C17 11.2652 16.8946 11.5196 16.7071 11.7071C16.5196 11.8946 16.2652 12 16 12Z"
                    fill="black"></path>
            </svg>
            Selected
        </a>
        <a class="btn btn-brand-secondary mb-10" href="#" id="chooseImagesBtn">
            <svg width="22" height="22" viewbox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path
                    d="M11 0C8.82441 0 6.69767 0.645139 4.88873 1.85383C3.07979 3.06253 1.66989 4.78049 0.83733 6.79048C0.00476617 8.80047 -0.213071 11.0122 0.211367 13.146C0.635804 15.2798 1.68345 17.2398 3.22183 18.7782C4.76021 20.3166 6.72022 21.3642 8.85401 21.7886C10.9878 22.2131 13.1995 21.9952 15.2095 21.1627C17.2195 20.3301 18.9375 18.9202 20.1462 17.1113C21.3549 15.3023 22 13.1756 22 11C21.9966 8.08367 20.8365 5.28778 18.7744 3.22563C16.7122 1.16347 13.9163 0.00344047 11 0ZM16 12H12V16C12 16.2652 11.8946 16.5196 11.7071 16.7071C11.5196 16.8946 11.2652 17 11 17C10.7348 17 10.4804 16.8946 10.2929 16.7071C10.1054 16.5196 10 16.2652 10 16V12H6C5.73479 12 5.48043 11.8946 5.2929 11.7071C5.10536 11.5196 5 11.2652 5 11C5 10.7348 5.10536 10.4804 5.2929 10.2929C5.48043 10.1054 5.73479 10 6 10H10V6C10 5.73478 10.1054 5.48043 10.2929 5.29289C10.4804 5.10536 10.7348 5 11 5C11.2652 5 11.5196 5.10536 11.7071 5.29289C11.8946 5.48043 12 5.73478 12 6V10H16C16.2652 10 16.5196 10.1054 16.7071 10.2929C16.8946 10.4804 17 10.7348 17 11C17 11.2652 16.8946 11.5196 16.7071 11.7071C16.5196 11.8946 16.2652 12 16 12Z"
                    fill="black"></path>
            </svg>
            Upload
        </a>
        <input type="file" id="imageUploadInput" multiple style="display: none;" accept="image/*">
        <span class="p-10">
            <input type="text" placeholder="Search" id="searchMedia"
                style="padding-left: 20px; font-size: 14px; max-width:220px;">
        </span>
    </div>
</div>

<div class="section-box">
    <div class="">
        <div class="row">
            <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                <div class="row" id="imageContainer">

                </div>
            </div>
        </div>
    </div>
</div>
<script>
document.addEventListener('DOMContentLoaded', function() {
    mediaIndex();
});

let selectedImage = null; 

function mediaIndex() {

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

function renderImages(images) {

const imageContainer = document.getElementById('imageContainer');

imageContainer.innerHTML = '';

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
    imgElement.dataset.id = image.id;

    // Add click event to toggle selection
    imgElement.addEventListener('click', function() {
        toggleImageSelection(image);
    });

    mediaItemDiv.appendChild(imgElement);
    colDiv.appendChild(mediaItemDiv);
    imageContainer.appendChild(colDiv);
});

}

function addImageToPreview(image) {
    const imagePreviewContainer = document.getElementById('imagePreviewContainer');

    // Clear existing preview (since only one image can be selected)
    imagePreviewContainer.innerHTML = '';

    const imagePreview = document.createElement('div');
    imagePreview.classList.add('image-preview');

    imagePreview.innerHTML = `
        <div class="box-image-preview position-relative">
            <input type="hidden" name="images" value="${image.id}">
            <img src="/${image.path}${image.file}" alt="${image.alt}" class="img-fluid my-1">
            <a class="remove-link btn-delete-image" href="#">
                <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M9.3335 7.33333V11.3333" stroke="" stroke-linecap="round" stroke-linejoin="round"></path>
                    <path d="M6.6665 7.33333V11.3333" stroke="" stroke-linecap="round" stroke-linejoin="round"></path>
                    <path d="M4 4.66667V12.6667C4 13.403 4.59695 14 5.33333 14H10.6667C11.403 14 12 13.403 12 12.6667V4.66667M1.3335 4.66667H14.6668" stroke="" stroke-linecap="round" stroke-linejoin="round"></path>
                </svg>
            </a>
        </div>
    `;

    // Remove image from preview when clicking the close icon
    imagePreview.querySelector('.remove-link').addEventListener('click', function(e) {
        e.preventDefault();
        imagePreviewContainer.innerHTML = ''; // Clear the preview
        selectedImage = null; // Reset selected image
    });

    // Append the image preview to the container
    imagePreviewContainer.appendChild(imagePreview);
}

function toggleImageSelection(image) {
    const mediaItemDiv = document.querySelector(`img[data-id="${image.id}"]`).parentElement;

    // If the image is already selected, unselect it
    if (selectedImage && selectedImage.id === image.id) {
        selectedImage = null;
        mediaItemDiv.style.border = ''; // Remove the selection border
        mediaItemDiv.classList.add('border');
    } else {
        // Clear previous selection if another image is selected
        if (selectedImage) {
            const prevSelectedMediaItemDiv = document.querySelector(`img[data-id="${selectedImage.id}"]`).parentElement;
            prevSelectedMediaItemDiv.style.border = ''; // Remove the selection border
            prevSelectedMediaItemDiv.classList.add('border');
        }

        // Select the new image
        selectedImage = image;
        mediaItemDiv.style.border = '3px solid green'; // Indicate the new selection
        mediaItemDiv.classList.remove('border');
    }
}

document.getElementById('selectImagesBtn').addEventListener('click', function(event) {
    event.preventDefault();

    if (selectedImage) {
        addImageToPreview(selectedImage);
    }

    selectedImage = null;

    const uploadModal = bootstrap.Modal.getInstance(document.getElementById('uploadModal'));
    if (uploadModal) {
        uploadModal.hide();
    } else {
        const newUploadModal = new bootstrap.Modal(document.getElementById('uploadModal'));
        newUploadModal.hide();
    }

    document.querySelectorAll('.media-item').forEach(item => {
        item.style.border = ''; // Reset border for all media items
        item.classList.add('border');
    });
});

document.getElementById('chooseImagesBtn').addEventListener('click', function(event) {
    event.preventDefault();
    document.getElementById('imageUploadInput').click();
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
            // Handle success
            mediaIndex();
        })
        .catch(function(error) {
            // Handle error
            console.error(error);
        });
});

</script>
