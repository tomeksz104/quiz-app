## Laravel 9.0 quiz app

A simple application on which any user can create one of five types of quizzes:
- <b>knowledge quiz</b><br/>
    basic version 
- <b>timed quiz</b><br/>
    quiz in which there is a set time to answer.
- <b>mystery</b><br/>
    quiz in which there can be only one question.
- <b>psychotest</b><br/>
    quiz results are assigned to the answers
- <b>which do you prefer?</b><br/>
    quiz without results. When you finish, you can check what others have chosen.

## Features
- Registration and login
- Quiz overview
- Custom result messages
- Like 
- Comments
- Toast notifications
- Newsletter

## Some screenshots

You can find some screenshots of the application on :  https://imgur.com/a/EFriCT8

## Installation

<pre>
git clone https://github.com/tomeksz104/quiz-app.git
cd quiz-app
cp .env.example .env
composer install
php artisan migrate --seed
php artisan serve
</pre>

## Useful commands
Seeding the database :

<pre>php artisan db:seed</pre>

Running tests :

<pre>php artisan test</pre>

## Contributing

Do not hesitate to contribute to the project by adapting or adding features ! Bug reports or pull requests are welcome.

## License

This project is released under the [MIT license](https://opensource.org/licenses/MIT).
