
//prepare the endpoint
// let APP_ID="e17c377f";
// let API_KEY="42593f79d62588b8b81c32716454495b";

// document.querySelector("#row_display").replaceChildren();

    
//     //User input
//     let userInput=document.querySelector("#search-id").value.trim();

//     console.log(userInput);
//     //convert spaces and special characters
//     let convertInput= encodeURIComponent(userInput);

//      //Second API key for search movies, that match the search query.
//     let endpoint = "https://api.edamam.com/search?q="+convertInput+"&app_id=e17c377f&app_key=42593f79d62588b8b81c32716454495b&from=0&to=20";
//     console.log(endpoint);
//     display_req(endpoint); 
    
document.querySelector("#search-form").onsubmit = function(event)
{
    event.preventDefault();
    //add clear the previous results later
    document.querySelector("#row_display").replaceChildren();
    
    //User input
    let userInput=document.querySelector("#search-id").value.trim();

    //convert spaces and special characters
    let convertInput= encodeURIComponent(userInput);

     //Second API key for search movies, that match the search query.
     //https://api.edamam.com/api/recipes/v2?type=public&q=chicken&app_id=e17c377f&app_key=42593f79d62588b8b81c32716454495b

     let endpoint =" https://api.edamam.com/api/recipes/v2?type=public&q="+convertInput+"&app_id=e17c377f&app_key=42593f79d62588b8b81c32716454495b";
    //let endpoint = "https://api.edamam.com/search?q="+convertInput+"&app_id=e17c377f&app_key=42593f79d62588b8b81c32716454495b&from=0&to=20";
    console.log(endpoint);
    display_req(endpoint);   
}

function display_req(endpoint)
  
{
    //Make HTTP request via AJAX
    let httpReq= new XMLHttpRequest();
    httpReq.open("GET", endpoint);
    httpReq.send();

    //event handler
    httpReq.onreadystatechange=function()
    {
        console.log(httpReq.readyState);
        console.log("Response recieved!");

        //when the response is ready
        if(httpReq.readyState==4)
        {
           if(httpReq.status==200)
           {
             console.log(httpReq.responseText);
             display(httpReq.responseText);
           }
           else{
               alert("AJAX ERROR!");
               console.log(httpReq.status);
           }
        }
            
        
    }
    console.log("continue...");
}


function display(results)
{
//convert the JSON to JS objects
let resultsJS = JSON.parse(results);
console.log(resultsJS);
//update the results
document.querySelector("#num-results1").innerHTML=resultsJS.hits.length;
document.querySelector("#num-results").innerHTML = resultsJS.count;

//console.log(resultsJS.hits.totalResults);
for(let i=0;i<resultsJS.hits.length; i++)
{
    
   
//Parse the api before sending it to detail.php
    let sendString= resultsJS.hits[i]._links.self.href;
    let index1= sendString.indexOf("v2/");
    let index2= sendString.indexOf("?");
    let index=sendString.substring(index1+3,index2);
    console.log(index);

 //show an image that says “Not available” when there is no img,otherwise show the img
    let image1=resultsJS.hits[i].recipe.image;
    if(image1==null){
        image1="images/no-image.jpeg";
    }
    else{
        image1=resultsJS.hits[i].recipe.image;
    }
    let htmlString=`<div class="col-12 col-md-6 col-lg-3 mb-2 mt-2"><div class="card" >
    <img class="card-img-top" src=${image1}>
    <div class="card-body">
      <h5 class="card-title">${resultsJS.hits[i].recipe.label}</h5>
     
    </div>
    <ul class="list-group list-group-flush">
    <li class="list-group-item">Calories: ${resultsJS.hits[i].recipe.calories.toFixed(0)}</li>
      <li class="list-group-item">Ingredients: ${resultsJS.hits[i].recipe.ingredientLines.length}</li> 
    </ul>
    <div class="card-body">
      <a href="details.php?id=${index}" class="card-link">More details
      </a>
     
    </div>
    </div>
  </div>`;
   
    document.querySelector("#row_display").innerHTML+=htmlString;

}
}


