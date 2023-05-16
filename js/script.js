const counters = document.querySelectorAll('[data-counter]');

if (counters) {
	counters.forEach(counter => {
		counter.addEventListener('click', e => {
			const target = e.target;

			if (target.closest('.counter__button')) {
				if (target.closest('.counter').querySelector('input').value == '' && (target.classList.contains('counter__button_minus') || target.classList.contains('counter__button_plus'))) {
					target.closest('.counter').querySelector('input').value = 0;
				}

				let value = parseInt(target.closest('.counter').querySelector('input').value);

				if (target.classList.contains('counter__button_plus')) {
					value++;
				} else {
					--value;
				}

				if (value <= 0) {
					value = 0;
					target.closest('.counter').querySelector('.counter__button_minus').classList.add('disabled')
				} else {
					target.closest('.counter').querySelector('.counter__button_minus').classList.remove('disabled')
				}

				target.closest('.counter').querySelector('input').value = value;
			}
		})
	})	
}


const goTopBtn = document.querySelector('.go-top');

window.addEventListener('scroll', checkHeight)

function checkHeight() {
	if(window.scrollY > 400) {
		goTopBtn.style.display = "flex"
	} else {
		goTopBtn.style.display = "none"
	}
}

goTopBtn.addEventListener('click', () => {
	window.scrollTo( {
		top:0,
		behavior: "smooth"
	})
})

// Корзина
	
const openBasket = document.querySelector('.cart');
const basket = document.querySelector('.basket');
const closeBasket = document.querySelector('.basket_close')

openBasket.onclick = function () {
	basket.style.display = 'flex';
}

closeBasket.onclick = function () {
	basket.style.display = 'none';
}

const cart = document.querySelector('.cart');
const cartNum = document.querySelector('.cart_num');
const cardAddArr = Array.from(document.querySelector('.cart_add'));

const itemQuantity = document.querySelector('.basket_item_quantity');
const itemProductList = document.querySelector(".basket_block");
const itemPrice = document.querySelector('.basket_item_price');
const itemDelete = document.querySelector('.basket_item_delete');
const itemName = document.querySelector('.basket_item_name');
const endPrice = document.querySelector('.end_price');
const itemImg = document.querySelector('.basket_item_img')

class Product {
	imageSrc;
	name;
	price;
	quantity;
	constructor(catalog_item) {
		this.imageSrc = catalog_item.querySelector('catalog_item_img').children[0].src;
		this.name = catalog_item.querySelector('catalog_item_title').innerText;
		this.price = catalog_item.querySelector('catalog_item_price').innerText;
		this.quantity = catalog_item.querySelector('.counter_value').innerText;
	}
}

class Cart {
  products;
  constructor() {
    this.products = [];
  }
  get count() {
    return this.products.length;
  }
  addProduct(product) {
    this.products.push(product);
  }
  removeProduct(index) {
    this.products.splice(index, 1);
  }
  allPriceProduct() {
	Number(this.price) * Number(this.quantity);
	return price;
  }
  get cost() {
    const prices = this.products.map((product) => {
      return Number(product.price);
    });
    const sum = prices.reduce((acc, num) => {
      return acc + num;
    }, 0);
    return sum;
  }
}

const myCart = new Cart();

if (localStorage.getItem("cart") == null) {
  localStorage.setItem("cart", JSON.stringify(myCart));
}

const savedCart = JSON.parse(localStorage.getItem("cart"));
myCart.products = savedCart.products;
cartNum	.textContent = myCart.count;

myCart.products = cardAddArr.forEach((cardAdd) => {
	cardAdd.addEventListener("click", (e) => {
	  e.preventDefault();
	  const card = e.target.closest(".card");
	  const product = new Product(card);
	  const savedCart = JSON.parse(localStorage.getItem("cart"));
	  myCart.products = savedCart.products;
	  myCart.addProduct(product);
	  localStorage.setItem("cart", JSON.stringify(myCart));
	  cartNum.textContent = myCart.count;
	});
  });

  function basketContainerFill() {
	basketProductList.innerHTML = null;
	const savedCart = JSON.parse(localStorage.getItem("cart"));
	myCart.products = savedCart.products;
	const productsHTML = myCart.products.map((product) => {
	  const productItem = document.createElement("div");
	  productItem.classList.add("basket_item");
  
	//   const productWrap1 = document.createElement("div");
	//   productWrap1.classList.add("popup__product-wrap");
	//   const productWrap2 = document.createElement("div");
	//   productWrap2.classList.add("popup__product-wrap");
  
	  const productImage = document.createElement("img");
	  productImage.classList.add("basket_item_img");
	  productImage.setAttribute("src", product.imageSrc);
  
	  const productTitle = document.createElement("div");
	  productTitle.classList.add("basket_item_name");
	  productTitle.innerHTML = product.name;
	  const productQuantity = document.createElement("div");
	  productTitle.classList.add("basket_item_quantity");
	  productTitle.innerHTML = product.quantity;
  
	  const productPrice = document.createElement("div");
	  productPrice.classList.add("basket_item{price");
	  productPrice.innerHTML = toCurrency(toNum(product.price));
  
	  const productDelete = document.createElement("button");
	  productDelete.classList.add("button_item_delete");
	  productDelete.innerHTML = "";
  
	  productDelete.addEventListener("click", () => {
		myCart.removeProduct(product);
		localStorage.setItem("cart", JSON.stringify(myCart));
		basketContainerFill();
	  });
  
	  productItem.appendChild(productImage);
	  productItem.appendChild(productQuantity);
	  productItem.appendChild(productTitle);
	  productItem.appendChild(productPrice);
	  productItem.appendChild(productDelete);
  
	  return productItem;
	});
  
	productsHTML.forEach((productHTML) => {
	  basketProductList.appendChild(productHTML);
	});
  
	// popupCost.value = toCurrency(myCart.cost);
	// popupDiscount.value = toCurrency(myCart.discount);
	// popupCostDiscount.value = toCurrency(myCart.costDiscount);
  }
  

