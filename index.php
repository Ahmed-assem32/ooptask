
<?php

class Product {
    public $name;
    public $price;
    public $description;
    public $image;

    public function __construct($name, $price, $description, $image) {
        $this->name = $name;
        $this->price = $price;
        $this->description = $description;
        $this->image = $image;
    }

    public function uploadImage($imagePath) {
        $this->image = $imagePath;
    }

    public function calculatePrice() {
        return $this->price;
    }
}

class Book extends Product {
    public $publishers = [];
    public $writer;
    public $color;
    private $supplier;

    public function __construct($name, $price, $description, $image, $writer, $color, $supplier) {
        parent::__construct($name, $price, $description, $image);
        $this->writer = $writer;
        $this->color = $color;
        $this->supplier = $supplier;
    }

    public function choosePublisher($publisher) {
        $this->publishers[] = $publisher;
    }

    public function setPublisher($publisher) {
        $this->publishers = [$publisher];
    }

    public function showAllPublishers() {
        return implode(", ", $this->publishers);
    }
}

class BabyCar extends Product {
    public $age;
    public $weight;
    public $materials = [];
    private $specialTax;

    public function __construct($name, $price, $description, $image, $age, $weight, $materials, $specialTax) {
        parent::__construct($name, $price, $description, $image);
        $this->age = $age;
        $this->weight = $weight;
        $this->materials = $materials;
        $this->specialTax = $specialTax;
    }

    public function displayMaterials() {
        return implode(", ", $this->materials);
    }

    public function getFinalPrice() {
        return $this->price + $this->specialTax;
    }
}

$book = new Book("The first time I contemplate the Quran", 150, "For beginners in contemplating the Quran", "first-time-contemplate-quran.webp", "Adel Mohammed Khalil", "Blue", " Publishers");
$book->choosePublisher("SB company");

$babyCar = new BabyCar("Kid's Electric Car", 500, "Battery-powered toy car", "Untitled-1-1.webp", 3, 15, ["Plastic", "Metal"], 50);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Details</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 40px; }
        .product { border: 1px solid #ddd; padding: 20px; margin-bottom: 20px; border-radius: 10px; box-shadow: 2px 2px 10px rgba(0,0,0,0.1); }
        .product img { max-width: 200px; display: block; margin: 10px 0; }
        h2 { color: #333; }
    </style>
</head>
<body>

    <div class="product">
        <h2>Book Details</h2>
        <img src="<?= $book->image ?>" alt="Book Image">
        <p><strong>Name:</strong> <?= $book->name ?></p>
        <p><strong>Price:</strong> $<?= $book->calculatePrice() ?></p>
        <p><strong>Description:</strong> <?= $book->description ?></p>
        <p><strong>Color:</strong> <?= $book->color ?></p>
        <p><strong>Writer:</strong> <?= $book->writer ?></p>
        <p><strong>Publishers:</strong> <?= $book->showAllPublishers() ?></p>
    </div>

    <div class="product">
        <h2> Baby Car Details</h2>
        <img src="<?= $babyCar->image ?>" alt="Baby Car Image">
        <p><strong>Name:</strong> <?= $babyCar->name ?></p>
        <p><strong>Price:</strong> $<?= $babyCar->calculatePrice() ?></p>
        <p><strong>Description:</strong> <?= $babyCar->description ?></p>
        <p><strong>Age Group:</strong> <?= $babyCar->age ?> years</p>
        <p><strong>Weight Limit:</strong> <?= $babyCar->weight ?> kg</p>
        <p><strong>Materials:</strong> <?= $babyCar->displayMaterials() ?></p>
        <p><strong>Final Price (with tax):</strong> $<?= $babyCar->getFinalPrice() ?></p>
    </div>

</body>
</html>
