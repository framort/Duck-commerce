function addSearch() {
    videoFilter.addEventListener('ended', function () {
        let search = document.querySelector('#search');
        search.classList.remove("d-none");
    });
    videoFilter.addEventListener('ended', function () {
        let videoEffect = document.querySelector('#videoFilter');
        videoEffect.classList.add('videoFilter');
    });
}
addSearch();


// Initialization for ES Users
// import { Input, initMDB } from "mdb-ui-kit";

// initMDB({ Input });

// window.addEventListener('load', ()=>{
//     if()
// })
