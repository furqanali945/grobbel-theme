let productCategoryMain = document.getElementById('main_product_loop_grid'); 
if (productCategoryMain.textContent.trim() === '') {
    let noProduct = document.createElement("p");
    noProduct.classList.add("no_product_found"); 
    let noProductText = document.createTextNode("No Products matching the criteria were found.");
    noProduct.appendChild(noProductText);
    productCategoryMain.appendChild(noProduct);
}