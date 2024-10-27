//vehicle_post edit js

// document.addEventListener('DOMContentLoaded', (event) => {
//     // Tag Input
//     const tagInput = document.getElementById('tag-input');
//     const tagsContainer = document.getElementById('tags-container');
//     const hiddenTagsInput = document.getElementById('tags-hidden-input');

//     let tags = hiddenTagsInput.value ? hiddenTagsInput.value.split(',') : [];

//     function updateTags() {
//         tagsContainer.innerHTML = '';

//         tags.forEach((tag, index) => {
//             const tagElement = createTagElement(tag, index);
//             tagsContainer.appendChild(tagElement);
//         });

//         hiddenTagsInput.value = tags.join(',');
//     }

//     function addTag(tag) {
//         if (tag && !tags.includes(tag)) {
//             tags.push(tag);
//             updateTags();
//         }
//     }

//     tagInput.addEventListener('keypress', (e) => {
//         if (e.key === ',' || e.key === 'Enter') {
//             e.preventDefault();
//             const tag = tagInput.value.trim().replace(',', '');
//             addTag(tag);
//             tagInput.value = '';
//         }
//     });

//     tagInput.addEventListener('blur', () => {
//         const tag = tagInput.value.trim();
//         if (tag) {
//             addTag(tag);
//             tagInput.value = '';
//         }
//     });

//     function createTagElement(tag, index) {
//         const tagElement = document.createElement('div');
//         tagElement.classList.add('tag');
//         tagElement.textContent = tag;

//         const removeButton = document.createElement('span');
//         removeButton.textContent = 'x';
//         removeButton.classList.add('remove-tag');
//         removeButton.addEventListener('click', () => {
//             removeTag(index);
//         });

//         tagElement.appendChild(removeButton);
//         return tagElement;
//     }

//     function removeTag(index) {
//         tags.splice(index, 1);
//         updateTags();
//     }

//     updateTags();

//     // Keyword Input
//     const keywordInput = document.getElementById('keyword-input');
//     const keywordsContainer = document.getElementById('keywords-container');
//     const hiddenKeywordsInput = document.getElementById('keywords-hidden-input');

//     let keywords = hiddenKeywordsInput.value ? hiddenKeywordsInput.value.split(',') : [];

//     function updateKeywords() {
//         keywordsContainer.innerHTML = '';

//         keywords.forEach((keyword, index) => {
//             const keywordElement = createKeywordElement(keyword, index);
//             keywordsContainer.appendChild(keywordElement);
//         });

//         hiddenKeywordsInput.value = keywords.join(',');
//     }

//     function addKeyword(keyword) {
//         if (keyword && !keywords.includes(keyword)) {
//             keywords.push(keyword);
//             updateKeywords();
//         }
//     }

//     keywordInput.addEventListener('keypress', (e) => {
//         if (e.key === ',' || e.key === 'Enter') {
//             e.preventDefault();
//             const keyword = keywordInput.value.trim().replace(',', '');
//             addKeyword(keyword);
//             keywordInput.value = '';
//         }
//     });

//     keywordInput.addEventListener('blur', () => {
//         const keyword = keywordInput.value.trim();
//         if (keyword) {
//             addKeyword(keyword);
//             keywordInput.value = '';
//         }
//     });

//     function createKeywordElement(keyword, index) {
//         const keywordElement = document.createElement('div');
//         keywordElement.classList.add('keyword');
//         keywordElement.textContent = keyword;

//         const removeButton = document.createElement('span');
//         removeButton.textContent = 'x';
//         removeButton.classList.add('remove-keyword');
//         removeButton.addEventListener('click', () => {
//             removeKeyword(index);
//         });

//         keywordElement.appendChild(removeButton);
//         return keywordElement;
//     }

//     function removeKeyword(index) {
//         keywords.splice(index, 1);
//         updateKeywords();
//     }

//     updateKeywords();
// });


//vehicle_post edit js end


//vehicle_post create js start

document.addEventListener('DOMContentLoaded', function() {
    const extraServicesContainer = document.getElementById('extra-services');
    const addMoreButton = document.querySelector('.btn-add');

    // Function to create a new service item
    function createServiceItem() {
        const newItem = document.createElement('div');
        newItem.classList.add('item-extra-service');
        newItem.innerHTML = `
    <div class="item-extra-2">
        <input class="form-control" name="value[]" type="text" placeholder="Value">
    </div>
    <div class="item-extra-3">
        <a class="btn-remove" href="#">
            <svg width="22" height="22" viewbox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M12.7778 10.1111V15.4444" stroke="" stroke-width="1.33333" stroke-linecap="round" stroke-linejoin="round"></path>
                <path d="M9.22217 10.1111V15.4444" stroke="" stroke-width="1.33333" stroke-linecap="round" stroke-linejoin="round"></path>
                <path d="M5.66699 6.55556V17.2222C5.66699 18.2041 6.46293 19 7.44477 19H14.5559C15.5377 19 16.3337 18.2041 16.3337 17.2222V6.55556" stroke="" stroke-width="1.33333" stroke-linecap="round" stroke-linejoin="round"></path>
                <path d="M3.88916 6.55556H18.1114" stroke="" stroke-width="1.33333" stroke-linecap="round" stroke-linejoin="round"></path>
                <path d="M6.55566 6.55556L8.33344 3H13.6668L15.4446 6.55556" stroke="" stroke-width="1.33333" stroke-linecap="round" stroke-linejoin="round"></path>
            </svg>
        </a>
    </div>
`;
        extraServicesContainer.appendChild(newItem);
    }

    // Function to remove a service item
    function removeServiceItem(event) {
        event.preventDefault();
        const itemToRemove = event.target.closest('.item-extra-service');
        if (itemToRemove) {
            itemToRemove.remove();
        }
    }

    // Event listener for "Add More" button
    addMoreButton.addEventListener('click', function(event) {
        event.preventDefault();
        createServiceItem();
    });

    // Event delegation for removing items
    extraServicesContainer.addEventListener('click', function(event) {
        if (event.target.closest('.btn-remove')) {
            removeServiceItem(event);
        }
    });
});


//vehicle_post create js end

//Post create js start
document.addEventListener('DOMContentLoaded', function () {
    const input = document.getElementById('imageInput');
    const preview = document.getElementById('imagePreview');

    input.addEventListener('change', function () {
        const file = this.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function (e) {
                preview.src = e.target.result;
                preview.style.display = 'block'; // Show the image preview
            };
            reader.readAsDataURL(file);
        } else {
            preview.src = '#';
            preview.style.display = 'none'; // Hide the image preview if no file selected
        }
    });
});


//media js start



//media js end

//=======================call the media model to select files ======================
document.querySelector('.item-upload-image').addEventListener('click', function() {
    var uploadModal = new bootstrap.Modal(document.getElementById('uploadModal'));
    uploadModal.show();
});
document.querySelector('#upload-image-2').addEventListener('click', function() {
    var uploadModal = new bootstrap.Modal(document.getElementById('uploadModal'));
    uploadModal.show();
});
document.querySelector('#upload-image-3').addEventListener('click', function() {
    var uploadModal = new bootstrap.Modal(document.getElementById('uploadModal'));
    uploadModal.show();
});
document.querySelector('#upload-image-4').addEventListener('click', function() {
    var uploadModal = new bootstrap.Modal(document.getElementById('uploadModal'));
    uploadModal.show();
});