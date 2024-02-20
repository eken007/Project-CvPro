const imgDiv = document.querySelector('profil-pic-div');
const img = document.querySelector('#photo');
const file = document.querySelector('#avatar');
const uploadBtn = document.querySelector('#uploadBtn');

file.addEventListener('change', function(){
    const choosedFile = this.files[0];

    if(choosedFile) {
        const reader = new FileReader();

        reader.addEventListener('load', function(){
            img.setAttribute('src',reader.result);
        });

        reader.readAsDataURL(choosedFile);
    }
})
