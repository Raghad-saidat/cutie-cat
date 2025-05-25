<?php



class namesuggester {
    private $cat_names;

    public function __construct($file) {
        $handle = fopen($file, "r");
        $filesize = filesize($file);
        $jsonString = fread($handle, $filesize);
        fclose($handle);

        $data = json_decode($jsonString, true);
        $this->cat_names = $data['cat_names'];
    }

    public function suggest() {
        return $this->cat_names[array_rand($this->cat_names)];
    }
}

$suggester = new namesuggester('catnames.json');
echo "names suggestion: " . $suggester->suggest();

?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sweet Recipe Suggester</title>
    <style>
        body {
            font-family: 'Comic Sans MS', cursive, sans-serif;
            background: linear-gradient(135deg, #ffecd2 0%, #fcb69f 100%);
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        h1 {
            color: #ff6f61;
            background-color: #fff5f0;
            padding: 20px 40px;
            border-radius: 20px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.2);
            text-align: center;
            font-size: 2rem;
        }
          .refresh-button {
        padding: 12px 24px;
        font-size: 16px;
        font-weight: bold;
        background-color: #ff6f61;
        color: white;
        border: none;
        border-radius: 8px;
        cursor: pointer;
        transition: background-color 0.3s ease, transform 0.2s ease;
    }

    .refresh-button:hover {
        background-color: #ff4c3b;
        transform: scale(1.05);
    }

    .refresh-button:active {
        transform: scale(0.98);
    }
     .exit-button {
        display: inline-block;
        text-decoration: none;
        padding: 12px 24px;
        font-size: 16px;
        font-weight: bold;
        background-color: #444;
        color: white;
        border-radius: 8px;
        cursor: pointer;
        margin-top: 20px;
        transition: background-color 0.3s ease, transform 0.2s ease;
    }

    .exit-button:hover {
        background-color: #222;
        transform: scale(1.05);
    }

    .exit-button:active {
        transform: scale(0.98);
    }
     
   
    </style>
</head>
<body>
<form method="get">
    <button type="submit" class="refresh-button">Suggest Another</button>
    <a href="index.html" class="exit-button">Exit</a>
</form>
       
</body>
</html>



