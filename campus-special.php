<?php 
include('header.php'); 
include('config/db.php');

/* 📊 CENTRALIZED DATA REPOSITORY */
$campuses = [
"premium_coffee" => [
    "label"  => "Premium Coffee Collection",
    "icon"   => "☕",
    "theme"  => "#4E342E",
    "origin" => "Reserve Roasts",
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
    "theme"  => "#004b87",
    "origin" => "Campus Exclusives",
    "items"  => [
        ["Comsats Coffee", "comsats-coffee.png", "410", "Tech-inspired energetic blend", "10/10", "200 kcal", "Iconic", "In Stock", "10%", "4 mins", "Campus"],
        ["Clock Tower", "clock-tower.png", "450", "Historic landmark signature blend", "9/10", "220 kcal", "Bestseller", "In Stock", "0%", "5 mins", "Premium"],
    ]
],
"gcuf_special" => [
    "label"  => "GCUF Special",
    "icon"   => "🎓",
    "theme"  => "#800000",
    "origin" => "University Tradition",
    "items"  => [
        ["GCUF Coffee", "gcuf-coffee.png", "400", "Deep heritage roasted beans", "10/10", "190 kcal", "Heritage", "In Stock", "10%", "4 mins", "Campus"],
        ["Golden Faisal", "golden-faisal.png", "480", "Premium saffron infused specialty", "10/10", "230 kcal", "Bestseller", "Limited", "0%", "7 mins", "Luxury"],
        ["Layllpur Latte", "layllpur-latte.png", "430", "Local spices mixed with velvet milk", "9/10", "210 kcal", "Local Favorite", "In Stock", "5%", "5 mins", "Latte"],
    ]
],
"liquid_wellness" => [
    "label"  => "Liquid Wellness",
    "icon"   => "💧",
    "theme"  => "#2E7D32",
    "origin" => "Fresh & Healthy",
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
    "theme"  => "#D2691E",
    "origin" => "Freshly Oven Baked",
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
    "theme"  => "#8E44AD",
    "origin" => "International Cuisines",
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
    "theme"  => "#27AE60",
    "origin" => "Fast & Fresh",
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
    "theme"  => "#E67E22",
    "origin" => "Sweet Masterpieces",
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

$passed_search = isset($_GET['search']) ? trim($_GET['search']) : '';
?>

<style>
:root{
    --gold:#C5A059;
    --gold-light:#e0c07a;
    --dark:#1a0f0d;
    --dark-2:#241613;
    --border:rgba(197,160,89,0.18);
}

/* ================= BODY ================= */
body{
    background:#120b0a;
    font-family:'Poppins',sans-serif;
    color:#fff;
    overflow-x:hidden;
}

/* ================= HERO SECTION ================= */
.campus-hero{
    min-height:70vh;
    background:
        linear-gradient(rgba(18,11,10,0.75), rgba(18,11,10,0.92)),
        url('images/banner.jpg') center/cover no-repeat;
    display:flex;
    align-items:center;
    justify-content:center;
    text-align:center;
    padding:140px 20px 100px;
    position:relative;
}

.campus-hero::before{
    content:'';
    position:absolute;
    width:500px;
    height:500px;
    background:rgba(197,160,89,0.08);
    filter:blur(120px);
    top:-100px;
    right:-100px;
}

.hero-content{
    position:relative;
    z-index:2;
    max-width:850px;
}

.hero-badge{
    display:inline-block;
    padding:10px 24px;
    border:1px solid rgba(197,160,89,0.4);
    border-radius:50px;
    background:rgba(197,160,89,0.08);
    color:var(--gold);
    font-size:13px;
    font-weight:700;
    letter-spacing:2px;
    margin-bottom:25px;
    text-transform:uppercase;
}

.hero-title{
    font-size:clamp(3rem,7vw,6rem);
    font-family:'Playfair Display',serif;
    font-weight:800;
    line-height:1.1;
    margin-bottom:20px;
}

.hero-title span{
    color:var(--gold);
}

.hero-text{
    color:rgba(255,255,255,0.75);
    font-size:1.1rem;
    max-width:700px;
    margin:auto;
    line-height:1.8;
}

.hero-buttons{
    margin-top:35px;
    display:flex;
    gap:15px;
    justify-content:center;
    flex-wrap:wrap;
}

.hero-btn{
    padding:14px 30px;
    border-radius:50px;
    text-decoration:none;
    font-weight:700;
    transition:0.35s;
}

.hero-btn.primary{
    background:var(--gold);
    color:#1a0f0d;
}

.hero-btn.primary:hover{
    transform:translateY(-3px);
    background:var(--gold-light);
}

.hero-btn.outline{
    border:1px solid var(--gold);
    color:var(--gold);
}

.hero-btn.outline:hover{
    background:var(--gold);
    color:#1a0f0d;
}

/* ================= MAIN SECTION ================= */
.campus-experience{
    padding:90px 0;
    background:
        radial-gradient(circle at top right,#2b1b1a,#1a0f0d);
}

/* ================= TABS ================= */
.nav-container-pro{
    background:rgba(255,255,255,0.03);
    backdrop-filter:blur(15px);
    border:1px solid rgba(255,255,255,0.05);
    padding:18px;
    border-radius:30px;
}

.custom-campus-tabs{
    display:flex;
    justify-content:center;
    flex-wrap:wrap;
    gap:12px;
    border:none !important;
}

.nav-link-pro{
    border:none;
    padding:14px 24px;
    border-radius:50px;
    background:transparent;
    color:rgba(255,255,255,0.7);
    transition:0.35s;
    font-weight:700;
}

.nav-link-pro:hover{
    background:rgba(255,255,255,0.05);
    color:#fff;
    transform:translateY(-2px);
}

.nav-link-pro.active{
    background:var(--gold) !important;
    color:#1a0f0d !important;
    box-shadow:0 15px 30px rgba(197,160,89,0.25);
}

/* ================= CARD ================= */
.pro-coffee-card{
    background:linear-gradient(145deg,#241613,#1a0f0d);
    border-radius:28px;
    padding:14px;
    overflow:hidden;
    border:1px solid rgba(255,255,255,0.05);
    transition:0.4s;
    position:relative;
    height:100%;
}

.pro-coffee-card:hover{
    transform:translateY(-10px);
    border-color:rgba(197,160,89,0.4);
    box-shadow:0 25px 50px rgba(0,0,0,0.5);
}

.image-wrapper{
    position:relative;
    height:240px;
    overflow:hidden;
    border-radius:22px;
}

.main-coffee-img{
    width:100%;
    height:100%;
    object-fit:cover;
    transition:0.5s;
}

.pro-coffee-card:hover .main-coffee-img{
    transform:scale(1.1);
}

/* ================= BADGES ================= */
.card-badges-overlay{
    position:absolute;
    top:15px;
    left:15px;
    z-index:5;
    display:flex;
    flex-direction:column;
    gap:8px;
}

.badge-premium{
    background:linear-gradient(135deg,#d6b26a,#a17a2d);
    color:#fff;
    padding:6px 14px;
    border-radius:12px;
    font-size:11px;
    font-weight:800;
}

.badge-discount{
    background:#b5291f;
    color:#fff;
    padding:6px 14px;
    border-radius:12px;
    font-size:11px;
    font-weight:800;
}

.floating-price{
    position:absolute;
    right:15px;
    top:15px;
    background:rgba(0,0,0,0.75);
    backdrop-filter:blur(8px);
    color:#fff;
    padding:10px 18px;
    border-radius:14px;
    font-weight:800;
    font-size:15px;
}

/* ================= CONTENT ================= */
.content-body{
    padding:18px 10px 10px;
}

.top-meta{
    display:flex;
    justify-content:space-between;
    align-items:center;
    margin-bottom:10px;
}

.category-tag{
    color:var(--gold);
    font-size:12px;
    font-weight:700;
    text-transform:uppercase;
}

.stock-status{
    font-size:12px;
    font-weight:700;
}

.stock-status.in{
    color:#2ecc71;
}

.stock-status.out{
    color:#ff6b6b;
}

.item-title{
    font-size:1.3rem;
    font-weight:800;
    text-align:center;
    margin-bottom:10px;
}

.item-desc{
    color:rgba(255,255,255,0.65);
    text-align:center;
    line-height:1.7;
    font-size:14px;
    min-height:70px;
}

/* ================= INFO GRID ================= */
.info-grid{
    display:grid;
    grid-template-columns:repeat(3,1fr);
    gap:10px;
    margin-top:20px;
    margin-bottom:20px;
}

.info-item{
    background:rgba(255,255,255,0.03);
    border-radius:16px;
    padding:12px 8px;
    text-align:center;
}

.info-item label{
    display:block;
    color:var(--gold);
    font-size:10px;
    text-transform:uppercase;
    margin-bottom:5px;
}

.info-item strong{
    font-size:13px;
}

/* ================= FORM ================= */
.qty-input{
    width:70px;
    height:48px;
    background:#241613 !important;
    border:1px solid rgba(197,160,89,0.25) !important;
    border-radius:14px;
    color:#fff !important;
    text-align:center;
    font-weight:700;
}

.qty-input:focus{
    border-color:var(--gold) !important;
    box-shadow:none !important;
}

.btn-quick-add{
    width:100%;
    border:none;
    background:linear-gradient(135deg,#c9a050,#a17a2d);
    color:#1a0f0d;
    padding:14px;
    border-radius:16px;
    font-weight:800;
    transition:0.35s;
}

.btn-quick-add:hover{
    transform:translateY(-3px);
    box-shadow:0 15px 25px rgba(197,160,89,0.25);
}

/* ================= SEARCH GLOW ================= */
.card-search-glowing-active{
    border-color:#c9a050 !important;
    box-shadow:0 0 35px rgba(201,160,80,0.8) !important;
    animation:glowPulse 2s infinite alternate;
}

@keyframes glowPulse{
    from{
        box-shadow:0 0 10px rgba(201,160,80,0.35);
    }
    to{
        box-shadow:0 0 40px rgba(201,160,80,1);
    }
}

/* ================= ERROR ================= */
.error-window-lux{
    background:rgba(181,41,31,0.08);
    border:1px dashed rgba(181,41,31,0.4);
    border-radius:24px;
    padding:40px;
}

/* ================= RESPONSIVE ================= */
@media(max-width:768px){

    .campus-hero{
        padding-top:120px;
    }

    .hero-title{
        font-size:3rem;
    }

    .nav-link-pro{
        width:100%;
        justify-content:center;
    }

    .info-grid{
        grid-template-columns:1fr;
    }

    .item-desc{
        min-height:auto;
    }
}
</style>

<!-- ================= HERO SECTION ================= -->
<section class="campus-hero">

    <div class="hero-content">

        <div class="hero-badge">
            Royal Café Signature Collection
        </div>

        <h1 class="hero-title">
            Explore Our <span>Premium Menu</span>
        </h1>

        <p class="hero-text">
            Discover handcrafted coffee, luxury desserts, gourmet meals, and refreshing drinks curated specially for students, dreamers, and coffee lovers.
        </p>

        <div class="hero-buttons">
            <a href="#campus" class="hero-btn primary">
                Explore Menu
            </a>

            <a href="cart.php" class="hero-btn outline">
                View Cart
            </a>
        </div>

    </div>

</section>

<!-- ================= MENU SECTION ================= -->
<section id="campus" class="campus-experience">
<div class="container">

    <div class="text-center mb-5">
        <h6 class="text-gold fw-bold text-uppercase mb-3" style="letter-spacing:3px;">
            Exclusive Menu Collection
        </h6>

        <h2 class="hero-title" style="font-size:3rem;">
            Campus <span>Specials</span>
        </h2>

        <p class="hero-text">
            Crafted with perfection for every mood, every study session, and every celebration.
        </p>
    </div>

    <!-- SEARCH ERROR -->
    <div id="rejection-notice-layer" class="text-center my-4 d-none">
        <div class="error-window-lux mx-auto" style="max-width:650px;">
            <i class="bi bi-exclamation-triangle-fill text-danger fs-1 mb-3"></i>

            <h4 class="fw-bold text-white">
                Item Not Found
            </h4>

            <p class="text-white-50 mb-0">
                The item 
                "<span id="invalid-term-log" class="text-gold fw-bold"></span>" 
                does not exist in our menu.
            </p>
        </div>
    </div>

    <!-- TABS -->
    <div class="nav-container-pro mb-5">
        <ul class="nav nav-pills custom-campus-tabs">

            <?php 
            $first = true; 
            foreach($campuses as $id => $data): 
            ?>

            <li class="nav-item">

                <button 
                    class="nav-link-pro <?php echo $first ? 'active' : ''; ?>"
                    id="<?php echo $id; ?>-tab"
                    data-bs-toggle="pill"
                    data-bs-target="#<?php echo $id; ?>"
                    type="button">

                    <?php echo $data['icon']; ?>
                    <?php echo $data['label']; ?>

                </button>

            </li>

            <?php 
            $first = false; 
            endforeach; 
            ?>

        </ul>
    </div>

    <!-- TAB CONTENT -->
    <div class="tab-content">

        <?php 
        $first = true; 
        foreach($campuses as $id => $data): 
        ?>

        <div class="tab-pane fade <?php echo $first ? 'show active' : ''; ?>" id="<?php echo $id; ?>">

            <div class="row g-4">

                <?php foreach($data['items'] as $item):

                    $title       = $item[0];
                    $image       = $item[1];
                    $price       = $item[2];
                    $description = $item[3];
                    $rating      = $item[4];
                    $calories    = $item[5];
                    $badge       = $item[6];
                    $stock       = $item[7];
                    $discount    = $item[8];
                    $prepTime    = $item[9];
                    $category    = $item[10];

                    $element_id = 'brew-' . strtolower(
                        preg_replace('/[^A-Za-z0-9\-]/', '', str_replace(' ', '-', $title))
                    );
                ?>

                <div class="col-xl-3 col-lg-4 col-md-6 item-card-node"
                     data-title="<?php echo htmlspecialchars(strtolower($title)); ?>"
                     data-tab-id="<?php echo $id; ?>">

                    <div class="pro-coffee-card" id="<?php echo $element_id; ?>">

                        <div class="image-wrapper">

                            <div class="card-badges-overlay">

                                <span class="badge-premium">
                                    <?php echo $badge; ?>
                                </span>

                                <?php if($discount !== '0%'): ?>
                                <span class="badge-discount">
                                    <?php echo $discount; ?> OFF
                                </span>
                                <?php endif; ?>

                            </div>

                            <img src="images/<?php echo $image; ?>"
                                 class="main-coffee-img"
                                 alt="<?php echo $title; ?>">

                            <div class="floating-price">
                                Rs. <?php echo $price; ?>
                            </div>

                        </div>

                        <div class="content-body">

                            <div class="top-meta">

                                <span class="category-tag">
                                    <?php echo $category; ?>
                                </span>

                                <span class="stock-status <?php echo strtolower($stock) == 'in stock' ? 'in' : 'out'; ?>">
                                    <?php echo $stock; ?>
                                </span>

                            </div>

                            <h4 class="item-title">
                                <?php echo $title; ?>
                            </h4>

                            <p class="item-desc">
                                <?php echo $description; ?>
                            </p>

                            <div class="info-grid">

                                <div class="info-item">
                                    <label>Rating</label>
                                    <strong><?php echo $rating; ?></strong>
                                </div>

                                <div class="info-item">
                                    <label>Prep</label>
                                    <strong><?php echo $prepTime; ?></strong>
                                </div>

                                <div class="info-item">
                                    <label>Calories</label>
                                    <strong><?php echo $calories; ?></strong>
                                </div>

                            </div>

                            <form action="add_to_cart.php" method="POST">

                                <input type="hidden" name="item_id" value="<?php echo $element_id; ?>">
                                <input type="hidden" name="name" value="<?php echo htmlspecialchars($title); ?>">
                                <input type="hidden" name="price" value="<?php echo $price; ?>">
                                <input type="hidden" name="image" value="<?php echo htmlspecialchars($image); ?>">

                                <div class="d-flex align-items-center mb-3">

                                    <input type="number"
                                           name="quantity"
                                           value="1"
                                           min="1"
                                           class="qty-input">

                                </div>

                                <button type="submit" class="btn-quick-add">
                                    ADD TO CART
                                </button>

                            </form>

                        </div>

                    </div>

                </div>

                <?php endforeach; ?>

            </div>

        </div>

        <?php 
        $first = false; 
        endforeach; 
        ?>

    </div>

</div>
</section>

<script>
document.addEventListener("DOMContentLoaded", function(){

    const queryTerm = "<?php echo htmlspecialchars(strtolower($passed_search)); ?>".trim();

    if(!queryTerm) return;

    let targetCardFound = false;

    const cards = document.querySelectorAll('.item-card-node');

    for(let card of cards){

        const itemTitle = card.getAttribute('data-title');

        if(itemTitle === queryTerm || itemTitle.includes(queryTerm)){

            const associatedTabId = card.getAttribute('data-tab-id');

            const targetElement = card.querySelector('.pro-coffee-card');

            const tabButton = document.getElementById(`${associatedTabId}-tab`);

            if(tabButton){
                const tabInstance = new bootstrap.Tab(tabButton);
                tabInstance.show();
            }

            setTimeout(() => {

                targetElement.scrollIntoView({
                    behavior:'smooth',
                    block:'center'
                });

                targetElement.classList.add('card-search-glowing-active');

            }, 400);

            targetCardFound = true;
            break;
        }
    }

    if(!targetCardFound){

        const notice = document.getElementById('rejection-notice-layer');

        document.getElementById('invalid-term-log').innerText = queryTerm;

        notice.classList.remove('d-none');

        notice.scrollIntoView({
            behavior:'smooth',
            block:'center'
        });
    }

});
</script>

<?php include('footer.php'); ?>

