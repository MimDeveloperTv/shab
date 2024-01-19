<?php

namespace App\Actions;

use App\Models\Image;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Lorisleiva\Actions\Concerns\AsAction;
use Throwable;

class AddImageAction
{
    use AsAction;

    /**
     * Execute the action.
     *
     * @throws Throwable
     */
    public function handle(string $id, $image): Model
    {
        try {

            $data = [
                'user_id' => auth()->id(),
                'address' => "images/{$id}/".$image->getClientOriginalName(),
                'product_id' => $id,
            ];

            Storage::disk('local')->put($data['address'], $image->getContent());

            return Image::query()->create($data);

        } catch (\Exception $exception) {

            throw new \Exception('Uploading image Operation Has Error', 500);
        }
    }
}
