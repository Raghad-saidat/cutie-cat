<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dry Food Images</title>
    <style>
        body{
            background:#1C1C1C;
            margin: 0;
            padding: 0;
            font-family: sans-serif;
        } 
        h1{
         border: 1px solid;
            border-radius:50px;
            color:#F8D7D0 ;
            text-align: center;
        }
        h3{
            color: #F8D7D0 ;
            text-align: center;
        }
        #food1{
            text-align: center;
            margin-bottom: 20px;
            background-color:#1C1C1C;
            padding:0;
            margin:0;
        }
        #rawfood{
            display: flex;
    align-items: center; 
    gap: 10px; 
        }
        #rawfood img{
            padding-left:200px;
            width:400px
        }
#rawfood p{
    padding-left:150px;
    font-size: xx-large;
}
.calculator {
  max-width: 320px;
  margin: 50px auto;
  padding: 25px 30px;
  background-color: #ffffff;
  border: 1px solid #e0e0e0;
  box-shadow: 0 4px 8px rgba(0, 0, 0, 0.05);
  border-radius: 12px;
  font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
}

.calculator input[type="number"] {
  width: 100%;
  padding: 12px 15px;
  margin-bottom: 15px;
  font-size: 16px;
  border: 1px solid #ccc;
  border-radius: 8px;
  box-sizing: border-box;
  transition: border 0.3s;
}

.calculator input[type="number"]:focus {
  border-color: #007bff;
  outline: none;
}

.calculator button {
  width: 100%;
  padding: 12px;
  font-size: 16px;
  background-color: #1E2235 ;
  color: white;
  border: none;
  border-radius: 8px;
  cursor: pointer;
  transition: background-color 0.3s ease;
}

.calculator button:hover {
  background-color: #0056b3;
}

/* 🔄 Changed from #result to .result for reusability */
.calculator .result {
  margin-top: 20px;
  font-size: 10px;
  font-weight: 600;
  color: #333;
  text-align: center;
}

/* Optional: style the unit price note */
.calculator p {
  font-size: 10px;
  margin-bottom: 15px;
  color: #555;
}

#food2{
    text-align: center;
            margin-bottom: 20px;
            background-color:#FFF9B0;
            padding:0;
            margin:0;
}
#food3{
    text-align: center;
            margin-bottom: 20px;
            background-color:#FF9AA2;
            padding:0;
            margin:0;
            
}
.footer {
    background-color:#1E2235 ;
    color: white;
    text-align: center;
    padding: 20px;
    position: relative;
    bottom: 0;
    width: 100%;
}

.footer a {
    color: #ffcc00;
    text-decoration: none;
    margin: 0 10px;
}
.footer a:hover {
    text-decoration: underline;
}
.navbar {
    background-color: #F8D7D0;
    color:#1E2235 ;
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 15px 20px;
}

.logo {
    font-size: 20px;
    font-weight: bold;
}

.nav-links {
    list-style: none;
    display: flex;
    gap: 20px;
    margin: 0;
    padding: 0;
}

.nav-links li {
    display: inline;
}

.nav-links a {
    color:#1E2235 ;
    text-decoration: none;
    padding: 8px 12px;
}

.nav-links a:hover {
    background-color:#ffcc00 ;
    border-radius: 5px;
}
#total{
    text-align: center;
            margin-bottom: 20px;
            background-color:#1E2235;
            padding:0;
            margin:0;
            display: flex;
    align-items: center; 
    gap: 10px; 
            
}
    </style>
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
    <h1>raw food</h1>
   <section id="food1">
    <div id="rawfood">
        <img src="images/rawfood.webp" alt="raw Food 1">
        <div class="calculator">
            <input type="number" id="num3" placeholder="Quantity" min="0">
            <p>Unit Price: 15 JD</p>
            <button id="addBtn1">Calculate Total</button>
            <p id="result1">Total: </p>
          </div>
    </div>
        </section>
        <section id="food2">
            <div id="rawfood">
        <img src="images/rawfood2.png" alt="raw Food 2">  <div class="calculator">
            <input type="number" id="num1" placeholder="Quantity" min="0">
            <p>Unit Price: 10 JD</p>
            <button id="addBtn">Calculate Total</button>
            <p id="result">Total: </p>
            </div>
        </div>
    </section>
    <section id="food3">
        <div id="rawfood">
        <img src="images/rawfood3.jpg" alt="raw Food 3">
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
</div>
<script type="text/javascript" src="script.js"></script>

</body>
</html>