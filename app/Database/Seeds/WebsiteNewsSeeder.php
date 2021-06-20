<?php
namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class WebsiteNewsSeeder extends Seeder
{
        public function run()
        {
            $data = [
                'id'      => '1',
                'slug'    => '1-welcome-to-meteor',
                'title'   => 'Welcome to Meteor!',
                'short_story' => 'Curious about Cosmic\'s functions? Then be sure to read this!',
                'full_story' => '<p>Hey you! Who the hell are you?! Are you using CosmicCMS?!<br /><br />You managed to get Cosmic working!<br /><br />Our team has worked very hard on Cosmic to keep the installation as easy as possible. Cosmic has been specially developed with a new proprietary written Framework. So it\'s normal that you won\'t know how everything works yet, hence the installation in the beginning!<br /><br />Cosmic offers many functions, all of which are easy to use. Just think of adding currency ids, adding and editing furniture, managing the FAQ, managing and answering help tickets, VPN control, remote control (RCON), and much more!<br /><br />Since Cosmic already has the basic functions, you won\'t have to add anything yourself, but of course you can! Though you will have to learn the Framework first. We have thought about this as well. Our team has provided a documentation that will allow you to write new features in our Framework within minutes/hours/days/weeks! This depends on the skills you already have!<br /><br />Unfortunately Cosmic only works on Arcturus Morningstar, this means that you cannot set Cosmic to Plus Emulator/Comet Server or R63 Emulators. Now the question is, can I also use Cosmic on the normal Arcturus or upcoming Sirius Emulator? We advise you not to do this as some functions may differ between these emulators. If you don\'t want to use Arcturus Morningstar anyway, you\'ll have to convert Cosmic to the emulator you love!<br /><br />Cosmic is composed of about 34.4% JavaScript, 32.3% PHP, 20% HTML and 13.3% CSS. Now you will think, why is Cosmic almost half made of JavaScript? Cosmic wouldn\'t work without this JavaScript, because we made sure that you only need to load Cosmic once and you can control all functions without refresh! This also ensures that we can use a hotel that can stay open. This makes it easier to switch between website and hotel, but also to control the functions, since we can use notifications without refreshing the page and because of this your data is gone!',
              'images'    => 'https://images.habbo.com/c_images/Security/safetytips1_n.png',
              'author'    => '1',
              'header'    => 'https://images.habbo.com/web_images/habbo-web-articles/lpromo_house18_gen.png',
              'category'  => '1',
              'timestamp' => time()
            ];

            $this->db->table('website_news')->insert($data);
        }
}