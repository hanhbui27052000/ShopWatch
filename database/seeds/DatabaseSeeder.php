<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
    	$this->call(RoleSeeder::class);

    	$data = [
        	[
        		'id'=>1,
                'name' => 'Admin',
                'date_of_birth' => '2000/05/27',
                'gender' =>1,
                'email'=> 'admin@gmail.com',
                'password' => bcrypt('12345678'),
                'image'   => '/storage/photos/1/staff/admin.jpg',
                'address' => 'Quảng Nam',
                'phone_number' => '0123456789',
                'status' => 1
            ],
            [
              'id'=>2,
              'name' => 'Nguyễn Văn A',
              'date_of_birth' => '2000/10/10',
              'gender' =>1,
              'email'=> 'nguyenvana@gmail.com',
              'password' => bcrypt('12345678'),
              'image'   => '/storage/photos/1/staff/gd.jpg',
              'address' => 'Quảng Nam',
              'phone_number' => '0123456789',
              'status' => 1
          ],

          [
            'id'=>3,
            'name' => 'Nguyễn Thị C',
            'date_of_birth' => '2000/05/1',
            'gender' =>0,
            'email'=> 'nguyenthic@gmail.com',
            'password' => bcrypt('12345678'),
            'image'   => '/storage/photos/1/staff/halan.jpg',
            'address' => 'Quảng Nam',
            'phone_number' => '0123456789',
            'status' => 1
        ]

    ];

    	$user_role = [
    		[
    			'user_id' => 1,
    			'roles_id' => 1
    		],
    		[
    			'user_id' => 2,
    			'roles_id' => 2
    		],
    		[
    			'user_id' => 3,
    			'roles_id' => 3
    		]

    	];

        $brand = [
    		[
    			'id' => 1,
    			'name' => 'Citizen',
                'image' => '/storage/photos/1/brand/Citizen.png',
                'status' => 1
    		],
    		[
    			'id' => 2,
    			'name' => 'Casio',
                'image' => '/storage/photos/1/brand/Casio.png',
                'status' => 1
    		],
    		[
    			'id' => 3,
    			'name' => 'Orient',
                'image' => '/storage/photos/1/brand/Orient.png',
                'status' => 1
            ],
            [
    			'id' => 4,
    			'name' => 'Seiko',
                'image' => '/storage/photos/1/brand/Seiko.png',
                'status' => 1
    		],
    		[
    			'id' => 5,
    			'name' => 'Skagen',
                'image' => '/storage/photos/1/brand/Skagen.png',
                'status' => 1
            ],
    		[
    			'id' => 6,
    			'name' => 'OP',
                'image' => '/storage/photos/1/brand/OP.png',
                'status' => 1
            ],
    		[
    			'id' => 7,
    			'name' => 'Fossil',
                'image' => '/storage/photos/1/brand/Fossil.png',
                'status' => 1
            ],
    		[
    			'id' => 8,
    			'name' => 'Michael Kors',
                'image' => '/storage/photos/1/brand/MichaelKors.png',
                'status' => 1
            ],
            [
    			'id' => 9,
    			'name' => 'G-Shock & Baby-G',
                'image' => '/storage/photos/1/brand/Gshock.png',
                'status' => 0
            ],
            [
    			'id' => 10,
    			'name' => 'Daniel Wellington',
                'image' => '/storage/photos/1/brand/Daniel-Willington.png',
                'status' => 0
            ]
    	];

        $product = [
            [
                'id' => 1,
                'product_code' => 'SP100001',
                'product_number' => 'EFV-C100D-2AVDF',
                'product_name' => 'CASIO EFV-C100D-2AVDF',
                'brand_id' => 2,
                'amount_of' => 20,
                'cost_prices' => 1000000,
                'price' => 1246000,
                'discount' => 0,
                'status' => 0,
                'content' => ''
            ],
            [
                'id' => 2,
                'product_code' => 'SP100002',
                'product_number' => 'BE9182-57E',
                'product_name' => 'CITIZEN BE9182-57E',
                'brand_id' => 1,
                'amount_of' => 20,
                'cost_prices' => 2000000,
                'price' => 3000000,
                'discount' => 0,
                'status' => 0,
                'content' => ''
            ],
            [
                'id' => 3,
                'product_code' => 'SP100003',
                'product_number' => 'SRPD59K1',
                'product_name' => 'SEIKO SRPD59K1',
                'brand_id' => 4,
                'amount_of' => 0,
                'cost_prices' => 1500000,
                'price' => 2000000,
                'discount' => 0,
                'status' => 0,
                'content' => ''
            ],
            [
                'id' => 4,
                'product_code' => 'SP100004',
                'product_number' => 'FKU00001W0',
                'product_name' => 'ORIENT FKU00001W0',
                'brand_id' => 3,
                'amount_of' => 0,
                'cost_prices' => 3000000,
                'price' => 4000000,
                'discount' => 0,
                'status' => 0,
                'content' => ''
            ],
            [
                'id' => 5,
                'product_code' => 'SP100005',
                'product_number' => 'EFV-C100D-1AVDF',
                'product_name' => 'CASIO EFV-C100D-1AVDF',
                'brand_id' => 2,
                'amount_of' => 0,
                'cost_prices' => 3000000,
                'price' => 3361000,
                'discount' => 0,
                'status' => 0,
                'content' => ''
            ],
            [
                'id' => 6,
                'product_code' => 'SP100006',
                'product_number' => 'BM8475-00F',
                'product_name' => 'CITIZEN BM8475-00F',
                'brand_id' => 1,
                'amount_of' => 0,
                'cost_prices' => 5000000,
                'price' => 5990000,
                'discount' => 0,
                'status' => 0,
                'content' => ''
            ],
            [
                'id' => 7,
                'product_code' => 'SP100007',
                'product_number' => 'SRPC61K1',
                'product_name' => 'SEIKO SRPC61K1',
                'brand_id' => 4,
                'amount_of' => 20,
                'cost_prices' => 6000000,
                'price' => 6570000,
                'discount' => 0,
                'status' => 0,
                'content' => ''
            ],
            [
                'id' => 8,
                'product_code' => 'SP100008',
                'product_number' => 'RA-AR0001S10B',
                'product_name' => 'ORIENT RA-AR0001S10B',
                'brand_id' => 3,
                'amount_of' => 20,
                'cost_prices' => 10000000,
                'price' => 10170000,
                'discount' => 0,
                'status' => 0,
                'content' => ''
            ]

        ];

     
        $image_product = [
            [
                'id' => 1,
                'image' => '/storage/photos/1/product/casio/CASIO EFV-C100D-2AVDF/CASIO EFV-C100D-2AVDF.jpg',
                'product_id' => 1,
                'status' => 0
            ],
            [
                'id' => 2,
                'image' => '/storage/photos/1/product/citizen/CITIZEN BE9182-57E/CITIZEN BE9182-57E.jpg',
                'product_id' => 2,
                'status' => 0
            ],
            [
                'id' => 3,
                'image' => '/storage/photos/1/product/seiko/SEIKO SRPD59K1/SEIKO SRPD59K1.jpg',
                'product_id' =>3,
                'status' => 0
            ],
            [
                'id' => 4,
                'image' => '/storage/photos/1/product/orient/ORIENT FKU00001W0/ORIENT FKU00001W0.jpg',
                'product_id' => 4,
                'status' => 0
            ],
            [
                'id' => 5,
                'image' => '/storage/photos/1/product/casio/CASIO EFV-C100D-1AVDF/CASIO EFV-C100D-1AVDF.jpg',
                'product_id' => 5,
                'status' => 0
            ],
            [
                'id' => 6,
                'image' => '/storage/photos/1/product/citizen/CITIZEN BM8475-00F/CITIZEN BM8475-00F.jpg',
                'product_id' => 6,
                'status' => 0
            ],
            [
                'id' => 7,
                'image' => '/storage/photos/1/product/seiko/SEIKO SRPC61K1/SEIKO SRPC61K1.jpg',
                'product_id' => 7,
                'status' => 0
            ],
            [
                'id' => 8,
                'image' => '/storage/photos/1/product/orient/ORIENT RA-AR0001S10B/ORIENT RA-AR0001S10B.jpg',
                'product_id' => 8,
                'status' => 0
            ]

        ];

        $descriptions_product = [
            [
                'id' => 1,
                'product_id' => 1,
                'origin' => 'Nhật Bản',
                'guarantee' => '2 năm',
                'wire_color' => 'Đen',
                'wire_material' => 'Thép không gỉ',
                'wire_length' => '15cm',
                'wire_thickness' => '2mm',
                'shell_color' => 'Đen',
                'shell_diameter' => '33,2mm',
                'glass_type' => 'Mineral Crystal (Kính Cứng)',
                'water_proof' => '10ATM (100mm)',
                'where_production' => 'Nhật Bản'
            ],
            [
                'id' => 2,
                'product_id' => 2,
                'origin' => 'Nhật Bản',
                'guarantee' => '2 năm',
                'wire_color' => 'Đen',
                'wire_material' => 'Thép không gỉ',
                'wire_length' => '13cm',
                'wire_thickness' => '2mm',
                'shell_color' => 'Đen',
                'shell_diameter' => '33,2mm',
                'glass_type' => 'Sapphire (Kính Chống Trầy)',
                'water_proof' => '5 ATM',
                'where_production' => 'Trung Quốc'
            ],
            [
                'id' => 3,
                'product_id' => 3,
                'origin' => 'Nhật Bản',
                'guarantee' => '1 năm',
                'wire_color' => 'Đen',
                'wire_material' => 'Thép không gỉ',
                'wire_length' => '15cm',
                'wire_thickness' => '2mm',
                'shell_color' => 'Đen',
                'shell_diameter' => '33,2mm',
                'glass_type' => 'Hardlex Crystal (Kính Cứng)',
                'water_proof' => '10ATM',
                'where_production' => 'Nhật Bản'
            ],
            [
                'id' => 4,
                'product_id' => 4,
                'origin' => 'Nhật Bản',
                'guarantee' => '2 năm',
                'wire_color' => 'Đen',
                'wire_material' => 'Thép không gỉ',
                'wire_length' => '15cm',
                'wire_thickness' => '2mm',
                'shell_color' => 'Đen',
                'shell_diameter' => '43 mm',
                'glass_type' => 'Mineral Crystal (Kính Cứng)',
                'water_proof' => '5ATM (100mm)',
                'where_production' => 'Trung Quốc'
            ],
            [
                'id' => 5,
                'product_id' => 5,
                'origin' => 'Nhật Bản',
                'guarantee' => '1 năm',
                'wire_color' => 'Đen',
                'wire_material' => 'Thép không gỉ',
                'wire_length' => '14cm',
                'wire_thickness' => '1.5mm',
                'shell_color' => 'Đen',
                'shell_diameter' => '46.6 mm',
                'glass_type' => 'Mineral Crystal (Kính Cứng)',
                'water_proof' => '10ATM',
                'where_production' => 'Nhật Bản'
            ],
            [
                'id' => 6,
                'product_id' => 6,
                'origin' => 'Nhật Bản',
                'guarantee' => '5 năm',
                'wire_color' => 'Đen',
                'wire_material' => 'Dây Vải',
                'wire_length' => '13cm',
                'wire_thickness' => '2mm',
                'shell_color' => 'Đen',
                'shell_diameter' => '42 mm',
                'glass_type' => 'Mineral Crystal (Kính Cứng)',
                'water_proof' => '10ATM',
                'where_production' => 'Nhật Bản'
            ],
            [
                'id' => 7,
                'product_id' => 7,
                'origin' => 'Nhật Bản',
                'guarantee' => '1 năm',
                'wire_color' => 'Đen',
                'wire_material' => 'Thép không gỉ',
                'wire_length' => '12.5cm',
                'wire_thickness' => '2mm',
                'shell_color' => 'Đen',
                'shell_diameter' => '45 mm',
                'glass_type' => 'Mineral Crystal (Kính Cứng)',
                'water_proof' => '10ATM',
                'where_production' => 'Nhật Bản'
            ],
            [
                'id' => 8,
                'product_id' => 8,
                'origin' => 'Nhật Bản',
                'guarantee' => '5 năm',
                'wire_color' => 'Đen',
                'wire_material' => 'Thép không gỉ',
                'wire_length' => '13.5cm',
                'wire_thickness' => '2mm',
                'shell_color' => 'Trắng',
                'shell_diameter' => '40.8 mm',
                'glass_type' => 'Shapphire (Kính Chống Trầy)',
                'water_proof' => '5ATM',
                'where_production' => 'Trung Quốc'
            ]
        ];

        $supplier = [
            [
                'id' => 1,
                'supplier_code' => 'NCCSP1',
                'supplier_name' => 'Nguyễn Văn A',
                'gender' => 1,
                'date_of_birth' => '2000/05/27',
                'image' => '/storage/photos/1/supplier/ronaldo.jpg',
                'phone_number' => '123456789',
                'address' => 'Đà Nẵng',
                'total_money' => 60000000,
                'owed_money' => 0,
                'tax_code' => '2021124350',
                'note' => '',
            ],
            [
                'id' => 2,
                'supplier_code' => 'NCCSP2',
                'supplier_name' => 'Nguyễn Văn B',
                'gender' => 1,
                'date_of_birth' => '2000/05/27',
                'image' => '/storage/photos/1/supplier/messi.jpg',
                'phone_number' => '123456789',
                'address' => 'Đà Nẵng',
                'total_money' => 320000000,
                'owed_money' => 0,
                'tax_code' => '2021124351',
                'note' => '',
            ]
        ];

        $order = [
            [
                'id' => 1,
                'datetime' => '2021-05-21 11:37:22',
                'status' => 0
            ],
            [
                'id' => 2,
                'datetime' => '2021-05-21 11:38:58',
                'status' => 0
            ],
        ];

        $product_order = [
            [
                'id' => 1,
                'product_id' => 3,
                'amount_of' => 2,
                'total_discount' => 0,
                'total_money' => 4000000,
                'order_id' => 1
            ],
            [
                'id' => 2,
                'product_id' => 8,
                'amount_of' => 1,
                'total_discount' => 0,
                'total_money' => 10170000,
                'order_id' => 1
            ],
            [
                'id' => 3,
                'product_id' => 4,
                'amount_of' => 2,
                'total_discount' => 0,
                'total_money' => 8000000,
                'order_id' => 1
            ],
            [
                'id' => 4,
                'product_id' => 8,
                'amount_of' => 2,
                'total_discount' => 0,
                'total_money' => 20340000,
                'order_id' => 2
            ],
            [
                'id' => 5,
                'product_id' => 7,
                'amount_of' => 1,
                'total_discount' => 0,
                'total_money' => 6570000,
                'order_id' => 2
            ],
            [
                'id' => 6,
                'product_id' => 1,
                'amount_of' => 1,
                'total_discount' => 0,
                'total_money' => 1246000,
                'order_id' => 2
            ]
        ];

        $bill = [
            [
                'id' => 1,
                'voucher_code' => 'HĐ-100001',
                'datetime' => '2021-05-21 11:39:20',
                'staff_create' => 'Admin',
                'customer_name' => 'Bùi Xuân Hạnh',
                'phone_number' => '0372348350',
                'order_id' => 1,
                'total_money' => 22170000,
                'customer_pay' => 22170000,
                'return' => 0,
                'type' => 0,
                'status' => 1,
                'categories_id' => 1
            ],
            [
                'id' => 2,
                'voucher_code' => 'HĐ-100002',
                'datetime' => '2021-05-21 11:40:00',
                'staff_create' => 'Admin',
                'customer_name' => 'Hạnh Đẹp Trai',
                'phone_number' => '0372348350',
                'order_id' => 2,
                'total_money' => 28156000,
                'customer_pay' => 28156000,
                'return' => 0,
                'type' => 0,
                'status' => 1,
                'categories_id' => 1
            ]
        ];

        $categories = [
            [
                'id' => 1,
                'categories' => 'Thu tiền bán hàng',
                'status' => 0
            ],
            [
                'id' => 2,
                'categories' => 'Thu nợ từ đối tác',
                'status' => 0
            ],
            [
                'id' => 3,
                'categories' => 'Thu khác',
                'status' => 0
            ],
            [
                'id' => 4,
                'categories' => 'Trả tiền nhập hàng',
                'status' => 1
            ],
            [
                'id' => 5,
                'categories' => 'Trả nợ cho đối tác',
                'status' => 1
            ],
            [
                'id' => 6,
                'categories' => 'Chi khác',
                'status' => 1
            ]
        ];

        
        $import_goods = [
            [
                'id' => 1,
                'voucher_code' => 'NH-100001',
                'datetime' => '2021-05-24 11:00:20',
                'supplier_id' => 1,
                'import_staff' => 'Admin',
                'discount' => 0,
                'VAT' => 0,
                'total_money' => 60000000,
                'total_payment' => 60000000,
                'prepayment' => 60000000,
                'owed_money' => 0,
                'categories_id' => 4,
                'status' => 1
            ],
            [
                'id' => 2,
                'voucher_code' => 'NH-100002',
                'datetime' => '2021-05-25 10:00:00',
                'supplier_id' => 2,
                'import_staff' => 'Admin',
                'discount' => 0,
                'VAT' => 0,
                'total_money' => 320000000,
                'total_payment' => 320000000,
                'prepayment' => 320000000,
                'owed_money' => 0,
                'categories_id' => 4,
                'status' => 1
            ]
        ];

        $product_import = [
            [
                'id' => 1,
                'product_id' => 1,
                'amount_of' => 20,
                'import_price' => 1000000,
                'total_money' => 20000000,
                'import_good_id' => 1
            ],
            [
                'id' => 2,
                'product_id' => 2,
                'amount_of' => 20,
                'import_price' => 2000000,
                'total_money' =>40000000,
                'import_good_id' => 1
            ],
            [
                'id' => 3,
                'product_id' => 7,
                'amount_of' => 20,
                'import_price' => 6000000,
                'total_money' =>120000000,
                'import_good_id' => 2
            ],
            [
                'id' => 4,
                'product_id' => 8,
                'amount_of' => 20,
                'import_price' => 10000000,
                'total_money' =>200000000,
                'import_good_id' => 2
            ]
        ];

    	DB::table('users')->insert($data);
    	DB::table('user_role')->insert($user_role);
        DB::table('brands')->insert($brand);
        DB::table('products')->insert($product);
        DB::table('images')->insert($image_product);
        DB::table('descriptions')->insert($descriptions_product);
        DB::table('orders')->insert($order);
        DB::table('product_order')->insert($product_order);
        DB::table('categories')->insert($categories);
        DB::table('suppliers')->insert($supplier);
        DB::table('bills')->insert($bill);
        DB::table('import_goods')->insert($import_goods);
        DB::table('product_import')->insert($product_import);
    }
}