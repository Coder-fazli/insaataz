<?php

namespace Database\Seeders;

use App\Models\About;
use App\Models\AboutChecklistItem;
use App\Models\AboutFeatureCard;
use App\Models\AboutStatCard;
use Illuminate\Database\Seeder;

class AboutSeeder extends Seeder
{
    /**
     * Seed the About page with the existing (previously hardcoded) content
     * so nothing is lost and everything is editable from the admin panel.
     *
     * Active locale is "az". Run with: php artisan db:seed --class=AboutSeeder
     */
    public function run()
    {
        $locale = 'az';

        // --- Singleton: Hero + "Why us" + Guarantee card ---
        $about = About::first() ?: new About();

        // Only fill the new section fields if they are still empty, so we never
        // overwrite content an admin has already edited.
        if (blank($about->hero_title)) {
            $about->hero_badge = [$locale => 'Haqqımızda'];
            $about->hero_title = [$locale => 'OREL İnşaat MMC'];
            $about->hero_title_highlight = [$locale => 'Etibarlı Tərəfdaş'];
            $about->hero_description = [$locale => '1998-ci ildən inşaat sektorunda fəaliyyət göstərərək su təchizatı, isitmə və soyutma sistemlərinin satışı, quraşdırılması və servisini peşəkar şəkildə həyata keçiririk.'];

            $about->whyus_badge = [$locale => 'Niyə Biz?'];
            $about->whyus_title = [$locale => 'Müasir Texnologiyalar,'];
            $about->whyus_title_highlight = [$locale => 'Etibarlı Xidmət'];
            $about->whyus_lead = [$locale => 'Komandamız müasir memarlıq və mühəndislik standartlarına uyğun, innovativ həllərlə yaşayış və sənaye obyektləri üçün etibarlı layihələr təqdim edir.'];

            $about->guarantee_icon = 'fas fa-award';
            $about->guarantee_title = [$locale => 'Keyfiyyət Zəmanəti'];
            $about->guarantee_subtitle = [$locale => 'ISO sertifikatlı xidmət'];

            $about->save();
        }

        // --- Feature cards ---
        if (AboutFeatureCard::count() === 0) {
            $features = [
                ['icon' => 'fas fa-temperature-high', 'title' => 'İstilik Sistemləri', 'description' => 'Keyfiyyətli istilik avadanlıqları və boru sistemləri'],
                ['icon' => 'fas fa-tint',             'title' => 'Su Təchizatı',      'description' => 'Müasir su təchizatı və kanalizasiya həlləri'],
                ['icon' => 'fas fa-tools',            'title' => 'Servis Xidməti',    'description' => 'Peşəkar quraşdırma və texniki dəstək'],
            ];
            foreach ($features as $i => $f) {
                AboutFeatureCard::create([
                    'icon' => $f['icon'],
                    'title' => [$locale => $f['title']],
                    'description' => [$locale => $f['description']],
                    'sort_order' => $i,
                ]);
            }
        }

        // --- Checklist items ---
        if (AboutChecklistItem::count() === 0) {
            $items = [
                'Hərtərəfli mühəndislik və layihələndirmə xidmətləri',
                'Beynəlxalq standartlara uyğun avadanlıqlar',
                'Zəmanətli quraşdırma və satış sonrası dəstək',
                'Fərdi yanaşma və müştəri məmnuniyyəti',
            ];
            foreach ($items as $i => $text) {
                AboutChecklistItem::create([
                    'text' => [$locale => $text],
                    'sort_order' => $i,
                ]);
            }
        }

        // --- Stat cards ---
        if (AboutStatCard::count() === 0) {
            $stats = [
                ['icon' => 'fas fa-users',     'value' => '500+', 'label' => 'Razı Müştəri'],
                ['icon' => 'fas fa-handshake', 'value' => '50+',  'label' => 'Tərəfdaş'],
            ];
            foreach ($stats as $i => $s) {
                AboutStatCard::create([
                    'icon' => $s['icon'],
                    'value' => $s['value'],
                    'label' => [$locale => $s['label']],
                    'sort_order' => $i,
                ]);
            }
        }
    }
}
