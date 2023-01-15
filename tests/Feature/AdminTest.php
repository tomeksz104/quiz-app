<?php

namespace Tests\Feature;

use App\Enums\QuizStatus;
use App\Enums\UserRole;
use App\Http\Livewire\Admin\Categories;
use App\Http\Livewire\admin\Quizzes;
use App\Http\Livewire\Admin\Users;
use App\Http\Livewire\Admin\WebsiteSettings;
use App\Models\Category;
use App\Models\Quiz;
use App\Models\Settings;
use App\Models\User;
use Database\Seeders\SettingsSeeder;
use Illuminate\Http\UploadedFile;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Storage;
use Livewire\Livewire;
use Tests\TestCase;

class AdminTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_quizzes_list_can_be_rendered()
    {
        $quiz =  Quiz::factory()->create(['status' => QuizStatus::APPROVED]);

        $this->actingAs(User::factory()->create(['role' => UserRole::ADMIN]));

        $this->get('/admin/quizzes')->assertSeeLivewire(Quizzes::class);

        $this->get("/admin/quizzes")
            ->assertOk()
            ->assertSee('Lista quizów')
            ->assertSee($quiz->title);
    }

    public function test_categories_list_can_be_rendered()
    {
        $category =  Category::factory()->create();

        $this->actingAs(User::factory()->create(['role' => UserRole::ADMIN]));

        $this->get('/admin/categories')->assertSeeLivewire(Categories::class);

        $this->get("/admin/categories")
            ->assertOk()
            ->assertSee('Lista kategorii')
            ->assertSee($category->title);
    }

    public function test_users_list_can_be_rendered()
    {
        $user =  User::factory()->create(['role' => UserRole::ADMIN]);

        $this->actingAs($user);

        $this->get('/admin/users')->assertSeeLivewire(Users::class);

        $this->get("/admin/users")
            ->assertOk()
            ->assertSee('Lista użytkowników')
            ->assertSee($user->username);
    }

    public function test_admin_can_change_website_settings()
    {
        $params = $this->validParams();

        $this->seed(SettingsSeeder::class);

        $this->actingAs(User::factory()->create(['role' => UserRole::ADMIN]));

        Livewire::test(WebsiteSettings::class)
            ->set('page_title', $params['page_title'])
            ->set('about_footer', $params['about_footer'])
            ->set('copyright', $params['copyright'])
            ->set('youtube', $params['youtube'])
            ->set('facebook', $params['facebook'])
            ->set('twitter', $params['twitter'])
            ->set('instagram', $params['instagram'])
            ->set('twitch', $params['twitch'])
            ->call('submit');

        $this->assertTrue(Settings::wherePageTitle($params['page_title'])->exists());
        $this->assertTrue(Settings::whereAboutFooter($params['about_footer'])->exists());
        $this->assertTrue(Settings::whereCopyright($params['copyright'])->exists());
        $this->assertTrue(Settings::whereYoutube($params['youtube'])->exists());
        $this->assertTrue(Settings::whereFacebook($params['facebook'])->exists());
        $this->assertTrue(Settings::whereTwitter($params['twitter'])->exists());
        $this->assertTrue(Settings::whereInstagram($params['instagram'])->exists());
        $this->assertTrue(Settings::whereTwitch($params['twitch'])->exists());
    }

    public function test_admin_can_change_website_logo()
    {
        $this->actingAs(User::factory()->create(['role' => UserRole::ADMIN]));

        Storage::fake('uploads');

        Livewire::test(WebsiteSettings::class)
            ->set('uploaded_logo', UploadedFile::fake()->image('website.png'))
            ->call('submit');

        $settings = Settings::first();

        $this->assertTrue(Settings::whereLogo($settings->logo)->exists());
    }

    public function test_admin_can_change_website_favicon()
    {
        $this->actingAs(User::factory()->create(['role' => UserRole::ADMIN]));

        Storage::fake('uploads');

        Livewire::test(WebsiteSettings::class)
            ->set('uploaded_favicon', UploadedFile::fake()->image('favicon.png'))
            ->call('submit');

        $settings = Settings::first();

        $this->assertTrue(Settings::whereFavicon($settings->favicon)->exists());
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
            'page_title' => $faker->sentence(1),
            'about_footer' => $faker->text(),
            'copyright' => $faker->text(),
            'youtube' => $faker->url(),
            'facebook' => $faker->url(),
            'twitter' => $faker->url(),
            'instagram' => $faker->url(),
            'twitch' => $faker->url(),
        ], $overrides);
    }
}
