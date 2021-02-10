<?php

namespace Miladimos\Toolkit\Database\Seeders;

use Illuminate\Database\Seeder;

class BankSeeder extends Seeder
{

    public function run()
    {
        $banks = array(
            array('id' => '1', 'title' => 'صادرات'),
            array('id' => '2', 'title' => 'ملّی ایران'),
            array('id' => '3', 'title' => 'مسکن'),
            array('id' => '4', 'title' => 'آینده'),
            array('id' => '5', 'title' => 'پارسیان'),
            array('id' => '6', 'title' => 'شهر'),
            array('id' => '7', 'title' => 'اقتصاد نوین'),
            array('id' => '8', 'title' => 'تات'),
            array('id' => '9', 'title' => 'سپه'),
            array('id' => '10', 'title' => 'صنعت و معدن'),
            array('id' => '11', 'title' => 'توسعه صادرات ایران'),
            array('id' => '12', 'title' => 'توسعه تعاون'),
            array('id' => '13', 'title' => 'پست بانک ایران'),
            array('id' => '14', 'title' => 'کارآفرین'),
            array('id' => '15', 'title' => 'سامان'),
            array('id' => '16', 'title' => 'سینا'),
            array('id' => '17', 'title' => 'خاور میانه'),
            array('id' => '18', 'title' => 'دی'),
            array('id' => '20', 'title' => 'ملت'),
            array('id' => '21', 'title' => 'تجارت'),
            array('id' => '22', 'title' => 'رفاه'),
            array('id' => '23', 'title' => ' حکمت ایرانیان'),
            array('id' => '24', 'title' => 'گردشگری'),
            array('id' => '25', 'title' => 'ایران زمین'),
            array('id' => '26', 'title' => 'قوامین'),
            array('id' => '27', 'title' => 'انصار'),
            array('id' => '28', 'title' => 'سرمایه'),
            array('id' => '29', 'title' => 'پاسارگاد'),
            array('id' => '30', 'title' => 'بانک قرض‌الحسنه مهر ایران'),
            array('id' => '31', 'title' => 'بانک قرض‌الحسنه رسالت'),
            array('id' => '32', 'title' => 'دیگر'),
        );



        foreach ($banks as $data) {
            \App\Models\Bank::create([
                'id' => $data['id'],
                'title' => $data['title'],
            ]);
        }
    }
}
