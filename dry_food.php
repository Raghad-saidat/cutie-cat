<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="dry_food.css">
    <title>Dry Food Images</title>
</head>

<body>
    <nav class="navbar">
        <div class="logo"><img src="images/catlogo.png" width="100px"></div>
        <ul class="nav-links">
            <li><a href="#pet-header">HOME</a></li>
            <li><a href="#food">FOOD</a></li>
            <li><a href="#care">CARE</a></li>
            <li><a href="#toy">TOYS</a></li>
        </ul>
    </nav>
    <h1>Dry food</h1>
    <h3>Cat dry food, designed for convenient on-the-go feeding, helps keep your pet satisfied during travel.</h3>
    <section id="food1">
        <div id="dryfood">
            <img src="images/Dryfood-removebg-preview.png" alt="Dry Food 1">

            <div class="calculator">
                <input type="number" id="num1" placeholder="Quantity" min="0">
                <p>Unit Price: 10 JD</p>
                <button id="addBtn">Calculate Total</button>
                <p id="result">Total: </p>
            </div>
        </div>
    </section>
    <section id="food2">
        <div id="dryfood">
            <img src="images/Dryfood3-removebg-preview.png" alt="Dry Food 2">

            <div class="calculator">
                <input type="number" id="num3" placeholder="Quantity" min="0">
                <p>Unit Price: 15 JD</p>
                <button id="addBtn1">Calculate Total</button>
                <p id="result1">Total: </p>
            </div>
        </div>
    </section>
    <section id="food3">
        <div id="dryfood">
            <img src="images/Dryfood__2_-removebg-preview.png" alt="Dry Food 3">

            <div class="calculator">
                <input type="number" id="num5" placeholder="Quantity" min="0">
                <p>Unit Price: 4 JD</p>
                <button id="addBtn2">Calculate Total</button>
                <p id="result2">Total: </p>
            </div>
        </div>
    </section>
    <section id="total">
        <div class="calculator">
            <button id="sumAllBtn">Calculate Grand Total</button>
            <p id="grandTotal" class="result">Grand Total: </p>
        </div>
    </section>
    <div class="footer">
        <p>&copy; 2025 CUTI CAT. All Rights Reserved.</p>
        <p>
            <a href="Untitled-1.html">HOME</a> |
            <a href="#food">FOOD</a> |
            <a href="#care">CARE</a> |
            <a href="#toy">TOYS</a>
        </p>
    </div>
    <script type="text/javascript" src="script.js"></script>
</body>

</html>