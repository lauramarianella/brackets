(function() {
  "use strict";
  const URL = "RESTFul4ListItems.php";

  window.addEventListener("load", initialize);

  function initialize() {
    $("getList-btn").addEventListener("click", getList);
  }

  function getList() {
    let url = URL;

    fetch(url, { method: 'GET' })
    .then(checkStatus)
    .then(showList)
    .catch(console.log);
  }
  
  let showList = function(result){
    let arrResponse = JSON.parse(result);
    if(!arrResponse[0]){//if there was an error, show it and return
      $('result').innerHTML = `<span style="color:red;">${arrResponse[1]}</span>`;
      return;
    }

    let newNode='';
    arrResponse[2].forEach((objItem) => {
      newNode +=`<div style="border:1px solid #333; background-color:#ffffff; border-radius:5px; padding:16px;" align="center">
                    <h4><img src="data:image/jpeg;base64,${objItem.img}" style="width:200px; height: 200px;"/></h4>
                    <h4>${objItem.id}</h4>
                    <h4>${objItem.name}</h4>
                    <h4>${objItem.description}</h4>
                    <h4>${objItem.price}</h4>
                    </div>`; 

    });
    $('result').innerHTML = newNode;

  }
  
  /* ------------------------------ Helper Functions  ------------------------------ */

  /**
   * Returns the element that has the ID attribute with the specified value.
   * @param {string} id - element ID
   * @returns {object} DOM object associated with id.
   */
  function $(id) {
    return document.getElementById(id);
  }

  /*
   * Helper function to return the response's result text if successful, otherwise
   * returns the rejected Promise result with an error status and corresponding text
   * @param {object} response - response to check for success/error
   * @return {object} - valid result text if response was successful, otherwise rejected
   *                    Promise result
   */
  function checkStatus(response) { 
    if (response.status >= 200 && response.status < 300 || response.status == 0) {  
      return response.text();
    } else {
      return Promise.reject(new Error(response.status + ": " + response.statusText)); 
    }
  }
})();