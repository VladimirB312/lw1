let titleField = document.getElementById('titleField')
let postTitle = document.getElementById('postTitle')
let cardTitle = document.getElementById('cardTitle')

let descriptionField = document.getElementById('descriptionField')
let postDescription = document.getElementById('postDescription')
let cardDescription = document.getElementById('cardDescription')

let authorNameField = document.getElementById('authorNameField')
let cardAuthorName = document.getElementById('cardAuthorName')

titleField.oninput = function () {
  postTitle.textContent = cardTitle.textContent = titleField.value
}

descriptionField.oninput = function () {
  postDescription.textContent = cardDescription.textContent = descriptionField.value
}

authorNameField.oninput = function () {
  cardAuthorName.textContent = authorNameField.value
}


function previewAuthorPhoto() {
  const preview = document.getElementById('loadedAuthorPhoto');
  const photoIcon = document.getElementById('photoIcon');
  const labelNew = document.getElementById('labelNew');
  const removeButton = document.getElementById('removeButtonInField');
  const cardPhoto = document.getElementById('cardPhoto');
  const file = document.getElementById('uploadAuhorPhotoButton').files[0];
  const reader = new FileReader();


  reader.addEventListener(
    "load",
    () => {
      // Конвертация изображения в base64-строку
      preview.src = cardPhoto.src = reader.result;
      preview.classList.remove('post__author-loaded-photo_disabled');
      photoIcon.classList.add('post__author-photo-icon_disabled');
      labelNew.classList.add('post__author-photo-upload-label-new');
      labelNew.textContent = 'Upload New';
      removeButton.classList.remove('post__author-photo-remove-button_disabled');
    },
    false,
  );

  if (file) {
    reader.readAsDataURL(file)
  }
}

let removeButton = document.getElementById('removeButtonInField');

removeButton.onclick = function () {
  const preview = document.getElementById('loadedAuthorPhoto');
  const photoIcon = document.getElementById('photoIcon');
  const cardPhoto = document.getElementById('cardPhoto');
  const labelNew = document.getElementById('labelNew');
  const removeButton = document.getElementById('removeButtonInField');
  const file = document.getElementById('uploadAuhorPhotoButton');

  file.value = '';
  preview.src = '#';
  cardPhoto.src = '/images/plug.png';
  preview.classList.add('post__author-loaded-photo_disabled');
  photoIcon.classList.remove('post__author-photo-icon_disabled');
  labelNew.classList.remove('post__author-photo-upload-label-new');
  labelNew.textContent = 'Upload';
  removeButton.classList.add('post__author-photo-remove-button_disabled');
}


// HERO IMAGES

function previewHeroImage() {
  const preview = document.getElementById('heroImage');
  const file = document.getElementById('heroImageField').files[0];
  const labelImageField = document.getElementById('labelImageField');
  const removeHeroImage = document.getElementById('removeHeroImage');
  const descHeroImageFormat = document.getElementById('descHeroImageFormat');
  const postPreviewHeroImage = document.getElementById('previewHeroImage');
  const reader = new FileReader();

  reader.addEventListener(
    "load",
    () => {
      // Конвертация изображения в base64-строку
      preview.src = postPreviewHeroImage.src = reader.result;
      preview.classList.remove('disable');
      labelImageField.classList.add('upload-area_loaded');
      removeHeroImage.classList.remove('disable');
      descHeroImageFormat.classList.add('disable');
      postPreviewHeroImage.classList.remove('disable');
    },
    false,
  );

  if (file) {
    reader.readAsDataURL(file);
  }
}

let removeHeroImage = document.getElementById('removeHeroImage');

removeHeroImage.onclick = function () {
  event.preventDefault();
  const preview = document.getElementById('heroImage');
  const file = document.getElementById('heroImageField');
  const labelImageField = document.getElementById('labelImageField');
  const removeHeroImage = document.getElementById('removeHeroImage');
  const descHeroImageFormat = document.getElementById('descHeroImageFormat');
  const postPreviewHeroImage = document.getElementById('previewHeroImage');

  preview.src = postPreviewHeroImage.src = '#';
  file.value = '';
  preview.classList.add('disable');
  labelImageField.classList.remove('upload-area_loaded');
  removeHeroImage.classList.add('disable');
  descHeroImageFormat.classList.remove('disable');
  postPreviewHeroImage.classList.add('disable');
}




function previewHeroSmallImage() {
  const preview = document.getElementById('heroSmallImage');
  const file = document.getElementById('heroSmallImageField').files[0];
  const labelImageField = document.getElementById('labelSmallImageField');
  const removeHeroImage = document.getElementById('removeHeroSmallImage');
  const descHeroImageFormat = document.getElementById('descHeroSmallImageFormat');
  const postPreviewHeroImage = document.getElementById('previewHeroSmallImage');
  const reader = new FileReader();

  reader.addEventListener(
    "load",
    () => {
      // Конвертация изображения в base64-строку
      preview.src = postPreviewHeroImage.src = reader.result;
      preview.classList.remove('disable');
      labelImageField.classList.add('upload-area_loaded');
      removeHeroImage.classList.remove('disable');
      descHeroImageFormat.classList.add('disable');
      postPreviewHeroImage.classList.remove('disable');
    },
    false,
  );

  if (file) {
    reader.readAsDataURL(file);
  }
}

let removeHeroSmallImage = document.getElementById('removeHeroSmallImage');

removeHeroSmallImage.onclick = function () {
  event.preventDefault();
  console.log('123')
  const preview = document.getElementById('heroSmallImage');
  const file = document.getElementById('heroSmallImageField');
  const labelImageField = document.getElementById('labelSmallImageField');
  const removeHeroImage = document.getElementById('removeHeroSmallImage');
  const descHeroImageFormat = document.getElementById('descHeroSmallImageFormat');
  const postPreviewHeroImage = document.getElementById('previewHeroSmallImage');

  preview.src = postPreviewHeroImage.src = '#';
  file.value = '';
  preview.classList.add('disable');
  labelImageField.classList.remove('upload-area_loaded');
  removeHeroImage.classList.add('disable');
  descHeroImageFormat.classList.remove('disable');
  postPreviewHeroImage.classList.add('disable');
}


// Дата
let cardDate = document.getElementById('cardDate');
let dateField = document.getElementById('dateField');

dateField.oninput = function () {
  cardDate.textContent = dateField.value;
}