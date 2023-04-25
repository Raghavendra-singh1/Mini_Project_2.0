const product = [
    {
        id: 0,
        image: 'img/sp1.jpg',
        title: 'Mace (Javetri)',
        price:  2200,

    },
    {
        id: 1,
        image: 'img/sp2.jpg',
        title: 'Nutmeg (Jaiphal)',
        price: 2499,

    },
    {
        id: 2,
        image: 'img/sp3.jpg',
        title: 'Indian Five Spice',
        price: 170,

    },
    {
        id:3,
        image: 'img/sp4.jpg',
        title: 'Green Cardamom (Choti Elaichi)',
        price: 2000,

    },
    {
        id:4,
        image: 'img/sp5.jpg',
        title: 'Carom Seeds (Ajwain)',
        price: 148,
    },
    {
        id:5,
        image: 'img/sp6.jpg',
        title: 'Cumin Seeds (Sabut Jeera)',
        price: 600,
    },
    {
        id:6,
        image: 'img/sp7.jpg',
        title: 'Coriander Seeds (Sabut Dhania)',
        price: 100,
    },
    {
        id:7,
        image: 'img/sp8.jpg',
        title: 'Ground Coriander (Dhania powder)',
        price: 290,

    },
    {
        id:8,
        image: 'img/sp9.jpg',
        title: 'Asafoetida (Hing)',
        price: 7000,

    },
    {
        id:9,
        image: 'img/sp10.jpg',
        title: 'Fennel Seeds (Sauf)',
        price: 559,

    },
    {
        id:10,
        image: 'img/sp11.jpg',
        title: 'Curry Leaves',
        price: 216,
    },
    {
        id:11,
        image: 'img/sp12.jpg',
        title: 'Chaat Masala',
        price: 170,
    },
    {
        id:12,
        image: 'img/sp13.jpg',
        title: 'Black/Brown Cardamon (Moti Elaichi/Badi Elaichi)',
        price: 650,
    },
    {
        id:13,
        image: 'img/sp14.jpg',
        title: 'Cloves (Laung)',
        price: 1669,

    },
    {
        id:14,
        image: 'img/sp15.jpg',
        title: 'Kashmiri Chillies (Kashmiri Mirch)',
        price: 300,

    },
    {
        id:15,
        image: 'img/sp16.jpg',
        title: 'Saffron (Kesar)',
        price: 120000,
    }
];
       
const categories=[...new Set(product.map((item)=>
    {return item}))]
    let i=0;
document.getElementById('root').innerHTML=categories.map((item)=>
{
    var{image,title,price}=item;
    return(
        `<div class='box'>
            <div class='img-box'>
                <img class='images' src=${image}></img>
            </div>
        <div class='bottom'>
        <p>${title}</p>
        <h2><span>&#8377;</span> ${price}.00</h2>` + 
        "<button onclick='addtocart("+(i++)+")'>Add to cart</button>"+
        `</div>
        </div>`
    )
}).join('')    

var cart=[];

// search
function search(){
    let filter = document.getElementById('find').value.toUpperCase();
    let item = document.querySelectorAll(product);
    let l = document.include(title);
    for(var i = 0;i<=l.length;i++){
    let a=item[i].getElementsByTagName(title)[0];
    let value=a.innerText || a.innerText || a.textContent;
    if(value.toUpperCase().indexOf(filter) > -1) {
    item[i].style.display="";
    }
    else
    {
    item[i].style.display="none";
    }
    }
    }
// search

function addtocart(a){
    cart.push({...categories[a]})
    displaycart();  
}

function delElement(a){
    cart.splice(a,1);
    displaycart();
     
}

function displaycart(a){
    let j=0; total=0;
    document.getElementById("count").innerHTML=cart.length;
    if(cart.length==0){
        document.getElementById('cartItem').innerHTML = "your cart is empty";
        document.getElementById("total").innerHTML="<span>&#8377;</span>"+0+".00";
    }
    else{
        document.getElementById("cartItem").innerHTML = cart.map((items)=>{
            var{image,title,price}=items;
            total=total+price;
            document.getElementById("total").innerHTML="<span>&#8377;</span>"+total+".00";
            return(
                `<div class='cart-item'>
                <div class='row-img'>
                <img class='rowimg' src=${image}>
                </div>
                <P style='font-size:12px;'> ${title}</p>
                <h2 style='font-size:15px;'><span>&#8377;</span> ${price}.00</h2>` +
                "<i class='fa-solid fa-trash'onclick='delElement("+(j++) +")'></i></div>"
            );

        }).join('');
    }
}

