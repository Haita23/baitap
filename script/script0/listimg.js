var img = document.querySelector('.img-product')
var listImg = document.querySelectorAll('.list_view_full_size img')

listImg.forEach(imgElement=>{
    imgElement.addEventListener('click', e=>{
        img.src = e.target.getAttribute('src')
        
    })
})