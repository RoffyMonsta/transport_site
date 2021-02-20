"use strict";

function asd(a) {
  if (a == 1) {
    document.getElementById("form-work").style.display = "block";
    document.getElementById("form-transport").style.display = "none";
    document.getElementById("transport-button").style.display = "block";
    document.getElementById("work-button").style.display = "none";
  }

  if (a == 2) {
    document.getElementById("form-transport").style.display = "block";
    document.getElementById("form-work").style.display = "none";
    document.getElementById("work-button").style.display = "block";
    document.getElementById("transport-button").style.display = "none";
  }
}