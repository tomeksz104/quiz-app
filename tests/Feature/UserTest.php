<?php

namespace Tests\Feature;

use App\Http\Livewire\User\AccountSettings;
use App\Models\User;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Livewire\Livewire;
use Tests\TestCase;

class UserTest extends TestCase
{
    use WithFaker;

    public function test_user_profile_can_be_rendered()
    {
        $user = User::factory()->create();

        $this->actingAs($user)
            ->get("/profil/{$user->username}")
            ->assertOk()
            ->assertSee($user->username)
            ->assertSee('Edytuj profil')
            ->assertSee('Quizy')
            ->assertSee('Komentarze')
            ->assertSee('Polubione')
            ->assertSee('Oczekujące');
    }

    public function test_edit_user_profile_can_be_rendered()
    {
        $user = User::factory()->create();

        $this->actingAs($user)
            ->get('/ustawienia-konta')
            ->assertOk()
            ->assertSee('Ogólne')
            ->assertSee('Profil')
            ->assertSee('Hasło')
            ->assertSee('Socialmedia')
            ->assertSee($user->username)
            ->assertSee($user->email)
            ->assertSee('Zapisz');
    }

    public function test_user_can_update_profile()
    {
        $params = $this->validParams();

        $this->actingAs(User::factory()->create());

        Livewire::test(AccountSettings::class)
            ->set('display_username', $params['display_username'])
            ->set('email', $params['email'])
            ->set('first_name', $params['first_name'])
            ->set('last_name', $params['last_name'])
            ->set('bio', $params['bio'])
            ->set('youtube', $params['youtube'])
            ->set('facebook', $params['facebook'])
            ->set('twitter', $params['twitter'])
            ->set('instagram', $params['instagram'])
            ->set('twitch', $params['twitch'])
            ->call('submit');

        $this->assertTrue(User::whereDisplayUsername($params['display_username'])->exists());
        $this->assertTrue(User::whereEmail($params['email'])->exists());
        $this->assertTrue(User::whereFirstName($params['first_name'])->exists());
        $this->assertTrue(User::whereLastName($params['last_name'])->exists());
        $this->assertTrue(User::whereBio($params['bio'])->exists());
        $this->assertTrue(User::whereYoutube($params['youtube'])->exists());
        $this->assertTrue(User::whereFacebook($params['facebook'])->exists());
        $this->assertTrue(User::whereTwitter($params['twitter'])->exists());
        $this->assertTrue(User::whereInstagram($params['instagram'])->exists());
        $this->assertTrue(User::whereTwitch($params['twitch'])->exists());
    }

    public function test_user_can_update_password()
    {
        $params = $this->validPasswordParams();
        $user  = User::factory()->create(['password' => Hash::make($params['current_password'])]);

        $this->actingAs($user);

        Livewire::test(AccountSettings::class)
            ->set('old_password', $params['current_password'])
            ->set('password', $params['password'])
            ->set('password_confirmation', $params['password_confirmation'])
            ->call('submit_password');

        $this->assertTrue(Hash::check($params['password'], $user->refresh()->password));
    }

    public function test_user_can_not_update_password_with_invalid_current_password()
    {
        $params = $this->validPasswordParams();
        $user  = User::factory()->create(['password' => Hash::make($params['current_password'])]);
        $params = $this->validPasswordParams(['current_password' => '7h3_l457_j3d1']);

        $this->actingAs($user);

        Livewire::test(AccountSettings::class)
            ->set('old_password', $params['current_password'])
            ->set('password', $params['password'])
            ->set('password_confirmation', $params['password_confirmation'])
            ->call('submit_password');

        $this->assertFalse(Hash::check($params['password'], $user->refresh()->password));
    }

    public function test_avatar_size_validation()
    {
        $this->actingAs(User::factory()->create());

        Livewire::test(AccountSettings::class)
            ->set('uploaded_avatar', UploadedFile::fake()->create('logo.jpg', 3025))
            ->call('submit')
            ->assertHasErrors(['uploaded_avatar' => 'max']);

        Livewire::test(AccountSettings::class)
            ->set('uploaded_avatar', UploadedFile::fake()->create('logo.jpg', 1000))
            ->call('submit')
            ->assertHasNoErrors('uploaded_avatar');
    }

    public function test_user_can_update_avatar()
    {
        $user = User::first();
        $this->actingAs($user);

        Storage::fake('uploads');

        Livewire::test(AccountSettings::class)
            ->set('uploaded_avatar', UploadedFile::fake()->image('avatar.png'))
            ->call('submit');

        $this->assertTrue(User::whereAvatar($user->avatar)->exists());
        Storage::disk('uploads')->assertExists('images/' . $user->avatar);
    }

    public function test_user_can_delete_avatar()
    {
        $user = User::first();

        $avatar_path = $user->avatar;

        $this->actingAs($user);

        Storage::fake('uploads');

        Livewire::test(AccountSettings::class)
            ->call('deleteAvatar')
            ->call('submit');;

        $this->assertTrue(User::whereAvatar(null)->exists());
        Storage::disk('uploads')->assertMissing('images/' . $avatar_path);
    }

    public function test_user_activity_can_be_rendered()
    {
        $this->actingAs(User::factory()->create());

        $response = $this->get('/aktywnosc');

        $response->assertStatus(200);
    }

    public function test_user_activity_can_not_renderer_for_guest()
    {
        $response = $this->get('/aktywnosc');

        $this->assertGuest();
    }

    public function test_user_quizzes_can_be_rendered()
    {
        $this->actingAs(User::factory()->create());

        $response = $this->get('/quizzes');

        $response->assertStatus(200);
    }

    public function test_user_quizzes_can_not_renderer_for_guest()
    {
        $response = $this->get('/quizzes');

        $this->assertGuest();
    }


    /**
     * Valid params for updating or creating a resource
     *
     * @param  array  $overrides new params
     * @return array  Valid params for updating or creating a resource
     */
    private function validParams($overrides = [])
    {
        $faker = \Faker\Factory::create();

        return array_merge([
            'display_username' => $faker->userName(),
            'email' => $faker->email(),
            'first_name' => $faker->firstName(),
            'last_name' => $faker->lastName(),
            'bio' => $faker->text(),
            'youtube' => $faker->url(),
            'facebook' => $faker->url(),
            'twitter' => $faker->url(),
            'instagram' => $faker->url(),
            'twitch' => $faker->url(),
        ], $overrides);
    }

     /**
     * Valid params for updating or creating a resource's password
     *
     * @param  array  $overrides new params
     * @return array  Valid params for updating or creating a resource
     */
    private function validPasswordParams($overrides = [])
    {
        return array_merge([
            'current_password' => '4_n3w_h0p3',
            'password' => '7h3_3mp1r3_57r1k35_b4ck',
            'password_confirmation' => '7h3_3mp1r3_57r1k35_b4ck'
        ], $overrides);
    }
}
