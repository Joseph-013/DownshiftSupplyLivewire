<?php

namespace App\Livewire;

use GuzzleHttp\Client;
use App\Models\Product;
use Livewire\Component;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;
use Livewire\Features\SupportFileUploads\WithFileUploads;

class CreateProduct extends Component
{
    use WithFileUploads;

    public $name;
    public $price;
    public $stockquantity;
    public $criticallevel;
    public $image;

    protected $rules = [
        'name' => 'required|string|unique:product',
        'price' => 'required|numeric',
        'stockquantity' => 'required|numeric',
        'criticallevel' => 'required|numeric',
        'image' => 'required|image|mimes:jpeg,png,jpg|max:4096',
    ];


    // $imagePath = Storage::url('assets/' . $imageName);

    public function createProduct()
    {

        $this->validate([
            'name' => ['required', 'string', 'unique:' . Product::class],
            'price' => ['required', 'numeric'],
            'stockquantity' => ['required', 'numeric'],
            'criticallevel' => ['required', 'numeric'],
            'image' => ['required', 'image', 'mimes:jpeg,png,jpg', 'max:4096'],
        ]);

        // DO NOT CLEAR THESE COMMENTS
        // $storageAccountName = env('AZURE_STORAGE_ACCOUNT_NAME');
        // $containerName = env('AZURE_STORAGE_CONTAINER');
        // $storageKey = env('AZURE_STORAGE_ACCESS_KEY'); // Or use SAS token or OAuth token

        // if ($this->image && $this->name && $this->price && $this->stockquantity && $this->criticallevel) {
        //     $newProduct = Product::create([
        //         'name' => $this->name,
        //         'price' => $this->price,
        //         'stockquantity' => $this->stockquantity,
        //         'criticallevel' => $this->criticallevel,
        //     ]);


        //     $imageName = $newProduct->id.'.'.$this->image->extension();
        //     $this->image->storeAs('public/assets', $imageName);

        //     $blobName = $imageName; // Specify the name for the blob
        //     $blobData = Storage::get('public/assets/'.$imageName);

        //     $endpointUrl = "https://$storageAccountName.blob.core.windows.net/$containerName/$blobName";


        //     // https://learn.microsoft.com/en-us/rest/api/storageservices/blob-service-rest-api
        //     // https://learn.microsoft.com/en-us/rest/api/storageservices/put-blob-from-url?tabs=microsoft-entra-id
        //     // https://learn.microsoft.com/en-us/rest/api/storageservices/authorize-with-shared-key
        //     // https://curl.se/docs/

        //     $date = gmdate('D, d M Y H:i:s T', time());
        //     $canonicalizedHeaders = "x-ms-blob-type:BlockBlob\nx-ms-date:$date\nx-ms-version:2020-10-02";
        //     $canonicalizedResource = "/$storageAccountName/$containerName/$blobName";
        //     $stringToSign = "PUT\n\n\n" . strlen($blobData) . "\n\n\n\n\n\n\n\n\n" . $canonicalizedHeaders . "\n" . $canonicalizedResource;
        //     $signature = base64_encode(hash_hmac('sha256', $stringToSign, base64_decode($storageKey), true));
        //     $authorizationHeader = "SharedKey $storageAccountName:$signature";

        //     $ch = curl_init($endpointUrl);
        //     curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        //     curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'PUT');
        //     curl_setopt($ch, CURLOPT_HTTPHEADER, [
        //         'Authorization: ' . $authorizationHeader,
        //         'x-ms-blob-type: BlockBlob',
        //         'x-ms-date: ' . $date,
        //         'x-ms-version: 2020-10-02'
        //     ]);
        //     curl_setopt($ch, CURLOPT_POSTFIELDS, $blobData);
        //     $response = curl_exec($ch);

        //     if (curl_errno($ch) && $response) {
        //         Log::error('Error uploading blob: ' . curl_error($ch));
        //     } else {
        //         Log::info('Blob uploaded successfully!');
        //         Log::info("Curl Error: ".curl_error($ch));
        //         Log::info($response);
        //     }
        //     curl_close($ch);

        //     Log::info('Blob URL:' . $endpointUrl);

        //     $this->reset(['name', 'price', 'stockquantity', 'criticallevel', 'image']);

        //     $this->dispatch('productCreated', $newProduct->id);
        // }

        //     public $name;
        // public $price;
        // public $stockquantity;
        // public $criticallevel;
        // public $image;

        if ($this->image && $this->name && $this->price && $this->stockquantity && $this->criticallevel) {
            $imageName = time() . '.' . $this->image->extension();
            $this->image->storeAs('public/assets', $imageName);

            Product::create([
                'name' => $this->name,
                'price' => $this->price,
                'stockquantity' => $this->stockquantity,
                'criticallevel' => $this->criticallevel,
                'image' => $imageName,
            ]);

            $this->name = null;
            $this->price = null;
            $this->stockquantity = null;
            $this->criticallevel = null;
            $this->image = null;
            $this->reset(['name', 'price', 'stockquantity', 'criticallevel', 'image']);
            $this->dispatch('productCreated');
            $this->dispatch('clearProductDetails');
            $this->dispatch('alertNotif', 'Product successfully created');
        }
    }

    public function updatedImage()
    {
        $this->validate([
            'image' => 'image|max:10240',
        ]);
    }

    public function render()
    {
        return view('livewire.main.admin.livewire.create-product');
    }
}
