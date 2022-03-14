<?php

namespace Miladimos\Toolkit\Database\Seeders;

use Illuminate\Database\Seeder;
use Miladimos\Toolkit\Models\IrBank;

class IrBankSeeder extends Seeder
{

    public function run()
    {
        $banks = array(
            array('id' => '1', 'title' => 'صادرات', 'type'=> 'دولتی', 'logo' => ''),
            array('id' => '2', 'title' => 'ملّی ایران', 'type'=> 'دولتی', 'logo' => ''),
            array('id' => '3', 'title' => 'مسکن', 'type'=> 'دولتی', 'logo' => ''),
            array('id' => '4', 'title' => 'آینده', 'type'=> 'خصوصی', 'logo' => ''),
            array('id' => '5', 'title' => 'پارسیان', 'type'=> 'دولتی', 'logo' => ''),
            array('id' => '6', 'title' => 'شهر', 'type'=> 'دولتی', 'logo' => ''),
            array('id' => '7', 'title' => 'اقتصاد نوین', 'type'=> 'دولتی', 'logo' => ''),
            array('id' => '8', 'title' => 'تات', 'type'=> 'دولتی', 'logo' => ''),
            array('id' => '9', 'title' => 'سپه', 'type'=> 'دولتی', 'logo' => ''),
            array('id' => '10', 'title' => 'صنعت و معدن', 'type'=> 'دولتی', 'logo' => ''),
            array('id' => '11', 'title' => 'توسعه صادرات ایران', 'type'=> 'دولتی', 'logo' => ''),
            array('id' => '12', 'title' => 'توسعه تعاون', 'type'=> 'دولتی', 'logo' => ''),
            array('id' => '13', 'title' => 'پست بانک ایران', 'type'=> 'دولتی', 'logo' => ''),
            array('id' => '14', 'title' => 'کارآفرین', 'type'=> 'دولتی', 'logo' => ''),
            array('id' => '15', 'title' => 'سامان', 'type'=> 'دولتی', 'logo' => ''),
            array('id' => '16', 'title' => 'سینا', 'type'=> 'دولتی', 'logo' => ''),
            array('id' => '17', 'title' => 'خاور میانه', 'type'=> 'دولتی', 'logo' => ''),
            array('id' => '18', 'title' => 'دی', 'type'=> 'دولتی', 'logo' => ''),
            array('id' => '20', 'title' => 'ملت', 'type'=> 'دولتی', 'logo' => ''),
            array('id' => '21', 'title' => 'تجارت', 'type'=> 'دولتی', 'logo' => ''),
            array('id' => '22', 'title' => 'رفاه', 'type'=> 'دولتی', 'logo' => ''),
            array('id' => '23', 'title' => ' حکمت ایرانیان', 'type'=> 'دولتی', 'logo' => ''),
            array('id' => '24', 'title' => 'گردشگری', 'type'=> 'دولتی', 'logo' => ''),
            array('id' => '25', 'title' => 'ایران زمین', 'type'=> 'دولتی', 'logo' => ''),
            array('id' => '26', 'title' => 'قوامین', 'type'=> 'دولتی', 'logo' => ''),
            array('id' => '27', 'title' => 'انصار', 'type'=> 'دولتی', 'logo' => ''),
            array('id' => '28', 'title' => 'سرمایه', 'type'=> 'دولتی', 'logo' => ''),
            array('id' => '29', 'title' => 'پاسارگاد', 'type'=> 'دولتی', 'logo' => ''),
            array('id' => '30', 'title' => 'بانک قرض‌الحسنه مهر ایران', 'type'=> 'دولتی', 'logo' => ''),
            array('id' => '31', 'title' => 'بانک قرض‌الحسنه رسالت', 'type'=> 'دولتی', 'logo' => ''),
            array('id' => '32', 'title' => 'دیگر', 'type'=> 'دولتی', 'logo' => ''),
        );



        foreach ($banks as $data) {
            IrBank::create([
                'id' => $data['id'],
                'title' => $data['title'],
                'logo' => $data['logo'],
            ]);
        }
    }
}
