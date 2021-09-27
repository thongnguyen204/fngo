<?php

use App\Models\SubTour;
use Illuminate\Database\Seeder;

class SubTourSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        for ($i=1; $i < 15; $i++) { 
            $subTour2 =  SubTour::create([
                'tour_id' => $i,
                'title' => 'TP.HCM - HN - ĐÀ LẠT',
                
                'day' => 1,
                'content' => 'Xe và đón khách  sân bay Liên Khương hoặc bến xe. Sau đó xe đưa quý khách về thành phồ, nhập đoàn HDV đưa quý khách tham quan Dinh Bảo Đại ngôi dinh thự được chính vua Bảo Đại – vị vua cuối cùng của Việt Nam xây dựng để nghỉ ngơi và làm việc tại Đà Lạt được nhà nước cấp hạng di tích quốc gia.',
            ]);
            $subTour3 =  SubTour::create([
                'tour_id' => $i,
                'title' => 'ĐÀ LẠT SỨ SỞ NGÀN THÔNG',
                'day' => 2,
                'content' => 'Xe và HDV đưa quý khách tham quan Nông Trại Cún Puppy Farm đây là một địa điểm du lịch Đà Lạt mới nhất năm 2019 dành cho những tín đồ yêu động vật.
                Núi Langbiang Tiếp tục hành trình tới chân núi Langbiang (cao 2.169m), quý khách thuê xe Jeep lên núi (tự túc). Từ đỉnh núi quý khách sẽ cảm nhận được không khí mát mẻ dễ chịu của núi rừng, ngắm cảnh chụp hình bao quát thành phố Đà Lạt, hồ suối vàng, suối bạc…
               ',
            ]);
        }
        
    }
}
