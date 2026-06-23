let cart = JSON.parse(localStorage.getItem("cart")) || [];

function addToCart(name, price){
  let item = cart.find(i => i.name === name);

  if(item){
    item.qty++;
  } else {
    cart.push({name, price, qty:1});
  }

  localStorage.setItem("cart", JSON.stringify(cart));
  showNotif(name + " кошулду!");
}

function showNotif(text){
  let n = document.getElementById("notif");
  if(n){
    n.innerText = text;
    n.style.display = "block";
    setTimeout(()=> n.style.display="none", 1500);
  }
}

function loadCart(){
  let div = document.getElementById("cartItems");
  let total = 0;

  if(!div) return;

  div.innerHTML = "";

  cart.forEach((item, index) => {
    total += item.price * item.qty;

    div.innerHTML += `
    <div class="card">
      <h3>${item.name}</h3>
      <p>${item.price} сом</p>

      <div>
        <button onclick="changeQty(${index}, -1)">➖</button>
        ${item.qty}
        <button onclick="changeQty(${index}, 1)">➕</button>
      </div>

      <button onclick="removeItem(${index})">❌ Өчүрүү</button>
    </div>
    `;
  });

  let t = document.getElementById("total");
  if(t) t.innerText = "Жалпы: " + total + " сом";
}

function changeQty(index, val){
  cart[index].qty += val;

  if(cart[index].qty <= 0){
    cart.splice(index,1);
  }

  localStorage.setItem("cart", JSON.stringify(cart));
  loadCart();
}

function removeItem(index){
  cart.splice(index,1);
  localStorage.setItem("cart", JSON.stringify(cart));
  loadCart();
}

function clearCart(){
  cart = [];
  localStorage.setItem("cart", JSON.stringify(cart));
  loadCart();
}

/* таймер */
let time = 3600;

setInterval(()=>{
  let m = Math.floor(time/60);
  let s = time%60;

  let t = document.getElementById("timer");
  if(t){
    t.innerText = m + ":" + (s<10?"0"+s:s);
  }

  if(time>0) time--;
},1000);

loadCart();