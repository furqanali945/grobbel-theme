let productCategoryMain = document.getElementById('main_guide_loop_grid'); 
if (productCategoryMain.textContent.trim() === '') {
    let noProduct = document.createElement("p");
    noProduct.classList.add("no_product_found"); 
    let noProductText = document.createTextNode("No Guides matching the criteria were found.");
    noProduct.appendChild(noProductText);
    productCategoryMain.appendChild(noProduct);
}