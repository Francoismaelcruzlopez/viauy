var extend_Menu = document.querySelectorAll(".menu__item");
extend_Menu.forEach(botones  => {
    botones.addEventListener('click', ()=>{
        botones.classList.toggle('on');
    });
});
