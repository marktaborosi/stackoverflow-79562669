
# PHP Imagick Perspective Merge

This public project demonstrates how to apply a banner image onto the side of a truck using PHP and Imagick with perspective distortion. The goal is to answer the following Stack Overflow question:

👉 [Merging two images as one (GD and Imagick)](https://stackoverflow.com/questions/79562669/merging-two-images-as-one-gd-and-imagick)

## 🔧 Requirements

- PHP 8.3 or newer
- [Imagick PHP extension](https://www.php.net/manual/en/book.imagick.php)
- [ImageMagick](https://imagemagick.org/)
- [Composer](https://getcomposer.org/) (used for autoloading and managing dependencies)

## 📦 Installation (Docker)

You can use docker for this
```bash
docker-compose up --build
```

Then you can reach it via:
```
localhost:8000
```

This will create the output file at `processed/output.png` showing the banner perspective-mapped onto the truck.

## 🖼️ Demonstration

### Truck Image (Base)
![Truck](src/source-images/4.jpg)

### Banner to be Applied
![Banner](src/source-images/71jnk8L5-vL._SX679_.jpg)

### Final Output (Perspective Merged)
![Output](src/processed/output.png)

## 📝 Author

Mark Taborosi
