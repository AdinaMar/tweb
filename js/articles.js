const api_url ="https://newsapi.org/v2/top-headlines?country=it&apiKey=03ae083c3bf0404c865ba55ac8089558"



async function getData(url) {
  const response = await fetch(url);

  // Storing data in form of JSON
  var data = await response.json();
  console.log(data);
  if (response) {
    hideloader();
}
show(data);
}

getData(api_url);

function hideloader() {
  document.querySelector('.loader').style.display = 'none';
}

function show(data) {
 let tab = '';
  const slicedArray = data.articles.slice(0, 2);
  // Loop to access all rows
  for (let r of slicedArray) {
    tab += `<div class="article"> 
    <h1>${r.title} </h1>
    <h2>${r.author}</h2>
    <p>${r.description}</p>
    <a href=${r.url} target="_blank">Go to article</a> 
          
</div>`;
  }

  document.getElementById('articles').innerHTML = tab;
}
