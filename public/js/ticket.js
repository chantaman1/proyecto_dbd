var total = 0;
var newEntry = document.getElementById('newEntry');

/*when I submit the form: */
document.getElementById('entry').addEventListener('submit', enter);




function enter(){

  /* read the value of newEntry*/
  var price = parseFloat(newEntry.value);

  /*add the value to total*/
  total = total + price;

  /*add a new line with the value from newEntry*/
  writeRow(price);

  /*print the updated total with the new value*/
  document.getElementById('total').innerHTML = formatCurrency(total);

 /*clear the input field*/
  newEntry.value = '';
}

function writeRow(price){
  document.getElementById('entries').innerHTML = document.getElementById('entries').innerHTML +
  "<tr><td></td><td>" +
  formatCurrency(price) +
  "</td></tr>"
}

function formatCurrency(general){
  general = parseFloat(general);
  return '$' + general.toFixed(2);
}
