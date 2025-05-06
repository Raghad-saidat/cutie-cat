document.addEventListener('DOMContentLoaded', function () {
  // Section 1 - Unit Price: 2 JD
  const num1Input = document.getElementById('num1');
  const addBtn = document.getElementById('addBtn');
  const resultParagraph = document.getElementById('result');
  const unitPrice1 = 10;

  addBtn.addEventListener('click', function () {
    const quantity = parseFloat(num1Input.value);

    if (!isNaN(quantity)) {
      const sum = quantity * unitPrice1;
      resultParagraph.textContent = 'Total: ' + sum + ' JD';
    } else {
      resultParagraph.textContent = 'Total: Please enter a valid quantity.';
    }
  });

  // Section 2 - Unit Price: 3 JD
  const num3Input = document.getElementById('num3');
  const addBtn1 = document.getElementById('addBtn1');
  const resultParagraph2 = document.getElementById('result1');
  const unitPrice2 = 15;

  addBtn1.addEventListener('click', function () {
    const quantity = parseFloat(num3Input.value);

    if (!isNaN(quantity)) {
      const sum = quantity * unitPrice2;
      resultParagraph2.textContent = 'Total: ' + sum + ' JD';
    } else {
      resultParagraph2.textContent = 'Total: Please enter a valid quantity.';
    }
  });

  // Section 3 - Unit Price: 4 JD
  const num5Input = document.getElementById('num5');
  const addBtn2 = document.getElementById('addBtn2');
  const resultParagraph3 = document.getElementById('result2');
  const unitPrice3 = 4;

  addBtn2.addEventListener('click', function () {
    const quantity = parseFloat(num5Input.value);

    if (!isNaN(quantity)) {
      const sum = quantity * unitPrice3;
      resultParagraph3.textContent = 'Total: ' + sum + ' JD';
    } else {
      resultParagraph3.textContent = 'Total: Please enter a valid quantity.';
    }
  });
  const sumAllBtn = document.getElementById('sumAllBtn');
const grandTotalParagraph = document.getElementById('grandTotal');

sumAllBtn.addEventListener('click', function () {
  // Extract totals from each result paragraph
  const results = [resultParagraph, resultParagraph2, resultParagraph3];
  let totalSum = 0;

  results.forEach(result => {
    const match = result.textContent.match(/Total:\s*(\d+(\.\d+)?)/);
    if (match) {
      totalSum += parseFloat(match[1]);
    }
  });

  grandTotalParagraph.textContent = 'Grand Total: ' + totalSum + ' JD';
});

});

