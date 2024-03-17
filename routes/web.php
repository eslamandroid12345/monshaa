<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {


    return view('welcome');
});
/*
 *  protected function uploadImages(StoreProductRequest $request, $product): void
    {
        if ($request->hasFile('images'))
        {
            foreach ($request->images as $index => $image)
            {
                $newImage = $this->fileManagerService->handle("images.$index", "product/images");
                $this->productImageRepository->create(['image' => $newImage, 'product_id' => $product->id]);
            }
        }
    }

 */
