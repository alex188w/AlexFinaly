<?php
namespace Database\Seeders;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ContentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $properties = [
            [
                'name' => 'Цвет',
                'name_en' => 'Color',
                'options' => [
                    [
                        'name' => 'Белый',
                        'name_en' => 'White',
                    ],
                    [
                        'name' => 'Черный',
                        'name_en' => 'Black',
                    ],
                    [
                        'name' => 'Серебристый',
                        'name_en' => 'Silver',
                    ],
                    [
                        'name' => 'Золотой',
                        'name_en' => 'Gold',
                    ],
                ],
            ],
            [
                'name' => 'Оперативная память',
                'name_en' => 'Memory',
                'options' => [
                    [
                        'name' => '32гб',
                        'name_en' => '32gb',
                    ],
                    [
                        'name' => '64гб',
                        'name_en' => '64gb',
                    ],
                    [
                        'name' => '128гб',
                        'name_en' => '128gb',
                    ],
                ],
            ],
        ];

        foreach ($properties as $property) {
            $property['created_at'] = Carbon::now();
            $property['updated_at'] = Carbon::now();
            $options = $property['options'];
            unset($property['options']);
            $propertyId = DB::table('properties')->insertGetId($property);

            foreach ($options as $option) {
                $option['created_at'] = Carbon::now();
                $option['updated_at'] = Carbon::now();
                $option['property_id'] = $propertyId;
                DB::table('property_options')->insert($option);
            }
        }

        $categories = [
            [
                'name' => 'Мобильные телефоны',
                'name_en' => 'Mobile phones',
                'code' => 'mobiles',
                'description' => 'Раздел мобильные телефоны и смартфоны',
                'description_en' => 'Mobile phones section with best prices for best popular phones!',
                'image' => 'categories/mobile.jpg',
                'products' => [
                    [
                        'name' => 'Samsung',
                        'name_en' => 'Samsung',
                        'code' => 'Samsung',
                        'description' => 'Samsung Galaxy A25 5G 6/128GB SM-A256E',
                        'description_en' => 'The best phone',
                        'image' => 'products/Samsung.jpg',
                        'properties' => [
                            1, 2,
                        ],
                        'options' => [
                            [
                                1, 7,
                            ],
                            [
                                1, 7,
                            ],
                            [
                                2, 7,
                            ],
                            [
                                2, 7,
                            ],
                            [
                                3, 7,
                            ],
                            [
                                3, 7,
                            ],
                            [
                                4, 7,
                            ],
                            [
                                4, 7,
                            ],
                        ],
                    ],
                    [
                        'name' => 'Apple-Iphone',
                        'name_en' => 'Apple-Iphone',
                        'code' => 'Apple-Iphone',
                        'description' => 'Apple iPhone 16 Pro 512Gb A3294 MYLX3ZA/A',
                        'description_en' => 'The best huge phone',
                        'image' => 'products/apple_iphone.png',
                        'properties' => [
                            1, 2,
                        ],
                        'options' => [
                            [
                                1, 7,
                            ],
                            [
                                1, 9,
                            ],
                            [
                                2, 8,
                            ],
                            [
                                2, 9,
                            ],
                            [
                                3, 8,
                            ],
                            [
                                3, 9,
                            ],
                            [
                                4, 8,
                            ],
                            [
                                4, 9,
                            ],
                        ],
                    ],
                    [
                        'name' => 'BlackView',
                        'name_en' => 'BlackView',
                        'code' => 'BlackView',
                        'description' => 'ЗBlackview BV9200 8/256Gb',
                        'description_en' => 'Why do you need to pay more? Legendary HTC One S',
                        'image' => 'products/blackview.jpg',
                        'properties' => [
                            1, 2,
                        ],
                        'options' => [
                            [
                                2, 7,
                            ],
                            [
                                2, 7,
                            ],
                        ],
                    ],
                    [
                        'name' => 'Honor',
                        'name_en' => 'Honor',
                        'code' => 'Honor',
                        'description' => 'Honor X9B 5G 8/256GB',
                        'description_en' => 'The best classic iPhone',
                        'image' => 'products/honor.jpg',
                        'properties' => [
                            1, 2,
                        ],
                        'options' => [
                            [
                                1, 7,
                            ],
                            [
                                1, 7,
                            ],
                            [
                                3, 7,
                            ],
                            [
                                3, 7,
                            ],
                            [
                                4, 7,
                            ],
                            [
                                4, 7,
                            ],
                        ],
                    ],
                    [
                        'name' => 'Huawei-Nova',
                        'name_en' => 'Huawei-Nova',
                        'code' => 'Huawei-Nova',
                        'description' => 'Huawei nova 12i 8/256GB',
                        'description_en' => 'Modern phone of basic level',
                        'image' => 'products/huawei_nova.jpg',
                        'properties' => [
                            1, 2,
                        ],
                        'options' => [
                            [
                                4, 7,
                            ],
                        ],
                    ],
                ]
            ],
            [
                'name' => 'Телевизоры',
                'name_en' => 'Television',
                'code' => 'TV',
                'description' => 'Раздел с телевизорами и Видео.',
                'description_en' => 'Section TV and Video.',
                'image' => 'categories/tv.jpg',
                'products' => [
                    [
                        'name' => 'Телевизор Xiaomi',
                        'name_en' => 'Xiaomi',
                        'code' => 'Xiaomi',
                        'description' => 'ОXiaomi Mi TV A 32 2025_C',
                        'description_en' => 'Great sound from Dr. Dre',
                        'image' => 'products/xiaomi.jpg',
                        'properties' => [
                            1,
                        ],
                        'options' => [
                            [
                                2,
                            ],
                            [
                                5,
                            ],
                            [
                                6,
                            ]
                        ],
                    ],
                    [
                        'name' => 'Телевизор Harper',
                        'name_en' => 'Harper',
                        'code' => 'Harper',
                        'description' => 'HARPER 65U661TS, 4K Ultra HD',
                        'description_en' => 'Capture the best moments of your life with that camera',
                        'image' => 'products/harper.jpg',
                    ],
                    [
                        'name' => 'Телевизор Sony',
                        'name_en' => 'Sony',
                        'code' => 'Sony',
                        'description' => 'Sony KD-43X75K, 4K Ultra HD',
                        'description_en' => 'For serious video you need the profession camera. Panasonic HC-V770 is that you need!',
                        'image' => 'products/sony.jpg',
                    ],
                ],
            ],
            [
                'name' => 'Персональные компьютеры и ноутбуки',
                'name_en' => 'PC && NoteBook',
                'code' => 'PC && NoteBook',
                'description' => 'Раздел с Персональными компьютерами и Ноутбуками',
                'description_en' => 'Section with PC && NoteBook',
                'image' => 'categories/pc.jpg',
                'products' => [
                    [
                        'name' => 'Персональный компьютер FragMachine',
                        'name_en' => 'FragMachine',
                        'code' => 'FragMachine',
                        'description' => 'FragMachine Liquid 5106 (Core i5-12400F 2.5 ГГц, 16 Гб, SSD 1024 Мб, GeForce RTX4060Ti - 8192Мб',
                        'description_en' => 'GOOD PC',
                        'image' => 'products/fragmachine.jpg',
                        'properties' => [
                            1,
                        ],
                        'options' => [
                            [
                                1,
                            ],
                            [
                                2,
                            ],
                            [
                                3,
                            ],
                        ],
                    ],
                    [
                        'name' => 'Ноутбук Lenovo',
                        'name_en' => 'Lenovo',
                        'code' => 'Lenovo',
                        'description' => 'Lenovo LOQ 15IRH8 (82XV00KCRK)',
                        'description_en' => 'Good NoteBook',
                        'image' => 'products/lenovo.jpg',
                        'properties' => [
                            1,
                        ],
                        'options' => [
                            [
                                2,
                            ],
                            [
                                5,
                            ],
                            [
                                7,
                            ]
                        ],
                    ],
                    [
                        'name' => 'Ноутбук Irbis',
                        'name_en' => 'Irbis',
                        'code' => 'Irbis',
                        'description' => 'IRBIS 15NBC1014 (15NBC1014)',
                        'description_en' => 'For best ideas',
                        'image' => 'products/irbis.jpg',

                    ],
                    [
                        'name' => 'Ноутбук HP',
                        'name_en' => 'HP',
                        'code' => 'HP',
                        'description' => 'HP 250 G9 (9B993EA)',
                        'description_en' => 'Do you like home cutlets? You need to see that combine!',
                        'image' => 'products/hp.jpg',
                    ],
                ],
            ]
        ];

        foreach ($categories as $category) {
            $category['created_at'] = Carbon::now();
            $category['updated_at'] = Carbon::now();
            $products = $category['products'];
            unset($category['products']);
            $categoryId = DB::table('categories')->insertGetId($category);

            foreach ($products as $product) {
                $product['created_at'] = Carbon::now();
                $product['updated_at'] = Carbon::now();
                $product['hit'] = !boolval(rand(0, 3));
                $product['recommend'] = rand(0, 1);
                $product['new'] = rand(0, 1);
                $product['category_id'] = $categoryId;

                if (isset($product['properties'])) {
                    $properties = $product['properties'];
                    unset($product['properties']);
                    $skusOptions = $product['options'];
                    unset($product['options']);
                }

                $productId = DB::table('products')->insertGetId($product);

                if (isset($properties)) {
                    foreach ($properties as $propertyId) {
                        DB::table('property_product')->insert([
                            'product_id' => $productId,
                            'property_id' => $propertyId,
                            'created_at' => Carbon::now(),
                            'updated_at' => Carbon::now(),
                        ]);
                    }

                    foreach ($skusOptions as $skuOptions) {
                        $skuId = DB::table('skus')->insertGetId([
                            'product_id' => $productId,
                            'count' => rand(1, 100),
                            'price' => rand(5000, 100000),
                            'created_at' => Carbon::now(),
                            'updated_at' => Carbon::now(),
                        ]);

                        foreach ($skuOptions as $skuOption) {
                            $skuData['sku_id'] = $skuId;
                            $skuData['property_option_id'] = $skuOption;
                            $skuData['created_at'] = Carbon::now();
                            $skuData['updated_at'] = Carbon::now();

                            DB::table('sku_property_option')->insert($skuData);
                        }
                    }

                    unset($properties);
                } else {
                    DB::table('skus')->insert([
                        'product_id' => $productId,
                        'count' => rand(1, 100),
                        'price' => rand(5000, 100000),
                        'created_at' => Carbon::now(),
                        'updated_at' => Carbon::now(),
                    ]);
                }
            }
        }
    }
}
