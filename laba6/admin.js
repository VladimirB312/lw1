document.addEventListener("DOMContentLoaded", () => {
    const postData = {
        title: '',
        description: '',
        authorPhoto: '',
        publishDate: '',
        heroImage: '',
        cardHeroImage: '',
        postTextContent: '',
    }
    
    const postPreview = {
        postTitle: document.getElementById('postTitle'),
        cardTitle: document.getElementById('cardTitle')
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

        rerenderPostPreview();
    }

    function handleInputDescription(event) {
        postData.description = descriptionField.value;

        rerenderPostPreview();
    }

    function handleInputAuthorName(event) {
        postData.authorName = authorNameField.value;

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

        loadedAuthorPhoto.classList.remove('post__author-loaded-photo_disabled');
        photoIcon.classList.add('post__author-photo-icon_disabled');
        labelNew.classList.add('post__author-photo-upload-label-new');
        labelNew.textContent = buttonUploadNewText;
        removeAuthorPhotoButton.classList.remove('post__author-photo-remove-button_disabled');
    }

    function handleRemoveAuthorPhoto(event) {
        postData.authorPhoto = '';
        loadedAuthorPhoto.classList.add('post__author-loaded-photo_disabled');
        photoIcon.classList.remove('post__author-photo-icon_disabled');
        labelNew.classList.remove('post__author-photo-upload-label-new');
        labelNew.textContent = buttonUploadText;
        removeAuthorPhotoButton.classList.add('post__author-photo-remove-button_disabled');

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


        loadedHeroImage.classList.remove('disable');
        labelImageField.classList.add('upload-area_loaded');
        removeHeroImageButton.classList.remove('disable');
        descHeroImageFormat.classList.add('disable');
    }

    function handleRemoveHeroImage(event) {
        postData.heroImage = '';
        loadedHeroImage.classList.add('disable');
        labelImageField.classList.remove('upload-area_loaded');
        removeHeroImageButton.classList.add('disable');
        descHeroImageFormat.classList.remove('disable');

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

        loadedHeroSmallImage.classList.remove('disable');
        labelSmallImageField.classList.add('upload-area_loaded');
        removeHeroSmallImage.classList.remove('disable');
        descHeroSmallImageFormat.classList.add('disable');
    }

    function handleRemoveHeroSmallImage(event) {
        postData.cardHeroImage = '';
        loadedHeroSmallImage.classList.add('disable');
        labelSmallImageField.classList.remove('upload-area_loaded');
        removeHeroSmallImage.classList.add('disable');
        descHeroSmallImageFormat.classList.remove('disable');

        rerenderPostPreview();
    }

    function handleChangePublishDate(event) {
        postData.publishDate = dateField.value;

        rerenderPostPreview();
    }

    function handleChangeContentText(event) {
        postData.postTextContent = contentText.value;

        rerenderPostPreview();
    }

    function handlePublishPostButton(event) {
        event.preventDefault();

        if (postData.title.length > 5 &&
            postData.description.length > 5 &&
            postData.authorPhoto != '' &&
            postData.heroImage != '' &&
            postData.cardHeroImage != '' &&
            postData.publishDate != '' &&
            postData.postTextContent.length > 5
        ) {
            console.log(JSON.stringify(postData));
            publishCompleteMessage.classList.remove('disable'); 
            publishErrorMessage.classList.add('disable');           
        } else {
            publishErrorMessage.classList.remove('disable');
        }

        rerenderPostPreview();
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
        contentText.addEventListener('change', handleChangeContentText);
        publishButton.addEventListener('click', handlePublishPostButton);
    }


    function rerenderPostPreview() {
        postPreview.postTitle.textContent = postData.title;
        postPreview.cardTitle.textContent = postData.title

        const postDescription = document.getElementById('postDescription')
        const cardDescription = document.getElementById('cardDescription')
        postDescription.textContent = postData.description;
        cardDescription.textContent = postData.description;

        const cardAuthorName = document.getElementById('cardAuthorName');
        cardAuthorName.textContent = postData.authorName;

        const cardPhoto = document.getElementById('cardAuthorPhoto');

        if (postData.authorPhoto != '') {
            cardPhoto.style.backgroundImage = 'url(' + postData.authorPhoto + ')';
            loadedAuthorPhoto.src = postData.authorPhoto;
        } else {
            cardPhoto.style.backgroundImage = 'none';
            loadedAuthorPhoto.src = '#';
            uploadAuhorPhotoButton.value = '';
        }

        const postPreviewHeroImage = document.getElementById('previewHeroImage');

        if (postData.heroImage != '') {
            postPreviewHeroImage.style.backgroundImage = 'url(' + postData.heroImage + ')';
            loadedHeroImage.src = postData.heroImage;
        } else {
            postPreviewHeroImage.style.backgroundImage = 'none';
            loadedHeroImage.src = '#';
            uploadHeroImageButton.value = '';
        }

        const cardPreviewHeroImage = document.getElementById('previewHeroSmallImage');

        if (postData.cardHeroImage != '') {
            cardPreviewHeroImage.style.backgroundImage = 'url(' + postData.cardHeroImage + ')';
            loadedHeroSmallImage.src = postData.cardHeroImage;
        } else {
            cardPreviewHeroImage.style.backgroundImage = 'none';
            loadedHeroSmallImage.src = '#';
            uploadHeroSmallImageButton.value = '';
        }

        const cardDatePreview = document.getElementById('cardDate');
        cardDatePreview.textContent = postData.publishDate;
    }

    initEventListeners()
    rerenderPostPreview()
});