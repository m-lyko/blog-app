const search = document.querySelector('input[placeholder="Szukaj"]');
const postContainer = document.querySelector('.card-grid');
const searchIcon = document.querySelector('.search-container img');

const originalPostsHTML = postContainer.innerHTML;

search.addEventListener('keyup', function(event) {
    // zapobiega domyślnej akcji entera
    if(event.key === "Enter") {
        event.preventDefault();
    }

    if(this.value.length > 0){
        // jeśli jest tekst, to pojawia się ikona x
        searchIcon.src = "/public/img/cancel.svg";
        searchIcon.style.cursor = "pointer";
    }
    else {
        searchIcon.src = "/public/img/search.svg";
        searchIcon.style.cursor = "default";    
        postContainer.innerHTML = originalPostsHTML;
        return;    
    }

    // przygotowanie danych do wysłania
    const data = {search: this.value};

    fetch("/search",
        {
            method: "POST",
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify(data)
        }
    ).then(function(response)
    {
        return response.json();
    }).then(function(posts) {
        postContainer.innerHTML = "";
        loadPosts(posts, data.search);
    });

    searchIcon.addEventListener('click', function() {
        // reset tylko gdy w polu jest tekst
        if(search.value.length > 0) {
            search.value = "";
            searchIcon.src = "/public/img/search.svg";
            location.reload();
        }
    })
});

function loadPosts(posts, searchText) {
    posts.forEach(post => {
        console.log(post);
        createPost(post, searchText);
    });
}

function createPost(post, searchText) {
    const template = document.querySelector("#post-template");

    const clone = template.content.cloneNode(true);

    const div = clone.querySelector("div");
    const id = clone.querySelector("a");
    const image = clone.querySelector("img");
    const title = clone.querySelector("h3");
    const description = clone.querySelector(".description");
    const author = clone.querySelector(".author");

    image.src = post.avatar ? post.avatar : "/public/img/users/default_avatar.svg";
    title.innerHTML = hightlightText(post.title, searchText);
    
    const snippetDescription = getSnippet(post.description, searchText);
    description.innerHTML = hightlightText(snippetDescription, searchText);
    
    let authorText = `Autor: ${post.name}`;
    author.innerHTML = hightlightText(authorText, searchText);
    
    id.href = `/details?id=${post.id_posts}`;

    postContainer.appendChild(clone);
}


// FUNKCJE POMOCNICZE

function getSnippet(text, searchText) {
    if(!searchText) return text;

    const words = text.split(/\s+/); // Rozbijamy tekst na słowa
    const lowerSearch = searchText.toLowerCase();
    let matches = [];

    for (let i = 0; i < words.length; i++) {
        if (words[i].toLowerCase().includes(lowerSearch)) {
            matches.push(i);
        }
    }

    if (matches.length === 0) {
        return words.slice(0, 12).join(" ") + "...";
    }

    let ranges = [];
    const context = 5; 

    matches.forEach(index => {
        let start = Math.max(0, index - context);
        let end = Math.min(words.length, index + context + 1);

        if (ranges.length === 0) {
            ranges.push({start, end});
        } else {
            let lastRange = ranges[ranges.length - 1];
            
            if (start <= lastRange.end) {
                lastRange.end = Math.max(lastRange.end, end);
            } else {
                ranges.push({start, end});
            }
        }
    });

    let resultParts = ranges.map(range => {
        return words.slice(range.start, range.end).join(" ");
    });

    let result = resultParts.join(" ... "); // Łączymy oddzielne fragmenty wielokropkiem

    if (ranges[0].start > 0) result = "..." + result;
    if (ranges[ranges.length - 1].end < words.length) result = result + "...";

    return result;
}


function hightlightText(text, searchText) {
    if(!searchText) return text;

    const regex = new RegExp(`(${searchText})`, 'gi');

    // zamiana oryginalnej frazy w wersję span z kolorem
    return text.replace(regex, '<span style="background-color: #C1666B; font-weight: bold; color: #000">$1</span>');
}