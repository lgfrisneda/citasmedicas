<?php

use App\Entity;
use Illuminate\Database\Seeder;

class EntitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Entity::create([
        	'title' => 'EPS',
        	'image' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcTRg7UqHcFw0gpBp3g2DqLWLXE-_PsuM0bwYA&usqp=CAU'
        ]);

        Entity::create([
        	'title' => 'Prepagada',
        	'image' => 'https://www.prospectfactory.com.mx/wp-content/uploads/2016/01/doctor.jpg'
        ]);

        Entity::create([
        	'title' => 'Particular',
        	'image' => 'https://periodicoabcrm.blob.core.windows.net/images/2020/03/26/cropw562h368lalecciondeldoctorhouseparaconvenceralosantivacunasen2minutos4766-focus-0-0-940-615.jpg'
        ]);
    }
}
