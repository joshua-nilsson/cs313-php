function myFunction() {
  var x = document.getElementById("customRange1").value;
  var priceTag = (x * 1000);
  document.getElementById("priceTag").innerHTML = "$" + priceTag;
}

function ticketQuantity() {
  var x = document.getElementById("priceTag").value;
  var tickets = (x / 1000);
  document.getElementById("ticketOutput").innerHTML = tickets;
}
