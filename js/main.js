"use strict";

window.addEventListener("load", function() {
  var dataReq = new XMLHttpRequest();

  dataReq.onload = function() {
    if (dataReq.status === 200) {
      var mydata = JSON.parse(dataReq.responseText);
      renderHTML(mydata);
    } else {
      console.log("Fel vid inläsning med API" + dataReq.status);
    }
  };

  dataReq.open("GET", "http://studenter.miun.se/~sani1904/dt093g/moment3/webservice.php");
  dataReq.send();
});

var widgetC = document.getElementById("widget-container");

function renderHTML(data) {
  for (var i = 0; i < 3; i++) {
    var article = document.createElement("article");
    var heading = document.createElement("h4");
    var p1 = document.createElement("p");
    var p2 = document.createElement("p");
    p1.id = "p1";
    p2.id = "p2";

    var username = document.createTextNode(data[i].username);
    var post = document.createTextNode(data[i].post);
    var postdate = document.createTextNode(data[i].postdate);

    heading.appendChild(username);
    p1.appendChild(post);
    p2.appendChild(postdate);

    article.appendChild(heading);
    article.appendChild(p1);
    article.appendChild(p2);

    widgetC.appendChild(article);
  }
}
