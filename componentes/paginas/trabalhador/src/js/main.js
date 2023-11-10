const userPadrao = '<img class="picture_img rounded-circle w-100" src="src/assets/user.jpg" alt="imagem de usuário.">';
const inputFile = document.querySelector("#picture_input");
const pictureImage = document.querySelector("#picture_img");

function displayImageFromLocalStorage() {
  if (localStorage.getItem('imageUser')) {
    const img = document.createElement('img');
    img.src = localStorage.getItem('imageUser');
    img.classList.add('w-100', 'rounded-circle');
    pictureImage.innerHTML = '';
    pictureImage.appendChild(img);
  } else {
    pictureImage.innerHTML = userPadrao;
  }
}

function displayUserDataFromLocalStorage() {
  const userName = localStorage.getItem("userName");
  const userAge = localStorage.getItem("userAge");
  const userLocation = localStorage.getItem("userLocation");
  const userProfession = localStorage.getItem("userProfession");
  const userNumberDocument = localStorage.getItem("userNumberDocument");
  const userPhone = localStorage.getItem("userPhone");
  const userBio = localStorage.getItem("userBio");

  if (userName !== null) {
    document.querySelector("#userName").textContent = userName;
    document.querySelector("#profileName").textContent = userName;
  }
  if (userAge !== null) {
    document.querySelector("#userAge").textContent = userAge;
  }
  if (userLocation !== null) {
    document.querySelector("#userLocation").textContent = userLocation;
  }
  if (userProfession !== null) {
    document.querySelector("#userProfession").textContent = userProfession;
  }
  if (userNumberDocument !== null) {
    document.querySelector("#userNumberDocument").textContent = userNumberDocument;
  }
  if (userPhone !== null) {
    document.querySelector("#userPhone").textContent = userPhone;
  }
  if (userBio !== null) {
    document.querySelector("#userBio").textContent = userBio;
  }
}

displayImageFromLocalStorage();
displayUserDataFromLocalStorage();

inputFile.addEventListener('change', function (e) {
  const inputTarget = e.target;
  const file = inputTarget.files[0];

  if (file) {
    const reader = new FileReader();
    reader.addEventListener('load', function (e) {
      const readerTarget = e.target;

      const img = document.createElement('img');
      img.src = readerTarget.result;

      img.classList.add('w-100', 'rounded-circle');
      pictureImage.innerHTML = '';
      pictureImage.appendChild(img);

      localStorage.setItem('imageUser', readerTarget.result);
    })
    reader.readAsDataURL(file);
  } else {
    displayImageFromLocalStorage();
  }
});

const btnSubmit = document.querySelector("#btnSubmit");

btnSubmit.addEventListener("click", () => {
    const userName = document.querySelector("#name").value;
    const userAge = document.querySelector("#age").value;
    const userLocation = document.querySelector("#location").value;
    const userProfession = document.querySelector("#profession").value;
    const userNumberDocument = document.querySelector("#numberDocument").value;
    const userPhone = document.querySelector("#phone").value;
    const userBio = document.querySelector("#bio").value;
  
    if (userName !== null && userName != undefined && userName != '') {
      localStorage.setItem("userName", userName);
    }
    if (userAge !== null && userAge != undefined) {
      localStorage.setItem("userAge", userAge);
    }
    if (userLocation !== null && userLocation != undefined && userLocation != '') {
      localStorage.setItem("userLocation", userLocation);
    }
    if (userProfession !== null && userProfession != undefined && userProfession != '') {
      localStorage.setItem("userProfession", userProfession);
    }
    if (userNumberDocument !== null && userNumberDocument != undefined && userNumberDocument != '') {
      localStorage.setItem("userNumberDocument", userNumberDocument);
    }
    if (userPhone !== null && userPhone != undefined && userPhone != '') {
      localStorage.setItem("userPhone", userPhone);
    }
    if (userBio !== null && userBio != undefined && userBio != '') {
      localStorage.setItem("userBio", userBio);
    }
  
    displayUserDataFromLocalStorage();
  });

