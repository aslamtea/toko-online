   <?php

    use Illuminate\Database\Seeder;
    use App\Admin\Province;
    use Illuminate\Support\Facades\Http;

    class ProvinceSeeder extends Seeder
    {
        /**
         * Run the database seeds.
         *
         * @return void
         */
        public function run()
        {
            Province::truncate();//kosongkan table

            $key = '35d76cc2082051fe822726a638c3a374'; //Buat akun atau pakai API akun Tahu Coding
            $province_url = 'https://api.rajaongkir.com/starter/province';

            //logic untuk get province and city
            $getProvinces = $this->getData($key, $province_url);
            $provinces = $getProvinces['rajaongkir']['results'];

            foreach ($provinces as $province) {
                $data[] = [
                    'id' => $province['province_id'],
                    'province' => $province['province'],
                    'created_at' => date('Y-m-d H:i:s')
                ];
            }

            Province::insert($data);
        }

        //function untuk get data province and city
        private function getData($key, $url)
        {
            return Http::withHeaders([
                'key' => $key
            ])->get($url);
        }
    }
