<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //OUTDATED:

        DB::table('products')->insert([
            [
                'name' => 'AMSOIL PREMIUM PROTECTION 10W-40 100% SYNTHETIC MOTOR OIL',
                'description' => 'Sold per Liter. AMSOIL Premium Protection Synthetic Motor Oil is formulated to provide superior protection and performance in a wide variety of demanding applications. Its unique combination of synthetic base oils and a superior additive package results in a formulation that exceeds the requirements of most gasoline or diesel applications that call for 10W-40 or 20W-50 motor oil. Premium Protection Synthetic Motor Oil is ideal for high-mileage vehicles and high-stress vehicles subject to hot temperatures, heavy hauling, trailer pulling or off-road use. It provides the extra anti-wear protection required by engines with flat-tappet cams and high-tension valve springs. AMSOIL Premium Protection Synthetic Motor Oil offers flexibility and performance beyond conventional oils.',
                'price' => 650,
                'stockquantity' => 999,
                'criticallevel' => 24,
                'image' => 'https://lh3.googleusercontent.com/drive-viewer/AKGpihag-wAvZDMfbayIpM2vaIbYBbCArkXGfeU1CjGs-mwmLRRAOT_OFedICwry_3nWFpBTcxmxRcg5-Um5RQToVXFQo2_5Vw=s1600-v0',
            ],
            [
                'name' => 'BC Racing BR Series Coilovers for FD',
                'description' => 'Sold per Set.
                - Front: With Rubber Top Mount
                - Rear: With Rubber Top Mount (Or Without for Some Vehicles)
                - 30 Level Damping Force Adjustment
                - Height Adjustment System
                - Enlarged Cylinder & Newly Developed Piston
                - Exclusively Designed for Each Application
                - Anodized Alloy Casing
                - CNC Machined
                - T6061 Alloy Locking Ring
                - SAE9254 Steel Racing Springs
                - Monotube Design For Maximum Performance
                - Fully Rebuildable',
                'price' => 49000,
                'stockquantity' => 999,
                'criticallevel' => 3,
                'image' => 'https://lh3.googleusercontent.com/drive-viewer/AKGpihZUJACLJoqR1u5SCZNmu_uY19YH-aO43dNttK5CDBqIu4Oy8QcfDp0pYYdGcGB5r1iqkzrn9cOtfegZlgpup-Lq08ao8A=s1600-v0',
            ],
            [
                'name' => 'BC Racing V1 Series Coilovers for EG and EK',
                'description' => 'Sold per Set.
                - Front: Rubber Top Mount
                - Rear: Rubber Top Mount
                - 30 Level Damping Force Adjustment
                - Height Adjustment System
                - Anodized Alloy Casing
                - CNC Machined
                - T6061 Alloy Locking Ring
                - Monotube Design For Maximum Performance
                - Fully Rebuildable',
                'price' => 38000,
                'stockquantity' => 999,
                'criticallevel' => 5,
                'image' => 'https://lh3.googleusercontent.com/drive-viewer/AKGpihYzh3OLS4O4aCfFF1QC98w7UgNcKNDLaaVB0lK1FkfUun6r9jzQPAmwe3EeJBILN9yTKqxyXJZperNjSq9VuYJIf2pDoA=s1600-v0',
            ],
            [
                'name' => 'DriveTech USA Axles for B-Series',
                'description' => 'Sold per Set.
                DTA axles are designed & engineered to match the OEM design.
                It is manufactured using high grade steel with proper heat treatment to ensure longer service life.
                All DTA axles are stamped with identification information in the middle shaft for quality tracking.',
                'price' => 24500,
                'stockquantity' => 999,
                'criticallevel' => 3,
                'image' => 'https://lh3.googleusercontent.com/drive-viewer/AKGpihZc5aQa_nhGvQ19fq9yTvuNgn5VtwDaByJearOabobUvY1p3sLQZbhkKqJqs5C4mAQOB9MH4Q6Yi4Ne04QlrlZl7XuSeg=s1600-v0',
            ],
            [
                'name' => 'Skunk2 Alpha Series 66mm Throttle Body',
                'description' => 'Sold per Set.
                Precision Die-Cast Aluminum
                Fine Shot-Blasted Surface Finish
                Precision Machined Brass Throttle Plate
                Compatible w/ OEM Throttle Cable
                Needle Bearings with Seals for Smooth Leak Free Operation
                New Throttle Body Gasket and Hardware
                Idle Adjustment Screws for Fine Tuning',
                'price' => 11500,
                'stockquantity' => 999,
                'criticallevel' => 2,
                'image' => 'https://lh3.googleusercontent.com/drive-viewer/AKGpihaFMzM_TJ5gFmPkyyPYCZeDRsAICOD1OphY8Fs_zRr0SVzhp27xvSFCrCveAsFgYLW-fl-Uis6BqQqODDmg-GDAqR5xvQ=s1600-v0',
            ],
            [
                'name' => 'Skunk2 Alpha Series 70mm Throttle Body',
                'description' => 'Sold per Set.
                Precision Die-Cast Aluminum
                Fine Shot-Blasted Surface Finish
                Precision Machined Brass Throttle Plate
                Compatible w/ OEM Throttle Cable
                Needle Bearings with Seals For Smooth Leak Free Operation
                New Throttle Body Gasket and Hardware
                Idle Adjustment Screws for Fine Tuning',
                'price' => 11500,
                'stockquantity' => 999,
                'criticallevel' => 2,
                'image' => 'https://lh3.googleusercontent.com/drive-viewer/AKGpihYkXnUwM_6incB0OfUcgsksG0X17QES95ZTzHFdtevt6iBfoJqJ4TQZaEXt7EvgNnPnYpH5VectE1zkf1Wm9T_fDpx2=s1600-v0',
            ],
            [
                'name' => 'Yellow Speed Racing Coilovers for EG and EK',
                'description' => 'Sold per Set.
                Coilovers are designed and developed for motoring enthusiasts desiring excellent handling without sacrificing ride comfort. This suspension system features 33-way adjustable dampening settings and full length ride height adjustment to meet every driver’s handling desires. Pillowball mounts and adjustable camber plates are included for front and rear on most kits to increase steering response, while aluminum upper mounts with hardened rubber bushings are used on some applications for noise reduction. This suspension system is ideal for daily driving and occasional track use. Vehicle ride height can be lowered at least 2.5" or more on most application.
                A steel lower bracket is utilized for MacPherson strut type to increase rigidity for safety (where applicable). For most MacPherson strut models, the brake line bracket is welded manually perfectly to the steel lower mount. A high quality forged alloy aluminum lower bracket is used for Double-A Arm strut type (where applicable). The steel/aluminum lower bracket is processed with electroplated/ anodized surface treatment to prevent corrosion or rust in the harsh conditions of motorsport. The vehicle ride height can be adjusted easily with the lower bracket by winding up and down to drop and raise. With the lower bracket, it allows maximum suspension travel without affecting the shock stroke.
                High quality components are adopted to ensure product durability and stability. Each application is test fit and completely road tested to guarantee perfect performance and comfort.',
                'price' => 34000,
                'stockquantity' => 999,
                'criticallevel' => 5,
                'image' => 'https://lh3.googleusercontent.com/drive-viewer/AKGpihYzh3OLS4O4aCfFF1QC98w7UgNcKNDLaaVB0lK1FkfUun6r9jzQPAmwe3EeJBILN9yTKqxyXJZperNjSq9VuYJIf2pDoA=s1600-v0',
            ],
            [
                'name' => 'Yellow Speed Racing Coilovers for FD',
                'description' => 'Sold per Set.
                Coilovers are designed and developed for motoring enthusiasts desiring excellent handling without sacrificing ride comfort. This suspension system features 33-way adjustable dampening settings and full length ride height adjustment to meet every driver’s handling desires. Pillowball mounts and adjustable camber plates are included for front and rear on most kits to increase steering response, while aluminum upper mounts with hardened rubber bushings are used on some applications for noise reduction. This suspension system is ideal for daily driving and occasional track use. Vehicle ride height can be lowered at least 2.5" or more on most application.
                A steel lower bracket is utilized for MacPherson strut type to increase rigidity for safety (where applicable). For most MacPherson strut models, the brake line bracket is welded manually perfectly to the steel lower mount. A high quality forged alloy aluminum lower bracket is used for Double-A Arm strut type (where applicable). The steel/aluminum lower bracket is processed with electroplated/ anodized surface treatment to prevent corrosion or rust in the harsh conditions of motorsport. The vehicle ride height can be adjusted easily with the lower bracket by winding up and down to drop and raise. With the lower bracket, it allows maximum suspension travel without affecting the shock stroke.
                High quality components are adopted to ensure product durability and stability. Each application is test fit and completely road tested to guarantee perfect performance and comfort.',
                'price' => 45000,
                'stockquantity' => 999,
                'criticallevel' => 3,
                'image' => 'https://lh3.googleusercontent.com/drive-viewer/AKGpihZUJACLJoqR1u5SCZNmu_uY19YH-aO43dNttK5CDBqIu4Oy8QcfDp0pYYdGcGB5r1iqkzrn9cOtfegZlgpup-Lq08ao8A=s1600-v0',
            ],
            [
                'name' => 'Yonaka Intermediate Half Shaft for B-Series',
                'description' => 'Sold per Set.
                The Yonaka half shaft is an upgraded intermediate shaft (half shaft) designed for the 1994 to 2001 Acura Integra hydraulic manual transmission.
                (Will not work with automatic transmissions)
                15% thicker than the Honda OEM intermediate shaft with upgraded bearings, this half shaft delivers superior strength over the manufacturer\'s OEM part.',
                'price' => 8000,
                'stockquantity' => 999,
                'criticallevel' => 3,
                'image' => 'https://lh3.googleusercontent.com/drive-viewer/AKGpihaCZ2qesEGDgXB0kEr2Eln8F1KON7zG2yR5Zc-g3xjZEW9_8D6Ym4fBJP64cciQXtD3MVww6-u1mSIAY3HrYU4E1U23WQ=s1600-v0',
            ],
            [
                'name' => 'AmsOil Signature Series 5W30 Engine Oil',
                'description' => 'Sold per Liter.
                Engineered for enthusiasts seeking maximum protection and performance. Precision-formulated with cutting-edge technology and a longstanding devotion to making the world’s best motor oil. The result: engine protection that blows the doors off the highest industry standards.
                • 50% more cleaning powervs. AMSOIL OE Motor Oil
                • Ideal for turbos & direct injection
                • Guaranteed protection for up to 25,000 miles or 1 year',
                'price' => 750,
                'stockquantity' => 999,
                'criticallevel' => 24,
                'image' => 'https://lh3.googleusercontent.com/drive-viewer/AKGpihY_IM-AZ83Adadb2RbRhSvV8Asg-e9kf1f9bh_5iZA9kfHoaGu-N4rLLt77Pd09PpEYYykFdYxsA-pfC-ti8pm9btGJ=s1600-v0',
            ],
        ]);
    }
}
