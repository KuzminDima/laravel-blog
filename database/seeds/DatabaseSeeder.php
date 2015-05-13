<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Model::unguard();

		$this->call('CategoryTableSeeder');
        $this->command->info('The table categories is filled');
	}

}

class CategoryTableSeeder extends Seeder {

    public function run()
    {
        DB::table('categories')->delete();

        $node = \App\Category::create([
            'name' => 'API',
            'children' => [
                [ 'name' => 'Google API' ],
                [ 'name' => 'Яндекс API' ],
                [ 'name' => 'Вконтакте API' ],
                [ 'name' => 'Twitter API' ],
                [ 'name' => 'Facebook API' ],
                [ 'name' => 'Maps API' ],
            ]
        ]);

        $node = \App\Category::create([
            'name' => 'Администрирование',
            'children' => [
                [ 'name' => 'Системное администрирование' ],
                [ 'name' => 'Сетевые технологии' ],
                [ 'name' => 'Восстановление данных' ],
            ]
        ]);

        $node = \App\Category::create([
            'name' => 'Базы данных',
            'children' => [
                [ 'name' => 'Хранение данных' ],
                [ 'name' => 'Big Data' ],
                [ 'name' => 'SQL' ],
            ]
        ]);

        $node = \App\Category::create([
            'name' => 'Безопасность',
            'children' => [
                [ 'name' => 'Информационная безопасность' ],
                [ 'name' => 'Криптография' ],
                [ 'name' => 'Вирусы и антивирусы' ],
            ]
        ]);

        $node = \App\Category::create([
            'name' => 'Дизайн, графика, звук',
            'children' => [
                [ 'name' => 'Работа с анимацией и 3D-графикой' ],
                [ 'name' => 'Веб-дизайн' ],
                [ 'name' => 'Работа со звуком' ],
                [ 'name' => 'Дизайн мобильных приложений' ],
                [ 'name' => 'Векторная графика' ],
                [ 'name' => 'Работа с видео' ],
                [ 'name' => 'Типографика' ],
            ]
        ]);

        $node = \App\Category::create([
            'name' => 'Программирование',
            'children' => [
                [ 'name' => 'Веб-разработка' ],
                [ 'name' => 'Open source' ],
                [ 'name' => 'Реверс-инжиниринг' ],
                [ 'name' => 'Программирование микроконтроллеров' ],
                [ 'name' => 'Разработка' ],
                [ 'name' => 'Game Development' ],
                [ 'name' => 'Алгоритмы' ],
            ]
        ]);

        $node = \App\Category::create([
            'name' => 'Программное обеспечение',
            'children' => [
                [ 'name' => 'Настройка Linux' ],
                [ 'name' => 'Google Chrome' ],
                [ 'name' => 'Nginx' ],
                [ 'name' => 'Unity3D' ],
                [ 'name' => 'CAD/CAM' ],
                [ 'name' => 'Help Desk Software' ],
                [ 'name' => 'Apache' ],
            ]
        ]);

        $node = \App\Category::create([
            'name' => 'Телекоммуникации',
            'children' => [
                [ 'name' => 'ИТ-инфраструктура' ],
                [ 'name' => 'Беспроводные технологии' ],
            ]
        ]);

        $node = \App\Category::create([
            'name' => 'Фреймворки и CMS',
            'children' => [
                [ 'name' => 'Node.JS' ],
                [ 'name' => 'Ruby on Rails' ],
                [ 'name' => 'Yii' ],
                [ 'name' => 'AngularJS' ],
                [ 'name' => 'Symfony' ],
                [ 'name' => 'ReactJS' ],
                [ 'name' => 'Meteor.JS' ],
                [ 'name' => 'Qt' ],
            ]
        ]);

        $node = \App\Category::create([
            'name' => 'Фронтенд',
            'children' => [
                [ 'name' => 'JavaScript' ],
                [ 'name' => 'CSS' ],
                [ 'name' => 'HTML' ],
                [ 'name' => 'XML' ],
                [ 'name' => 'Canvas' ],
            ]
        ]);
    }

}
