document.addEventListener("DOMContentLoaded", () => {
    const postData = {
        title: '',
        description: '',
        authorName: '',
        authorPhoto: '',
        publishDate: '',
        heroImage: '',
        heroImageAlt: '',
        cardHeroImage: '',
        postTextContent: '',
        featured: 0,
        recent: 1,
        sticker: '',
    }

    const postPreview = {
        postTitle: document.getElementById('postTitle'),
        cardTitle: document.getElementById('cardTitle'),
        postDescription: document.getElementById('postDescription'),
        cardDescription: document.getElementById('cardDescription'),
        cardAuthorName: document.getElementById('cardAuthorName'),
        cardPhoto: document.getElementById('cardAuthorPhoto'),
        postPreviewHeroImage: document.getElementById('previewHeroImage'),
        cardPreviewHeroImage: document.getElementById('previewHeroSmallImage'),
        cardDatePreview: document.getElementById('cardDate'),
    }

    function readFileAsBase64(file, onLoad) {
        const reader = new FileReader();

        reader.addEventListener("load", () => {
            onLoad(reader.result)
        });

        reader.readAsDataURL(file)
    }

    function handleInputTitle(event) {
        postData.title = titleField.value;
        titleError.classList.add('hidden');
        titleField.classList.remove('red-border-bottom');

        rerenderPostPreview();
    }

    function handleInputDescription(event) {
        postData.description = descriptionField.value;
        descriptionError.classList.add('hidden');
        descriptionField.classList.remove('red-border-bottom');

        rerenderPostPreview();
    }

    function handleInputAuthorName(event) {
        postData.authorName = authorNameField.value;
        authorNameError.classList.add('hidden');
        authorNameField.classList.remove('red-border-bottom');

        rerenderPostPreview();
    }

    function handleChangeAuthorPhoto(event) {
        const tempFile = uploadAuhorPhotoButton.files[0]

        readFileAsBase64(
            tempFile,
            (base64) => {
                postData.authorPhoto = base64;

                rerenderPostPreview()
            })

        loadedAuthorPhoto.classList.remove('hidden');
        photoIcon.classList.add('hidden');
        labelNew.classList.add('post__author-photo-upload-label-new');
        labelNew.textContent = buttonUploadNewText;
        removeAuthorPhotoButton.classList.remove('hidden');
    }

    function handleRemoveAuthorPhoto(event) {
        postData.authorPhoto = '';
        loadedAuthorPhoto.classList.add('hidden');
        photoIcon.classList.remove('hidden');
        labelNew.classList.remove('post__author-photo-upload-label-new');
        labelNew.textContent = buttonUploadText;
        removeAuthorPhotoButton.classList.add('hidden');

        rerenderPostPreview();
    }


    function handleChangeHeroImage(event) {
        const tempFile = uploadHeroImageButton.files[0]

        readFileAsBase64(
            tempFile,
            (base64) => {
                postData.heroImage = base64;

                rerenderPostPreview()
            }
        )

        loadedHeroImage.classList.remove('hidden');
        labelImageField.classList.add('upload-area_loaded');
        removeHeroImageButton.classList.remove('hidden');
        descHeroImageFormat.classList.add('hidden');
    }

    function handleRemoveHeroImage(event) {
        postData.heroImage = '';
        loadedHeroImage.classList.add('hidden');
        labelImageField.classList.remove('upload-area_loaded');
        removeHeroImageButton.classList.add('hidden');
        descHeroImageFormat.classList.remove('hidden');

        rerenderPostPreview();
    }

    function handleChangeHeroSmallImage(event) {
        const tempFile = uploadHeroSmallImageButton.files[0]

        readFileAsBase64(
            tempFile,
            (base64) => {
                postData.cardHeroImage = base64;

                rerenderPostPreview()
            })

        loadedHeroSmallImage.classList.remove('hidden');
        labelSmallImageField.classList.add('upload-area_loaded');
        removeHeroSmallImage.classList.remove('hidden');
        descHeroSmallImageFormat.classList.add('hidden');
    }

    function handleRemoveHeroSmallImage(event) {
        postData.cardHeroImage = '';
        loadedHeroSmallImage.classList.add('hidden');
        labelSmallImageField.classList.remove('upload-area_loaded');
        removeHeroSmallImage.classList.add('hidden');
        descHeroSmallImageFormat.classList.remove('hidden');

        rerenderPostPreview();
    }

    function handleChangePublishDate(event) {
        postData.publishDate = dateField.value;
        publishDateError.classList.add('hidden');
        dateField.classList.remove('red-border-bottom');

        rerenderPostPreview();
    }

    function handleChangeContentText(event) {
        postData.postTextContent = contentText.value;
        contentTextError.classList.add('hidden');
        contentText.classList.remove('red-border');

        rerenderPostPreview();
    }

    function handlePublishPostButton(event) {
        event.preventDefault();

        if (validatePostData()) {
            postJSON(postData);
            publishCompleteMessage.classList.remove('hidden');
            publishErrorMessage.classList.add('hidden');
        } else {
            publishErrorMessage.classList.remove('hidden');
        }
        validatePostData()
        rerenderPostPreview();
    }

    async function postJSON(data) {
        try {
            const response = await fetch("/api.php", {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                },
                body: JSON.stringify(data),
            });

            const result = await response.json();
            console.log("Success:", result);
        } catch (error) {
            console.error("Error:", error);
        }
    }

    function validatePostData() {
        let isValidPost = true;

        if (postData.title.length < 5) {
            isValidPost = false;
            titleError.classList.remove('hidden');
            titleField.classList.add('red-border-bottom');
        }

        if (postData.description.length < 5) {
            isValidPost = false;
            descriptionError.classList.remove('hidden');
            descriptionField.classList.add('red-border-bottom');
        }

        if (postData.authorName.length < 5) {
            isValidPost = false;
            authorNameError.classList.remove('hidden');
            authorNameField.classList.add('red-border-bottom');
        }

        if (postData.publishDate === '') {
            isValidPost = false;
            publishDateError.classList.remove('hidden');
            dateField.classList.add('red-border-bottom');
        }

        if (postData.postTextContent.length < 5) {
            isValidPost = false;
            contentTextError.classList.remove('hidden');
            contentText.classList.add('red-border');
        }

        if (postData.authorPhoto === '' ||
            postData.heroImage === '' ||
            postData.cardHeroImage === ''
        ) {
            isValidPost = false;
        }

        return isValidPost;
    }

    async function logout() {
        try {
            const response = await fetch("/api/logout.php", {
                method: "POST",
            });

            if (!response.ok) {
                const result = await response.text(); 
                throw new Error(result)   
            } else {
                const result = await response.url;
                console.log("Success:", result);
                window.location.href = result;
            }
            
        } catch (error) {
            // console.error("Error:", error.message);      
            alert(error.message);  
        }
    }

    function handleLogout(event) {
        logout();
    }

    const titleField = document.getElementById('titleField');
    const descriptionField = document.getElementById('descriptionField');
    const authorNameField = document.getElementById('authorNameField');

    const uploadAuhorPhotoButton = document.getElementById('uploadAuhorPhotoButton');
    const loadedAuthorPhoto = document.getElementById('loadedAuthorPhoto');
    const photoIcon = document.getElementById('photoIcon');
    const labelNew = document.getElementById('labelNew');
    const removeAuthorPhotoButton = document.getElementById('removeButtonInField');
    const buttonUploadNewText = 'Upload New';
    const buttonUploadText = 'Upload';

    const uploadHeroImageButton = document.getElementById('heroImageField');
    const loadedHeroImage = document.getElementById('heroImage');
    const labelImageField = document.getElementById('labelImageField');
    const descHeroImageFormat = document.getElementById('descHeroImageFormat');
    const removeHeroImageButton = document.getElementById('removeHeroImage');

    const uploadHeroSmallImageButton = document.getElementById('heroSmallImageField');
    const loadedHeroSmallImage = document.getElementById('heroSmallImage');
    const labelSmallImageField = document.getElementById('labelSmallImageField');
    const descHeroSmallImageFormat = document.getElementById('descHeroSmallImageFormat');
    const removeHeroSmallImage = document.getElementById('removeHeroSmallImage');

    const dateField = document.getElementById('dateField');

    const contentText = document.getElementById('contentText');

    const publishButton = document.getElementById('publishButton');
    const publishCompleteMessage = document.getElementById('publishCompleteMessage');
    const publishErrorMessage = document.getElementById('publishErrorMessage');

    const logoutButton = document.getElementById('logoutButton');

    //константы для подсветки ошибок   
    const titleError = document.getElementById('titleError');
    const descriptionError = document.getElementById('descriptionError');
    const authorNameError = document.getElementById('authorNameError');
    const publishDateError = document.getElementById('publishDateError');
    const contentTextError = document.getElementById('contentTextError');

    function initEventListeners() {
        titleField.addEventListener('input', handleInputTitle);
        descriptionField.addEventListener('input', handleInputDescription);
        authorNameField.addEventListener('input', handleInputAuthorName);
        uploadAuhorPhotoButton.addEventListener('change', handleChangeAuthorPhoto);
        removeAuthorPhotoButton.addEventListener('click', handleRemoveAuthorPhoto);
        uploadHeroImageButton.addEventListener('change', handleChangeHeroImage);
        removeHeroImageButton.addEventListener('click', handleRemoveHeroImage);
        uploadHeroSmallImageButton.addEventListener('change', handleChangeHeroSmallImage);
        removeHeroSmallImage.addEventListener('click', handleRemoveHeroSmallImage);
        dateField.addEventListener('change', handleChangePublishDate);
        contentText.addEventListener('input', handleChangeContentText);
        publishButton.addEventListener('click', handlePublishPostButton);
        logoutButton.addEventListener('click', handleLogout);
    }

    function rerenderPostPreview() {
        postPreview.postTitle.textContent = postData.title;
        postPreview.cardTitle.textContent = postData.title

        postPreview.postDescription.textContent = postData.description;
        postPreview.cardDescription.textContent = postData.description;

        postPreview.cardAuthorName.textContent = postData.authorName;

        if (postData.authorPhoto != '') {
            postPreview.cardPhoto.style.backgroundImage = 'url(' + postData.authorPhoto + ')';
            loadedAuthorPhoto.src = postData.authorPhoto;
        } else {
            postPreview.cardPhoto.style.backgroundImage = 'none';
            loadedAuthorPhoto.src = '#';
            uploadAuhorPhotoButton.value = '';
        }

        if (postData.heroImage != '') {
            postPreview.postPreviewHeroImage.style.backgroundImage = 'url(' + postData.heroImage + ')';
            loadedHeroImage.src = postData.heroImage;
        } else {
            postPreview.postPreviewHeroImage.style.backgroundImage = 'none';
            loadedHeroImage.src = '#';
            uploadHeroImageButton.value = '';
        }

        if (postData.cardHeroImage != '') {
            postPreview.cardPreviewHeroImage.style.backgroundImage = 'url(' + postData.cardHeroImage + ')';
            loadedHeroSmallImage.src = postData.cardHeroImage;
        } else {
            postPreview.cardPreviewHeroImage.style.backgroundImage = 'none';
            loadedHeroSmallImage.src = '#';
            uploadHeroSmallImageButton.value = '';
        }

        postPreview.cardDatePreview.textContent = postData.publishDate;
    }

    initEventListeners()
    rerenderPostPreview()
});