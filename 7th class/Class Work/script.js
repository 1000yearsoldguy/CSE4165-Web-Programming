function calculateTotal() {
  const pineapples = parseInt(document.getElementById("pineapples").value);
  const deliveryYes = document.getElementById("deliveryYes").checked;
  const location = document.getElementById("location").value;
  let tip = parseInt(document.getElementById("tip").value);

  if (tip < 0) {
    alert("Negative numbers are invalid here. Setting the tips to BDT 0 by default.");
    document.getElementById("tip").value = 0; // Update the input field
    tip = 0; // Set tip to 0 for calculation
  }

  const pineapplePrice = 12.5;
  let total = 0;

  let discount = 0;
  if (pineapples >= 1 && pineapples <= 9) {
    discount = 0.05; // 5%
  } else if (pineapples >= 10 && pineapples <= 19) {
    discount = 0.10; // 10%
  } else if (pineapples >= 20) {
    discount = 0.15; // 15%
  }

  // Apply discount
  total = pineapples * pineapplePrice * (1 - discount);

  if (deliveryYes) {
    total += 40;
  }

  // Apply tax
  let taxRate = 0;
  if (location === "dhaka") {
    taxRate = 0.20; // 20%
  } else if (location === "chittagong") {
    taxRate = 0.15; // 15%
  }
  total += total * taxRate;

  total += tip;

  document.getElementById("totalBill").textContent = total.toFixed(2);
}