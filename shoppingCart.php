<?php include("includes/config.php"); ?>
<!doctype html>
<html>
<head>
    <?php include("includes/headTags.php"); ?>
    <link rel="stylesheet" href="assets/css/shoppingCart.css" type="text/css">
</head>
<body>
<?php include("includes/navigation.php"); ?>

<div class="container-fluid shopping-cart-container">
    <div class="shopping-cart-page">
        <!-- Title -->
        <div class="title">
            Shopping Bag
        </div>

        <!-- Product #1 -->
        <div class="item">
            <div class="buttons">
                <i class="fas fa-times"></i>
                <i class="fas fa-heart"></i>
            </div>

            <div class="image">
                <img src="./assets/img/item-1.png" alt=""/>
            </div>

            <div class="description">
                <span>Common Projects</span>
                <span>Bball High</span>
                <span>White</span>
            </div>

            <div class="quantity">
                <button class="minu-btn" type="button" name="button">
                    <i class="fas fa-minus"></i>
                </button>
                <input type="text" name="name" value="1">
                <button class="plus-btn" type="button" name="button">
                    <i class="fas fa-plus"></i>
                </button>
            </div>

            <div class="total-price">$549</div>
        </div>

        <!-- Product #2 -->
        <div class="item">
            <div class="buttons">
                <i class="fas fa-times"></i>
                <i class="fas fa-heart"></i>
            </div>

            <div class="image">
                <img src="./assets/img/item-2.png" alt=""/>
            </div>

            <div class="description">
                <span>Maison Margiela</span>
                <span>Future Sneakers</span>
                <span>White</span>
            </div>

            <div class="quantity">
                <button class="minu-btn" type="button" name="button">
                    <i class="fas fa-minus"></i>
                </button>
                <input type="text" name="name" value="1">
                <button class="plus-btn" type="button" name="button">
                    <i class="fas fa-plus"></i>
                </button>
            </div>

            <div class="total-price">$870</div>
        </div>

        <!-- Product #3 -->
        <div class="item">
            <div class="buttons">
                <i class="fas fa-times"></i>
                <i class="fas fa-heart"></i>
            </div>

            <div class="image">
                <img src="./assets/img/item-3.png" alt=""/>
            </div>

            <div class="description">
                <span>Our Legacy</span>
                <span>Brushed Scarf</span>
                <span>Brown</span>
            </div>

            <div class="quantity">
                <button class="minu-btn" type="button" name="button">
                    <i class="fas fa-minus"></i>
                </button>
                <input type="text" name="name" value="1">
                <button class="plus-btn" type="button" name="button">
                    <i class="fas fa-plus"></i>
                </button>
            </div>

            <div class="total-price">$349</div>
        </div>
    </div>
</div>

<script type="text/javascript">
    $('.minus-btn').on('click', function (e) {
        e.preventDefault();
        var $this = $(this);
        var $input = $this.closest('div').find('input');
        var value = parseInt($input.val());

        if (value > 1) {
            value = value - 1;
        } else {
            value = 0;
        }

        $input.val(value);

    });

    $('.plus-btn').on('click', function (e) {
        e.preventDefault();
        var $this = $(this);
        var $input = $this.closest('div').find('input');
        var value = parseInt($input.val());

        if (value < 100) {
            value = value + 1;
        } else {
            value = 100;
        }

        $input.val(value);
    });

    $('.like-btn').on('click', function () {
        $(this).toggleClass('is-active');
    });
</script>
</body>
<?php include("includes/scripts.php"); ?>
</html>

