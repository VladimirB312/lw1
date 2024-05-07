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

removeButton.onclick = function() {
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