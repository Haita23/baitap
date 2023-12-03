function searchfunc(){
    let menusearch = document.querySelector("#inp-search");
    let menuitem = Array.from(document.querySelectorAll(".item_product_main"));
    
    // ẩn đi và hiện khi search
    menuitem.forEach(function(el){
        let text = el.innerText;
        if(text.indexOf(menusearch.value)>-1)
        el.style.display = "";
        else el.style.display = "none";
    })
}