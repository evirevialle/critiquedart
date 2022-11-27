function selView(n, litag) {
    var indexview = "none";
    var avanceview = "none";
    switch(n) {
      case 1:
        indexview = "inline";
        break;
      case 2:
        avanceview = "inline";
        break;   
        // add how many cases you need
      default:
        break;
    }
  
    document.getElementById("indextab").style.display = indexview;
    document.getElementById("avancetab").style.display = avanceview;
    var tabs = document.getElementById("tabs");
    var ca = Array.prototype.slice.call(tabs.querySelectorAll("h3"));
    ca.map(function(elem) {

      elem.style.color = "black"
   
    });
  
    litag.style.color = "#1f398f"
  
  
    
  
  }
  
  function selInit() {
    var tabs = document.getElementById("tabs");
    var litag = tabs.querySelector("h3");   // first h3
    litag.style.color = "#1f398f"
  }