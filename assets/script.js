window.addEventListener("load",function (){

    const tabs = document.querySelectorAll("ul.nav-tabs>li");
    for (let i=0;i<tabs.length;i++){
        tabs[i].addEventListener("click",switchTab);
    }

    function switchTab(event){
        event.preventDefault();
       document.querySelector("ul.nav-tabs li.active").classList.remove("active");
       document.querySelector(".tab-pane.active").classList.remove("active");

        const clickedTab = event.currentTarget;
        const anchor = event.target;
        const activePaneID = anchor.getAttribute("href");
        clickedTab.classList.add("active");
        document.querySelector(activePaneID).classList.add("active");
    }
});