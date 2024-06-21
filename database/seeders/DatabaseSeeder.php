<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Service;
use App\Models\Skill;
use App\Models\Team;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        User::factory()->create([
            'name' => 'Lazuardi<br/>Irham Karaman',
            'email' => 'irhamkaraman@gmail.com',
            'password' => bcrypt('irhamkaraman123'),
            'about' => 'Saya, Lazuardi Irham Karaman, seorang web developer asal dari Sumenep, Jawa Timur. Saya saat ini sedang menempuh pendidikan di Universitas Muhammadiyah Ponorogo. Saya mencapai persingatannya di universitas tersebut. Saya memiliki pengalaman dalam mendesain dan mengembangkan situs web yang sesuai dengan kebutuhan dan menarik.',
            'whatsapp' => '081234567890',
            'facebook' => '100014477028282',
            'instagram' => 'irhamkaraman',
            'github' => 'irhamkaraman',
            'linkedin' => 'lazuardi-irham-karaman-3178a3305/?originalSubdomain=id',
            'birthdate' => '24 Februari 2004',
            'address' => 'Jln Raya Kalianget, Kab. Sumenep',
        ]);

        Service::factory()->create([
            'title' => 'Designer',
            'icon' => 'icon-design.svg',
            'description' => 'Pengembangan web dan desain grafis yang telah saya rancang.',
        ]);
        Service::factory()->create([
            'title' => 'Web development',
            'icon' => 'icon-dev.svg',
            'description' => 'Membangun situs web yang interaktif dan responsive.',
        ]);
        Service::factory()->create([
            'title' => 'Mengetik 10 Jari',
            'icon' => 'icon-typing.svg',
            'description' => 'Mengetik cepat 10 jari dengan kecepatan 92 KPM (Kata Per Menit).',
        ]);
        Service::factory()->create([
            'title' => 'Public Speaking',
            'icon' => 'icon-speaker.svg',
            'description' => 'Memiliki pengalaman dalam melakukan public speaking.',
        ]);

        Team::factory()->create([
            'name' => 'Lazuardi Irham Karaman',
            'avatar' => 'avatar-1.png',
            'description' => 'Saya seorang creator yang sangat aktif di dunia IT. Saya mempunyai pengalaman yang bagus dalam membuat sebuah aplikasi web.',
        ]);
        Team::factory()->create([
            'name' => 'Ali Jafar',
            'avatar' => 'avatar-1.png',
            'description' => 'Seorang Fullstack developer yang sangat aktif didunia IT. bukan hanya di web tetapi mobile aplikasi yang sangat efektif.',
        ]);
        Team::factory()->create([
            'name' => 'Hanif Luthfi',
            'avatar' => 'avatar-1.png',
            'description' => 'Seorang front end developer yang sangat aktif di dunia IT. mempunyai pengalaman yang bagus dalam membuat sebuah aplikasi web.',
        ]);
        Team::factory()->create([
            'name' => 'Abdul Rosyid',
            'avatar' => 'avatar-1.png',
            'description' => 'Seorang Mobile developer yang sangat aktif di dunia IT. mempunyai pengalaman yang bagus dalam membuat sebuah aplikasi mobile.',
        ]);
        Team::factory()->create([
            'name' => 'Rajwaf Rafi',
            'avatar' => 'avatar-1.png',
            'description' => 'Seorang Kesehatan yang sangat aktif di Kesehatan, mempunyai pengalaman yang bagus dalam kesehatan kami.',
        ]);

        Skill::factory()->create([
            'title' => 'Laravel',
            'range' => '90',
        ]);
        Skill::factory()->create([
            'title' => 'PHP',
            'range' => '80',
        ]);
        Skill::factory()->create([
            'title' => 'HTML, CSS, Javascript',
            'range' => '60',
        ]);
        Skill::factory()->create([
            'title' => 'React, Next JS',
            'range' => '40',
        ]);
    }
}
