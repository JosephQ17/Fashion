<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="mens.css">
    <title>Joseph and Kalvin</title>
</head>
<body>
    <div class="product-banner">

    </div>

    <div class="product-box-whole-container">
        <div class="product-box-title">
            <h1>Mens Shoes</h1>
        </div>

        <div class="product-box" id="slider1">
            <button class="button prev" onclick="changeSlide(-1, 1)">&#10094;</button>
            <div class="slides">
                <?php foreach ($items as $item): ?>
                    <div class="slide" data-id="<?= htmlspecialchars($item['id']) ?>" data-name="<?= htmlspecialchars($item['name']) ?>" data-price="<?= htmlspecialchars($item['price']) ?>" sold-desc="<?= htmlspecialchars($item['sold_desc']) ?>">
                        <img src="<?= htmlspecialchars($item['image_path']) ?>" alt="Product Image">
                        <div class="prod-intro">
                            <p><?= htmlspecialchars($item['name']) ?></p>
                            <h5 class="price" style="margin-bottom:0.8rem;">$<?= htmlspecialchars(number_format($item['price'], 2)) ?></h5>
                            <button onclick="openModal(this)" style="margin-bottom:0.8rem;">Buy Item</button>

                            <p><?= htmlspecialchars($item['sold_desc']) ?></p>
                            <h6><?= htmlspecialchars($item['address']) ?></h6>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
            <button class="button next" onclick="changeSlide(1, 1)">&#10095;</button>
        </div>
    </div>


    <div class="second-product-banner">
        <div class="marketing-text">
            <h1> 100% off this december at Joseph and Kalvin!</h1>
        </div>
    </div>

    <div class="product-box-whole-container">
        <div class="product-box-title">
            <h1>Mens Bag</h1>
        </div>

        <div class="product-box" id="slider2">
            <button class="button prev" onclick="changeSlide(-1, 2)">&#10094;</button>

            <div class="slides">
                 <div class="slide">
                        <img src="S1.png" alt="">
                        <div class="prod-intro">
                            <p>Unisex plain cotton pants</p>
                            <h5>1000$</h5><br>
                            <p>10K+ sold</p>
                            <h6>Tanay, Rizal</h6>
                        </div>
                </div>

                <div class="slide">
                <img src="S2.png" alt="">
                        <div class="prod-intro">
                            <p>Unisex plain cotton pants</p>
                            <h5>1000$</h5><br>
                            <p>10K+ sold</p>
                            <h6>Tanay, Rizal</h6>
                        </div>
                </div>

                <div class="slide">
                <img src="S3.png" alt="">
                        <div class="prod-intro">
                            <p>Unisex plain cotton pants</p>
                            <h5>1000$</h5><br>
                            <p>10K+ sold</p>
                            <h6>Tanay, Rizal</h6>
                        </div>
                </div>

                <div class="slide">
                <img src="S4.png" alt="">
                        <div class="prod-intro">
                            <p>Unisex plain cotton pants</p>
                            <h5>1000$</h5><br>
                            <p>10K+ sold</p>
                            <h6>Tanay, Rizal</h6>
                        </div>
                </div>

                <div class="slide">
                <img src="S5.png" alt="">
                        <div class="prod-intro">
                            <p>Unisex plain cotton pants</p>
                            <h5>1000$</h5><br>
                            <p>10K+ sold</p>
                            <h6>Tanay, Rizal</h6>
                        </div>
                </div>

                <div class="slide">
                <img src="S6.png" alt="">
                        <div class="prod-intro">
                            <p>Unisex plain cotton pants</p>
                            <h5>1000$</h5><br>
                            <p>10K+ sold</p>
                            <h6>Tanay, Rizal</h6>
                        </div>
                </div>

                <div class="slide">
                <img src="S7.png" alt="">
                        <div class="prod-intro">
                            <p>Unisex plain cotton pants</p>
                            <h5>1000$</h5><br>
                            <p>10K+ sold</p>
                            <h6>Tanay, Rizal</h6>
                        </div>
                </div>

                <div class="slide">
                <img src="S8.png" alt="">
                        <div class="prod-intro">
                            <p>Unisex plain cotton pants</p>
                            <h5>1000$</h5><br>
                            <p>10K+ sold</p>
                            <h6>Tanay, Rizal</h6>
                        </div>
                </div>

                <div class="slide">
                <img src="S9.png" alt="">
                        <div class="prod-intro">
                            <p>Unisex plain cotton pants</p>
                            <h5>1000$</h5><br>
                            <p>10K+ sold</p>
                            <h6>Tanay, Rizal</h6>
                        </div>
                </div>

                <div class="slide">
                <img src="S10.png" alt="">
                        <div class="prod-intro">
                            <p>Unisex plain cotton pants</p>
                            <h5>1000$</h5><br>
                            <p>10K+ sold</p>
                            <h6>Tanay, Rizal</h6>
                        </div>
                </div>

            </div>
            <button class="button next" onclick="changeSlide(1, 2)">&#10095;</button>
        </div>
    </div>

    <div class="third-product-banner">
        <div class="marketing-text">
            <!-- <h1>Free shipping to all items!</h1> -->
        </div>
    </div>


    <div class="product-box-whole-container">
        <div class="product-box-title">
            <h1>Mens Accesories</h1>
        </div>

        <div class="product-box" id="slider3">
            <button class="button prev" onclick="changeSlide(-1, 3)">&#10094;</button>

            <div class="slides">
            <div class="slide">
                        <img src="S1.png" alt="">
                        <div class="prod-intro">
                            <p>Unisex plain cotton pants</p>
                            <h5>1000$</h5><br>
                            <p>10K+ sold</p>
                            <h6>Tanay, Rizal</h6>
                        </div>
                </div>

                <div class="slide">
                <img src="S2.png" alt="">
                        <div class="prod-intro">
                            <p>Unisex plain cotton pants</p>
                            <h5>1000$</h5><br>
                            <p>10K+ sold</p>
                            <h6>Tanay, Rizal</h6>
                        </div>
                </div>

                <div class="slide">
                <img src="S3.png" alt="">
                        <div class="prod-intro">
                            <p>Unisex plain cotton pants</p>
                            <h5>1000$</h5><br>
                            <p>10K+ sold</p>
                            <h6>Tanay, Rizal</h6>
                        </div>
                </div>

                <div class="slide">
                <img src="S4.png" alt="">
                        <div class="prod-intro">
                            <p>Unisex plain cotton pants</p>
                            <h5>1000$</h5><br>
                            <p>10K+ sold</p>
                            <h6>Tanay, Rizal</h6>
                        </div>
                </div>

                <div class="slide">
                <img src="S5.png" alt="">
                        <div class="prod-intro">
                            <p>Unisex plain cotton pants</p>
                            <h5>1000$</h5><br>
                            <p>10K+ sold</p>
                            <h6>Tanay, Rizal</h6>
                        </div>
                </div>

                <div class="slide">
                <img src="S6.png" alt="">
                        <div class="prod-intro">
                            <p>Unisex plain cotton pants</p>
                            <h5>1000$</h5><br>
                            <p>10K+ sold</p>
                            <h6>Tanay, Rizal</h6>
                        </div>
                </div>

                <div class="slide">
                <img src="S7.png" alt="">
                        <div class="prod-intro">
                            <p>Unisex plain cotton pants</p>
                            <h5>1000$</h5><br>
                            <p>10K+ sold</p>
                            <h6>Tanay, Rizal</h6>
                        </div>
                </div>

                <div class="slide">
                <img src="S8.png" alt="">
                        <div class="prod-intro">
                            <p>Unisex plain cotton pants</p>
                            <h5>1000$</h5><br>
                            <p>10K+ sold</p>
                            <h6>Tanay, Rizal</h6>
                        </div>
                </div>

                <div class="slide">
                <img src="S9.png" alt="">
                        <div class="prod-intro">
                            <p>Unisex plain cotton pants</p>
                            <h5>1000$</h5><br>
                            <p>10K+ sold</p>
                            <h6>Tanay, Rizal</h6>
                        </div>
                </div>

                <div class="slide">
                <img src="S10.png" alt="">
                        <div class="prod-intro">
                            <p>Unisex plain cotton pants</p>
                            <h5>1000$</h5><br>
                            <p>10K+ sold</p>
                            <h6>Tanay, Rizal</h6>
                        </div>
                </div>

            </div>
            <button class="button next" onclick="changeSlide(1, 3)">&#10095;</button>
        </div>
    </div>
    <div id="modal" class="modal">
        <div class="modal-content">
            <h2>Customize Item</h2>
            <form id="customizeForm">
                <input type="hidden" name="item_id" id="item_id">
                <input type="hidden" name="item_name" id="item_name">
                <div class="grid-input">
                    <label for="size" class = "left">Size:</label>
                    <select name="size" id="size" required  class = "right">
                        <option value="Small">Small</option>
                        <option value="Medium">Medium</option>
                        <option value="Large">Large</option>
                    </select>
                    <label for="color" class = "left">Color:</label>
                    <input type="text" name="color" id="color" placeholder="Enter color" required class = "right">
                    <label for="quantity" class = "left">Quantity:</label>
                    <input type="number" name="quantity" id="quantity" min="1" placeholder="Enter Quantity" required class = "right">
                </div>
                <button type="submit">Add to Cart</button>
            </form>
            <button onclick="closeModal()">Cancel</button>
        </div>
    </div>


    <script>
        function changeSlide(direction, sliderIndex) {
            const slides = document.querySelectorAll(`#slider${sliderIndex} .slide`);
            const totalSlides = slides.length;
            const slideWidth = slides[0].offsetWidth;
            const slidesContainer = document.querySelector(`#slider${sliderIndex} .slides`);

            let currentSlide = parseInt(slidesContainer.dataset.currentSlide || '0', 10);

            currentSlide += direction;

            if (currentSlide < 0) {
                currentSlide = totalSlides - 1;
            } else if (currentSlide >= totalSlides) {
                currentSlide = 0;
            }

            slidesContainer.dataset.currentSlide = currentSlide;

            const offset = currentSlide * slideWidth;
            slidesContainer.style.transform = `translateX(-${offset}px)`;
        }