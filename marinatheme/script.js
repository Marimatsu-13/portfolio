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


  
/* Filtre */

// Fonction pour récupérer les catégories
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
        
        let requestData = {
            action: "filter_posts",
            category: category,};
         let url = new URLSearchParams(requestData);
console.log(requestData);
        fetch('http://localhost:10040/wp-admin/admin-ajax.php', {
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
              Lightbox.init();
            })
            .catch(error => console.error('Error fetching posts:', error));
        }
});