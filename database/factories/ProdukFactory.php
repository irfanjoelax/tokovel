<?php

namespace Database\Factories;

use App\Models\Produk;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ProdukFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Produk::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'id_prd'    => $this->faker->uuid,
            'kat_id'    => 'f1909ce5-bd70-463d-a585-bf9e64478af1',
            'nm_prd'    => $this->faker->name,
            'slug_prd'  => Str::kebab($this->faker->name),
            'desk_prd'  => $this->faker->text,
            'stok_prd'  => $this->faker->randomDigit,
            'hrg_prd'   => $this->faker->numberBetween($min = 10000, $max = 200000),
            'brt_prd'   => $this->faker->numberBetween($min = 1000, $max = 2000),
            'gbr_prd'   => $this->faker->imageUrl($width = 640, $height = 480),
        ];
    }
}
