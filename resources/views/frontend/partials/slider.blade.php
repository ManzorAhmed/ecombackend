<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carousel Slider</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        .carousel-container {
            width: 100%;
            max-height: 560px;
            overflow: hidden;
            position: relative;
        }

        .carousel {
            display: flex;
            transition: transform 0.5s ease;
            height: 100%;
        }

        .carousel-item {
            flex: 0 0 100%;
            max-width: 100%;
            position: relative;
            overflow: hidden;
        }

        .carousel-content {
            position: absolute;
            top: 25%;
            left: 0;
            transform: translateY(-50%);
            padding: 50px;
            color: #ff5722;
            opacity: 0;
            animation: animateIn 1s forwards;
        }

        @keyframes animateIn {
            from {
                opacity: 0;
                transform: translateY(-50%) translateX(-20px);
            }
            to {
                opacity: 1;
                transform: translateY(-50%) translateX(0);
            }
        }

        .carousel-content h2 {
            font-size: 2.5em;
            margin-bottom: 20px;
            transition: color 0.3s ease;
        }

        .carousel-content p {
            font-size: 1.2em;
            margin-bottom: 30px;
            color: #000000;
            transition: color 0.3s ease;
        }

        .carousel-content .btn {
            background-color: #000000;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            font-size: 1em;
            text-transform: uppercase;
            cursor: pointer;
            transition: background-color 0.3s ease, transform 0.3s ease;
        }

        .carousel-content .btn:hover {
            background-color: #45a049;
            transform: scale(1.1);
        }

        .carousel-item img {
            width: 100%;
            height: auto;
        }
    </style>
</head>
<body>

<div class="carousel-container">
    <div class="carousel">
        <div class="carousel-item">
            <img src="{{asset('frontend/faculty/blank-papers-isolated-grey-surface.jpg')}}" alt="Carousel Image 1">
            <div class="carousel-content">
                <h2>First Slide Heading</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                <button class="btn">Learn More</button>
            </div>
        </div>
        <div class="carousel-item">
            <img src="{{asset('frontend/faculty/blank-papers-isolated-grey-surface.jpg')}}" alt="Carousel Image 2">
            <div class="carousel-content">
                <h2>Second Slide Heading</h2>
                <div class="paragraph-wrapper">
                    <p>A Council of industry professionals and publishing experts, <br>aiming at the advancement of the
                        Asian scholarly publishing <br>community by promoting best publishing practices, defining<br>
                        standardized editorial procedures and guidelines.</p>
                </div>
                <button class="btn">Get Started</button>
            </div>
        </div>
    </div>
</div>

<script>
    const carousel = document.querySelector('.carousel');
    const carouselItems = document.querySelectorAll('.carousel-item');

    let currentIndex = 0;
    const totalItems = carouselItems.length;
    const itemWidth = carouselItems[0].clientWidth;

    function showNextSlide() {
        if (currentIndex < totalItems - 1) {
            currentIndex++;
            carousel.style.transform = `translateX(${-itemWidth * currentIndex}px)`;
        } else {
            currentIndex = 0;
            carousel.style.transform = 'translateX(0)';
        }
    }

    setInterval(showNextSlide, 6000); // Change slide every 6 seconds
</script>

</body>
</html>
