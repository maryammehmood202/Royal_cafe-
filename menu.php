<?php
include('config/auth_guard.php');
?>

<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

include('header.php');

// 📊 CENTRALIZED REPOSITORY DIRECTLY LINKED FOR SEARCH MATCHING
$campuses = [
"premium_coffee" => [
    "label"  => "Premium Coffee Collection",
    "icon"   => "☕",
    "items"  => [
        ["Americano", "americano.png", "300", "Double shot espresso with hot water", "9/10", "10 kcal", "Bestseller", "In Stock", "5%", "3 mins", "Coffee"],
        ["Cappuccino", "cappuccino.png", "360", "Equal parts espresso, steam, and foam", "8/10", "140 kcal", "Classic", "In Stock", "0%", "5 mins", "Coffee"],
        ["Caramel", "caramel.png", "400", "Sweet caramel infused brew", "8.5/10", "210 kcal", "Sweet", "In Stock", "10%", "4 mins", "Flavored"],
        ["Caramel Latte", "caramel-latte.png", "420", "Creamy latte with rich caramel", "9/10", "250 kcal", "Popular", "In Stock", "0%", "5 mins", "Latte"],
        ["Cold Brew", "cold-brew.png", "380", "24-hour steep smooth extraction", "10/10", "5 kcal", "Reserve", "Limited", "0%", "1 min", "Cold"],
        ["Cotton", "cotton.png", "350", "Soft textured airy milk coffee", "8/10", "110 kcal", "New", "In Stock", "0%", "4 mins", "Specialty"],
        ["Dark Chocolate Cake", "dark-chocolate-cake.png", "500", "Coffee-paired intense cocoa cake", "10/10", "450 kcal", "Premium", "In Stock", "15%", "2 mins", "Bakery"],
        ["Flat White", "flat-white.png", "350", "Thin layer of velvet microfoam", "9/10", "120 kcal", "Barista Choice", "In Stock", "0%", "4 mins", "Coffee"],
        ["Fog", "fog.png", "370", "Earl Grey tea latte with vanilla", "8/10", "150 kcal", "Trending", "In Stock", "0%", "5 mins", "Tea-Latte"],
        ["Latte", "latte.png", "380", "Smooth espresso with steamed milk", "9/10", "180 kcal", "Classic", "In Stock", "0%", "4 mins", "Coffee"],
        ["Midnight", "midnight.png", "400", "Extra dark roast for night owls", "10/10", "15 kcal", "Bestseller", "In Stock", "20%", "3 mins", "Strong"],
        ["Mill", "mill.png", "340", "Stone ground traditional style", "8/10", "120 kcal", "Authentic", "Limited", "0%", "6 mins", "Traditional"],
        ["Mocha", "mocha.png", "420", "Espresso with dark chocolate and milk", "10/10", "290 kcal", "Popular", "In Stock", "5%", "5 mins", "Coffee"],
        ["Silk Signature", "silk-signature.png", "450", "Ultra-smooth luxury house blend", "10/10", "200 kcal", "Bestseller", "In Stock", "0%", "5 mins", "Signature"],
        ["Strong Brew", "strong-brew.png", "320", "High caffeine concentrated roast", "9/10", "12 kcal", "Energy", "In Stock", "0%", "3 mins", "Coffee"],
        ["Textile Cappuccino", "textile-cappuccino.png", "390", "Complex foam patterns and rich body", "8/10", "170 kcal", "Signature", "In Stock", "0%", "6 mins", "Artisan"],
    ]
],
"comsats_special" => [
    "label"  => "Comsats Special",
    "icon"   => "🏛️",
    "items"  => [
        ["Comsats Coffee", "comsats-coffee.png", "410", "Tech-inspired energetic blend", "10/10", "200 kcal", "Iconic", "In Stock", "10%", "4 mins", "Campus"],
        ["Clock Tower", "clock-tower.png", "450", "Historic landmark signature blend", "9/10", "220 kcal", "Bestseller", "In Stock", "0%", "5 mins", "Premium"],
    ]
],
"gcuf_special" => [
    "label"  => "GCUF Special",
    "icon"   => "🎓",
    "items"  => [
        ["GCUF Coffee", "gcuf-coffee.png", "400", "Deep heritage roasted beans", "10/10", "190 kcal", "Heritage", "In Stock", "10%", "4 mins", "Campus"],
        ["Golden Faisal", "golden-faisal.png", "480", "Premium saffron infused specialty", "10/10", "230 kcal", "Bestseller", "Limited", "0%", "7 mins", "Luxury"],
        ["Layllpur Latte", "layllpur-latte.png", "430", "Local spices mixed with velvet milk", "9/10", "210 kcal", "Local Favorite", "In Stock", "5%", "5 mins", "Latte"],
    ]
],
"liquid_wellness" => [
    "label"  => "Liquid Wellness",
    "icon"   => "💧",
    "items"  => [
        ["Aam Panna", "aam-panna.png", "200", "Traditional raw mango summer cooler", "9/10", "120 kcal", "Seasonal", "In Stock", "0%", "3 mins", "Fresh"],
        ["Aloevera Juice", "aloevera-juice.png", "220", "Pure aloe pulp health tonic", "9/10", "70 kcal", "Healthy", "In Stock", "0%", "2 mins", "Detox"],
        ["Apple Juice", "apple-juice.png", "180", "Cold pressed red apples", "8/10", "95 kcal", "Bestseller", "In Stock", "0%", "2 mins", "Fruit"],
        ["Arabic Qahwa", "arabic-qahwa.png", "250", "Cardamom infused traditional tea", "9/10", "10 kcal", "Traditional", "In Stock", "15%", "6 mins", "Tea"],
        ["Arnold Palmer", "arnold-palmer.png", "220", "Classic half-tea half-lemonade", "8/10", "110 kcal", "Classic", "In Stock", "0%", "2 mins", "Mocktail"],
        ["Avocada Shake", "avocada-shake.png", "450", "Creamy avocado energy boost", "9/10", "320 kcal", "Bestseller", "In Stock", "0%", "5 mins", "Shake"],
        ["Baobab Juice", "baobab-juice.png", "280", "African superfood vitamin juice", "8/10", "140 kcal", "Exotic", "Out of Stock", "0%", "4 mins", "Superfood"],
        ["Beetroot", "beetroot.png", "200", "Red detox iron booster", "9/10", "85 kcal", "Healthy", "In Stock", "10%", "3 mins", "Detox"],
        ["Blue Berry Smoothie", "blue-berry-smoothie.png", "400", "Antioxidant rich wild berries", "9/10", "240 kcal", "New", "In Stock", "0%", "5 mins", "Smoothie"],
        ["Carrot Orange Juice", "carrot-orange-juice.png", "210", "Immunity boosting citrus mix", "10/10", "100 kcal", "Bestseller", "In Stock", "5%", "3 mins", "Fresh"],
        ["Chaas", "chaas.png", "120", "Spiced traditional buttermilk", "9/10", "60 kcal", "Digestive", "In Stock", "0%", "2 mins", "Dairy"],
        ["Coconut Water", "coconut-water.png", "250", "Pure natural electrolyte water", "10/10", "45 kcal", "Natural", "In Stock", "0%", "1 min", "Fresh"],
        ["Cucumber Mint", "cucumber-mint.png", "190", "Refreshing garden cooler", "8/10", "40 kcal", "Cooling", "In Stock", "0%", "3 mins", "Detox"],
        ["Dragon Fruit", "dragon-fruit.png", "420", "Vibrant pink exotic refresher", "9/10", "130 kcal", "Premium", "Limited", "0%", "5 mins", "Exotic"],
        ["Granita Slush", "granita-slush.png", "350", "Shaved ice with fruit syrup", "9/10", "180 kcal", "Bestseller", "In Stock", "0%", "4 mins", "Frozen"],
        ["Grape Fruit Juice", "grape-fruit-juice.png", "230", "Tangy fat-burning citrus", "8/10", "90 kcal", "Diet", "In Stock", "0%", "3 mins", "Fruit"],
        ["Grape Juice", "grape-juice.png", "200", "Freshly pressed black grapes", "8/10", "120 kcal", "Classic", "In Stock", "0%", "3 mins", "Fruit"],
        ["Green Juice", "green-juice.png", "240", "Spinach, apple and kale mix", "9/10", "95 kcal", "Healthy", "In Stock", "5%", "4 mins", "Detox"],
        ["Hibiscus Tea", "hibuscus-tea.png", "220", "Ruby red floral infusion", "8/10", "60 kcal", "Floral", "In Stock", "0%", "4 mins", "Tea"],
        ["Horchata", "horchata.png", "300", "Cinnamon rice milk refreshment", "9/10", "200 kcal", "Mexican", "In Stock", "0%", "5 mins", "Specialty"],
        ["Iced Teas", "iced-teas.png", "250", "Selection of fruit infused teas", "7/10", "90 kcal", "Variety", "In Stock", "0%", "2 mins", "Tea"],
        ["Jallab", "jallab.png", "280", "Date and grape syrup drink", "8/10", "160 kcal", "Traditional", "In Stock", "0%", "3 mins", "Middle-Eastern"],
        ["Kiwi Cooler", "kiwi-cooler.png", "320", "Zesty kiwi and lime mix", "8/10", "140 kcal", "Refreshing", "In Stock", "0%", "4 mins", "Fresh"],
        ["Lemon Ginger Detox", "lemon-ginger-detox.png", "190", "Warm or cold immunity cleanse", "9/10", "45 kcal", "Bestseller", "In Stock", "10%", "3 mins", "Detox"],
        ["Lemon Iced Tea", "lemon-iced-tea.png", "200", "Tangy lemon tea over ice", "9/10", "80 kcal", "Classic", "In Stock", "0%", "2 mins", "Tea"],
        ["Mango Juice", "mango-juice.png", "180", "Freshly pulped Sindhri mangoes", "10/10", "130 kcal", "Bestseller", "In Stock", "0%", "3 mins", "Fruit"],
        ["Mango Lassi", "mango-lassi.png", "250", "Yogurt and mango creamy blend", "10/10", "250 kcal", "Popular", "In Stock", "0%", "4 mins", "Dairy"],
        ["Masala Chai", "masala-chai.png", "150", "Milk tea with secret spices", "9/10", "120 kcal", "Classic", "In Stock", "0%", "6 mins", "Tea"],
        ["Matcha Latte", "match-latte.png", "350", "Japanese ceremonial green tea", "9/10", "140 kcal", "Bestseller", "In Stock", "10%", "5 mins", "Wellness"],
        ["Mint Margretta", "mint-margretta.png", "300", "Frozen lime and mint delight", "9/10", "150 kcal", "Popular", "In Stock", "0%", "4 mins", "Frozen"],
        ["Orange Juice", "orange-juice.png", "180", "100% natural orange squeeze", "8/10", "90 kcal", "Fresh", "In Stock", "0%", "2 mins", "Fruit"],
        ["Passion Fruit", "passion-fruit.png", "380", "Tangy tropical seed infusion", "9/10", "140 kcal", "Exotic", "In Stock", "0%", "4 mins", "Fresh"],
        ["Pine Apple Juice", "pine-apple-juice.png", "200", "Golden tropical juice", "9/10", "110 kcal", "Fresh", "In Stock", "0%", "3 mins", "Fruit"],
        ["Pomegranate Juice", "pomegranate-juice.png", "260", "Freshly deseeded red juice", "10/10", "140 kcal", "Bestseller", "In Stock", "5%", "4 mins", "Fruit"],
        ["Protein Shake", "protein-shake.png", "500", "Post-workout whey protein", "10/10", "300 kcal", "Gym-Fuel", "In Stock", "0%", "3 mins", "Wellness"],
        ["Sattu", "sattu.png", "150", "Roasted gram energy drink", "7/10", "210 kcal", "Traditional", "In Stock", "0%", "3 mins", "Wellness"],
        ["Soursoce", "soursoce.png", "350", "Rare soursop fruit extract", "8/10", "130 kcal", "Rare", "Limited", "0%", "5 mins", "Exotic"],
        ["Sugarcane Juice", "sugarcane-juice.png", "150", "Cold pressed natural sugar", "9/10", "180 kcal", "Bestseller", "In Stock", "0%", "2 mins", "Fresh"],
        ["Swicy", "swicy.png", "280", "Sweet and spicy blend", "8/10", "120 kcal", "Trending", "In Stock", "0%", "4 mins", "Specialty"],
        ["Tamarind Juice", "tamarind-juice.png", "170", "Tangy imli refresher", "8/10", "110 kcal", "Classic", "In Stock", "0%", "3 mins", "Fresh"],
        ["Watermelon Juice", "watermelon-juice.png", "180", "Summer hydration juice", "8/10", "90 kcal", "Popular", "In Stock", "0%", "2 mins", "Fruit"],
    ]
],
"bakery_bistro" => [
    "label"  => "Bakery & Bistro",
    "icon"   => "🥐",
    "items"  => [
        ["Alfreedo Pasta", "alfreedo-pasta.png", "650", "Fettuccine in white cream sauce", "10/10", "600 kcal", "Bestseller", "In Stock", "0%", "15 mins", "Pasta"],
        ["Baked Goods", "baked-goods.png", "300", "Assorted daily oven treats", "8/10", "250 kcal", "Variety", "In Stock", "10%", "2 mins", "Bakery"],
        ["Boiled Eggs", "boiled-eggs.png", "150", "Two farm fresh hard boiled eggs", "8/10", "160 kcal", "Healthy", "In Stock", "0%", "8 mins", "Breakfast"],
        ["Cake", "cake.png", "500", "Whole artisan sponge cake", "9/10", "1200 kcal", "Family Size", "Limited", "0%", "5 mins", "Bakery"],
        ["Cake Slice", "cake-slice.png", "250", "Moist velvet cake portion", "9/10", "350 kcal", "Bestseller", "In Stock", "0%", "2 mins", "Dessert"],
        ["Chesse Muffins", "chesse-muffins.png", "220", "Savory cheddar filled muffins", "8/10", "280 kcal", "Savory", "In Stock", "0%", "5 mins", "Bakery"],
        ["Chocolate Croissant", "chocolate-croissant.png", "280", "Flaky pastry with dark chocolate", "10/10", "340 kcal", "Popular", "In Stock", "15%", "3 mins", "Pastry"],
        ["Classic Plain Croissant", "classic_plain_croissant.png", "220", "Butter rich flaky layers", "9/10", "250 kcal", "Authentic", "In Stock", "0%", "2 mins", "Pastry"],
        ["Croissants", "croissants.png", "220", "Daily selection of croissants", "9/10", "250 kcal", "Classic", "In Stock", "0%", "2 mins", "Pastry"],
        ["Donut", "donut.png", "180", "Glazed chocolate or sugar donut", "9/10", "300 kcal", "Popular", "In Stock", "0%", "1 min", "Bakery"],
        ["Egg Croissant", "egg-croissant.png", "350", "Croissant sandwich with eggs", "9/10", "410 kcal", "Breakfast", "In Stock", "0%", "8 mins", "Savory"],
        ["Fruit Tart", "fruit-tart.png", "300", "Shortcrust pastry with custard", "10/10", "300 kcal", "Bestseller", "In Stock", "0%", "2 mins", "Bakery"],
        ["Lasanga Pasta", "lasanga-pasta.png", "700", "Layered meat and cheese pasta", "10/10", "700 kcal", "Chef Special", "In Stock", "0%", "20 mins", "Pasta"],
        ["Mac Cheese Pasta", "mac-cheese-pasta.png", "550", "Ultra cheesy macaroni", "9/10", "580 kcal", "Comfort", "In Stock", "5%", "12 mins", "Pasta"],
        ["Mushroom Danish", "mushroom-danish.png", "250", "Savory pastry with wild mushrooms", "8/10", "240 kcal", "Savory", "In Stock", "0%", "5 mins", "Bakery"],
        ["Pancakes", "pancakes.png", "350", "Stack of 3 fluffy pancakes", "9/10", "400 kcal", "Bestseller", "In Stock", "0%", "12 mins", "Brunch"],
        ["Pasta", "pasta.png", "500", "House special red sauce pasta", "8/10", "450 kcal", "Classic", "In Stock", "10%", "15 mins", "Pasta"],
        ["Pasta Arrabiata", "pasta-arrabiata.png", "580", "Spicy tomato and garlic pasta", "9/10", "480 kcal", "Popular", "In Stock", "0%", "14 mins", "Pasta"],
        ["Plain Croissant", "plain-croissant.png", "200", "Standard butter pastry", "8/10", "240 kcal", "Value", "In Stock", "0%", "2 mins", "Pastry"],
        ["Spaghetti Bolognese", "spaghetti-bolognese-pasta.png", "620", "Classic Italian meat spaghetti", "10/10", "620 kcal", "Classic", "In Stock", "0%", "15 mins", "Pasta"],
        ["Waffles", "waffles.png", "360", "Crispy waffles with syrup", "10/10", "420 kcal", "Bestseller", "In Stock", "0%", "12 mins", "Brunch"],
    ]
],
"global_gastronomy" => [
    "label"  => "Global Gastronomy",
    "icon"   => "🍝",
    "items"  => [
        ["Chenab", "chenab.png", "450", "Regional fusion specialty", "9/10", "380 kcal", "Local Mix", "In Stock", "0%", "10 mins", "Fusion"],
        ["Creepes", "creepes.png", "340", "French thin pancakes", "9/10", "300 kcal", "Delicate", "In Stock", "0%", "8 mins", "French"],
        ["Dumplings", "dumplings.png", "450", "Steamed chicken dumplings (6pc)", "9/10", "400 kcal", "Popular", "In Stock", "0%", "15 mins", "Asian"],
        ["Edamame Beans", "edamame-beans.png", "300", "Salted soy beans in pods", "8/10", "120 kcal", "Healthy", "In Stock", "0%", "5 mins", "Asian"],
        ["Empandas", "empandas.png", "480", "Stuffed Latin savory pastries", "9/10", "420 kcal", "New", "In Stock", "10%", "12 mins", "Latin"],
        ["Falafel", "falafel.png", "400", "Deep fried chickpea balls", "8/10", "350 kcal", "Vegan", "In Stock", "0%", "10 mins", "Arabic"],
        ["Fries", "fries.png", "250", "Golden crispy potato fries", "10/10", "400 kcal", "Classic", "In Stock", "0%", "8 mins", "Sides"],
        ["Fried Chicken", "fried-chicken.png", "350", "Crunchy deep fried pieces", "10/10", "600 kcal", "Bestseller", "In Stock", "15%", "15 mins", "Chicken"],
        ["Gourmet Wraps", "gourmet-wraps.png", "450", "Chef's special filled tortillas", "9/10", "430 kcal", "Premium", "In Stock", "0%", "10 mins", "Wrap"],
        ["Loaded Fries", "loaded-fries.png", "250", "Fries with cheese and jalapenos", "10/10", "400 kcal", "Bestseller", "In Stock", "0%", "10 mins", "Sides"],
        ["Noodles", "noodles.png", "500", "Stir fried egg noodles", "9/10", "450 kcal", "Quick", "In Stock", "0%", "12 mins", "Asian"],
        ["Ramen", "ramen.png", "600", "Authentic Japanese noodle soup", "9/10", "550 kcal", "Premium", "In Stock", "0%", "18 mins", "Asian"],
        ["Rolls", "rolls.png", "200", "Savory stuffed snack rolls", "8/10", "300 kcal", "Value", "In Stock", "0%", "8 mins", "Snack"],
        ["Sushi Rolls", "sushi-rolls.png", "750", "Premium salmon and rice rolls", "9/10", "500 kcal", "Chef Choice", "Limited", "0%", "20 mins", "Japanese"],
        ["Vege Dip", "vege-dip.png", "280", "Vegetable sticks with hummus", "9/10", "150 kcal", "Healthy", "In Stock", "0%", "5 mins", "Sides"],
    ]
],
"grab_go" => [
    "label"  => "Grab & Go",
    "icon"   => "🍟",
    "items"  => [
        ["Barebell", "barebell.png", "350", "Premium protein bar", "9/10", "200 kcal", "Gym Pack", "In Stock", "0%", "1 min", "Fitness"],
        ["Burger", "burger.png", "450", "Classic beef patty burger", "9/10", "550 kcal", "Classic", "In Stock", "0%", "12 mins", "Burger"],
        ["Chapli Kabab Burger", "chapli-kabab-burger.png", "480", "Local spice patty burger", "9/10", "580 kcal", "Popular", "In Stock", "0%", "15 mins", "Burger"],
        ["Chicken Wraps", "chicken-wraps.png", "350", "Grilled chicken in tortilla", "9/10", "420 kcal", "Bestseller", "In Stock", "10%", "10 mins", "Wrap"],
        ["Choco Chip Granola", "chocolate-chip-granola.png", "180", "Energy bar with choco chips", "9/10", "220 kcal", "Healthy", "In Stock", "0%", "1 min", "Snack"],
        ["Chomps", "chomps.png", "120", "Mini savory meat snacks", "8/10", "100 kcal", "Mini", "In Stock", "0%", "1 min", "Snack"],
        ["Cut Fruits", "cut-fruits.png", "200", "Box of seasonal sliced fruits", "9/10", "90 kcal", "Fresh", "In Stock", "0%", "1 min", "Healthy"],
        ["Dust Gold", "dust-gold.png", "150", "Golden roasted snack mix", "8/10", "120 kcal", "New", "Limited", "0%", "1 min", "Snack"],
        ["Granola Bar", "granola-bar.png", "180", "Handmade oat and honey bar", "9/10", "220 kcal", "Organic", "In Stock", "0%", "1 min", "Snack"],
        ["Hot Dog", "hot-dog.png", "300", "Steamed sausage in bun", "8/10", "400 kcal", "Classic", "In Stock", "5%", "6 mins", "Burger"],
        ["Nutrilov Granola Bar", "nutrilov-granola-bar.png", "200", "Nutrient dense energy bar", "9/10", "230 kcal", "Premium", "In Stock", "0%", "1 min", "Snack"],
        ["Nuts", "nuts.png", "150", "Mixed salted nuts pack", "8/10", "200 kcal", "Healthy", "In Stock", "0%", "1 min", "Snack"],
        ["Panini", "panini.png", "400", "Grilled Italian sandwich", "10/10", "480 kcal", "Bestseller", "In Stock", "0%", "10 mins", "Sandwich"],
        ["Popcorn Chicken", "popcorn-chicken.png", "300", "Crispy chicken bite sizes", "9/10", "450 kcal", "Popular", "In Stock", "0%", "8 mins", "Chicken"],
        ["Protien Chips", "protien-chips.png", "250", "High protein baked chips", "8/10", "140 kcal", "Fitness", "In Stock", "0%", "1 min", "Snack"],
        ["Sandwich", "sandwich.png", "380", "Layered cold club sandwich", "9/10", "450 kcal", "Classic", "In Stock", "0%", "5 mins", "Sandwich"],
        ["Spicy Popcorn", "spicy-popcorn.png", "150", "Chili lime popcorn bucket", "9/10", "200 kcal", "Trending", "In Stock", "0%", "3 mins", "Snack"],
        ["Toffee Popcorn", "toffee-popcorn.png", "180", "Caramel glazed popcorn", "9/10", "250 kcal", "Popular", "In Stock", "0%", "3 mins", "Snack"],
        ["Wrap", "wrap.png", "350", "Standard vegetable wrap", "8/10", "390 kcal", "Value", "In Stock", "0%", "8 mins", "Wrap"],
        ["Zinger Burger", "zinger-burger.png", "500", "Spicy breaded chicken burger", "10/10", "650 kcal", "Bestseller", "In Stock", "20%", "15 mins", "Burger"],
    ]
],
"dessert_atelier" => [
    "label"  => "Dessert Atelier",
    "icon"   => "🍰",
    "items"  => [
        ["Brownie", "brownie.png", "300", "Dark chocolate walnut brownie", "9/10", "400 kcal", "Classic", "In Stock", "0%", "2 mins", "Bakery"],
        ["Brownie Milkshake", "brownie-milkshake.png", "450", "Thick shake with brownie chunks", "10/10", "550 kcal", "Bestseller", "In Stock", "0%", "6 mins", "Shake"],
        ["Bubble Tea", "bubble-tea.png", "400", "Milk tea with tapioca pearls", "10/10", "220 kcal", "Popular", "In Stock", "10%", "5 mins", "Specialty"],
        ["Cheese Cake", "cheese-cake.png", "520", "New York baked cheesecake", "10/10", "650 kcal", "Premium", "In Stock", "0%", "2 mins", "Bakery"],
        ["Chocolate Cake", "chocolate-cake.png", "500", "Rich dark chocolate ganache", "10/10", "700 kcal", "Classic", "In Stock", "0%", "2 mins", "Bakery"],
        ["Chocolate Delight", "chocolate-delight.png", "420", "Mousse and biscuit dessert", "9/10", "410 kcal", "Bestseller", "In Stock", "0%", "3 mins", "Dessert"],
        ["Churros", "churros.png", "350", "Fried dough with cinnamon sugar", "9/10", "450 kcal", "New", "In Stock", "0%", "10 mins", "Spanish"],
        ["Fudge Cake", "fudge-cake.png", "480", "Gooey chocolate fudge layers", "9/10", "520 kcal", "Popular", "In Stock", "0%", "2 mins", "Bakery"],
        ["Ice Cream Soda", "ice-cream-soda.png", "350", "Vanilla float in fizzy soda", "8/10", "300 kcal", "Retro", "In Stock", "0%", "4 mins", "Cold"],
        ["Kitkat Shake", "kitkat-shake.png", "460", "Blended Kitkat chocolate shake", "10/10", "420 kcal", "Bestseller", "In Stock", "5%", "6 mins", "Shake"],
        ["Lava Cake", "lava.png", "550", "Molten center chocolate cake", "10/10", "720 kcal", "Must Try", "In Stock", "0%", "15 mins", "Bakery"],
        ["Mango Ice Slush", "mango-ice-slush.png", "360", "Frozen mango dessert drink", "10/10", "200 kcal", "Seasonal", "In Stock", "0%", "4 mins", "Frozen"],
        ["Milkshake", "milkshake.png", "380", "Standard vanilla thick shake", "9/10", "250 kcal", "Classic", "In Stock", "0%", "5 mins", "Shake"],
        ["Oreo Shake", "oreo-shake.png", "440", "Cookies and cream milkshake", "10/10", "410 kcal", "Bestseller", "In Stock", "0%", "6 mins", "Shake"],
        ["Rich Chocolate Delight", "rich-chocolate-delight.png", "450", "Premium cocoa bean mousse", "10/10", "460 kcal", "Premium", "In Stock", "0%", "4 mins", "Dessert"],
        ["Slushie", "slushie.png", "250", "Flavored ice cold slush", "9/10", "180 kcal", "Cool", "In Stock", "0%", "3 mins", "Frozen"],
        ["Slush Puppie", "slush-puppie.png", "340", "Original blue raspberry slush", "8/10", "170 kcal", "Classic", "In Stock", "0%", "3 mins", "Frozen"],
        ["Special PK", "special-pk.png", "400", "House secret sweet treat", "9/10", "320 kcal", "Unique", "Limited", "0%", "5 mins", "Specialty"],
        ["Tiramisu", "tiramisu.png", "600", "Authentic Italian coffee dessert", "10/10", "680 kcal", "Bestseller", "In Stock", "0%", "2 mins", "Bakery"],
        ["Tiramisu Coffee", "tiramisu-coffee.png", "460", "Espresso mixed with mascarpone", "10/10", "300 kcal", "Popular", "In Stock", "10%", "5 mins", "Coffee-Dessert"],
        ["Vanilla Cream Frappe", "vanilla-cream-frappe.png", "420", "Iced vanilla cream blended", "9/10", "380 kcal", "Cool", "In Stock", "0%", "6 mins", "Cold"],
        ["Yogurt Perfaits", "yogurt-perfaits.png", "280", "Honey, yogurt and fruit layers", "9/10", "280 kcal", "Healthy", "In Stock", "0%", "5 mins", "Healthy"],
    ]
]
];

// Read input parameter smoothly from search bar triggers
$search = isset($_GET['search']) ? trim($_GET['search']) : '';
$category = isset($_GET['category']) ? trim($_GET['category']) : '';
?>

<link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700;900&family=Inter:wght@300;400;500;600;700&family=JetBrains+Mono:wght@400;500&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

<style>
:root{
    --royal-black:#070707;
    --royal-dark:#111111;
    --royal-card:rgba(255,255,255,.05);
    --royal-border:rgba(255,255,255,.08);
    --gold:#D4AF37;
    --gold-light:#f7df8a;
    --gold-soft:#fff3bf;
    --text:#ffffff;
    --muted:rgba(255,255,255,.68);
}

body{
    background: radial-gradient(circle at top right, rgba(212,175,55,.08), transparent 30%), radial-gradient(circle at bottom left, rgba(255,255,255,.03), transparent 20%), linear-gradient(to bottom,#070707,#0f0f0f,#090909);
    color:var(--text); overflow-x:hidden;
}

.mono { font-family: 'JetBrains Mono', monospace; }

/* =================================
HERO & FILTERS
================================= */
.menu-hero{ min-height:78vh; position:relative; overflow:hidden; display:flex; align-items:center; border-bottom:1px solid rgba(255,255,255,.05); }
.menu-hero::before{ content:''; position:absolute; inset:0; background:linear-gradient(to right, rgba(0,0,0,.92), rgba(0,0,0,.72), rgba(0,0,0,.82)); }
.hero-glow{ position:absolute; width:700px; height:700px; border-radius:50%; background:rgba(212,175,55,.08); filter:blur(90px); top:-250px; right:-150px; animation:floatGlow 8s ease-in-out infinite; }
@keyframes floatGlow{ 0%,100%{ transform:translateY(0px); } 50%{ transform:translateY(35px); } }
.hero-content{ position:relative; z-index:2; }
.hero-badge{ display:inline-flex; align-items:center; gap:10px; padding:12px 24px; border-radius:999px; background:rgba(212,175,55,.12); border:1px solid rgba(212,175,55,.22); color:var(--gold-light); backdrop-filter:blur(14px); margin-bottom:28px; font-weight:600; letter-spacing:1px; }
.hero-title{ font-size:clamp(3rem,7vw,6.5rem); line-height:.95; font-weight:900; letter-spacing:-4px; margin-bottom:28px; background:linear-gradient(135deg, #ffffff 0%, #f7efcf 35%, #D4AF37 75%, #fff7d4 100%); -webkit-background-clip:text; -webkit-text-fill-color:transparent; }
.hero-desc{ max-width:760px; font-size:1.08rem; line-height:1.9; color:rgba(255,255,255,.72); }

.glass-card{ background:rgba(255,255,255,0.04); border:1px solid rgba(255,255,255,0.08); backdrop-filter:blur(20px); -webkit-backdrop-filter:blur(20px); border-radius:30px; box-shadow:0 10px 40px rgba(0,0,0,.28), inset 0 1px 0 rgba(255,255,255,.04); transition:.45s ease; }
.filter-wrap{ margin-top:-80px; position:relative; z-index:20; }
.filter-title{ font-size:1.3rem; font-weight:800; background:linear-gradient(135deg, #fff, #f4df93, #D4AF37); -webkit-background-clip:text; -webkit-text-fill-color:transparent; }
.filter-sub{ color:rgba(255,255,255,.5); }

.input-luxury, .select-luxury{ height:60px; background:rgba(255,255,255,.05)!important; border:1px solid rgba(255,255,255,.08)!important; border-radius:20px!important; color:#fff!important; padding:0 22px!important; transition:.35s ease; }
.input-luxury:focus, .select-luxury:focus{ background:rgba(255,255,255,.08)!important; border-color:rgba(212,175,55,.35)!important; box-shadow: 0 0 0 4px rgba(212,175,55,.12)!important; }
.select-luxury option{ background:#111; color:#fff; }

.btn-royal{ height:60px; border:none; border-radius:20px; font-weight:800; color:#fff4c5!important; background:linear-gradient(135deg, #fff3b0 0%, #f5d66d 18%, #D4AF37 48%, #b8860b 80%, #ffe89a 100%); box-shadow:0 10px 30px rgba(212,175,55,.28); transition:.35s ease; }
.btn-royal:hover{ transform:translateY(-4px); box-shadow:0 20px 40px rgba(212,175,55,.35); }
.voice-btn{ width:60px; height:60px; border:none; border-radius:20px; background:linear-gradient(135deg, rgba(212,175,55,.28), rgba(212,175,55,.12)); color:var(--gold-light); display:flex; align-items:center; justify-content:center; }

/* =================================
CARDS GRID DESIGN
================================= */
.info-strip{ display:grid; grid-template-columns:repeat(auto-fit,minmax(240px,1fr)); gap:24px; }
.info-box{ padding:30px; border-radius:28px; background:rgba(255,255,255,.03); border:1px solid rgba(255,255,255,.06); transition:.4s ease; }
.info-icon{ width:68px; height:68px; border-radius:20px; display:flex; align-items:center; justify-content:center; margin-bottom:20px; background:rgba(212,175,55,.12); color:var(--gold); font-size:1.4rem; }
.info-box h5{ color:#fff0bf; margin-bottom:14px; font-weight:700; }
.info-box p{ color:rgba(255,255,255,.62); line-height:1.8; margin:0; }

.section-title{ font-size:2.5rem; font-weight:900; letter-spacing:-1px; background:linear-gradient(135deg, #fff, #f3dc87, #D4AF37); -webkit-background-clip:text; -webkit-text-fill-color:transparent; }
.section-sub{ color:rgba(255,255,255,.6); max-width:760px; line-height:1.9; }

.menu-card{ background:rgba(255,255,255,.04); border:1px solid rgba(255,255,255,.08); border-radius:28px; overflow:hidden; transition:.4s ease; height:100%; display:flex; flex-direction:column; justify-content:space-between; }
.menu-card:hover{ transform:translateY(-10px); border-color:rgba(212,175,55,.25); box-shadow:0 20px 40px rgba(0,0,0,0.3); }
.menu-card img { width:100%; height:260px; object-fit:cover; }
.menu-content{ padding:25px; flex-grow:1; display:flex; flex-direction:column; justify-content:space-between; }
.menu-title{ color:#fff0bf; font-size:1.3rem; font-weight:700; }
.menu-desc{ color:rgba(255,255,255,.6); line-height:1.7; min-height:70px; font-size:0.92rem; }
.price{ color:var(--gold-light); font-size:1.2rem; font-weight:800; }
.qty-input{ width:70px; height:60px; background:rgba(255,255,255,.05); border:1px solid rgba(255,255,255,.08); border-radius:16px; color:#fff; text-align:center; font-weight:600; outline:none; }
.badge-premium { font-size: 11px; padding: 5px 14px; border-radius: 20px; background: rgba(212, 175, 55, 0.08); border: 1px solid rgba(212, 175, 55, 0.25); color: #D4AF37; font-weight: 500; display: inline-block; text-transform: uppercase; }

.reveal{ opacity:0; transform:translateY(40px); transition:1s ease; }
.reveal.active{ opacity:1; transform:translateY(0); }

@media(max-width:768px){ .hero-title{ font-size:3.6rem; } .filter-wrap{ margin-top:-50px; } .section-title{ font-size:2rem; } }
</style>

<section class="menu-hero">
    <div class="hero-glow"></div>
    <div class="container hero-content">
        <div class="reveal active">
            <div class="hero-badge"><i class="bi bi-stars"></i> ULTRA PREMIUM DIGITAL MENU</div>
            <h1 class="hero-title">The Royal<br>Selection</h1>
            <p class="hero-desc">Discover handcrafted coffee blends, artisan bakery creations, premium desserts and signature campus specials.</p>
        </div>
    </div>
</section>

<div class="container filter-wrap">
    <div class="glass-card p-4 p-lg-5 reveal active">
        <div class="d-flex justify-content-between align-items-center flex-wrap gap-4 mb-4">
            <div>
                <h3 class="filter-title mb-2">Smart Menu Explorer</h3>
                <div class="filter-sub">AI-powered luxury filtering & live menu array search</div>
            </div>
        </div>

        <form method="GET" action="menu.php">
            <div class="row g-3">
                <div class="col-lg-6">
                    <label class="small text-secondary mb-2">SEARCH MENU</label>
                    <div class="d-flex gap-2">
                        <input type="text" name="search" id="searchInput" class="form-control input-luxury" placeholder="Search coffee, desserts, drinks..." value="<?php echo htmlspecialchars($search); ?>">
                        <button type="button" class="voice-btn" id="voiceBtn"><i class="bi bi-mic-fill"></i></button>
                    </div>
                </div>

                <div class="col-lg-4">
                    <label class="small text-secondary mb-2">CATEGORY</label>
                    <select name="category" id="categoryDropdown" class="form-select select-luxury">
                        <option value="">All Categories</option>
                        <option value="coffee" <?php echo ($category === 'coffee') ? 'selected' : ''; ?>>Coffee</option>
                        <option value="dessert" <?php echo ($category === 'dessert') ? 'selected' : ''; ?>>Dessert</option>
                        <option value="food" <?php echo ($category === 'food') ? 'selected' : ''; ?>>Food</option>
                        <option value="bakery" <?php echo ($category === 'bakery') ? 'selected' : ''; ?>>Bakery</option>
                    </select>
                </div>

                <div class="col-lg-2 d-flex align-items-end">
                    <button type="submit" class="btn btn-royal w-100">Explore</button>
                </div>
            </div>
        </form>
    </div>
</div>

<section class="py-5">
    <div class="container">
        <div class="info-strip">
            <div class="info-box reveal"><div class="info-icon"><i class="bi bi-cup-hot"></i></div><h5>Luxury Coffee</h5><p>Premium ethically sourced coffee crafted with precision roasting.</p></div>
            <div class="info-box reveal"><div class="info-icon"><i class="bi bi-cake2"></i></div><h5>Fresh Bakery</h5><p>Daily artisan pastries and desserts prepared fresh every day.</p></div>
            <div class="info-box reveal"><div class="info-icon"><i class="bi bi-lightning-charge"></i></div><h5>Fast Experience</h5><p>Optimized smart ordering experience designed for modern café lifestyle.</p></div>
        </div>
    </div>
</section>

<section class="pb-5">
    <div class="container">
        <h2 class="section-title mb-3">Curated Menu Collection</h2>
        <p class="section-sub mb-5">Browse our premium digital data repository featuring artisan coffee and desserts.</p>

        <div class="row g-4">
            <?php
            $items_displayed = 0;

            // Loop out directly from static campus matrix blocks setup
            foreach ($campuses as $camp_id => $camp_data) {
                foreach ($camp_data['items'] as $item) {
                    $item_name = $item[0];
                    $item_img  = $item[1];
                    $item_price = $item[2];
                    $item_desc = $item[3];
                    $item_cat  = strtolower($item[10]); // Extract category tag explicitly

                    // Apply Search Text Filter
                    if (!empty($search) && strpos(strtolower($item_name), strtolower($search)) === false) {
                        continue;
                    }

                    // Apply Category Select Dropdown Filter
                    if (!empty($category) && $item_cat !== strtolower($category)) {
                        continue;
                    }

                    $items_displayed++;
            ?>
            <div class="col-md-6 col-lg-4 reveal active">
                <div class="menu-card">
                    <img src="images/<?php echo htmlspecialchars($item_img); ?>" alt="<?php echo htmlspecialchars($item_name); ?>" onerror="this.src='https://images.unsplash.com/photo-1495474472287-4d71bcdd2085?w=500';">
                    <div class="menu-content">
                        <div>
                            <h3 class="menu-title mb-2"><?php echo htmlspecialchars($item_name); ?></h3>
                            <p class="menu-desc"><?php echo htmlspecialchars($item_desc); ?></p>
                        </div>
                        <div>
                            <div class="d-flex justify-content-between align-items-center mb-4">
                                <span class="price fw-bold mono">Rs. <?php echo number_format($item_price); ?></span>
                                <span class="badge-premium"><?php echo ucfirst($item_cat); ?></span>
                            </div>

                            <form action="add_to_cart.php" method="POST">
                                <input type="hidden" name="item_name" value="<?php echo htmlspecialchars($item_name); ?>">
                                <div class="d-flex gap-3">
                                    <input type="number" name="quantity" value="1" min="1" class="qty-input">
                                    <button type="submit" name="add_btn" class="btn btn-royal flex-grow-1"><i class="bi bi-cart-plus me-2"></i> Add To Cart</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <?php
                }
            }

            if ($items_displayed === 0) {
                echo "
                <div class='col-12 text-center py-5'>
                    <i class='bi bi-search text-gold fs-1 mb-3 d-block'></i>
                    <h3 class='text-warning mb-2'>No Items Found</h3>
                    <p class='text-secondary'>No products matched your exact search query parameters inside the campus list.</p>
                </div>";
            }
            ?>
        </div>
    </div>
</section>

<script>
document.addEventListener("DOMContentLoaded", function() {
    const urlParams = new URLSearchParams(window.location.search);
    const searchInputValue = urlParams.get('search');
    const categoryDropdown = document.getElementById('categoryDropdown');

    if (searchInputValue && categoryDropdown && !urlParams.get('category')) {
        const cleanSearch = searchInputValue.trim().toLowerCase();
        let targetCategory = "";

        // Client engineering smart detection maps matrix 
        if (cleanSearch.includes("coffee") || cleanSearch.includes("latte") || cleanSearch.includes("brew") || cleanSearch.includes("espresso") || cleanSearch.includes("americano") || cleanSearch.includes("cappuccino") || cleanSearch.includes("mocha") || cleanSearch.includes("faisal")) {
            targetCategory = "coffee";
        } else if (cleanSearch.includes("cake") || cleanSearch.includes("shake") || cleanSearch.includes("smoothie") || cleanSearch.includes("dessert") || cleanSearch.includes("tiramisu") || cleanSearch.includes("brownie") || cleanSearch.includes("delight") || cleanSearch.includes("slush")) {
            targetCategory = "dessert";
        } else if (cleanSearch.includes("burger") || cleanSearch.includes("fries") || cleanSearch.includes("pasta") || cleanSearch.includes("chicken") || cleanSearch.includes("noodles") || cleanSearch.includes("ramen") || cleanSearch.includes("hot dog") || cleanSearch.includes("panini")) {
            targetCategory = "food";
        } else if (cleanSearch.includes("croissant") || cleanSearch.includes("muffin") || cleanSearch.includes("bakery") || cleanSearch.includes("donut") || cleanSearch.includes("baked") || cleanSearch.includes("tart") || cleanSearch.includes("danish")) {
            targetCategory = "bakery";
        }

        if (targetCategory !== "") {
            categoryDropdown.value = targetCategory;
            // Re-trigger form query matching so results filter out flawlessly
            categoryDropdown.form.submit();
        }
    }
});

/* VOICE INTERACTION DRIVER */
const voiceBtn = document.getElementById('voiceBtn');
const searchInput = document.getElementById('searchInput');

if ('webkitSpeechRecognition' in window) {
    const recognition = new webkitSpeechRecognition();
    recognition.lang = "en-US";
    voiceBtn.onclick = () => { recognition.start(); voiceBtn.style.background = "rgba(212,175,55,.25)"; };
    recognition.onresult = (event) => { searchInput.value = event.results[0][0].transcript; voiceBtn.style.background = "rgba(212,175,55,.12)"; };
    recognition.onerror = () => { voiceBtn.style.background = "rgba(212,175,55,.12)"; };
} else {
    voiceBtn.style.display = "none";
}

/* INTERSECTION REVEALS LAYOUTS */
const observer = new IntersectionObserver(entries=>{
    entries.forEach(entry=>{ if(entry.isIntersecting){ entry.target.classList.add('active'); } });
},{threshold:0.15});
document.querySelectorAll('.reveal').forEach(el=>{ observer.observe(el); });
</script>

<?php include('footer.php'); ?>