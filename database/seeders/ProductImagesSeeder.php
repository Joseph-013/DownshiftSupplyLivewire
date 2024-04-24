<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductImagesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('product_images')->insert([
            [
                'product_id' => 1,
                'image' => 'https://lh3.googleusercontent.com/drive-viewer/AKGpihag-wAvZDMfbayIpM2vaIbYBbCArkXGfeU1CjGs-mwmLRRAOT_OFedICwry_3nWFpBTcxmxRcg5-Um5RQToVXFQo2_5Vw=s1600-v0',
            ],
            [
                'product_id' => 2,
                'image' => 'https://lh3.googleusercontent.com/drive-viewer/AKGpihZUJACLJoqR1u5SCZNmu_uY19YH-aO43dNttK5CDBqIu4Oy8QcfDp0pYYdGcGB5r1iqkzrn9cOtfegZlgpup-Lq08ao8A=s1600-v0',
            ],
            [
                'product_id' => 3,
                'image' => 'https://lh3.googleusercontent.com/drive-viewer/AKGpihYzh3OLS4O4aCfFF1QC98w7UgNcKNDLaaVB0lK1FkfUun6r9jzQPAmwe3EeJBILN9yTKqxyXJZperNjSq9VuYJIf2pDoA=s1600-v0',
            ],
            [
                'product_id' => 4,
                'image' => 'https://lh3.googleusercontent.com/drive-viewer/AKGpihZc5aQa_nhGvQ19fq9yTvuNgn5VtwDaByJearOabobUvY1p3sLQZbhkKqJqs5C4mAQOB9MH4Q6Yi4Ne04QlrlZl7XuSeg=s1600-v0',
            ],
            [
                'product_id' => 5,
                'image' => 'https://lh3.googleusercontent.com/drive-viewer/AKGpihaFMzM_TJ5gFmPkyyPYCZeDRsAICOD1OphY8Fs_zRr0SVzhp27xvSFCrCveAsFgYLW-fl-Uis6BqQqODDmg-GDAqR5xvQ=s1600-v0',
            ],
            [
                'product_id' => 6,
                'image' => 'https://lh3.googleusercontent.com/drive-viewer/AKGpihYkXnUwM_6incB0OfUcgsksG0X17QES95ZTzHFdtevt6iBfoJqJ4TQZaEXt7EvgNnPnYpH5VectE1zkf1Wm9T_fDpx2=s1600-v0',
            ],
            [
                'product_id' => 7,
                'image' => 'https://lh3.googleusercontent.com/drive-viewer/AKGpihZIfb19ABkKGiTttfJdzHkpcqkYw2EEVh8GyQpSLwQsLnW0FmH9vCA4GIsNiyX6rIjxQUBDO8Mw4ONeEqrZvBwctTXSGYtS4kk=s1600-rw-v1',
            ],
            [
                'product_id' => 8,
                'image' => 'https://lh3.googleusercontent.com/drive-viewer/AKGpihZUJACLJoqR1u5SCZNmu_uY19YH-aO43dNttK5CDBqIu4Oy8QcfDp0pYYdGcGB5r1iqkzrn9cOtfegZlgpup-Lq08ao8A=s1600-v0',
            ],
            [
                'product_id' => 9,
                'image' => 'https://lh3.googleusercontent.com/drive-viewer/AKGpihaCZ2qesEGDgXB0kEr2Eln8F1KON7zG2yR5Zc-g3xjZEW9_8D6Ym4fBJP64cciQXtD3MVww6-u1mSIAY3HrYU4E1U23WQ=s1600-v0',
            ],
            [
                'product_id' => 10,
                'image' => 'https://lh3.googleusercontent.com/drive-viewer/AKGpihY_IM-AZ83Adadb2RbRhSvV8Asg-e9kf1f9bh_5iZA9kfHoaGu-N4rLLt77Pd09PpEYYykFdYxsA-pfC-ti8pm9btGJ=s1600-v0',
            ],

        ]);
    }
}
