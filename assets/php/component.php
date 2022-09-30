
<?php

function component($name, $filter, $desc, $price, $img, $productid) {

    $element = "
    
    <li data-filter=\"$filter\">
        <form action=\"index.php\" method=\"post\">
            <div class=\"menu-card\">  
                <figure class=\"card-banner\">
                    <img src=\"$img\" class=\"img-cover\">
                </figure>
                <div class=\"wrapper\">
                    <h3 class=\"h3 card-title\"> $name </h3>

                    <p class=\"card-text\"> $desc </p>

                    <data class=\"card-price\" value=\"$price\">$$price</data>

                    <button type=\"submit\" class=\"menu-btn\" name=\"add\">Add</button>
                    <input type='hidden' name='product_id' value='$productid'>
                </div>
            </div>
        </form>
    </li>
    

    ";

    echo $element;
}



function cartElem($productimg, $productname, $productprice, $productid) {
    $element="
    <li class=\"order-item\">
        <form action=\"?action=remove&id=$productid\" method=\"post\">
            <div class=\"order-card\">

                <div class=\"card-banner\">
                    <img src= $productimg>
                </div>

                <div class=\"order-content\">
                    <p>$productname</p>
                    <p>$ $productprice</p>
                    <div class=\"order-qty\">

                    <button type=\"button\" name=\"minus\">
                        <i class=\"gg-math-minus\"></i>
                    </button>

                    <input type=\"text\" value=\"1\">

                    <button type=\"button\" name=\"plus\">
                        <i class=\"gg-math-plus\"></i>
                    </button>
                    
                    </div>

                    <button type=\"submit\" class=\"remove\" name=\"remove\">
                    <i class=\"gg-trash\"></i>
                    </button>

                </div>

            </div>
        </form>
    </li>
    ";

    echo $element;
}


?>
