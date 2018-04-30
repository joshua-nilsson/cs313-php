/* CORE REQUIREMENTS */

function alertMsg() {
  // Alert box message
  alert("Clicked!");
}

function changeColor() {

  // Get the color from input value
  var color = document.getElementById("color").value;

  // Get the container for changing its color
  var container1 = document.getElementById("container1");

  // Change the container background style to user-specified color choice
  var colorChoice = container1.style.backgroundColor = color;
}

/* STRETCH CHALLENGES */

$(function switchColor() {

  // When 'colorBtn' Button is clicked...
  $("#colorBtn").click(function switchColor() {

    // Get Value of 'new-color' AND...
    var color = $("#new-color").val();

    // Change the background-color of 'container2' to the new 'color'
    $("#container2").css('background-color', color);
  })
})

$(function anotherColor() {

  // When 'colorButton' Button is clicked...
  $("#colorButton").click(function anotherColor() {

    // Get Value of 'another-color' AND...
    var color = $("#another-color").val();

    // Change the background-color of 'container3' to the new 'color'
    $("#container3").css('background-color', color);
  })
})

$(function fade() {

  // When 'fadeBtn' Button is clicked...
  $("#fadeBtn").click(function fade() {
    // Fade 'container3' in or out, slowly
    $("#container3").fadeToggle("slow");
    $("#container3").fadeTo('visibility', 'hidden');
  })
})
