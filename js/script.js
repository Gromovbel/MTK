//Принимает строковый параметр и удаляет в нем все пробелы

function toNum(str) {
	const num = Number(str.replace(/ /g, ""));
	return num;
  }

//Форматирует число в строку валюты с использованием символа российского рубля

function toCurrency(num) {
	const format = new Intl.NumberFormat("ru-RU", {
	  style: "currency",
	  currency: "RUB",
	  minimumFractionDigits: 0,
	}).format(num);
	return format;
}

// Счетчик +-

const counters = document.querySelectorAll('[data-counter]');
let allItemPrice = 0;
let endItemPrice = 0;
let endItemQuantity = 0;
if (counters) {
	counters.forEach(counter => {
		counter.addEventListener('click', e => {
			const target = e.target;

			if (target.closest('.counter__button')) {
				if (target.closest('.counter').querySelector('input').value == '' && (target.classList.contains('counter__button_minus') || target.classList.contains('counter__button_plus'))) {
					target.closest('.counter').querySelector('input').value = 0;
				}

				let valueCounter = parseInt(target.closest('.counter').querySelector('input').value);

				if (target.classList.contains('counter__button_plus')) {
					valueCounter++;
				} else {
					--valueCounter;
				}

				if (valueCounter <= 0) {
					valueCounter = 0;
					target.closest('.counter').querySelector('.counter__button_minus').classList.add('disabled')
				} else {
					target.closest('.counter').querySelector('.counter__button_minus').classList.remove('disabled')
				}

				target.closest('.counter').querySelector('input').value = valueCounter;	
				let itemPriceForCounter = target.closest('.catalog_item').querySelector('.catalog_item_price').innerText;	
				itemPriceForCounter = itemPriceForCounter.replace(/ /g, "").replace(/[^0-9]/g,"");
				endItemPrice = toNum(itemPriceForCounter) * valueCounter;
				console.log(endItemPrice);
				endItemQuantity = valueCounter;
				console.log(endItemQuantity);
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
const closeBasket = document.querySelector('.basket_close');
const openForm = document.querySelector('.agree_true');
const requestForm = document.querySelector(".decor_request");
const closeForm = document.querySelector('.close_form');
const basketBlock = document.querySelector('.basket_block');
const clearBasket = document.querySelector('.basket_input');
const closeAgree = document.querySelector('.agree_close');
const closeAgreeBtn = document.querySelector('.agree_false');
const agree = document.querySelector('.agree_block');
const openAgree = document.querySelector('.basket_checkout');


//Открытие корзины

openBasket.onclick = function () {
	basket.style.display = 'flex';
	body.classList.add("lock");
	basketContainerFill();

}

//Закрытие корзины

closeBasket.onclick = function () {
	basket.style.display = 'none';
	body.classList.remove("lock");
}

//Открытие соглашения

openAgree.onclick = function () {
	agree.style.display = 'flex';
	basket.style.display = 'none';
}

//Закрытие соглашения

closeAgree.onclick = function () {
	agree.style.display = 'none';
	basket.style.display = 'flex';
}

closeAgreeBtn.onclick = function () {
	agree.style.display = 'none';
	basket.style.display = 'flex';
}

//Открытие формы заказа

openForm.onclick = function () {
	agree.style.display = 'none';
	basket.style.display = 'flex';
	basketBlock.style.display = 'none';
	requestForm.style = 'flex';
}

//Закрытие формы заказа

closeForm.onclick = function () {
	requestForm.style.display = 'none';
	basketBlock.style.display = 'block';
}





const cart = document.querySelector('.cart');
const cartNum = document.querySelector('.cart_num');
const cardAddArr = Array.from(document.querySelectorAll('.cart_add'));

const itemQuantity = document.querySelector('.basket_item_quantity');
const itemProductList = document.querySelector(".basket_block");
const itemPrice = document.querySelector('.basket_item_price');
const itemDelete = document.querySelector('.basket_item_delete');
const itemName = document.querySelector('.basket_item_name');
const endPrice = document.querySelector('.end_price');
const itemImg = document.querySelector('.basket_item_img')
const body = document.body;

//Класс для товара

class Product {
	imageSrc;
	name;
	price;
	quantity;
	constructor(catalog_item) {
		this.imageSrc = catalog_item.querySelector('.catalog_item_img').children[0].src;
		this.name = catalog_item.querySelector('.catalog_item_title').innerText;
		this.price = endItemPrice;
		this.quantity = endItemQuantity;
	}
}

//Класс для корзины

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
  get cost() {
    const prices = this.products.map((product) => {
	return product.price;
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
cartNum.textContent = myCart.count;

//Добавление товара в корзину

myCart.products = cardAddArr.forEach((cardAdd) => {
	cardAdd.addEventListener("click", (e) => {
	  e.preventDefault();
	  const catalog_item = e.target.closest(".catalog_item");
	  const product = new Product(catalog_item);
	  const savedCart = JSON.parse(localStorage.getItem("cart"));
	  myCart.products = savedCart.products;
	  myCart.addProduct(product);
	  localStorage.setItem("cart", JSON.stringify(myCart));
	  cartNum.textContent = myCart.count;
	});
  });

  //Заполнение корзины

  function basketContainerFill() {
	itemProductList.innerHTML = null;
	const savedCart = JSON.parse(localStorage.getItem("cart"));
	myCart.products = savedCart.products;
	const productsHTML = myCart.products.map((product) => {
	  const productItem = document.createElement("div");
	  productItem.classList.add("basket_item");

	  const productQuantity = document.createElement('div');
	  productQuantity.classList.add("basket_item_quantity");
	  productQuantity.classList.add("basket_item_column");
	  productQuantity.innerHTML = product.quantity;
  
	  const productWrap1 = document.createElement("div");
	  productWrap1.classList.add("basket_wrap");
	  const productWrap2 = document.createElement("div");
	  productWrap2.classList.add("basket_wrap");
  
	  const productImage = document.createElement("img");
	  productImage.classList.add("basket_item_img");
	  productImage.classList.add("basket_item_column");
	  productImage.setAttribute("src", product.imageSrc);
  
	  const productTitle = document.createElement("div");
	  productTitle.classList.add("basket_item_name");
	  productTitle.classList.add("basket_item_column");
	  productTitle.innerHTML = product.name;
  
	  const productPrice = document.createElement("div");
	  productPrice.classList.add("basket_item_price");
	  productPrice.classList.add("basket_item_column");
	  productPrice.innerHTML = toCurrency(product.price);
  
	  const productDelete = document.createElement("button");
	  productDelete.classList.add("basket_item_delete");
	  productDelete.classList.add("basket_item_column");
	  productDelete.innerHTML = "✖";
  
	  productDelete.addEventListener("click", () => {
		myCart.removeProduct(product);
		localStorage.setItem("cart", JSON.stringify(myCart));
		basketContainerFill();
	  });
  
	  productWrap1.appendChild(productImage);
	  productWrap1.appendChild(productTitle);
	  productWrap1.appendChild(productQuantity);
	  productWrap2.appendChild(productPrice);
	  productWrap2.appendChild(productDelete);
	  productItem.appendChild(productWrap1);
	  productItem.appendChild(productWrap2);
  
	  return productItem;
	});
  
	productsHTML.forEach((productHTML) => {
	  itemProductList.appendChild(productHTML);
	});
  
	endPrice.value = toCurrency(myCart.cost);
  }

  clearBasket.onclick =  function () {
    document.querySelector('.basket_item').innerHTML = '';
	localStorage.clear();
}