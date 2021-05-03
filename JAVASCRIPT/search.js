function handleError()
{
    alert("An error occured in the Javascript code: " + error);
}

function searchPurchases()
{
    try
    {
       //call a XHR variable
       var xhr = new XMLHttpRequest();
       //state of variable changes often
       
       //ready state
       //0= uninitialized
       //1= loading
       //2= loaded
       //3= interactive
       //4= complete
   
   
       xhr.onreadystatechange = function()
       {           
           if(xhr.readyState == 4 && xhr.status == 200)
           {
               document.getElementById("searchResults").innerHTML = xhr.responseText;
           }
       }
       
       //prepare request
       xhr.open("POST", "search-purchases.php");
       xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
       
       var userDateInput = document.getElementById("searchdate").value;
       
       //send request
       xhr.send("searchdate=" + userDateInput);
       
       
    }
    catch(error)
    {
        handleError();
    }
    
    
}