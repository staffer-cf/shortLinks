<?php

namespace App\Livewire;

use App\Models\Link;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('ShortLinks')]
class ShortLinks extends Component
{

    public $originalLink = '';


    public function add()
    {

        $link = Link::latest()->first();

        $id = $link ? $link->getAttributes()['id'] + 1 : 0;

        $originalUrl = $this->originalLink;
        $shortUrl = $this->generateLink(range('a', 'z'), $id);

        Link::create([
            'original_url' => $originalUrl,
            'short_url' => $shortUrl,
        ]);

        $this->reset('originalLink');
    }

    public function render()
    {

        return view('livewire.short-links', [
            'items' => Link::latest()->take(10)->get(),
        ]);
    }


    private function generateLink(array $characters, int $length, string $base_url = 'site.ru/'): string {
        $current = array_slice($characters, 0, 1); // Start from the first letter

        for ($i = 0; $i < $length; $i++) {
            for ($j = count($current) - 1; $j >= 0; $j--) {
                $currentIndex = array_search($current[$j], $characters);
                $nextIndex = $currentIndex + 1;

                $current[$j] = $characters[$nextIndex] ?? reset($characters);

                if ($currentIndex !== false && $nextIndex < count($characters)) {
                    break;
                }
                else {
                    $current[$j] = reset($characters);
                    if ($j == 0) {
                        array_unshift($current, reset($characters));
                    }
                }
            }
        }

        return $base_url . implode('', $current);
    }

}
