var home = {
    icon: document.getElementById("homeIcon"),
    component: document.getElementById("home")
}

var profile = {
    icon: document.getElementById("profileIcon"),
    component: document.getElementById("profile")
}

var projects = {
    icon: document.getElementById("projectsIcon"),
    component: document.getElementById("projects")
}

var contact = {
    icon: document.getElementById("contactIcon"),
    component: document.getElementById("contact")
}

var sections = [home, profile, projects, contact];

function init(){
    setVisible(home);

    for(const elem of sections){
        elem.icon.addEventListener("click", function(){
            setVisible(elem);
        })
    }

}

function setVisible(component){
    for(const elem of sections){
        elem.icon.classList.remove("active");
        elem.component.style.display = "none";
    }
    
    component.icon.classList.add("active");
    component.component.style.display = "";
}