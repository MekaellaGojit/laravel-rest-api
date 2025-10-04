<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $cost       = $this->faker->randomFloat(2, 1, 100);
        $price      = $cost + $this->faker->randomFloat(2, 1, 50);

        // Define Products with their proper category
        $products = [
            // Beverages
            "Zest-o Apple" => "Beverages",
            "Zest-o Orange" => "Beverages",
            "Refresh Bottled Water" => "Beverages",
            "Sprite" => "Beverages",
            "Sting" => "Beverages",
            "San Mig Apple" => "Beverages",
            "Red Horse" => "Beverages",
            "Gin Bilog" => "Beverages",
            "GSM Mojito" => "Beverages",
            "Pineapple Juice" => "Beverages",
            "Coke" => "Beverages",
            "Tang Orange" => "Beverages",
            "Nestea Apple" => "Beverages",

            // Snacks
            "Piattos" => "Snacks",
            "Bread Pan" => "Snacks",
            "Hansel Biscuit" => "Snacks",
            "Potato Chips" => "Snacks",
            "Fudgee Bar" => "Snacks",
            "Nova" => "Snacks",
            "Rebisco Cracker" => "Snacks",
            "Fita" => "Snacks",
            "Maxx Candy" => "Snacks",
            "Snowbear" => "Snacks",

            // Dairy
            "Bear Brand" => "Dairy",
            "Eden Cheese" => "Dairy",
            "Dairy Cream Butter Spread" => "Dairy",

            // Canned Goods
            "Century Tuna" => "Canned Goods",
            "Mega Sardines" => "Canned Goods",
            "Argentina Meat Loaf" => "Canned Goods",
            "Lucky 7 Corned Beef" => "Canned Goods",

            // Condiments
            "Papa Ketchup" => "Condiments",
            "Maya Soy Sauce" => "Condiments",
            "Magic Sarap" => "Condiments",
            "Knorr Cubes" => "Condiments",
            "Vetsin" => "Condiments",
            "Salt" => "Condiments",
            "Buko Vinegar" => "Condiments",

            // Personal Care
            "Joy Dish washing Liquid" => "Personal Care",
            "Head and Shoulder Shampoo" => "Personal Care",
            "Keratin" => "Personal Care",
            "Happee Toothpaste" => "Personal Care",
            "Zonrox" => "Personal Care",
            "Body Lotion" => "Personal Care",
            "Rexona Deodorant" => "Personal Care",
            "Baby Powder" => "Personal Care",
            "Pampers Diaper" => "Personal Care",
            "Sister Sanitary Napkin" => "Personal Care",
            "Cotton Buds" => "Personal Care",
            "Paracetamol" => "Personal Care",
            "Salonpas" => "Personal Care",
            "Cough Syrup" => "Personal Care",

             // School Supplies
             "Ballpoint Pen" => "School Supplies",
             "Notebook" => "School Supplies",
             "Colored Paper" => "School Supplies",
             "Pencil" => "School Supplies",
             "Glue" => "School Supplies",
             "Bond paper" => "School Supplies",
             "Stapler Set" => "School Supplies",
             "Calculator Basic" => "School Supplies",

             // Animal Feeds
            "Pellet Developer" => "Animal Feeds",
            "High Protein Layer" => "Animal Feeds",
            "Pre-Lay" => "Animal Feeds",
            "Crumbles" => "Animal Feeds",
            "Pellet" => "Animal Feeds",
            "Msh" => "Animal Feeds",
            "Whole Grain Layer Feed" => "Animal Feeds",
            "Energy Booster" => "Animal Feeds",
            "Chick Booster" => "Animal Feeds",
            "Chick Starter" => "Animal Feeds",
            "Grower Feed" => "Animal Feeds",
            "Starter Feed" => "Animal Feeds",
            "Broiler Feed" => "Animal Feeds",
            "Pre Starter" => "Animal Feeds",
            "Finisher" => "Animal Feeds",
            "Hog Starter" => "Animal Feeds",
            "Hog Grower" => "Animal Feeds",
        ];

         // Randomly pick one product
         $name = $this->faker->randomElement(array_keys($products));

         return [
            'name'       => $name,
            'category'   => $products[$name], // category matches the product
            'cost'       => $cost,
            'price'      => $price,
            'quantity'   => $this->faker->numberBetween(1, 200),
            'expiration' => $this->faker->dateTimeBetween('now', '+2 years'),
            'image_url'  => null,

        ];
    }
}
