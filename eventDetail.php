<?php include("includes/config.php"); ?>
<?php include("./assets/controllers/eventDetail.php") ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <?php include("includes/headTags.php"); ?>
    <link rel="stylesheet" href="assets/css/eventDetail.css" type="text/css">
    <link rel="stylesheet" href="assets/css/util.css" type="text/css">
</head>
<body>
<?php include("includes/navigation.php"); ?>

<main class="container-fluid product-form">

    <!-- Left Column / Headphones Image -->
    <div class="left-column col-lg-6">
        <img data-image="basic" src="./assets/uploads/event/<?= $productDetails['eventimage1'] ?>" alt="">
        <img data-image="advanced" src="./assets/uploads/event/<?= $productDetails['eventimage2'] ?>" alt="">
        <img data-image="premium" class="active" src="./assets/uploads/event/<?= $productDetails['eventimage3'] ?>"
             alt="">
    </div>


    <!-- Right Column -->
    <div class="right-column col-lg-6">
        <form action="./assets/controllers/addToCart.php" method="get">

            <label>
                <input class="product-id" style="display:none" name="id" value="<?= $_GET['id'] ?>">
            </label>
            <!-- Product Description -->
            <div class="product-description">
                <span class="product-description-general"><?= $productDetails['event_type'] ?></span>
                <h1 class="product-description-title"><?= $productDetails['name'] ?></h1>
                <p class="product-description-content"><?= $productDetails['description'] ?></p>
            </div>

            <!-- Product Configuration -->
            <div class="product-configuration">
                <div class="service-config">
                    <span>Service Quality</span>
                    <div class="service-choose">
                        <label for="service"></label><input id="service" name="service" type="text"
                                                            style="display: none;">
                        <button type="button" class="basic" name="basic">Regular</button>
                        <button type="button" class="advanced" name="advanced">Premium</button>
                        <button type="button" class="premium" name="premium">Luxury</button>
                    </div>
                    <span>Location Selector</span>
                    <div class="pac-card" id="pac-card">
                        <div style="visibility: hidden; height: 0px;">
                            <div id="type-selector" class="pac-controls">
                                <input type="radio" id="changetype-all" checked="checked">
                                <label for="changetype-all">All</label>

                                <input type="radio" id="changetype-establishment">
                                <label for="changetype-establishment">Establishments</label>

                                <input type="radio" id="changetype-address">
                                <label for="changetype-address">Addresses</label>

                                <input type="radio" id="changetype-geocode">
                                <label for="changetype-geocode">Geocodes</label>
                            </div>
                            <div id="strict-bounds-selector" class="pac-controls">
                                <input type="checkbox" id="use-strict-bounds" value="">
                                <label for="use-strict-bounds">Strict Bounds</label>
                            </div>
                        </div>
                        <div class="container" id="pac-container">
                            <div class="container__item">
                                <input id="pac-input" type="text" name="location"
                                       placeholder="Enter a location "
                                       class="form__field" aria-label="Default"
                                       aria-describedby="inputGroup-sizing-default">
                                <!--                                    <button type="button" class="btn btn--primary btn--inside uppercase">Send</button>-->
                            </div>
                        </div>
                    </div>
                    <div id="map"></div>
                    <div id="infowindow-content">
                        <img src="" width="16" height="16" id="place-icon">
                        <span id="place-name" class="title"></span><br>
                        <span id="place-address"></span>
                    </div>
                </div>
            </div>

            <!-- Product Pricing -->
            <div class="product-price">
                <div style="display:none;" id="productPrice"><?= $productDetails['price'] ?></div>
                <span class="product-price-value"><span>&#163;</span><span id="productPriceDisplay"
                    ><?= $productDetails['price'] ?></span></span>
                <?php if (isset($_SESSION['userInfo'])) { ?>
                    <button type="submit" class="cart-btn">Add to cart</button>
                <?php } else { ?>
                    <a href="login.php">You need to Login! </a>
                <?php } ?>
            </div>
        </form>
    </div>
</main>
<?php include("includes/footer.php"); ?>
</body>
<?php include("includes/scripts.php"); ?>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAp_ixDe7lUnJhtKJSp6mgByno7jzC7P04&libraries=places&callback=initMap"
        async defer></script>
<script src="assets/js/eventDetail.js" charset="utf-8"></script>
<script>
    function initMap() {
        console.log("Hello");
        var map = new google.maps.Map(document.getElementById('map'), {
            center: {lat: -33.8688, lng: 151.2195},
            zoom: 13
        });
        var card = document.getElementById('pac-card');
        var input = document.getElementById('pac-input');
        var types = document.getElementById('type-selector');
        var strictBounds = document.getElementById('strict-bounds-selector');

        map.controls[google.maps.ControlPosition.TOP_RIGHT].push(card);

        var autocomplete = new google.maps.places.Autocomplete(input);

        // Bind the map's bounds (viewport) property to the autocomplete object,
        // so that the autocomplete requests use the current map bounds for the
        // bounds option in the request.
        autocomplete.bindTo('bounds', map);

        // Set the data fields to return when the user selects a place.
        autocomplete.setFields(
            ['address_components', 'geometry', 'icon', 'name']);

        var infowindow = new google.maps.InfoWindow();
        var infowindowContent = document.getElementById('infowindow-content');
        infowindow.setContent(infowindowContent);
        var marker = new google.maps.Marker({
            map: map,
            anchorPoint: new google.maps.Point(0, -29)
        });

        autocomplete.addListener('place_changed', function () {
            infowindow.close();
            marker.setVisible(false);
            var place = autocomplete.getPlace();
            if (!place.geometry) {
                // User entered the name of a Place that was not suggested and
                // pressed the Enter key, or the Place Details request failed.
                window.alert("No details available for input: '" + place.name + "'");
                return;
            }

            // If the place has a geometry, then present it on a map.
            if (place.geometry.viewport) {
                map.fitBounds(place.geometry.viewport);
            } else {
                map.setCenter(place.geometry.location);
                map.setZoom(17);  // Why 17? Because it looks good.
            }
            marker.setPosition(place.geometry.location);
            marker.setVisible(true);

            var address = '';
            if (place.address_components) {
                address = [
                    (place.address_components[0] && place.address_components[0].short_name || ''),
                    (place.address_components[1] && place.address_components[1].short_name || ''),
                    (place.address_components[2] && place.address_components[2].short_name || '')
                ].join(' ');
            }

            infowindowContent.children['place-icon'].src = place.icon;
            infowindowContent.children['place-name'].textContent = place.name;
            infowindowContent.children['place-address'].textContent = address;
            infowindow.open(map, marker);
        });

        // Sets a listener on a radio button to change the filter type on Places
        // Autocomplete.
        function setupClickListener(id, types) {
            var radioButton = document.getElementById(id);
            radioButton.addEventListener('click', function () {
                autocomplete.setTypes(types);
            });
        }

        setupClickListener('changetype-all', []);
        setupClickListener('changetype-address', ['address']);
        setupClickListener('changetype-establishment', ['establishment']);
        setupClickListener('changetype-geocode', ['geocode']);

        document.getElementById('use-strict-bounds')
            .addEventListener('click', function () {
                console.log('Checkbox clicked! New state=' + this.checked);
                autocomplete.setOptions({strictBounds: this.checked});
            });
    }
</script>
</html>