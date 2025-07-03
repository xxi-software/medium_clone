<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
  /**
   * The current password being used by the factory.
   */
  protected static ?string $password;

  /**
   * Define the model's default state.
   *
   * @return array<string, mixed>
   */
  public function definition(): array
  {
    $name = fake()->unique()->name(); // Asegura nombres únicos

    return [
      'name' => $name,
      'username' => $this->generateUniqueUsername($name),
      'email' => fake()->unique()->safeEmail(),
      'email_verified_at' => now(),
      'password' => static::$password ??= Hash::make('password'),
      'remember_token' => Str::random(10),
      'image' => null, // O puedes generar imágenes aleatorias
      'bio' => fake()->paragraph(), // Agrega una bio aleatoria
    ];
  }

  protected function generateUniqueUsername(string $name): string
  {
    $username = Str::slug($name);
    $originalUsername = $username;
    $count = 1;

    // Verifica si el username ya existe en la base de datos
    while (User::where('username', $username)->exists()) {
      $username = $originalUsername . '-' . $count++;
    }

    return $username;
  }

  /**
   * Indicate that the model's email address should be unverified.
   */
  public function unverified(): static
  {
    return $this->state(fn(array $attributes) => [
      'email_verified_at' => null,
    ]);
  }
}
