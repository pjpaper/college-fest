//toggle about us text


function toggleText(){
    let toggleBtn = document.getElementById('moreButton');
    let text = document.getElementById('moretext');

    if (text.style.display != 'none'){
        text.style.display = 'none';
        toggleBtn.innerHTML = 'see more';
    }else{
        text.style.display = 'inline';
        toggleBtn.innerHTML = 'see less';
    }
}

//side menu

