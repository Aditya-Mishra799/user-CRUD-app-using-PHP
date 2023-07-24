

function showMenu(){
    let menu = document.getElementById('menu');
    let btn = document.getElementById('menu-toggle-btn');
    let wholeBtn =  document.getElementById('menu_button');
    if(menu.getAttribute("class") == "hide_menu"){
    menu.setAttribute("class","nav_options");
    wholeBtn.setAttribute("tool-tip","Close Menu");
    btn.setAttribute("class","fa fa-close");
    }
    else{
        wholeBtn.setAttribute("tool-tip","Open Menu");
        btn.setAttribute("class","fa fa-bars");
        menu.setAttribute("class","hide_menu");
    }
}

function pagechange(){
    location.href = "login.php";
}


//function to show password
function showPassword(parent, icon){
   let inputFeild = parent.getElementsByTagName('input')[0]; 
   if(icon.style.color !== 'green'){
    icon.style.color = 'green';
    inputFeild.setAttribute("type","text");
   }
   else{
    icon.style.color = 'gray';
    inputFeild.setAttribute("type","password");
   }
}

//function to close error and sucees feilds

function close_feild(parent){
parent.setAttribute("class" , "hide");
}

//this func open a window ar overlay above main page to upload the img
function upload_image_to_db(){
let obj = document.getElementsByClassName("hide");
    obj[0].setAttribute("class", "overlay_box");
}

//this will make input feilds editable
function editable(checkbox,obj){
    let inputFeild = obj.getElementsByTagName('input')[1];
    if(checkbox.checked){
        inputFeild.removeAttribute('locked');
        inputFeild.removeAttribute('readonly');
    }
    else{
        inputFeild.setAttribute('locked','');
        inputFeild.setAttribute('readonly','');
    }
}