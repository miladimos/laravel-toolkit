<?php

namespace Miladimos\Toolkit\Database\Seeders;

use Illuminate\Database\Seeder;
use Miladimos\Toolkit\Models\IrBank;

class IrBankSeeder extends Seeder
{

    public function run()
    {
        $banks = array(
            array('id' => '1', 'title' => 'صادرات', 'type'=> 'دولتی'),
            array('id' => '2', 'title' => 'ملّی ایران', 'type'=> 'دولتی'),
            array('id' => '3', 'title' => 'مسکن', 'type'=> 'دولتی'),
            array('id' => '4', 'title' => 'آینده', 'type'=> 'دولتی'),
            array('id' => '5', 'title' => 'پارسیان', 'type'=> 'دولتی'),
            array('id' => '6', 'title' => 'شهر', 'type'=> 'دولتی'),
            array('id' => '7', 'title' => 'اقتصاد نوین', 'type'=> 'دولتی'),
            array('id' => '8', 'title' => 'تات', 'type'=> 'دولتی'),
            array('id' => '9', 'title' => 'سپه', 'type'=> 'دولتی'),
            array('id' => '10', 'title' => 'صنعت و معدن', 'type'=> 'دولتی'),
            array('id' => '11', 'title' => 'توسعه صادرات ایران', 'type'=> 'دولتی'),
            array('id' => '12', 'title' => 'توسعه تعاون', 'type'=> 'دولتی'),
            array('id' => '13', 'title' => 'پست بانک ایران', 'type'=> 'دولتی'),
            array('id' => '14', 'title' => 'کارآفرین', 'type'=> 'دولتی'),
            array('id' => '15', 'title' => 'سامان', 'type'=> 'دولتی'),
            array('id' => '16', 'title' => 'سینا', 'type'=> 'دولتی'),
            array('id' => '17', 'title' => 'خاور میانه', 'type'=> 'دولتی'),
            array('id' => '18', 'title' => 'دی', 'type'=> 'دولتی'),
            array('id' => '20', 'title' => 'ملت', 'type'=> 'دولتی'),
            array('id' => '21', 'title' => 'تجارت', 'type'=> 'دولتی'),
            array('id' => '22', 'title' => 'رفاه', 'type'=> 'دولتی'),
            array('id' => '23', 'title' => ' حکمت ایرانیان', 'type'=> 'دولتی'),
            array('id' => '24', 'title' => 'گردشگری', 'type'=> 'دولتی'),
            array('id' => '25', 'title' => 'ایران زمین', 'type'=> 'دولتی'),
            array('id' => '26', 'title' => 'قوامین', 'type'=> 'دولتی'),
            array('id' => '27', 'title' => 'انصار', 'type'=> 'دولتی'),
            array('id' => '28', 'title' => 'سرمایه', 'type'=> 'دولتی'),
            array('id' => '29', 'title' => 'پاسارگاد', 'type'=> 'دولتی'),
            array('id' => '30', 'title' => 'بانک قرض‌الحسنه مهر ایران', 'type'=> 'دولتی'),
            array('id' => '31', 'title' => 'بانک قرض‌الحسنه رسالت', 'type'=> 'دولتی'),
            array('id' => '32', 'title' => 'دیگر', 'type'=> 'دولتی'),
        );



        foreach ($banks as $data) {
            IrBank::create([
                'id' => $data['id'],
                'title' => $data['title'],
            ]);
        }
    }
}
