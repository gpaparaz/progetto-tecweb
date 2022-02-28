function setMobile(element){
    element.className+=" mobile ";
}

function hasClass(element, className) {
    return (" " + element.className + " ").indexOf(" " + className + " ") > -1;
}

function removeClass(element, nomeClasse) {
    element.className = element.className.replace(new RegExp("\\b" + nomeClasse + "\\b"),"");
    if(element.className == "  "){
        element.className = "";
    }
}

function mobile() {
    var burger = document.getElementById("hamburger");
    var menu = document.getElementById("menu-mob");

    if (burger.className == "" && window.innerWidth < 800) {
        setMobile(burger);
        setMobile(menu);
    } else if (hasClass(burger, "mobile") && window.innerWidth >= 800) {
        removeClass(burger, "mobile");
        removeClass(menu, "mobile");
    }
}

function common(){
    mobile();
    document.getElementById("hamburger").onclick = function () {
        var menu = document.getElementById("menu-mob");
        if (hasClass(menu, "show")) {
            removeClass(menu, "show");
        } else {
            menu.className += "show";
        }
    };
}

window.onresize = function () {
    mobile();
};