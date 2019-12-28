function FakeCrop() {}
console.log(window.images_size);
FakeCrop.prototype.init = function() {
    $('.product-item .product-img img').fakecrop({
        fill: true,
        widthSelectorParent: ".product-item .product-img",
        ratioWrapper: window.images_size 
    });
}