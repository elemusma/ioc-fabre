let introIcons = document.querySelectorAll('.tab-icon');

for (i = 0; i < introIcons.length; i++) {
    introIcons[i].addEventListener('click',showContent);

    function showContent(){
        showIconsContent(this);
    }
}


let showIconsContent = (elem) => {
  
    console.log(elem);
    let ID = elem.id;
    console.log(ID);

    // needs to be before command adding class
    elemActive = document.querySelector('.tab-icon-active');
    tabContentActive = document.querySelector('.tab-content-active');

    // makes clicked element active
    if(!elem.classList.contains('tab-icon-active')){
        elem.classList.add('tab-icon-active');
    }

    // makes all other elements inactive
    elemActive.classList.remove('tab-icon-active');

    let tabContent = ID.replace("icon","content");
    let tabContentID = document.querySelector('#' + tabContent);
    console.log(tabContentID);
    
    // makes clicked element active
    if(!tabContentID.classList.contains('tab-content-active')){
        tabContentID.classList.add('tab-content-active');
    }
    
    // makes all other elements inactive
    tabContentActive.classList.remove('tab-content-active');
}
