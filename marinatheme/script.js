/* Menu burger */

let bar1 = document.querySelector(".bar1");
let bar2 = document.querySelector(".bar2");
let bar3 = document.querySelector(".bar3");
let burger = document.querySelector(".menu-toggle");
let menu = document.querySelector(".menu ul");

burger.addEventListener("click", ()=>{
burger.classList.toggle("active");
bar1.classList.toggle("active");
bar2.classList.toggle("active");
bar3.classList.toggle("active");
menu.classList.toggle("active");
});

/* Page loading */

let loader = document.getElementById("preloader");
 
window.addEventListener("load", function(){
    loader.style.display="none";
});

/* Page transition */

window.onload = () =>{
    let transitionEl = document.querySelector(".transition");
    let anchors = document.querySelectorAll("a");
    setTimeout(()=>{
        transitionEl.classList.remove("is-active");
    },500);

    for (let i = 0; i< anchors.length; i++){
      let anchor = anchors[i];

      anchor.addEventListener("click",e =>{
            let target = e.target.href;
            transitionEl.classList.add("is-active");

            setTimeout(()=>{
                window.location.href = target ;
            },500);
      });
    }
}
  
  
/* Filtre */

document.addEventListener('DOMContentLoaded', function() {
    let categorySelect = document.getElementById('category-select');

    fetchCategories();

    function fetchCategories() {
        fetch('http://localhost:10040//wp-json/wp/v2/categorie')
            .then(response => response.json())
            .then(data => {
                data.forEach(category => {
                    const option = document.createElement('option');
                    option.value = category.id;
                    option.textContent = category.name;
                    categorySelect.appendChild(option);
                });
            })
            
    }
    categorySelect.addEventListener('change', updateFilteredPosts);

    function updateFilteredPosts() {
        const selectedCategory = categorySelect.value;
      
        fetchPosts(selectedCategory);
      }

      function fetchPosts(category) {
        let data = new FormData();
        data.append('action', 'filter_posts');
        data.append('category', category);

        let requestData = {
            action: "filter_posts",
            category: category,};
         let url = new URLSearchParams(requestData);

        fetch('wp-admin/admin-ajax.php', {
            method: 'POST',
            headers: {
              'Content-Type': 'application/x-www-form-urlencoded'
          },
            body: url,
            
          })
            .then(response => response.json())
            .then(data => {
              const postsContainer = document.querySelector('.publication-list');
              postsContainer.textContent = ''; 
              postsContainer.insertAdjacentHTML('beforeend', data.html);  
            })
            .catch(error => console.error('Error fetching posts:', error));
        }
})