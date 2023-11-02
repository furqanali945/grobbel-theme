let productCategoryMain = document.getElementById('main_recipe_loop_grid'); 
if (productCategoryMain.textContent.trim() === '') {
    let noProduct = document.createElement("p");
    noProduct.classList.add("no_recipe_found"); 
    let noProductText = document.createTextNode("No Recipes matching the criteria were found.");
    noProduct.appendChild(noProductText);
    productCategoryMain.appendChild(noProduct);
}