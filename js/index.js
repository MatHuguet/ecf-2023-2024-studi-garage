
const menu = document.getElementById('menu')
const menuList = document.getElementById('menu-list')
const cross = document.getElementById('cross')

console.log(menu)
console.log(menuList)


menu.addEventListener('click', function(e) {
   menuList.classList.toggle('menu-list-toggle');
})

cross.addEventListener('click', function() {
    menuList.classList.remove('menu-list-toggle')
})

