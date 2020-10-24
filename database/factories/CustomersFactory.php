<?php

namespace Database\Factories;

use App\Models\Customers;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class CustomersFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Customers::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'Nama' => $this->faker->sentence,
            'BadanHukum' => $this->faker->sentence,
            'Alamat' => $this->faker->sentence,
            'Kota' => $this->faker->sentence,
            'KodePos' => $this->faker->sentence,
            'Negara' => $this->faker->sentence,
            'Telp' => $this->faker->sentence, 
            'Fax'=> $this->faker->sentence,
            'Email'=> $this->faker->sentence,
            'ContactPerson'=> $this->faker->sentence,
            'SalesPerson'=> $this->faker->sentence,
            'GrupPelanggan'=> $this->faker->sentence,
            'Aktif'=> $this->faker->sentence,
            'KreditLimit'=> $this->faker->sentence,
            'CustSince'=> $this->faker->sentence,
            'Memo'=> $this->faker->sentence,
            'Asuransi'=> $this->faker->sentence,
            'created_by'=> rand(1, 10)
        ];
    }
}
